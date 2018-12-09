<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 03:50
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Student\Game;

use App\Controller\Student\StudentController;

/**
 * Class ActionController
 * @package App\Controller\Student
 */
class ActionController extends StudentController
{
    public function index()
    {
        return $this->render('Student/Game/StudentActions.html.twig');
    }
}