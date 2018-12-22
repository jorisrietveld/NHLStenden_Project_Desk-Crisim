<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 08-12-2018 21:36
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Controller\GameScenario;


use App\Controller\Teacher\TeacherController;
use App\Entity\GameScenario;
use App\Form\GameScenarioType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Intl\Exception\NotImplementedException;

/**
 * Class UploadGameScenarioController
 *
 * @package App\Controller\Teacher\Game
 */
final class GameScenarioController extends TeacherController
{
    /**
     * Serves the upload game scenario page. On this page the user can upload
     * new game scenarios with the form: ScenarioType that is injected in the
     * twig template.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function upload( Request $request ): Response
    {
        $ScenarioEntity = new GameScenario();

        $form = $this->createForm(
            GameScenarioType::class,
            $ScenarioEntity,
            [
            'action' => $this->generateUrl( 'upload_scenario' ),
            'method' => 'POST',
        ] );

        $form->handleRequest( $request );

        // If the request contains form data and if the data can be validated.
        if ( $form->isSubmitted() && $form->isValid() ) {

            /**
             * @var \Symfony\Component\HttpFoundation\File\UploadedFile $scenarioFile
             */
            $scenarioFile     = $ScenarioEntity->getFile();
            $scenarioFileName = $this->createStorageName( $scenarioFile );

            try
            {
                $scenarioFile->move(
                    $this->getParameter( 'scenario_file_directory' ),
                    $scenarioFileName
                );
            } catch ( FileException $exception )
            {
                throw new NotImplementedException( $exception->getFile() );
            }


            $ScenarioEntity->setFile( $scenarioFileName );
            $ScenarioEntity->setFileSize( $scenarioFile->getSize() );

            // Get the Doctrine Entity manager that can store the scenario in the database.
            $entityManager = $this->getDoctrine()->getManager();

            // Add a persist job that will store the game scenario to the database.
            $entityManager->persist( $ScenarioEntity );

            // Tell the entity manager to flush all jobs to the database.
            $entityManager->flush();

            // Add a flash message to notify the user, the message is in the
            // teacher translation domain
            $this->addFlash(
                'notice',
                $this->getMessage( 'upload_scenario.form.success' )
            );

            // Finished so redirect to the same page, the redirect prevents
            // double data submission.
            $this->redirect( $this->generateUrl( 'upload_scenario' ) );

        }
        return $this->render(
            'Teacher/GameScenario/UploadScenario.html.twig',
            [
            'form' => $form->createView(),
            ]
        );
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    private function createStorageName( UploadedFile $file ): string
    {
        return sprintf(
            '%s_%s.%s',
            md5( uniqid( '', true ) ),
            $file->getFilename(),
            $file->guessExtension()
        );

    }


}