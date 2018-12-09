<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 21:36
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Teacher\Game;

use App\Controller\Teacher\TeacherController;

/**
 * Class StartGameController
 * @package App\Controller\Teacher\Game\
 */
class StartGameController extends TeacherController
{
    public function index()
    {
        return $this->render('Teacher/Game/StartNew.html.twig');
    }
}