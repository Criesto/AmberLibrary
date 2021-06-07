<?php

namespace App\Entity;

use App\Repository\AutorzyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AutorzyRepository::class)
 */
class Autorzy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $lastName;

    /**
     * @ORM\ManyToMany(targetEntity=Ksiazki::class, mappedBy="authors")
     */
    private $ksiazki;

    public function __construct()
    {
        $this->ksiazki = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection|Ksiazki[]
     */
    public function getKsiazki(): Collection
    {
        return $this->ksiazki;
    }

    public function addKsiazki(Ksiazki $ksiazki): self
    {
        if (!$this->ksiazki->contains($ksiazki)) {
            $this->ksiazki[] = $ksiazki;
            $ksiazki->addAuthor($this);
        }

        return $this;
    }

    public function removeKsiazki(Ksiazki $ksiazki): self
    {
        if ($this->ksiazki->removeElement($ksiazki)) {
            $ksiazki->removeAuthor($this);
        }

        return $this;
    }
}
