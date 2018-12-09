<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 21:36
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Teacher\Game;


use App\Controller\Teacher\TeacherController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UploadGameScenarioController
 * @package App\Controller\Teacher\Game
 */
final class UploadGameScenarioController extends TeacherController
{
    public function index(): Response
    {
        return $this->render('Teacher/Game/UploadScenario.html.twig');
    }
}