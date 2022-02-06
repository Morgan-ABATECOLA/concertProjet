<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BandRepository::class)
 */
class Band
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
    private $nameBand;

    /**
     * @ORM\ManyToMany(targetEntity=Artist::class, mappedBy="idBand")
     */
    private $members;

    /**
     * @ORM\ManyToMany(targetEntity=Concert::class, mappedBy="bands")
     */
    private $concerts;

    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->concerts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameBand(): ?string
    {
        return $this->nameBand;
    }

    public function setNameBand(string $nameBand): self
    {
        $this->nameBand = $nameBand;

        return $this;
    }

    /**
     * @return Collection|Artist[]
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Artist $member): self
    {
        if (!$this->members->contains($member)) {
            $this->members[] = $member;
            $member->addIdBand($this);
        }

        return $this;
    }

    public function removeMember(Artist $member): self
    {
        if ($this->members->removeElement($member)) {
            $member->removeIdBand($this);
        }

        return $this;
    }

    /**
     * @return Collection|Concert[]
     */
    public function getConcerts(): Collection
    {
        return $this->concerts;
    }

    public function addConcert(Concert $concert): self
    {
        if (!$this->concerts->contains($concert)) {
            $this->concerts[] = $concert;
            $concert->addBand($this);
        }

        return $this;
    }

    public function removeConcert(Concert $concert): self
    {
        if ($this->concerts->removeElement($concert)) {
            $concert->removeBand($this);
        }

        return $this;
    }
}
