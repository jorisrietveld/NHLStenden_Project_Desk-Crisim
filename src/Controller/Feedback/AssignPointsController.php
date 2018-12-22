<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 09-12-2018 04:10
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Feedback;


use App\Controller\Teacher\TeacherController;
use Symfony\Component\HttpFoundation\Response;

final class AssignPointsController extends TeacherController
{
    public function index(): Response
    {
        return $this->render('Teacher/Game/AssignPoints.html.twig');
    }

}