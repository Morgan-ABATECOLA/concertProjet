<?php

namespace App\Entity;

use App\Repository\ConcertRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Form\FormTypeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcertRepository::class)
 */
class Concert
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
    private $nameConcert;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time", length=5, nullable=true)
     */
    private $hourBeginning;

    /**
     * @ORM\Column(type="time", length=5, nullable=true)
     */
    private $hourEnd;

    /**
     * @ORM\ManyToMany(targetEntity=Band::class, inversedBy="concerts")
     */
    private $bands;

    /**
     * @ORM\ManyToOne(targetEntity=ConcertRoom::class, inversedBy="concerts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $concertRoom;

    public function __construct()
    {
        $this->bands = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameConcert(): ?string
    {
        return $this->nameConcert;
    }

    public function setNameConcert(string $nameConcert): self
    {
        $this->nameConcert = $nameConcert;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHourBeginning(): ?DateTimeInterface
    {
        return $this->hourBeginning;
    }

    public function setHourBeginning(?DateTimeInterface $hourBeginning): self
    {
        $this->hourBeginning = $hourBeginning;

        return $this;
    }

    public function getHourEnd(): ?DateTimeInterface
    {
        return $this->hourEnd;
    }

    public function setHourEnd(?DateTimeInterface $hourEnd): self
    {
        $this->hourEnd = $hourEnd;

        return $this;
    }

    /**
     * @return Collection|Band[]
     */
    public function getBands(): Collection
    {
        return $this->bands;
    }

    public function addBand(Band $band): self
    {
        if (!$this->bands->contains($band)) {
            $this->bands[] = $band;
        }

        return $this;
    }

    public function removeBand(Band $band): self
    {
        $this->bands->removeElement($band);

        return $this;
    }

    public function getConcertRoom(): ?ConcertRoom
    {
        return $this->concertRoom;
    }

    public function setConcertRoom(?ConcertRoom $concertRoom): self
    {
        $this->concertRoom = $concertRoom;

        return $this;
    }
}
