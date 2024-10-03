<?php

namespace App\Entity;

use App\Repository\CategorieMediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieMediaRepository::class)]
class CategorieMedia
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'categorieMedia')]
    private Collection $mediaId;

    /**
     * @var Collection<int, Categorie>
     */
    #[ORM\ManyToMany(targetEntity: Categorie::class, inversedBy: 'categorieMedia')]
    private Collection $categorieId;

    public function __construct()
    {
        $this->mediaId = new ArrayCollection();
        $this->categorieId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Media>
     */
    public function getMediaId(): Collection
    {
        return $this->mediaId;
    }

    public function addMediaId(Media $mediaId): static
    {
        if (!$this->mediaId->contains($mediaId)) {
            $this->mediaId->add($mediaId);
        }

        return $this;
    }

    public function removeMediaId(Media $mediaId): static
    {
        $this->mediaId->removeElement($mediaId);

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategorieId(): Collection
    {
        return $this->categorieId;
    }

    public function addCategorieId(Categorie $categorieId): static
    {
        if (!$this->categorieId->contains($categorieId)) {
            $this->categorieId->add($categorieId);
        }

        return $this;
    }

    public function removeCategorieId(Categorie $categorieId): static
    {
        $this->categorieId->removeElement($categorieId);

        return $this;
    }
}
