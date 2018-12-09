<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 03:52
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Student\Game;

use App\Controller\Student\StudentController;

/**
 * Class InfoFeedController
 * @package App\Controller\Student
 */
class InfoFeedController extends StudentController
{
    public function index()
    {
        return $this->render(':Student/Game:InfoFeed.twig');
    }
}