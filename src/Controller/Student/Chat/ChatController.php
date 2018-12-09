<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 03:52
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Student\Chat;

use App\Controller\Student\StudentController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * This class handles the students Chat  actions.
 * Class ChatController
 * @package App\Controller\Student
 */
class ChatController extends StudentController
{
    final public function index(Request $request): Response
    {
        $this->render('Student/Chat/ChatPanel.html.twig');
    }
}