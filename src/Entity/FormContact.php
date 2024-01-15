<?php

namespace App\Entity;

use App\Repository\FormContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FormContactRepository::class)]
class FormContact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un nom.')]
    #[Assert\Length(
        min: 2, max: 50,
        minMessage: 'Le nom doit contenir 2 caractères minimum.',
        maxMessage: "Le nom ne doit pas dépasser 50 caractères"
    )]
    #[Assert\Regex(pattern: '/^[a-zA-Z]+$/', message: 'Le nom ne doit contenir que des lettres.')]
    private ?string $name = null;


    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner un prénom.')]
    #[Assert\Length(min: 2, max: 50,
        minMessage:'Le prénom doit contenir minimum 2 lettres.',
        maxMessage: "Le prénom ne doit pas dépasser 50 caractères"
    )]
    #[Assert\Regex(pattern: '/^[a-zA-ZÀ-ÿ -]+$/', message: "Le prénom ne doit contenir que des lettres")]
    private ?string $firstName = null;


    #[ORM\Column(length: 180)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre email.')]
    #[Assert\Email(message: 'Veuillez renseigner un email valide.')]
    private ?string $email = null;


    #[ORM\Column(length:12)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre numéro de téléphone.')]
    #[Assert\Length(
        min: 10, max: 12,
        minMessage: 'Le numéro doit contenir 10 chiffres minimum.',
        maxMessage: "Le numéro ne doit pas dépasser 12 chiffres"
    )]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'Le Prix afficher ne doit contenir que des chiffres.')]
    private ?int $phoneNumber = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le sujet de votre message.')]
    #[Assert\Length(
        min: 5, max: 255,
        minMessage: 'Le sujet doit être de 5 caractères minimum.',
        maxMessage: "Le sujet  ne doit pas dépasser 255 caractères"
    )]
    private ?string $subject = null;


    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'Veuillez renseigner votre message.')]
    #[Assert\Length(
        min: 10, max: 1255,
        minMessage: 'Le message doit être de 10 caractères minimum.',
        maxMessage: "La message ne doit pas dépasser 1255 caractères"
    )]
    private ?string $message = null;


    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;

    
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

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

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): static
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
