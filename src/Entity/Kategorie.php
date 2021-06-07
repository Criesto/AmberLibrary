<?php

namespace App\Entity;

use App\Repository\KategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KategorieRepository::class)
 */
class Kategorie
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Ksiazki::class, mappedBy="categories")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $ksiazki->addCategory($this);
        }

        return $this;
    }

    public function removeKsiazki(Ksiazki $ksiazki): self
    {
        if ($this->ksiazki->removeElement($ksiazki)) {
            $ksiazki->removeCategory($this);
        }

        return $this;
    }
}
