<?php

namespace App\Entity;

use App\Repository\JambesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JambesRepository::class)]
class Jambes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $flat_ATT = null;

    #[ORM\Column]
    private ?int $flat_DEF = null;

    #[ORM\Column]
    private ?int $flat_PV = null;

    #[ORM\Column]
    private ?int $flat_VIT = null;

    #[ORM\Column]
    private ?int $mult_ATT = null;

    #[ORM\Column]
    private ?int $mult_DEF = null;

    #[ORM\Column]
    private ?int $mult_PV = null;

    #[ORM\Column]
    private ?int $mult_VIT = null;

    #[ORM\Column]
    private ?int $prix = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFlatATT(): ?int
    {
        return $this->flat_ATT;
    }

    public function setFlatATT(int $flat_ATT): self
    {
        $this->flat_ATT = $flat_ATT;

        return $this;
    }

    public function getFlatDEF(): ?int
    {
        return $this->flat_DEF;
    }

    public function setFlatDEF(int $flat_DEF): self
    {
        $this->flat_DEF = $flat_DEF;

        return $this;
    }

    public function getFlatPV(): ?int
    {
        return $this->flat_PV;
    }

    public function setFlatPV(int $flat_PV): self
    {
        $this->flat_PV = $flat_PV;

        return $this;
    }

    public function getFlatVIT(): ?int
    {
        return $this->flat_VIT;
    }

    public function setFlatVIT(int $flat_VIT): self
    {
        $this->flat_VIT = $flat_VIT;

        return $this;
    }

    public function getMultATT(): ?int
    {
        return $this->mult_ATT;
    }

    public function setMultATT(int $mult_ATT): self
    {
        $this->mult_ATT = $mult_ATT;

        return $this;
    }

    public function getMultDEF(): ?int
    {
        return $this->mult_DEF;
    }

    public function setMultDEF(int $mult_DEF): self
    {
        $this->mult_DEF = $mult_DEF;

        return $this;
    }

    public function getMultPV(): ?int
    {
        return $this->mult_PV;
    }

    public function setMultPV(int $mult_PV): self
    {
        $this->mult_PV = $mult_PV;

        return $this;
    }

    public function getMultVIT(): ?int
    {
        return $this->mult_VIT;
    }

    public function setMultVIT(int $mult_VIT): self
    {
        $this->mult_VIT = $mult_VIT;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
