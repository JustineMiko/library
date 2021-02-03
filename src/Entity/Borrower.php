<?php

namespace App\Entity;

use App\Repository\BorrowerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BorrowerRepository::class)
 */
class Borrower
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $borrowerName;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $borrowerContact;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $borrowerLogin;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $borrowerStatus;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $borrowerCard;

    /**
     * @ORM\ManyToOne(targetEntity=Loan::class, inversedBy="borrowers")
     */
    private $borrowers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBorrowerName(): ?string
    {
        return $this->borrowerName;
    }

    public function setBorrowerName(string $borrowerName): self
    {
        $this->borrowerName = $borrowerName;

        return $this;
    }

    public function getBorrowerContact(): ?string
    {
        return $this->borrowerContact;
    }

    public function setBorrowerContact(string $borrowerContact): self
    {
        $this->borrowerContact = $borrowerContact;

        return $this;
    }

    public function getBorrowerLogin(): ?string
    {
        return $this->borrowerLogin;
    }

    public function setBorrowerLogin(string $borrowerLogin): self
    {
        $this->borrowerLogin = $borrowerLogin;

        return $this;
    }

    public function getBorrowerStatus(): ?string
    {
        return $this->borrowerStatus;
    }

    public function setBorrowerStatus(string $borrowerStatus): self
    {
        $this->borrowerStatus = $borrowerStatus;

        return $this;
    }

    public function getBorrowerCard(): ?string
    {
        return $this->borrowerCard;
    }

    public function setBorrowerCard(string $borrowerCard): self
    {
        $this->borrowerCard = $borrowerCard;

        return $this;
    }

    public function getBorrowers(): ?Loan
    {
        return $this->borrowers;
    }

    public function setBorrowers(?Loan $borrowers): self
    {
        $this->borrowers = $borrowers;

        return $this;
    }
}
