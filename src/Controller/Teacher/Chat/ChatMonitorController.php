<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 21:36
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Teacher\Chat;

use App\Controller\Teacher\TeacherController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ChatMonitorController
 * @package App\Controller\Teacher\Chat
 */
final class ChatMonitorController extends TeacherController
{
    private const DUMMY_CHAT_MESSAGES = [
        'message' => [
            'actor' => 'police',
            'text' => 'Hey!',
            'image' => 'police.png',
            'time' => '',
        ],
    ];

    public function index(): Response
    {
        return $this->render('Teacher/Chat/ChatMonitor.html.twig', [
            'messages' => self::DUMMY_CHAT_MESSAGES
        ]);
    }
}