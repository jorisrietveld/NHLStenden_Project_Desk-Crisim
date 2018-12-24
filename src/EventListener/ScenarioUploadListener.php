<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 21-12-2018 02:36
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\EventListener;


use App\Entity\GameScenario;
use App\Service\GameScenario\UploadService;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ScenarioUploadListener
{
    /**
     * @var \App\Service\GameScenario\UploadService
     */
    private $uploader;

    public function __construct( UploadService $scenarioUploader )
    {
        $this->uploader = $scenarioUploader;
    }

    /**
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function prePersist( LifecycleEventArgs $args )
    {
        /** @var \App\Entity\GameScenario $entity */
        $entity = $args->getEntity();
        $this->uploadScenarioFile( $entity );
    }

    private function uploadScenarioFile( $entity )
    {
        if ( !$entity instanceof GameScenario )
        {
            return;
        }

        $file = $entity->getFile();

        if ( $file instanceof UploadedFile )
        {
            $fileName = $this->uploader->upload( $file );
            $entity->setFile( $fileName );
        }
        elseif ( $file instanceof File )
        {
            $entity->setFile( $file->getFilename() );
        }
    }

    public function postLoad( LifecycleEventArgs $args )
    {
        $entity = $args->getEntity();

        if ( !$entity instanceof GameScenario )
        {
            return;
        }

        if ( $fileName = $entity->getFile() )
        {
            $entity->setBrochure(
                new File(
                    $this->uploader->getTargetDirectory() . '/' . $fileName
                )
            );
        }
    }

    /**
     * This function gets called
     *
     * @param \Doctrine\ORM\Event\PreUpdateEventArgs $args
     */
    public function preUpdate( PreUpdateEventArgs $args )
    {
        /** @var GameScenario $entity */
        $entity = $args->getEntity();
        $this->uploadScenarioFile( $entity );
    }

}