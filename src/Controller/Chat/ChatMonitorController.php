<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 21:36
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Chat;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chat monitor")
 * Class ChatMonitorController
 * @package App\Controller\Teacher\Chat
 */
final class ChatMonitorController extends AbstractController
{
    private const DUMMY_CHAT_MESSAGES = [
        "msg1" => [
            'text' => 'Hey Actor!',
            'time' => '13:21',
            'actor' => 'Ambulance',
            'image' => 'ambulance',
        ],
        "msg2" => [
            'text' => 'Hey Arnold!',
            'time' => '15:21',
            'actor' => 'Ambulance',
            'image' => 'ambulance',
        ],
        "msg3" => [
            'text' => 'Hey Test!',
            'time' => '17:33',
            'actor' => 'Ambulance',
            'image' => 'ambulance',
        ],
    ];

    public function index(): Response
    {
        return $this->render(
            'Chat/ChatMonitor.html.twig',
            [
            'messages' => self::DUMMY_CHAT_MESSAGES,
        ] );
    }
}