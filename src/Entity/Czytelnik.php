<?php

namespace App\Entity;

use App\Repository\CzytelnikRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CzytelnikRepository::class)
 */
class Czytelnik
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
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Wypozyczenia::class, mappedBy="czytelnik", orphanRemoval=true)
     */
    private $wypozyczenia;

    public function __construct()
    {
        $this->wypozyczenia = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Wypozyczenia[]
     */
    public function getWypozyczenia(): Collection
    {
        return $this->wypozyczenia;
    }

    public function addWypozyczenium(Wypozyczenia $wypozyczenium): self
    {
        if (!$this->wypozyczenia->contains($wypozyczenium)) {
            $this->wypozyczenia[] = $wypozyczenium;
            $wypozyczenium->setCzytelnik($this);
        }

        return $this;
    }

    public function removeWypozyczenium(Wypozyczenia $wypozyczenium): self
    {
        if ($this->wypozyczenia->removeElement($wypozyczenium)) {
            // set the owning side to null (unless already changed)
            if ($wypozyczenium->getCzytelnik() === $this) {
                $wypozyczenium->setCzytelnik(null);
            }
        }

        return $this;
    }
}
