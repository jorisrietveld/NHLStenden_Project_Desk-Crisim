<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 03:52
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Chat;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ChatController - Actions for sending & receiving chat messages.
 * @Route("/chat")
 * @package App\Controller\Student
 */
class ChatController extends AbstractController
{

    /**
     * @Route("/panel", name="chat_panel", methods={"GET"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    final public function showPanel(): Response
    {
        $this->render( 'Chat/ChatPanel.html.twig' );
    }
}