<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    public function index()
    {
        return $this->render('ImpersonateRole.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
