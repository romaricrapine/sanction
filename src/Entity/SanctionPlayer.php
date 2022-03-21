<?php

namespace App\Entity;

use App\Repository\SanctionPlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SanctionPlayerRepository::class)
 */
class SanctionPlayer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudo_player_sanction;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_sanction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $screen_sanction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ip_player_sanction;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sanction_staff")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=ReasonSanction::class, inversedBy="sanctionPlayers")
     */
    private $ReasonSanction;

    /**
     * @ORM\ManyToOne(targetEntity=TimeSanction::class, inversedBy="sanctionPlayers")
     */
    private $TimeSanction;

    /**
     * @ORM\ManyToOne(targetEntity=TypeSanction::class, inversedBy="sanctionPlayers")
     */
    private $TypeSanction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudoPlayerSanction(): ?string
    {
        return $this->pseudo_player_sanction;
    }

    public function setPseudoPlayerSanction(string $pseudo_player_sanction): self
    {
        $this->pseudo_player_sanction = $pseudo_player_sanction;

        return $this;
    }

    public function getDateSanction(): ?\DateTimeInterface
    {
        return $this->date_sanction;
    }

    public function setDateSanction(\DateTimeInterface $date_sanction): self
    {
        $this->date_sanction = $date_sanction;

        return $this;
    }

    public function getScreenSanction(): ?string
    {
        return $this->screen_sanction;
    }

    public function setScreenSanction(string $screen_sanction): self
    {
        $this->screen_sanction = $screen_sanction;

        if ($screen_sanction){
            $this->date_sanction = new \DateTime('now');
        }

        return $this;
    }

    public function getIpPlayerSanction(): ?string
    {
        return $this->ip_player_sanction;
    }

    public function setIpPlayerSanction(string $ip_player_sanction): self
    {
        $this->ip_player_sanction = $ip_player_sanction;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getReasonSanction(): ?ReasonSanction
    {
        return $this->ReasonSanction;
    }

    public function setReasonSanction(?ReasonSanction $ReasonSanction): self
    {
        $this->ReasonSanction = $ReasonSanction;

        return $this;
    }

    public function getTimeSanction(): ?TimeSanction
    {
        return $this->TimeSanction;
    }

    public function setTimeSanction(?TimeSanction $TimeSanction): self
    {
        $this->TimeSanction = $TimeSanction;

        return $this;
    }

    public function getTypeSanction(): ?TypeSanction
    {
        return $this->TypeSanction;
    }

    public function setTypeSanction(?TypeSanction $TypeSanction): self
    {
        $this->TypeSanction = $TypeSanction;

        return $this;
    }

}
