<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\FlightRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=FlightRepository::class)
 */
class Flight
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $departureDate;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity=Plane::class, inversedBy="flights")
     * @ORM\JoinColumn(nullable=false)
     */
    private $plane;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="departures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departurePoint;

    /**
     * @ORM\ManyToOne(targetEntity=Location::class, inversedBy="arrivals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrivalPoint;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="flight")
     */
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departureDate;
    }

    public function setDepartureDate(\DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPlane(): ?Plane
    {
        return $this->plane;
    }

    public function setPlane(?Plane $plane): self
    {
        $this->plane = $plane;

        return $this;
    }

    public function getDeparturePoint(): ?Location
    {
        return $this->departurePoint;
    }

    public function setDeparturePoint(?Location $departurePoint): self
    {
        $this->departurePoint = $departurePoint;

        return $this;
    }

    public function getArrivalPoint(): ?Location
    {
        return $this->arrivalPoint;
    }

    public function setArrivalPoint(?Location $arrivalPoint): self
    {
        $this->arrivalPoint = $arrivalPoint;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setFlight($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getFlight() === $this) {
                $reservation->setFlight(null);
            }
        }

        return $this;
    }
}
