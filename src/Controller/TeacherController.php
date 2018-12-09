<?php

    namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;

    class TeacherController extends AbstractController
    {
        /**
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function index()
        {
            return $this->render('teacher/ImpersonateRole.html.twig');
        }

        public function loadEvent()
        {
            return $this->render('Teacher/scenario/CreateEvent.html.twig');
        }

        public function participators()
        {
            return $this->render('AddParticipators.html.twig', array(
                'students' => [
                    '325' => [
                        'email' => 'Student@stenden.com',
                        'name' => 'S. Student',
                        'actor' => 'Politie',
                        'online' => 'green-text',
                        'number' => '12345'
                    ],
                    '634' => [
                        'email' => 'Student@stenden.com',
                        'name' => 'S. Student',
                        'actor' => 'Ambulance',
                        'online' => 'red-text',
                        'number' => '12345'
                    ],
                    '457' => [
                        'email' => 'Student@stenden.com',
                        'name' => 'S. Student',
                        'actor' => 'Ambulance',
                        'online' => 'red-text',
                        'number' => '12345'
                    ]]
            ));
        }

        public function showStatistics()
        {
            return $this->render('Teacher/ShowStatistics.html.twig');
        }

        public function startScenario()
        {
            return $this->render('Teacher/scenario/StartNew.html.twig');
        }

        public function uploadScenario()
        {
            return $this->render('Teacher/scenario/UploadScenario.html.twig');
        }

        public function chatMonitor()
        {
            return $this->render('teacher/Chat/ChatMonitor.html.twig', array(
                "messages" => [

                    "msg1" => [
                        'text' => 'Hey Actor!',
                        'time' => '13:21',
                        'actor' => 'Ambulance'
                    ],
                    "msg2" => [
                        'text' => 'Hey Arnold!',
                        'time' => '15:21',
                        'actor' => 'Ambulance'
                    ],
                    "msg3" => [
                        'text' => 'Hey Test!',
                        'time' => '17:33',
                        'actor' => 'Ambulance'
                    ]


                ]
            ));
        }

        public function createSession(Request $request)
        {
            return $this->render('CreateSession.html.twig', [
                "Something" => $request
            ]);

        }

        public function assignPoints()
        {
            return $this->render('Teacher/AssignPoints.html.twig');
        }
    }
