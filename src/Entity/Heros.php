<?php

namespace App\Entity;

use App\Repository\HerosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HerosRepository::class)]
class Heros
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $avatar = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_de_naissance = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classe $classe = null;

    #[ORM\Column]
    private ?int $ATT = null;

    #[ORM\Column]
    private ?int $DEF = null;

    #[ORM\Column]
    private ?int $PV = null;

    #[ORM\Column]
    private ?int $VIT = null;

    #[ORM\Column]
    private ?int $niveau = null;

    #[ORM\Column]
    private ?int $experience = null;

    #[ORM\Column]
    private ?int $fonds = null;
    
    #[ORM\ManyToOne]
    private ?CouvreChef $couvre_chef = null;

    #[ORM\ManyToOne]
    private ?Bras $bras = null;

    #[ORM\ManyToOne]
    private ?Torse $torse = null;

    #[ORM\ManyToOne]
    private ?Jambes $jambes = null;

    #[ORM\ManyToOne]
    private ?Pieds $pieds = null;

    #[ORM\ManyToOne]
    private ?Armes $armes = null;

    #[ORM\ManyToOne]
    private ?Monture $monture = null;

    #[ORM\Column]
    private ?int $ATT_avec_equipement = null;

    #[ORM\Column]
    private ?int $DEF_avec_equipement = null;

    #[ORM\Column]
    private ?int $PV_avec_equipement = null;

    #[ORM\Column]
    private ?int $VIT_avec_equipement = null;

    public function __construct()
    {
        $this->competences = new ArrayCollection();
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

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

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

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getATT(): ?int
    {
        return $this->ATT;
    }

    public function setATT(int $ATT): self
    {
        $this->ATT = $ATT;

        return $this;
    }

    public function getDEF(): ?int
    {
        return $this->DEF;
    }

    public function setDEF(int $DEF): self
    {
        $this->DEF = $DEF;

        return $this;
    }

    public function getPV(): ?int
    {
        return $this->PV;
    }

    public function setPV(int $PV): self
    {
        $this->PV = $PV;

        return $this;
    }

    public function getVIT(): ?int
    {
        return $this->VIT;
    }

    public function setVIT(int $VIT): self
    {
        $this->VIT = $VIT;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }
    public function getFonds(): ?int
    {
        return $this->fonds;
    }

    public function setFonds(int $fonds): self
    {
        $this->fonds = $fonds;

        return $this;
    }

    public function getCouvreChef(): ?CouvreChef
    {
        return $this->couvre_chef;
    }

    public function setCouvreChef(?CouvreChef $couvre_chef): self
    {
        $this->couvre_chef = $couvre_chef;

        return $this;
    }

    public function getBras(): ?Bras
    {
        return $this->bras;
    }

    public function setBras(?Bras $bras): self
    {
        $this->bras = $bras;

        return $this;
    }

    public function getTorse(): ?Torse
    {
        return $this->torse;
    }

    public function setTorse(?Torse $torse): self
    {
        $this->torse = $torse;

        return $this;
    }

    public function getJambes(): ?Jambes
    {
        return $this->jambes;
    }

    public function setJambes(?Jambes $jambes): self
    {
        $this->jambes = $jambes;

        return $this;
    }

    public function getPieds(): ?Pieds
    {
        return $this->pieds;
    }

    public function setPieds(?Pieds $pieds): self
    {
        $this->pieds = $pieds;

        return $this;
    }

    public function getArmes(): ?Armes
    {
        return $this->armes;
    }

    public function setArmes(?Armes $armes): self
    {
        $this->armes = $armes;

        return $this;
    }

    public function getMonture(): ?Monture
    {
        return $this->monture;
    }

    public function setMonture(?Monture $monture): self
    {
        $this->monture = $monture;

        return $this;
    }

    public function getATTAvecEquipement(): ?int
    {
        return $this->ATT_avec_equipement;
    }

    public function setATTAvecEquipement(int $ATT_avec_equipement): self
    {
        $this->ATT_avec_equipement = $ATT_avec_equipement;

        return $this;
    }

    public function getDEFAvecEquipement(): ?int
    {
        return $this->DEF_avec_equipement;
    }

    public function setDEFAvecEquipement(int $DEF_avec_equipement): self
    {
        $this->DEF_avec_equipement = $DEF_avec_equipement;

        return $this;
    }

    public function getPVAvecEquipement(): ?int
    {
        return $this->PV_avec_equipement;
    }

    public function setPVAvecEquipement(int $PV_avec_equipement): self
    {
        $this->PV_avec_equipement = $PV_avec_equipement;

        return $this;
    }

    public function getVITAvecEquipement(): ?int
    {
        return $this->VIT_avec_equipement;
    }

    public function setVITAvecEquipement(int $VIT_avec_equipement): self
    {
        $this->VIT_avec_equipement = $VIT_avec_equipement;

        return $this;
    }

}
