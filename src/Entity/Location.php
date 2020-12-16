<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LocationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=LocationRepository::class)
 */
class Location
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
    private $label;

    /**
     * @ORM\OneToMany(targetEntity=Flight::class, mappedBy="departurePoint")
     */
    private $departures;

    /**
     * @ORM\OneToMany(targetEntity=Flight::class, mappedBy="arrivalPoint")
     */
    private $arrivals;

    public function __construct()
    {
        $this->departures = new ArrayCollection();
        $this->arrivals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Flight[]
     */
    public function getDepartures(): Collection
    {
        return $this->departures;
    }

    public function addDeparture(Flight $departure): self
    {
        if (!$this->departures->contains($departure)) {
            $this->departures[] = $departure;
            $departure->setDeparturePoint($this);
        }

        return $this;
    }

    public function removeDeparture(Flight $departure): self
    {
        if ($this->departures->removeElement($departure)) {
            // set the owning side to null (unless already changed)
            if ($departure->getDeparturePoint() === $this) {
                $departure->setDeparturePoint(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Flight[]
     */
    public function getArrivals(): Collection
    {
        return $this->arrivals;
    }

    public function addArrival(Flight $arrival): self
    {
        if (!$this->arrivals->contains($arrival)) {
            $this->arrivals[] = $arrival;
            $arrival->setArrivalPoint($this);
        }

        return $this;
    }

    public function removeArrival(Flight $arrival): self
    {
        if ($this->arrivals->removeElement($arrival)) {
            // set the owning side to null (unless already changed)
            if ($arrival->getArrivalPoint() === $this) {
                $arrival->setArrivalPoint(null);
            }
        }

        return $this;
    }
}
