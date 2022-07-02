<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 70)]
    #[Assert\NotBlank()]
    private $domaine;

    #[ORM\Column(type: 'string', length: 30)]
    #[Assert\NotBlank()]
    private $date;

    #[ORM\Column(type: 'float')]
    #[Assert\NotBlank()]
    #[Assert\Positive()]
    private $salaire;

    #[ORM\Column(type: 'string', length: 30)]
    #[Assert\NotBlank()]
    private $duree;

    #[ORM\Column(type: 'string', length: 800)]
    #[Assert\NotBlank()]
    private $descriptif;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank()]
    private $titre;

    #[ORM\Column(type: 'string', length: 20)]
    private $type;

    #[ORM\OneToOne(targetEntity: Candidat::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $candidat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCandidat(): ?Candidat
    {
        return $this->candidat;
    }

    public function setCandidat(Candidat $candidat): self
    {
        $this->candidat = $candidat;

        return $this;
    }
}
