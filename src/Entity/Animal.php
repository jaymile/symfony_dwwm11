<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
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
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSterilise;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, inversedBy="animaux")
     */
    private $proprietaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    public function __construct()
    {
        $this->proprietaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getIsSterilise(): ?bool
    {
        return $this->isSterilise;
    }

    public function setIsSterilise(bool $isSterilise): self
    {
        $this->isSterilise = $isSterilise;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getProprietaire(): Collection
    {
        return $this->proprietaire;
    }

    public function addProprietaire(Utilisateur $proprietaire): self
    {
        if (!$this->proprietaire->contains($proprietaire)) {
            $this->proprietaire[] = $proprietaire;
        }

        return $this;
    }

    public function removeProprietaire(Utilisateur $proprietaire): self
    {
        $this->proprietaire->removeElement($proprietaire);

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
