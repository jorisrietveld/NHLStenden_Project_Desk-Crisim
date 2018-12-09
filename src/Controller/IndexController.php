<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function index()
    {
        return $this->render('ImpersonateRole.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
