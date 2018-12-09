<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class CreateGameSessionController extends AbstractController
{
    public function new(Request $request)
    {

        $myTask = $request->attributes->get('task');
        // creates a task and gives it some dummy data for this example
        $task = new Task();

        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Send'))
            ->getForm();
        $form->handleRequest( $request );

        $request->request->get($form->getName());

        return $this->render('CreateSession.html.twig', array(
            'form' => $form->createView(),
            'myTask' => $myTask
        ));
    }

}
