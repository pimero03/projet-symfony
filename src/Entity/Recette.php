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
     * @ORM\Column(type="time")
     */
    private $preparation_time;

    /**
     * @ORM\Column(type="time")
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

    public function getPreparationTime(): ?\DateTimeInterface
    {
        return $this->preparation_time;
    }

    public function setPreparationTime(\DateTimeInterface $preparation_time): self
    {
        $this->preparation_time = $preparation_time;

        return $this;
    }

    public function getCuissonTime(): ?\DateTimeInterface
    {
        return $this->cuisson_time;
    }

    public function setCuissonTime(\DateTimeInterface $cuisson_time): self
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
