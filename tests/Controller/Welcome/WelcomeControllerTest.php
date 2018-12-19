<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 21:08
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Welcome;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WelcomeControllerTest extends WebTestCase
{

    public function testIndex()
    {
        $client = static::createClient();
        $client->request( 'GET', '/' );
        $this->assertEquals( 200, $client->getResponse()->getStatusCode() );
    }
}
