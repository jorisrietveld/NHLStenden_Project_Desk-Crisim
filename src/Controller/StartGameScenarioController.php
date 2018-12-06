<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StartGameScenarioController extends AbstractController
{




    public function index()
    {
        return $this->render('teacher/scenario/Start.html.twig', [
            'controller_name' => 'StartGameScenarioController',
        ]);
    }
}
