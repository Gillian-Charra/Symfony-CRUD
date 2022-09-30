<?php

namespace App\Entity;

use App\Repository\ClasseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClasseRepository::class)]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $base_ATT = null;

    #[ORM\Column]
    private ?int $base_DEF = null;

    #[ORM\Column]
    private ?int $base_PV = null;

    #[ORM\Column]
    private ?int $base_VIT = null;

    #[ORM\ManyToMany(targetEntity: Competences::class)]
    private Collection $competences;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function __toString()
    {
        return $this->nom;
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

    public function getBaseATT(): ?int
    {
        return $this->base_ATT;
    }

    public function setBaseATT(int $base_ATT): self
    {
        $this->base_ATT = $base_ATT;

        return $this;
    }

    public function getBaseDEF(): ?int
    {
        return $this->base_DEF;
    }

    public function setBaseDEF(int $base_DEF): self
    {
        $this->base_DEF = $base_DEF;

        return $this;
    }

    public function getBasePV(): ?int
    {
        return $this->base_PV;
    }

    public function setBasePV(int $base_PV): self
    {
        $this->base_PV = $base_PV;

        return $this;
    }

    public function getBaseVIT(): ?int
    {
        return $this->base_VIT;
    }

    public function setBaseVIT(int $base_VIT): self
    {
        $this->base_VIT = $base_VIT;

        return $this;
    }

    /**
     * @return Collection<int, Competences>
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competences $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences->add($competence);
        }

        return $this;
    }

    public function removeCompetence(Competences $competence): self
    {
        $this->competences->removeElement($competence);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
