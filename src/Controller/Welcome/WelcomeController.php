<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 09-12-2018 02:45
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Welcome;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WelcomeController extends AbstractController
{
    public function index()
    {
        return $this->render('Welcome/Welcome.html.twig');
    }


}