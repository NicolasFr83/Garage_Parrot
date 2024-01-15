<?php

namespace App\Entity;

use App\Repository\OpenninggarageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OpenninggarageRepository::class)]
class Openninggarage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 10)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un jour.')]
    #[Assert\Length(
        min: 5, max: 8,
        minMessage: 'Le jour doit contenir 2 caractères minimum.',
        maxMessage: "Le jour ne doit pas dépasser 8 caractères"
    )]
    private ?string $openingday = null;


    #[ORM\Column(length:2)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures d\'ouverture  du garage.')]
    #[Assert\Length(
        min: 2, max: 2,
        message:'L\'heure d\'ouverture doit contenir 2 chiffres',
    )]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'L\'heure affichée ne doit contenir que des chiffres.')]
    private ?int $openinghourmorning = null;


    #[ORM\Column(length:2)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures de fermeture  du garage.')]
    #[Assert\Length(
        min: 2, max: 2,
        message:'L\'heure de fermeture doit contenir 2 chiffres',
    )]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'L\'heure affichée ne doit contenir que des chiffres.')]
    private ?int $closinghourmorning = null;


    #[ORM\Column(length:2)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures d\'ouverture  du garage.')]
    #[Assert\Length(
        min: 2, max: 2,
        message:'L\'heure d\'ouverture doit contenir 2 chiffres',
    )]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'L\'heure affiché ne doit contenir que des chiffres.')]
    private ?int $openinghourafternoon = null;


    #[ORM\Column(length:2)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures de fermeture  du garage.')]
    #[Assert\Length(
        min: 2, max: 2,
        message:'L\'heure de fermeture doit contenir 2 chiffres',
    )]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'L\'heure affichée ne doit contenir que des chiffres.')]
    private ?int $closinghourafternoon = null;
    

    #[ORM\ManyToOne(inversedBy: 'openninggarages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Garage $garage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpeningday(): ?string
    {
        return $this->openingday;
    }

    public function setOpeningday(string $openingday): static
    {
        $this->openingday = $openingday;

        return $this;
    }

    public function getOpeninghourmorning(): ?int
    {
        return $this->openinghourmorning;
    }

    public function setOpeninghourmorning(int $openinghourmorning): static
    {
        $this->openinghourmorning = $openinghourmorning;

        return $this;
    }

    public function getClosinghourmorning(): ?int
    {
        return $this->closinghourmorning;
    }

    public function setClosinghourmorning(int $closinghourmorning): static
    {
        $this->closinghourmorning = $closinghourmorning;

        return $this;
    }

    public function getOpeninghourafternoon(): ?int
    {
        return $this->openinghourafternoon;
    }

    public function setOpeninghourafternoon(int $openinghourafternoon): static
    {
        $this->openinghourafternoon = $openinghourafternoon;

        return $this;
    }

    public function getClosinghourafternoon(): ?int
    {
        return $this->closinghourafternoon;
    }

    public function setClosinghourafternoon(int $closinghourafternoon): static
    {
        $this->closinghourafternoon = $closinghourafternoon;

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): static
    {
        $this->garage = $garage;

        return $this;
    }
}
