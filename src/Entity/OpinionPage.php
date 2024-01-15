<?php

namespace App\Entity;

use App\Repository\OpinionPageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: OpinionPageRepository::class)]
class OpinionPage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le titre.')]
    #[Assert\Length(
        min: 2, max: 255,
        minMessage: 'Le titre  doit être de 2 caractères minimum.',
        maxMessage: "Le titre  ne doit pas dépasser 255 caractères"
    )]
    private ?string $title = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le texte de présentation.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'Le texte doit être de 10 caractères minimum.',
        maxMessage: "La texte ne doit pas dépasser 1255 caractères"
    )]
    private ?string $presentationText = null;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPresentationText(): ?string
    {
        return $this->presentationText;
    }

    public function setPresentationText(string $presentationText): static
    {
        $this->presentationText = $presentationText;

        return $this;
    }
}
