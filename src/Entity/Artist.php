<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArtistRepository::class)
 */
class Artist
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
    private $firstNameArtist;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastNameArtist;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $job;

    /**
     * @ORM\ManyToMany(targetEntity=Band::class, inversedBy="members")
     */
    private $idBand;

    public function __construct()
    {
        $this->idBand = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstNameArtist(): ?string
    {
        return $this->firstNameArtist;
    }

    public function setFirstNameArtist(string $firstnameArtist): self
    {
        $this->firstNameArtist = $firstnameArtist;

        return $this;
    }

    public function getLastNameArtist(): ?string
    {
        return $this->lastNameArtist;
    }

    public function setLastNameArtist(string $lastnameArtist): self
    {
        $this->lastNameArtist = $lastnameArtist;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }
    /**
     * @return Collection|Band[]
     */
    public function getIdBand(): Collection
    {
        return $this->idBand;
    }

    public function addIdBand(Band $idBand): self
    {
        if (!$this->idBand->contains($idBand)) {
            $this->idBand[] = $idBand;
        }

        return $this;
    }

    public function removeIdBand(Band $idBand): self
    {
        $this->idBand->removeElement($idBand);

        return $this;
    }
}
