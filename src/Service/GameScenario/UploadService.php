<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 20-12-2018 19:47
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Service\GameScenario;


use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadService
{
    private $storageDirectory;

    public function __construct( $storageDirectory )
    {
        $this->storageDirectory = $storageDirectory;
    }

    public function upload( UploadedFile $file )
    {
        $fileName = $this->generateStorageName( $file );

        try
        {
            $file->move( $this->getTargetDirectory(), $fileName );
        } catch ( FileException $e )
        {
            // ... handle exception if something happens during file upload
        }

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    private function generateStorageName( UploadedFile $file )
    {
        return sprintf(
            '%s_%s.%s',
            md5( uniqid( '', true ) ),
            $file->getFilename(),
            $file->guessExtension()
        );
    }
}