<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetteRepository::class)
 */
class Recette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", columnDefinition="enum('5-10min', '10-20min', '20-30min', '30min-1h', '1-2h', '2-3h', 'plus')")
     */
    private $preparation_time;

    /**
     * @ORM\Column(type="string", columnDefinition="enum('5-10min', '10-20min', '20-30min', '30min-1h', '1-2h', '2-3h', 'plus')")
     */
    private $cuisson_time;

    /**
     * @ORM\ManyToMany(targetEntity=Ingredient::class, inversedBy="recettes")
     */
    private $ingredient;

    public function __construct()
    {
        $this->ingredient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPreparationTime(): ?string
    {
        return $this->preparation_time;
    }

    public function setPreparationTime(string $preparation_time): self
    {
        $this->preparation_time = $preparation_time;

        return $this;
    }

    public function getCuissonTime(): ?string
    {
        return $this->cuisson_time;
    }

    public function setCuissonTime(string $cuisson_time): self
    {
        $this->cuisson_time = $cuisson_time;

        return $this;
    }

    /**
     * @return Collection|Ingredient[]
     */
    public function getIngredient(): Collection
    {
        return $this->ingredient;
    }

    public function addIngredient(Ingredient $ingredient): self
    {
        if (!$this->ingredient->contains($ingredient)) {
            $this->ingredient[] = $ingredient;
        }

        return $this;
    }

    public function removeIngredient(Ingredient $ingredient): self
    {
        $this->ingredient->removeElement($ingredient);

        return $this;
    }
}
