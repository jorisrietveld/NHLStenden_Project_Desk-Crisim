<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 21-12-2018 04:22
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\User;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RolesController
 * todo remove this later
 * Route({ "nl": "/Beheerder/rollen bijwerken/{id}",
 *     "en": "/{_locale}/administrator/update roles/{id}",
 *     "fy": "/{_locale}/bestjoerster/update rollen/{id}"
 *      },
 *     name="update_user_roles",
 *     requirements={
 *     "_locale": "%app.locales%"
 *     })
 * todo remove this later ^
 * @Route(/roles)
 *
 * @package App\Controller\User
 */
class RolesController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index()
    {

    }

    public function update()
    {

    }
}