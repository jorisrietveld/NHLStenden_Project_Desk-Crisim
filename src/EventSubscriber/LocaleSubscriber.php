<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 19-12-2018 01:24
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\EventSubscriber;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class LocaleSubscriber
 *
 * @package App\EventSubscriber
 */
class LocaleSubscriber implements EventSubscriberInterface
{
    /**
     * @var string The default locale when the user fists arives.
     */
    private $defaultLocale;

    /**
     * LocaleSubscriber constructor. Makes sure that there is a locale set on each request because lots of
     * classes depend on it.
     *
     * @param string $defaultLocale
     */
    public function __construct( string $defaultLocale = 'nl' )
    {
        $this->defaultLocale = $defaultLocale;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            // must be registered before (i.e. with a higher priority than) the default Locale listener
            KernelEvents::REQUEST => [ [ 'onKernelRequest', 20 ] ],
        ];
    }

    /**
     * Gets triggered on each kernel request.
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onKernelRequest( GetResponseEvent $event ): void
    {
        $request = $event->getRequest();
        if ( !$request->hasPreviousSession() ) {
            return;
        }

        // try to see if the locale has been set as a _locale routing parameter
        if ( $locale = $request->attributes->get( '_locale' ) ) {
            $request->getSession()->set( '_locale', $locale );
        } else {
            // if no explicit locale has been set on this request, use one from the session
            $request->setLocale( $request->getSession()->get( '_locale', $this->defaultLocale ) );
        }
    }
}