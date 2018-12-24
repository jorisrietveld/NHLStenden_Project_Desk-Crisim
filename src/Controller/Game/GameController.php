<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 22-12-2018 02:16
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Game;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GameController extends AbstractController
{
    public function showInfoFeed()
    {
        return $this->render( 'Game/InfoFeed.twig' );
    }

    public function showActions()
    {
        return $this->render( 'Game/StudentActions.html.twig' );
    }
}