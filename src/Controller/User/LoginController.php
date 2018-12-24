<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 21:08
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\User;


use App\Entity\User;
use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="user_login")
     * -
     * @param \Symfony\Component\Security\Http\Authentication\AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showLogin( AuthenticationUtils $authenticationUtils )
    {
        $error        = $authenticationUtils->getLastAuthenticationError();
        $lastUserName = $authenticationUtils->getLastUsername();

        return $this->render(
            'User/Login.html.twig',
            [
                'last_username' => $lastUserName,
                'error'         => $error,
            ]
        );
    }

    /**
     * This is the route the user can use to logout.
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in
     * config/packages/security.yaml
     * @Route("/logout", name="security_logout")
     */
    public function logout(): void
    {
        throw new \Exception( 'This should never be reached!' );
    }

    private function fetchUser( string $userName ): UserInterface
    {
        $user = $this->getDoctrine()
            ->getRepository( User::class )
            ->find( $userName );

        if ( !$user )
        {
            throw $this->createNotFoundException(
                'No user found with the username:' . $userName
            );
        }
    }
}