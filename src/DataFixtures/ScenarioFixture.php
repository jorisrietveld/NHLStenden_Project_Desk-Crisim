<?php

namespace App\DataFixtures;

use App\Entity\Scenario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ScenarioFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ( $this->getScenarioData() as [ $name, $description, $scenarioFile, $fileName, $fileSize ] ) {
            $scenario = new Scenario();
            $scenario->setName( $name );
            $scenario->setDescription( $description );
            $scenario->setUserId( 1 );
            $scenario->setScenarioFile( $scenarioFile );
            $scenario->setFileName( $fileName );
            $scenario->setFileSize( $fileSize );
            $manager->persist( $scenario );
            $this->addReference( $name, $scenario );
        }
        $manager->flush();
    }

    public function getScenarioData()
    {

    }
}
