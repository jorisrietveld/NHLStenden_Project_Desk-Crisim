<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 19-12-2018 01:32
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\EventSubscriber;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Http\SecurityEvents;

/**
 * Class UserLocaleSubscriber
 *
 * @package App\EventSubscriber
 */
class UserLocaleSubscriber implements EventSubscriberInterface
{
    /**
     * The stated user session.
     *
     * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
     */
    private $session;

    /**
     * UserLocaleSubscriber constructor.
     *
     * @param \Symfony\Component\HttpFoundation\Session\SessionInterface $session
     */
    public function __construct( SessionInterface $session )
    {
        $this->session = $session;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            SecurityEvents::INTERACTIVE_LOGIN => 'onInteractiveLogin',
        ];
    }


    /**
     * @param \Symfony\Component\Security\Http\Event\InteractiveLoginEvent $event
     */
    public function onInteractiveLogin( InteractiveLoginEvent $event ): void
    {
        $user = $event->getAuthenticationToken()->getUser();

        if ( null !== $user->getLocale() ) {
            $this->session->set( '_locale', $user->getLocale() );
        }
    }
}