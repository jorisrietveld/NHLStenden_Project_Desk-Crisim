<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 03:52
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Student;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * This class handles the students chat  actions.
 * Class ChatController
 * @package App\Controller\student
 */
class ChatController extends StudentController
{
    final public function index(Request $request): Response
    {
        $this->render('student/chat/Chat.html.twig');
    }
}