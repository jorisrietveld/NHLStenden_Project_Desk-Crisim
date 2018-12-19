<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 03:45
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JoinedUserRepository")
 */
class JoinedUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $userId;

    /**
     * @ORM\Column(type="integer")
     */
    private $gameSessionId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $joinedOn;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $actorId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId( ?int $userId ): self
    {
        $this->userId = $userId;

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

    public function getJoinedOn(): ?\DateTimeInterface
    {
        return $this->joinedOn;
    }

    public function setJoinedOn( \DateTimeInterface $joinedOn ): self
    {
        $this->joinedOn = $joinedOn;

        return $this;
    }

    public function getActorId(): ?int
    {
        return $this->actorId;
    }

    public function setActorId( ?int $actorId ): self
    {
        $this->actorId = $actorId;

        return $this;
    }
}
