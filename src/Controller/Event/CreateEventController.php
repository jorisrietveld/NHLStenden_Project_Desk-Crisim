<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 04:48
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Event;


use App\Controller\Teacher\TeacherController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CreateGameEventController
 * @package App\Controller\Teacher\Game
 */
final class CreateEventController extends TeacherController
{
    public function index(): Response
    {
        return $this->render('Teacher/Game/CreateEvent.html.twig');
    }
}