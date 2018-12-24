<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 22-12-2018 02:16
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Game;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GameController extends AbstractController
{

    /**
     * @Route("/game/info feed", name="student_info_feed")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showInfoFeed()
    {
        return $this->render( 'Game/InfoFeed.twig' );
    }

    /**
     * @Route("/game/acties", name="student_actions")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showActions()
    {
        return $this->render( 'Game/StudentActions.html.twig' );
    }
}