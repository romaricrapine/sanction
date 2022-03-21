<?php

namespace App\Entity;

use App\Repository\TypeSanctionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeSanctionRepository::class)
 */
class TypeSanction
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
     * @ORM\OneToMany(targetEntity=SanctionPlayer::class, mappedBy="TypeSanction")
     */
    private $sanctionPlayers;

    public function __toString(): string
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->sanctionPlayers = new ArrayCollection();
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
            $sanctionPlayer->setTypeSanction($this);
        }

        return $this;
    }

    public function removeSanctionPlayer(SanctionPlayer $sanctionPlayer): self
    {
        if ($this->sanctionPlayers->removeElement($sanctionPlayer)) {
            // set the owning side to null (unless already changed)
            if ($sanctionPlayer->getTypeSanction() === $this) {
                $sanctionPlayer->setTypeSanction(null);
            }
        }

        return $this;
    }
}
