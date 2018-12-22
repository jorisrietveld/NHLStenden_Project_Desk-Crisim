<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 21:36
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\GameSessionManagement;

use App\Controller\Teacher\TeacherController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class StartGameController
 * @package App\Controller\Teacher\Game\
 */
final class GameSession extends TeacherController
{
    public function startGameAction(): Response
    {
        return $this->render('Teacher/Game/StartNew.html.twig');
    }

    public function createGameAction(): Response
    {
        return $this->render( 'Teacher/Game/CreateSession.html.twig' );
    }
}