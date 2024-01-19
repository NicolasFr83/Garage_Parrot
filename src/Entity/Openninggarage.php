<?php

namespace App\Entity;

use App\Repository\OpenningGarageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OpenningGarageRepository::class)]
class OpenningGarage
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


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures d\'ouverture  du garage.')]
    #[Assert\Length(
        min: 5, max: 5,
        message:'L\'heure d\'ouverture doit contenir 5 chiffres',
    )]
    private ?string $openinghourmorning = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures de fermeture  du garage.')]
    #[Assert\Length(
        min: 5, max: 5,
        message:'L\'heure de fermeture doit contenir 5 chiffres',
    )]
    private ?string $closinghourmorning = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures d\'ouverture  du garage.')]
    #[Assert\Length(
        min: 5, max: 5,
        message:'L\'heure d\'ouverture doit contenir 5 chiffres',
    )]
    private ?string $openinghourafternoon = null;


    #[ORM\Column(length:5)]
    #[Assert\NotBlank(message: 'Veuillez renseigner les heures de fermeture  du garage.')]
    #[Assert\Length(
        min: 5, max: 5,
        message:'L\'heure de fermeture doit contenir 5 chiffres',
    )]
    private ?string $closinghourafternoon = null;
    

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

    public function getOpeninghourmorning(): ?string
    {
        return $this->openinghourmorning;
    }

    public function setOpeninghourmorning(string $openinghourmorning): static
    {
        $this->openinghourmorning = $openinghourmorning;

        return $this;
    }

    public function getClosinghourmorning(): ?string
    {
        return $this->closinghourmorning;
    }

    public function setClosinghourmorning(string $closinghourmorning): static
    {
        $this->closinghourmorning = $closinghourmorning;

        return $this;
    }

    public function getOpeninghourafternoon(): ?string
    {
        return $this->openinghourafternoon;
    }

    public function setOpeninghourafternoon(string $openinghourafternoon): static
    {
        $this->openinghourafternoon = $openinghourafternoon;

        return $this;
    }

    public function getClosinghourafternoon(): ?string
    {
        return $this->closinghourafternoon;
    }

    public function setClosinghourafternoon(string $closinghourafternoon): static
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
