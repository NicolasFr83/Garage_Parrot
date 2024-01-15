<?php

namespace App\Entity;

use App\Repository\GarageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GarageRepository::class)]
class Garage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 25)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le nom du garage.')]
    #[Assert\Length(
        min: 2, max: 25,
        minMessage: 'Le nom  doit être de 2 caractères minimum.',
        maxMessage: "Le nom  ne doit pas dépasser 25 caractères",
    )]
    private ?string $name = null;

    #[ORM\Column(length: 180)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre email.')]
    #[Assert\Email(message: 'Veuillez renseigner un email valide.')]
    private ?string $email = null;


    #[ORM\Column(length:10)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le numéro de téléphone du garage.')]
    #[Assert\Length(
        min: 10, max: 10,
        message:'Le numéro de téléphone doit contenir 10 chiffres',
    )]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'Le Prix afficher ne doit contenir que des chiffres.')]
    private ?int $phonenumber = null;

    
    #[ORM\OneToMany(mappedBy: 'garage', targetEntity: Openninggarage::class)]
    private Collection $openninggarages;

    #[ORM\OneToMany(mappedBy: 'garage', targetEntity: Opinions::class)]
    private Collection $opinions;

    public function __construct()
    {
        $this->openninggarages = new ArrayCollection();
        $this->opinions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhonenumber(): ?int
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(int $phonenumber): static
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * @return Collection<int, Openninggarage>
     */
    public function getOpenninggarages(): Collection
    {
        return $this->openninggarages;
    }

    public function addOpenninggarage(Openninggarage $openninggarage): static
    {
        if (!$this->openninggarages->contains($openninggarage)) {
            $this->openninggarages->add($openninggarage);
            $openninggarage->setGarage($this);
        }

        return $this;
    }

    public function removeOpenninggarage(Openninggarage $openninggarage): static
    {
        if ($this->openninggarages->removeElement($openninggarage)) {
            // set the owning side to null (unless already changed)
            if ($openninggarage->getGarage() === $this) {
                $openninggarage->setGarage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Opinions>
     */
    public function getOpinions(): Collection
    {
        return $this->opinions;
    }

    public function addOpinion(Opinions $opinion): static
    {
        if (!$this->opinions->contains($opinion)) {
            $this->opinions->add($opinion);
            $opinion->setGarage($this);
        }

        return $this;
    }

    public function removeOpinion(Opinions $opinion): static
    {
        if ($this->opinions->removeElement($opinion)) {
            // set the owning side to null (unless already changed)
            if ($opinion->getGarage() === $this) {
                $opinion->setGarage(null);
            }
        }

        return $this;
    }
}