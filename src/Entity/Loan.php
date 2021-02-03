<?php

namespace App\Entity;

use App\Repository\LoanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LoanRepository::class)
 */
class Loan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $loanDate;

    /**
     * @ORM\Column(type="date", length=100)
     */
    private $loanBackDate;

    /**
     * @ORM\Column(type="date")
     */
    private $numberOfBooksAllowed;

    /**
     * @ORM\Column(type="integer")
     */
    private $lateFees;

    
    /**
     * @ORM\OneToMany(targetEntity=Borrower::class, mappedBy="borrowers")
     */
    private $borrowers;

    /**
     * @ORM\OneToMany(targetEntity=Book::class, mappedBy="loans")
     */
    private $books;

    public function __construct()
    {
        $this->borrowers = new ArrayCollection();
        $this->books = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoanDate(): ?\DateTimeInterface
    {
        return $this->loanDate;
    }

    public function setLoanDate(\DateTimeInterface $loanDate): self
    {
        $this->loanDate = $loanDate;

        return $this;
    }

    public function getLoanBackDate(): ?string
    {
        return $this->loanBackDate;
    }

    public function setLoanBackDate(string $loanBackDate): self
    {
        $this->loanBackDate = $loanBackDate;

        return $this;
    }

    public function getNumberOfBooksAllowed(): ?int
    {
        return $this->numberOfBooksAllowed;
    }

    public function setNumberOfBooksAllowed(int $numberOfBooksAllowed): self
    {
        $this->numberOfBooksAllowed = $numberOfBooksAllowed;

        return $this;
    }

    public function getLateFees(): ?int
    {
        return $this->lateFees;
    }

    public function setLateFees(int $lateFees): self
    {
        $this->lateFees = $lateFees;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    /**
     * @return Collection|Borrower[]
     */
    public function getBorrowers(): Collection
    {
        return $this->borrowers;
    }

    public function addBorrower(Borrower $borrower): self
    {
        if (!$this->borrowers->contains($borrower)) {
            $this->borrowers[] = $borrower;
            $borrower->setBorrowers($this);
        }

        return $this;
    }

    public function removeBorrower(Borrower $borrower): self
    {
        if ($this->borrowers->removeElement($borrower)) {
            // set the owning side to null (unless already changed)
            if ($borrower->getBorrowers() === $this) {
                $borrower->setBorrowers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setLoans($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->removeElement($book)) {
            // set the owning side to null (unless already changed)
            if ($book->getLoans() === $this) {
                $book->setLoans(null);
            }
        }

        return $this;
    }
}
