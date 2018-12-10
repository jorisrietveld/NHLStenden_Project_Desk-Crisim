<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScenarioRepository")
 * @Vich\Uploadable
 */
class Scenario
{
    /**
     * The automatic generated database record identifier. AKA the primary key.
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *     min=3,
     *     max="100",
     *     minMessage = "entity.scenario.name.length.min",
     *     maxMessage = "entity.scenario.name.length.max"
     * )
     *
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * Some identification data about the uploaded file, so we can find it back later on the file system.
     * @Vich\UploadableField(mapping="game_scenario_file", fileNameProperty="fileName", size="fileSize")
     * @var File|null
     */
    private $scenarioFile;

    /**
     * The file name of the uploaded scenario.
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $fileName;

    /**
     * The size of the uploaded scenario.
     * @ORM\Column(type="integer")
     * @var integer
     */
    private $fileSize;

    /**
     * The time it was uploaded.
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Get the name of the game scenario.
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Scenario
     */
    public function setName( string $name ): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return Scenario
     */
    public function setDescription( ?string $description ): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     *
     * @return Scenario
     */
    public function setUserId( int $userId ): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Retunes the scenario file, used by the uploader bundle to update the file stored on disk.
     * @return File|null
     */
    public function getScenarioFile(): ?File
    {
        return $this->scenarioFile;
    }

    /**
     * When uploading a scenario file without using a Symfony Form make sure that a
     * instance of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $scenario
     *
     * @throws \Exception
     */
    public function setScenarioFile( ?File $scenario = null ): void
    {
        $this->scenarioFile = $scenario;

        if ( null !== $scenario ) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string|null $fileName
     */
    public function setFileName( ?string $fileName ): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @param int|null $fileSize
     */
    public function setFileSize( ?int $fileSize ): void
    {
        $this->fileSize = $fileSize;
    }

    /**
     * @return int|null
     */
    public function getFileeSize(): ?int
    {
        return $this->fileSize;
    }
}
