<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 04:52
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\GameSession;


use App\Controller\Teacher\TeacherController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class StatisticsController
 * @package App\Controller\Teacher
 */
final class StatisticsController extends TeacherController
{
    public function index(): Response
    {
        return $this->render('Teacher/Game/ShowStatistics.html.twig');
    }
}