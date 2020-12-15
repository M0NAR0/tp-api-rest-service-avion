<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompanyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $capital;

    /**
     * @ORM\Column(type="datetime")
     */
    private $transactionDate;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=2)
     */
    private $transactionAmount;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function setCapital(string $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getTransactionDate(): ?\DateTimeInterface
    {
        return $this->transactionDate;
    }

    public function setTransactionDate(\DateTimeInterface $transactionDate): self
    {
        $this->transactionDate = $transactionDate;

        return $this;
    }

    public function getTransactionAmount(): ?string
    {
        return $this->transactionAmount;
    }

    public function setTransactionAmount(string $transactionAmount): self
    {
        $this->transactionAmount = $transactionAmount;

        return $this;
    }
}
