<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * The game scenario is a file created with the open-source tool Twinery.
 * It is used to plot all the events and paths in a game scenario.
 *
 * @see https://twinery.org/ The tool used to generate game scenario files.
 * @ORM\Entity(repositoryClass="App\Repository\ScenarioRepository")
 */
class GameScenario
{
    /**
     * The automatic generated database record identifier. AKA the primary key.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * The display name of the game scenario.
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
    private $authorId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $fileSize;

    /**
     * Get the name of the game scenario.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return GameScenario
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
     * @return GameScenario
     */
    public function setDescription( ?string $description ): self
    {
        $this->description = $description;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileSize(): ?string
    {
        return $this->fileSize;
    }

    public function setFileSize( string $fileSize ): self
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    public function getAuthorId(): ?User
    {
        return $this->authorId;
    }

    public function setAuthorId( ?User $authorId ): self
    {
        $this->authorId = $authorId;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile( string $file ): self
    {
        $this->file = $file;

        return $this;
    }
}
