<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 09-12-2018 04:04
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Teacher\Game;


use App\Controller\Teacher\TeacherController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CreateSessionController
 * @package App\Controller\Teacher\Game
 * @package App\Controller\Teacher\Game
 */
final class CreateSessionController extends TeacherController
{
    public function index(): Response
    {
        return $this->render('Teacher/Game/CreateSession.html.twig');
    }
}