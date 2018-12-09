<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StartGameScenarioController extends AbstractController
{




    public function index()
    {
        return $this->render('Teacher/scenario/StartNew.html.twig', [
            'controller_name' => 'StartGameScenarioController',
        ]);
    }
}
