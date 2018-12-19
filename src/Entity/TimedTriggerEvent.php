<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 03:13
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TimedTriggerEventRepository")
 */
class TimedTriggerEvent
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
    private $stateUpdateEventId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStateUpdateEventId(): ?int
    {
        return $this->stateUpdateEventId;
    }

    public function setStateUpdateEventId( int $stateUpdateEventId ): self
    {
        $this->stateUpdateEventId = $stateUpdateEventId;

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
