<?php

namespace App\Entity;

use App\Repository\HomePageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: HomePageRepository::class)]
class HomePage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le titre de la page.')]
    #[Assert\Length(
        min: 2, max: 255,
        minMessage: 'Le titre  doit être de 2 caractères minimum.',
        maxMessage: "Le titre  ne doit pas dépasser 255 caractères"
    )]
    private ?string $pageTitle = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le champ de bienvenue.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'Le champ doit être de 10 caractères minimum.',
        maxMessage: "La champ ne doit pas dépasser 1255 caractères"
    )]
    private ?string $welcomeText = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le titre de la section réparation.')]
    #[Assert\Length(
        min: 2, max: 255,
        minMessage: 'La titre  doit être de 2 caractères minimum.',
        maxMessage: "La titre  ne doit pas dépasser 255 caractères"
    )]
    private ?string $repairSectionTitle = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner la section réparation.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'La section doit être de 10 caractères minimum.',
        maxMessage: "La section doit pas dépasser 1255 caractères"
    )]
    private ?string $repairSectionText = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le titre de la section des voitures d\'occasions.')]
    #[Assert\Length(
        min: 2, max: 255,
        minMessage: 'La titre  doit être de 2 caractères minimum.',
        maxMessage: "La titre  ne doit pas dépasser 255 caractères"
    )]
    private ?string $usedCarsSectionTitle = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le champ de description des voitures d\'occasions.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'La champ doit être de 10 caractères minimum.',
        maxMessage: "La champ doit pas dépasser 1255 caractères"
    )]
    private ?string $usedCarsSectionText = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le titre des opinions.')]
    #[Assert\Length(
        min: 2, max: 255,
        minMessage: 'La titre  doit être de 2 caractères minimum.',
        maxMessage: "La titre  ne doit pas dépasser 255 caractères"
    )]
    private ?string $opinionsSectionTitle = null;

    
    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le texte de présentation des opinions.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'La champ doit être de 10 caractères minimum.',
        maxMessage: "La champ doit pas dépasser 1255 caractères"
    )]
    private ?string $opinionsSectionText = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPageTitle(): ?string
    {
        return $this->pageTitle;
    }

    public function setPageTitle(string $pageTitle): static
    {
        $this->pageTitle = $pageTitle;

        return $this;
    }

    public function getWelcomeText(): ?string
    {
        return $this->welcomeText;
    }

    public function setWelcomeText(string $welcomeText): static
    {
        $this->welcomeText = $welcomeText;

        return $this;
    }

    public function getRepairSectionTitle(): ?string
    {
        return $this->repairSectionTitle;
    }

    public function setRepairSectionTitle(string $repairSectionTitle): static
    {
        $this->repairSectionTitle = $repairSectionTitle;

        return $this;
    }

    public function getRepairSectionText(): ?string
    {
        return $this->repairSectionText;
    }

    public function setRepairSectionText(string $repairSectionText): static
    {
        $this->repairSectionText = $repairSectionText;

        return $this;
    }

    public function getUsedCarsSectionTitle(): ?string
    {
        return $this->usedCarsSectionTitle;
    }

    public function setUsedCarsSectionTitle(string $usedCarsSectionTitle): static
    {
        $this->usedCarsSectionTitle = $usedCarsSectionTitle;

        return $this;
    }

    public function getUsedCarsSectionText(): ?string
    {
        return $this->usedCarsSectionText;
    }

    public function setUsedCarsSectionText(string $usedCarsSectionText): static
    {
        $this->usedCarsSectionText = $usedCarsSectionText;

        return $this;
    }

    public function getOpinionsSectionTitle(): ?string
    {
        return $this->opinionsSectionTitle;
    }

    public function setOpinionsSectionTitle(string $opinionsSectionTitle): static
    {
        $this->opinionsSectionTitle = $opinionsSectionTitle;

        return $this;
    }

    public function getOpinionsSectionText(): ?string
    {
        return $this->opinionsSectionText;
    }

    public function setOpinionsSectionText(string $opinionsSectionText): static
    {
        $this->opinionsSectionText = $opinionsSectionText;

        return $this;
    }
}
