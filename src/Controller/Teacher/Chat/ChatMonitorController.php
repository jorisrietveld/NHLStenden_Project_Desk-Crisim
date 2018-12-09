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
        "msg1" => [
            'text' => 'Hey Actor!',
            'time' => '13:21',
            'actor' => 'Ambulance'
        ],
        "msg2" => [
            'text' => 'Hey Arnold!',
            'time' => '15:21',
            'actor' => 'Ambulance'
        ],
        "msg3" => [
            'text' => 'Hey Test!',
            'time' => '17:33',
            'actor' => 'Ambulance'
        ]
    ];

    public function index(): Response
    {
        return $this->render('Teacher/Chat/ChatMonitor.html.twig', [
            'messages' => self::DUMMY_CHAT_MESSAGES
        ]);
    }
}