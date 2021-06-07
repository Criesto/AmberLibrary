<?php

namespace App\Entity;

use App\Repository\KsiazkiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KsiazkiRepository::class)
 */
class Ksiazki
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
    private $iban;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     */
    private $cover;

    /**
     * @ORM\ManyToMany(targetEntity=Autorzy::class, inversedBy="ksiazki")
     */
    private $authors;

    /**
     * @ORM\ManyToMany(targetEntity=Kategorie::class, inversedBy="ksiazki")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Egzemplarze::class, mappedBy="ksiazka", orphanRemoval=true)
     */
    private $copies;

    public function __construct()
    {
        $this->authors = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->copies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCover(): ?bool
    {
        return $this->cover;
    }

    public function setCover(bool $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * @return Collection|Autorzy[]
     */
    public function getAuthors(): Collection
    {
        return $this->authors;
    }

    public function addAuthor(Autorzy $author): self
    {
        if (!$this->authors->contains($author)) {
            $this->authors[] = $author;
        }

        return $this;
    }

    public function removeAuthor(Autorzy $author): self
    {
        $this->authors->removeElement($author);

        return $this;
    }

    /**
     * @return Collection|Kategorie[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Kategorie $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Kategorie $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection|Egzemplarze[]
     */
    public function getCopies(): Collection
    {
        return $this->copies;
    }

    public function addCopy(Egzemplarze $copy): self
    {
        if (!$this->copies->contains($copy)) {
            $this->copies[] = $copy;
            $copy->setKsiazka($this);
        }

        return $this;
    }

    public function removeCopy(Egzemplarze $copy): self
    {
        if ($this->copies->removeElement($copy)) {
            // set the owning side to null (unless already changed)
            if ($copy->getKsiazka() === $this) {
                $copy->setKsiazka(null);
            }
        }

        return $this;
    }
}
