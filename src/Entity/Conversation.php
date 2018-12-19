<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 04:03
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConversationRepository")
 */
class Conversation
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
    private $ChatMessageId;

    /**
     * @ORM\Column(type="integer")
     */
    private $userEventId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChatMessageId(): ?int
    {
        return $this->ChatMessageId;
    }

    public function setChatMessageId( int $ChatMessageId ): self
    {
        $this->ChatMessageId = $ChatMessageId;

        return $this;
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
}
