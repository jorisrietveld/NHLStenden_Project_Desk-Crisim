<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 28-11-2018 00:08
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Security;

use App\Entity\User;
use App\Service\MessageDomain;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Translation\TranslatorInterface;

final class DefaultAuthenticator extends AbstractGuardAuthenticator
{
    use TargetPathTrait;

    /**
     * The entity manager for querying user data.
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * The router for redirecting users when they authenticate them selves.
     * @var RouterInterface
     */
    private $router;

    /**
     * The Cross Site Request Forgery token manager is used to inject tokens into the Authentication forms, protecting
     * them from those attacks.
     * @var CsrfTokenManagerInterface
     */
    private $csrfTokenManager;

    /**
     * This provides functions to load users on each request from cookies, the session etc.
     * @var UserProviderInterface
     */
    private $userProvider;

    /**
     * The password encoder is used to hash and validate the users passwords in the database. (Using argon2 or BCrypt)
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * Translator to get localized messages to notify the user about the authentication.
     * @var Translator
     */
    private $translator;

    /**
     * This class is used to authenticate users to determine there authorization level.
     * DefaultAuthenticator constructor.
     *
     * @param EntityManagerInterface       $entityManager
     * @param RouterInterface              $router
     * @param CsrfTokenManagerInterface    $csrfTokenManager
     * @param UserProviderInterface        $userProvider
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param TranslatorInterface          $translator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        RouterInterface $router,
        CsrfTokenManagerInterface $csrfTokenManager,
        UserProviderInterface $userProvider,
        UserPasswordEncoderInterface $passwordEncoder,
        TranslatorInterface $translator
    )
    {
        $this->entityManager = $entityManager;
        $this->router = $router;
        $this->csrfTokenManager = $csrfTokenManager;
        $this->passwordEncoder = $passwordEncoder;
        $this->userProvider = $userProvider;
        $this->translator = $translator;
    }

    private function getMessage( string $messageKey )
    {
        return $this->translator->trans( $messageKey, [], MessageDomain::AUTHENTICATION );
    }

    /**
     * Does the authenticator support the users request?
     * @param Request $request
     * @return bool
     */
    public function supports(Request $request): bool
    {
        return 'authentication_login' === $request->attributes->get('_route') && $request->isMethod('POST');
    }

    /**
     * Gets the credentials from the users request.
     * @param Request $request
     * @return array|mixed
     */
    public function getCredentials(Request $request)
    {
        // Get the posted credentials from the Request()
        $credentials = [
            'username' => $request->request->get('username'),
            'password' => $request->request->get('password'),
            'csrf_token' => $request->request->get('_csrf_token')
        ];

        // Save the last typed username into the session.
        $request->getSession()->set(
            Security::LAST_USERNAME,
            $credentials['username']
        );

        return $credentials;
    }

    /**
     * Attempts to fetch a authorized user from the database, otherwise redirect them to the login form.
     * @param mixed $credentials
     * @param UserProviderInterface $userProvider
     * @return UserInterface
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        // Validate the csrf-token submitted with the request.
        $token = new CsrfToken('authenticate', $credentials['csrf_token']);
        if (!$this->csrfTokenManager->isTokenValid($token)) {

            throw new InvalidCsrfTokenException( $this->getMessage( 'login.feedback.error.csrf' ) );
        }

        // Get the user repository and search for the username submitted.
        $user = $this->entityManager->getRepository(User::class)
            ->findOneBy(['username' => $credentials['username']]);

        if (!$user) {
            // Could not find the user in the database.
            throw new CustomUserMessageAuthenticationException( $this->getMessage( 'login.feedback.error.not_found' ) );
            // Todo replace the error message with the Translation component.
        }

        return $user;
    }

    /**
     * Validates the credentials send by the user with the stored hash in the database.
     * @param mixed $credentials
     * @param UserInterface $user
     * @return bool
     */
    public function checkCredentials($credentials, UserInterface $user): bool
    {
        return $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
    }

    /**
     * We could not authenticate the user, redirect them back to the login form and notify the user.
     * @param Request $request
     * @param AuthenticationException $exception
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response|null
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);
        return new RedirectResponse($this->getLoginUrl());
    }

    /**
     * The user is successfully authenticated and authorized to access the restricted part of the application.
     * @param Request $request
     * @param TokenInterface $token
     * @param string $providerKey
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response|null
     * @throws \Exception
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey): RedirectResponse
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $providerKey)) {
            return new RedirectResponse($targetPath);
        }

        // Determine the user roles to redirect them to the correct route.
        $userRoles = $token->getRoles();

        if (\in_array('ROLE_ADMIN', $userRoles, true)) {
            return new RedirectResponse($this->router->generate('admin_index'));
        }
        if (\in_array('ROLE_LOGGER', $userRoles, true)) {
            return new RedirectResponse($this->router->generate('logger_index'));
        }
        if (\in_array('ROLE_TEACHER', $userRoles, true)) {
            return new RedirectResponse($this->router->generate('teacher_index'));
        }
        if (\in_array('ROLE_SPECTATOR', $userRoles, true)) {
            return new RedirectResponse($this->router->generate('spectator_index'));
        }
        if (\in_array('ROLE_STUDENT', $userRoles, true)) {
            return new RedirectResponse($this->router->generate('student_index'));
        }
        // For example : return new RedirectResponse($this->router->generate('some_route'));
        throw new \Exception('TODO: provide a valid redirect inside ' . __FILE__);
    }

    /**
     * This function is called whenever a anonymous user access a authorized route. It will redirect them to
     * the login page so the user can authenticate him self.
     * @param Request $request
     * @param AuthenticationException|null $authException
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new RedirectResponse($this->getLoginUrl());
    }

    /**
     * Returns if the Authentication login supports a remember me functionality.
     * @return bool|void
     */
    public function supportsRememberMe()
    {
        // todo implement a rember me cookie.
        return false;
    }

    /**
     * Gets the login route.
     * @return string
     */
    protected function getLoginUrl(): string
    {
        return $this->router->generate('authentication_login');
    }
}
