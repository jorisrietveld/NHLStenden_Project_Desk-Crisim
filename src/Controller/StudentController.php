<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StudentController extends AbstractController
{
    public function index()
    {
        return $this->render('student/StudentActions.html.twig');
    }

    public function actions()
    {
        return $this->render('student/StudentActions.html.twig');
    }

    public function infoFeed()
    {
        return $this->render('student/InfoFeed.twig');
    }

    public function chat()
    {
        return $this->render('student/chat/Chat.html.twig');
    }
}
