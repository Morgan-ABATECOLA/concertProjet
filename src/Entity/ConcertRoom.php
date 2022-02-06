<?php

namespace App\Entity;

use App\Repository\ConcertRoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertRoomRepository::class)
 */
class ConcertRoom
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
    private $nameConcertRoom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $capacity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity=Concert::class, mappedBy="concertRoom", orphanRemoval=true)
     */
    private $concerts;

    public function __construct()
    {
        $this->concerts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameConcertRoom(): ?string
    {
        return $this->nameConcertRoom;
    }

    public function setNameConcertRoom(string $nameConcertRoom): self
    {
        $this->nameConcertRoom = $nameConcertRoom;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(?int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

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
            $concert->setConcertRoom($this);
        }

        return $this;
    }

    public function removeConcert(Concert $concert): self
    {
        if ($this->concerts->removeElement($concert)) {
            // set the owning side to null (unless already changed)
            if ($concert->getConcertRoom() === $this) {
                $concert->setConcertRoom(null);
            }
        }

        return $this;
    }
}
