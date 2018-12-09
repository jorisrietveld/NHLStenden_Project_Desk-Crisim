<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 04:50
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Teacher\Game;


use App\Controller\Teacher\TeacherController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AddParticipatorsController
 * @package App\Controller\Teacher\Game
 */
final class AddParticipatorsController extends TeacherController
{
    private const DUMMY_PARTICIPATORS = ['students' => [
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
    ];

    private function fetchParticipators(): array
    {
        /* TODO replace with query
        $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();
        */
        return self::DUMMY_PARTICIPATORS;
    }

    public function index(): Response
    {
        return $this->render('Teacher/Game/AddParticipators.html.twig',
            $this->fetchParticipators()
        );
    }
}