<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Date: 27-11-2018 03:11
 * Licence: GPLv3 - General Public Licence version 3
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SupervisorLogSubjectsRepository")
 */
class SupervisorLogSubjects
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
    private $supervisorLogId;

    /**
     * @ORM\Column(type="integer")
     */
    private $joinedUserId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSupervisorLogId(): ?int
    {
        return $this->supervisorLogId;
    }

    public function setSupervisorLogId( int $supervisorLogId ): self
    {
        $this->supervisorLogId = $supervisorLogId;

        return $this;
    }

    public function getJoinedUserId(): ?int
    {
        return $this->joinedUserId;
    }

    public function setJoinedUserId( int $joinedUserId ): self
    {
        $this->joinedUserId = $joinedUserId;

        return $this;
    }
}
