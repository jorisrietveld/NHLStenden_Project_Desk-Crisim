<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 04:50
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\Teacher;


class ParticipatorsController extends TeacherController
{
    public function index()
    {
        return $this->render('teacher/Participators.html.twig', array(
            'students' => [
                '325' => [
                    'email' => 'student@stenden.com',
                    'name' => 'S. Student',
                    'actor' => 'Politie',
                    'online' => 'green-text',
                    'number' => '12345'
                ],
                '634' => [
                    'email' => 'student@stenden.com',
                    'name' => 'S. Student',
                    'actor' => 'Ambulance',
                    'online' => 'red-text',
                    'number' => '12345'
                ],
                '457' => [
                    'email' => 'student@stenden.com',
                    'name' => 'S. Student',
                    'actor' => 'Ambulance',
                    'online' => 'red-text',
                    'number' => '12345'
                ]]
        ));
    }
}