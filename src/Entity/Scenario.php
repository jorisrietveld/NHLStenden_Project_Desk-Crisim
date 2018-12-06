<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScenarioRepository")
 *
 */
class Scenario
{
    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a JSON file.")
     * @Assert\File(mimeTypes={ "application/json" })
     */
    private $scenario;

    public function getScenario()
    {
        return $this->scenario;
    }

    public function setBrochure($scenario)
    {
        $this->scenario = $scenario;

        return $this;
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
}
