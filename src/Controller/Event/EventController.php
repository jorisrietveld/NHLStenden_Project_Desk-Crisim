<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 04:48
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Event;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CreateGameEventController
 * @package App\Controller\Teacher\Game
 */
final class EventController extends AbstractController
{
    public function createEven(): Response
    {
        return $this->render( 'GameSession/CreateEvent.html.twig' );
    }
}