<?php

namespace App\Entity;

use App\Repository\ReasonSanctionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReasonSanctionRepository::class)
 */
class ReasonSanction
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=SanctionPlayer::class, mappedBy="ReasonSanction")
     */
    private $sanctionPlayers;

    /**
     * @ORM\OneToMany(targetEntity=WarnPlayer::class, mappedBy="ReasonWarn")
     */
    private $warnPlayers;

    public function __toString(): string
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->sanctionPlayers = new ArrayCollection();
        $this->warnPlayers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, SanctionPlayer>
     */
    public function getSanctionPlayers(): Collection
    {
        return $this->sanctionPlayers;
    }

    public function addSanctionPlayer(SanctionPlayer $sanctionPlayer): self
    {
        if (!$this->sanctionPlayers->contains($sanctionPlayer)) {
            $this->sanctionPlayers[] = $sanctionPlayer;
            $sanctionPlayer->setReasonSanction($this);
        }

        return $this;
    }

    public function removeSanctionPlayer(SanctionPlayer $sanctionPlayer): self
    {
        if ($this->sanctionPlayers->removeElement($sanctionPlayer)) {
            // set the owning side to null (unless already changed)
            if ($sanctionPlayer->getReasonSanction() === $this) {
                $sanctionPlayer->setReasonSanction(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, WarnPlayer>
     */
    public function getWarnPlayers(): Collection
    {
        return $this->warnPlayers;
    }

    public function addWarnPlayer(WarnPlayer $warnPlayer): self
    {
        if (!$this->warnPlayers->contains($warnPlayer)) {
            $this->warnPlayers[] = $warnPlayer;
            $warnPlayer->setReasonWarn($this);
        }

        return $this;
    }

    public function removeWarnPlayer(WarnPlayer $warnPlayer): self
    {
        if ($this->warnPlayers->removeElement($warnPlayer)) {
            // set the owning side to null (unless already changed)
            if ($warnPlayer->getReasonWarn() === $this) {
                $warnPlayer->setReasonWarn(null);
            }
        }

        return $this;
    }
}
