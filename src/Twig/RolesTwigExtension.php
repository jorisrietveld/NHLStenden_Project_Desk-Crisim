<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 22-12-2018 19:19
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Twig;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class RolesTwigExtension
 * A simple twig extension to get all the roles from the current user.
 * @package App\Twig
 */
class RolesTwigExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter( 'getRoles', [ $this, 'getRoles' ] ),
        ];
    }

    public function getName()
    {
        return 'roles_filter_twig_extension';
    }

    public function getRoles( UserInterface $user )
    {
        return $user->getRoles();
    }
}