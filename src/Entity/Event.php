<?php

namespace App\Entity;

/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 04:08
 * Licence: GPLv3 - General Public Licence version 3
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
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
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $occuredOn;

    /**
     * @ORM\Column(type="integer")
     */
    private $gameSessionId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType( string $type ): self
    {
        $this->type = $type;

        return $this;
    }

    public function getOccuredOn(): ?\DateTimeInterface
    {
        return $this->occuredOn;
    }

    public function setOccuredOn( \DateTimeInterface $occuredOn ): self
    {
        $this->occuredOn = $occuredOn;

        return $this;
    }

    public function getGameSessionId(): ?int
    {
        return $this->gameSessionId;
    }

    public function setGameSessionId( int $gameSessionId ): self
    {
        $this->gameSessionId = $gameSessionId;

        return $this;
    }
}
