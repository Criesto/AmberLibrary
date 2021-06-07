<?php

namespace App\Entity;

use App\Repository\WypozyczeniaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WypozyczeniaRepository::class)
 */
class Wypozyczenia
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
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Czytelnik::class, inversedBy="wypozyczenia")
     * @ORM\JoinColumn(nullable=false)
     */
    private $czytelnik;

    /**
     * @ORM\OneToMany(targetEntity=Egzemplarze::class, mappedBy="wypozyczenia", orphanRemoval=true)
     */
    private $copies;

    public function __construct()
    {
        $this->copies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCzytelnik(): ?Czytelnik
    {
        return $this->czytelnik;
    }

    public function setCzytelnik(?Czytelnik $czytelnik): self
    {
        $this->czytelnik = $czytelnik;

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
            $copy->setWypozyczenia($this);
        }

        return $this;
    }

    public function removeCopy(Egzemplarze $copy): self
    {
        if ($this->copies->removeElement($copy)) {
            // set the owning side to null (unless already changed)
            if ($copy->getWypozyczenia() === $this) {
                $copy->setWypozyczenia(null);
            }
        }

        return $this;
    }
}
