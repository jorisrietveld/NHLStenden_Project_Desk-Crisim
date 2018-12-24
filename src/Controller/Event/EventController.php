<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 04:48
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Event;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CreateGameEventController
 * @package App\Controller\Teacher\Game
 */
final class EventController extends AbstractController
{
    /**
     * @Route("/Docent/Event aanmaken", name="teacher_create_event")
     * @IsGranted("ROLE_TEACHER")
     * @return Response
     */
    public function createEvent(): Response
    {
        return $this->render( 'GameSession/CreateEvent.html.twig' );
    }
}