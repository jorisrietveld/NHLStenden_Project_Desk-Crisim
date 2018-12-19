<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 03:34
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SupervisorLogEventRepository")
 */
class SupervisorLogEvent
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $userEventId;

    /**
     * @ORM\Column(type="text")
     */
    private $loggedMessage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserEventId(): ?int
    {
        return $this->userEventId;
    }

    public function setUserEventId( int $userEventId ): self
    {
        $this->userEventId = $userEventId;

        return $this;
    }

    public function getLoggedMessage(): ?string
    {
        return $this->loggedMessage;
    }

    public function setLoggedMessage( string $loggedMessage ): self
    {
        $this->loggedMessage = $loggedMessage;

        return $this;
    }
}
