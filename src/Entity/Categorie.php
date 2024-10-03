<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $label = null;

    /**
     * @var Collection<int, CategorieMedia>
     */
    #[ORM\ManyToMany(targetEntity: CategorieMedia::class, mappedBy: 'categorieId')]
    private Collection $categorieMedia;

    public function __construct()
    {
        $this->categorieMedia = new ArrayCollection();
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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, CategorieMedia>
     */
    public function getCategorieMedia(): Collection
    {
        return $this->categorieMedia;
    }

    public function addCategorieMedium(CategorieMedia $categorieMedium): static
    {
        if (!$this->categorieMedia->contains($categorieMedium)) {
            $this->categorieMedia->add($categorieMedium);
            $categorieMedium->addCategorieId($this);
        }

        return $this;
    }

    public function removeCategorieMedium(CategorieMedia $categorieMedium): static
    {
        if ($this->categorieMedia->removeElement($categorieMedium)) {
            $categorieMedium->removeCategorieId($this);
        }

        return $this;
    }
}
