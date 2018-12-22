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
     * @Route("/login", name="login_page", methods={"GET","POST"})
     * -
     * @param \Symfony\Component\Security\Http\Authentication\AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showLogin( AuthenticationUtils $authenticationUtils )
    {
        $error        = $authenticationUtils->getLastAuthenticationError();
        $lastUserName = $authenticationUtils->getLastUsername();

        $form = $this->createForm(
            LoginType::class,
            [
                '_username' => $lastUserName,
            ]
        );

        return $this->render(
            'User/Login.html.twig',
            [
                'form'  => $form->createView(),
                'error' => $error,
            ]
        );
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