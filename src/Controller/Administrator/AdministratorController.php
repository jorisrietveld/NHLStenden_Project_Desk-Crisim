<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 09-12-2018 01:17
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Administrator;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class AdministratorController
 * @package App\Controller\Administrator
 */
class AdministratorController extends AbstractController
{
    public function index()
    {
        return $this->render( 'Admin/Index.html.twig' );
    }
}