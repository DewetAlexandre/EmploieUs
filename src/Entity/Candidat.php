<?php

namespace App\Entity;

use App\Repository\CandidatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\Column(type:'datetime')]
    #[Assert\DateTime()]
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

    #[ORM\OneToOne(targetEntity: Annonce::class, cascade: ['persist', 'remove'])]
    private $annonce;

    #[ORM\OneToMany(mappedBy: 'candidat', targetEntity: Message::class)]
    private $message;

    public function __construct()
    {
        $this->message = new ArrayCollection();
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

    public function getDatenaissance(): ?datetime 
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(datetime $datenaissance): self
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

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessage(): Collection
    {
        return $this->message;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->message->contains($message)) {
            $this->message[] = $message;
            $message->setCandidat($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->message->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getCandidat() === $this) {
                $message->setCandidat(null);
            }
        }

        return $this;
    }
}
