<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CreateSessionController extends AbstractController
{
    public function new(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $task = new Task();
        $task->setTask('Typ hier beste');

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)

            ->add('save', SubmitType::class, array('label' => 'Send'))
            ->getForm();

        return $this->render('teacher/CreateSession.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
