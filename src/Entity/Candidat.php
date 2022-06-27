<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CandidatRepository::class)]
class Candidat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 25)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 25)]
    private $nom;

    #[ORM\Column(type: 'string', length: 25)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private $prenom;

    #[ORM\Column(type: 'string', length: 15)]
    private $genre;

    #[ORM\Column(type: 'string', length: 30)]
    private $datenaissance;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank()]
    private $adresse;

    #[ORM\Column(type: 'string', length: 30)]
    #[Assert\Email()]
    #[Assert\Unique()]
    private $mail;

    #[ORM\Column(type: 'string', length: 20)]
    #[Assert\NotBlank()]
    private $motdepasse;

    #[ORM\Column(type: 'string', length: 20)]
    private $tel;

    #[ORM\Column(type: 'string', length: 255)]
    private $cv;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getDatenaissance(): ?string
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(string $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): self
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }
}
