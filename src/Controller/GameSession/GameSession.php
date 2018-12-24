<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 21:36
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\GameSession;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class StartGameController
 * @package App\Controller\Teacher\Game\
 */
final class GameSession extends AbstractController
{
    /**
     * @Route("", name="")
     * @return Response
     */
    public function startGame(): Response
    {
        return $this->render( 'GameSession/StartSession.html.twig' );
    }

    /**
     * @Route("/Docent/Game aanmaken", name="")
     * @return Response
     */
    public function createGame(): Response
    {
        return $this->render( 'GameSession/CreateSession.html.twig' );
    }

    /**
     * @Route("/Docent/Sessie Deelnemers", name="teacher_show_participators")
     * @return Response
     */
    public function showParticipators(): Response
    {
        return $this->render(
            'GameSession/Participators.html.twig'
        );
    }
}