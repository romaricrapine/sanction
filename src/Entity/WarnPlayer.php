<?php

namespace App\Entity;

use App\Repository\WarnPlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WarnPlayerRepository::class)
 */
class WarnPlayer
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
    private $pseudo_player_warn;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_warn;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $screen_warn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ip_player_warn;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="warn_staff")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=ReasonSanction::class, inversedBy="warnPlayers")
     */
    private $ReasonWarn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudoPlayerWarn(): ?string
    {
        return $this->pseudo_player_warn;
    }

    public function setPseudoPlayerWarn(string $pseudo_player_warn): self
    {
        $this->pseudo_player_warn = $pseudo_player_warn;

        return $this;
    }

    public function getDateWarn(): ?\DateTimeInterface
    {
        return $this->date_warn;
    }

    public function setDateWarn(\DateTimeInterface $date_warn): self
    {
        $this->date_warn = $date_warn;

        return $this;
    }

    public function getScreenWarn(): ?string
    {
        return $this->screen_warn;
    }

    public function setScreenWarn(string $screen_warn): self
    {
        $this->screen_warn = $screen_warn;

        if ($screen_warn){
            $this->date_warn = new \DateTime('now');
        }

        return $this;
    }

    public function getIpPlayerWarn(): ?string
    {
        return $this->ip_player_warn;
    }

    public function setIpPlayerWarn(?string $ip_player_warn): self
    {
        $this->ip_player_warn = $ip_player_warn;

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

    public function getReasonWarn(): ?ReasonSanction
    {
        return $this->ReasonWarn;
    }

    public function setReasonWarn(?ReasonSanction $ReasonWarn): self
    {
        $this->ReasonWarn = $ReasonWarn;

        return $this;
    }
}
