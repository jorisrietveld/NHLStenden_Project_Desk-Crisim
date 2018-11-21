<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 21-11-2018 02:06
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthenticationController extends AbstractController
{
    public function index()
    {
        return $this->render('authentication/Login.html.twig', [
            'controller_name' => 'AuthenticationController',
        ]);
    }
}
