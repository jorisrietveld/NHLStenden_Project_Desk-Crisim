<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 21:08
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    private function fetchUser( string $userName) : UserInterface
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($userName);

        if(!$user){
            throw $this->createNotFoundException(
                'No user found with the username:' . $userName
            );
        }

    }

    public  function  login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUserName = $authenticationUtils->getLastUsername();

        return $this->render('authentication/Login.html.twig',[
            'last_username' => $lastUserName,
            'error' => $error
        ]);
    }

}