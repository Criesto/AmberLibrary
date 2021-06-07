<?php

namespace App\Entity;

use App\Repository\EgzemplarzeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EgzemplarzeRepository::class)
 */
class Egzemplarze
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Ksiazki::class, inversedBy="copies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ksiazka;

    /**
     * @ORM\ManyToOne(targetEntity=Wypozyczenia::class, inversedBy="copies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $wypozyczenia;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKsiazka(): ?Ksiazki
    {
        return $this->ksiazka;
    }

    public function setKsiazka(?Ksiazki $ksiazka): self
    {
        $this->ksiazka = $ksiazka;

        return $this;
    }

    public function getWypozyczenia(): ?Wypozyczenia
    {
        return $this->wypozyczenia;
    }

    public function setWypozyczenia(?Wypozyczenia $wypozyczenia): self
    {
        $this->wypozyczenia = $wypozyczenia;

        return $this;
    }
}
