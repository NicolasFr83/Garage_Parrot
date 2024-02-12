<?php

namespace App\Entity;

use App\Repository\BrandsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BrandsRepository::class)]
class Brands
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string',length: 50)]
    #[Assert\NotBlank(message: 'Veuillez renseigner une marque de véhicule.')]
    #[Assert\Length(
        min: 3, max: 50,
        minMessage: 'Le nom doit contenir 3 caractères minimum.',
        maxMessage: "Le nom ne doit pas dépasser 50 caractères"
    )]
    #[Assert\Regex(pattern: '/^[a-zA-Z]+$/', message: 'La marque ne doit contenir que des lettres.')]
    private ?string $name = null;


    #[ORM\OneToMany(mappedBy: 'brands', targetEntity: Models::class)]
    private Collection $models;

    #[ORM\OneToMany(mappedBy: 'brand', targetEntity: Cars::class)]
    private Collection $cars;

    public function __construct()
    {
        $this->models = new ArrayCollection();
        $this->cars = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;    
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

    /**
     * @return Collection<int, Models>
     */
    public function getModels(): Collection
    {
        return $this->models;
    }

    public function addModel(Models $model): static
    {
        if (!$this->models->contains($model)) {
            $this->models->add($model);
            $model->setBrands($this);
        }

        return $this;
    }

    public function removeModel(Models $model): static
    {
        if ($this->models->removeElement($model)) {
            // set the owning side to null (unless already changed)
            if ($model->getBrands() === $this) {
                $model->setBrands(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cars>
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Cars $car): static
    {
        if (!$this->cars->contains($car)) {
            $this->cars->add($car);
            $car->setBrand($this);
        }

        return $this;
    }

    public function removeCar(Cars $car): static
    {
        if ($this->cars->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getBrand() === $this) {
                $car->setBrand(null);
            }
        }

        return $this;
    }
}
