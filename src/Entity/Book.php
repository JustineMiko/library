<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
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
    private $bookTitle;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $bookCategory;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $author;

    /**
     * @ORM\Column(type="date")
     */
    private $editionYear;

    /**
     * @ORM\Column(type="integer")
     */
    private $pages;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $editor;

    /**
     * @ORM\Column(type="integer")
     */
    private $bookIsbn;

    /**
     * @ORM\Column(type="string", length=190)
     */
    private $bookCondition;

    /**
     * @ORM\ManyToOne(targetEntity=Loan::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $loans;

    

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookTitle(): ?string
    {
        return $this->bookTitle;
    }

    public function setBookTitle(string $bookTitle): self
    {
        $this->bookTitle = $bookTitle;

        return $this;
    }

    public function getBookCategory(): ?string
    {
        return $this->bookCategory;
    }

    public function setBookCategory(string $bookCategory): self
    {
        $this->bookCategory = $bookCategory;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getEditionYear(): ?\DateTimeInterface
    {
        return $this->editionYear;
    }

    public function setEditionYear(\DateTimeInterface $editionYear): self
    {
        $this->editionYear = $editionYear;

        return $this;
    }

    public function getPages(): ?int
    {
        return $this->pages;
    }

    public function setPages(int $pages): self
    {
        $this->pages = $pages;

        return $this;
    }

    public function getEditor(): ?string
    {
        return $this->editor;
    }

    public function setEditor(string $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    public function getBookIsbn(): ?int
    {
        return $this->bookIsbn;
    }

    public function setBookIsbn(int $bookIsbn): self
    {
        $this->bookIsbn = $bookIsbn;

        return $this;
    }

    public function getBookCondition(): ?string
    {
        return $this->bookCondition;
    }

    public function setBookCondition(string $bookCondition): self
    {
        $this->bookCondition = $bookCondition;

        return $this;
    }

    public function getLoans(): ?Loan
    {
        return $this->loans;
    }

    public function setLoans(?Loan $loans): self
    {
        $this->loans = $loans;

        return $this;
    }

   
}
