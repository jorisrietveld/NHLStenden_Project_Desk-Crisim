<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 22-12-2018 02:09
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\User;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{

    /**
     * @Route("/my profile", name="my_profile")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showMyProfile()
    {
        return $this->render( 'User/MyProfile.html.twig' );
    }
}