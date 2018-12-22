<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 09-12-2018 02:45
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Welcome;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class WelcomeController
 * @Route("/")
 *
 * @package App\Controller\Welcome
 */
class WelcomeController extends AbstractController
{
    /**
     * @Route("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('Welcome/Welcome.html.twig');
    }


}