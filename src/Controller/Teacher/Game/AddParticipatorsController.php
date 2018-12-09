<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 04:50
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Teacher\Game;


use App\Controller\Teacher\TeacherController;

/**
 * Class AddParticipatorsController
 * @package App\Controller\Teacher\Game
 */
class AddParticipatorsController extends TeacherController
{
    public function index()
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
}