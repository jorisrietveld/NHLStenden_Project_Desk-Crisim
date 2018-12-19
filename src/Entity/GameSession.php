<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 03:45
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameSessionRepository")
 */
class GameSession
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sessionName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accessCode;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gameScenarioId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSessionName(): ?string
    {
        return $this->sessionName;
    }

    public function setSessionName( string $sessionName ): self
    {
        $this->sessionName = $sessionName;

        return $this;
    }

    public function getAccessCode(): ?string
    {
        return $this->accessCode;
    }

    public function setAccessCode( ?string $accessCode ): self
    {
        $this->accessCode = $accessCode;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated( \DateTimeInterface $created ): self
    {
        $this->created = $created;

        return $this;
    }

    public function getGameScenarioId(): ?int
    {
        return $this->gameScenarioId;
    }

    public function setGameScenarioId( ?int $gameScenarioId ): self
    {
        $this->gameScenarioId = $gameScenarioId;

        return $this;
    }
}
