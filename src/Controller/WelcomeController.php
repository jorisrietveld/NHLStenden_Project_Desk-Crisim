<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 09-12-2018 02:45
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class WelcomeController
 *
 * @package App\Controller\Welcome
 */
class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render( 'Welcome/Welcome.html.twig' );
    }


}