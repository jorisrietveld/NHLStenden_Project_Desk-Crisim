<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 09-12-2018 03:17
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Teacher;


class HomeController extends TeacherController
{
    public function index()
    {
        return $this->render('Teacher/Index.html.twig');
    }
}