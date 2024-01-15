<?php

namespace App\Entity;

use App\Repository\FuelsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FuelsRepository::class)]
class Fuels
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le carburant de la voiture.')]
    #[Assert\Length(
        min: 2, max: 10,
        minMessage: 'Le texte  doit être de 2 caractères minimum.',
        maxMessage: "Le texte  ne doit pas dépasser 10 caractères"
    )]
    private ?string $name = null;

    
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
}
