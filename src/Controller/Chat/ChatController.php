<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 03:52
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Chat;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ChatController - Actions for sending & receiving chat messages.
 * @Route("/chat")
 * @package App\Controller\Student
 */
class ChatController extends AbstractController
{

    /**
     * @Route("/game/chat", name="student_chat_panel")
     * @IsGranted("ROLE_TEACHER")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showChatPanel()
    {
        return $this->render( 'Chat/ChatPanel.html.twig' );
    }

    /**
     * @Route("/Docent/chat monitor", name="teacher_chat_monitor")
     * @IsGranted("ROLE_TEACHER")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showChatMonitor()
    {
        return $this->render( 'Chat/ChatPanel.html.twig' );
    }
}