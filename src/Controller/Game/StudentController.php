<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 22-12-2018 02:16
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Game;


class StudentController
{
    public function showInfoFeed()
    {
        return $this->render( ':Student/Game:InfoFeed.twig' );
    }

    public function showActions()
    {
        return $this->render( 'Student/Game/StudentActions.html.twig' );
    }
}