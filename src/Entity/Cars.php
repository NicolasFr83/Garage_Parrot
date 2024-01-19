<?php

namespace App\Entity;

use App\Repository\CarsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;

#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: CarsRepository::class)]
class Cars
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner le prix de la voiture.')]
    #[Assert\Length(
        min: 3, max: 7,
        minMessage: 'Le prix doit contenir 3 caractères minimum.',
        maxMessage: "Le prix ne doit pas dépasser 7 caractères"
    )]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'Le Prix afficher ne doit contenir que des chiffres.')]
    private ?int $price = null;


    #[Vich\UploadableField(mapping: 'cars_images', fileNameProperty: 'imageName')]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255)]
    private ?string $imageName = null;


    #[ORM\Column]
    #[Assert\NotBlank(message: 'Veuillez renseigner l\'année de mise en circulation de la voiture.')]
    #[Assert\Length(
        min: 4, max: 4,
        minMessage:'L\'année de mise en circulation ne peut contenir que 4 caractères',
        maxMessage:'L\'année doit contenir 4 caracteres')]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'L\'année ne doit contenir que des chiffres.')]

    private ?int $years = null;


    #[ORM\Column(length:6)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le nombre de kilomètres de la voiture.')]
    #[Assert\Length(
        min: 3, max: 6,
        minMessage: 'Les kilomètres doivent contenir 3 caractères minimum.',
        maxMessage: "Les kilomètres ne doivent pas dépasser 6 caractères"
    )]
    #[Assert\Regex(pattern: '/^[0-9]+$/', message: 'Le Prix afficher ne doit contenir que des chiffres.')]
    private ?int $kilometers = null;


    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Veuillez renseigner le champ de text de la voiture.')]
    #[Assert\Length(
        min: 2, max: 255,
        minMessage: 'Le champ doit être de 3 caractères minimum.',
        maxMessage: "Le champ ne doit pas dépasser 255 caractères"
    )]
    private ?string $carPresentationText = null;


    #[ORM\ManyToOne(inversedBy: 'cars')]
    private ?Brands $brand = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    private ?Fuels $fuel = null;

    #[ORM\ManyToMany(targetEntity: Options::class, inversedBy: 'cars')]
    private Collection $options;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'cars')]
    private ?Types $type = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile($imageFile): self
    {
        $this->imageFile = $imageFile;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): static
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getYears(): ?int
    {
        return $this->years;
    }

    public function setYears(int $years): static
    {
        $this->years = $years;

        return $this;
    }

    public function getKilometers(): ?int
    {
        return $this->kilometers;
    }

    public function setKilometers(int $kilometers): static
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    public function getCarPresentationText(): ?string
    {
        return $this->carPresentationText;
    }

    public function setCarPresentationText(string $carPresentationText): static
    {
        $this->carPresentationText = $carPresentationText;

        return $this;
    }

    public function getBrand(): ?Brands
    {
        return $this->brand;
    }

    public function setBrand(?Brands $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getFuel(): ?Fuels
    {
        return $this->fuel;
    }

    public function setFuel(?Fuels $fuel): static
    {
        $this->fuel = $fuel;

        return $this;
    }

    /**
     * @return Collection<int, Options>
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Options $option): static
    {
        if (!$this->options->contains($option)) {
            $this->options->add($option);
        }

        return $this;
    }

    public function removeOption(Options $option): static
    {
        $this->options->removeElement($option);

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getType(): ?Types
    {
        return $this->type;
    }

    public function setType(?Types $type): static
    {
        $this->type = $type;

        return $this;
    }
}
