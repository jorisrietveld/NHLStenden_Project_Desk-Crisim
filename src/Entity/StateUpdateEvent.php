<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 03:34
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StateUpdateEventRepository")
 */
class StateUpdateEvent
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
    private $eventId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventId(): ?int
    {
        return $this->eventId;
    }

    public function setEventId( int $eventId ): self
    {
        $this->eventId = $eventId;

        return $this;
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
}
