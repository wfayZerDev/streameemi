<?php

namespace App\Entity;

use App\Repository\MediaLanguageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaLanguageRepository::class)]
class MediaLanguage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\ManyToMany(targetEntity: Media::class, inversedBy: 'mediaLanguages')]
    private Collection $mediaId;

    /**
     * @var Collection<int, Language>
     */
    #[ORM\ManyToMany(targetEntity: Language::class, inversedBy: 'mediaLanguages')]
    private Collection $languageId;

    public function __construct()
    {
        $this->mediaId = new ArrayCollection();
        $this->languageId = new ArrayCollection();
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
     * @return Collection<int, Language>
     */
    public function getLanguageId(): Collection
    {
        return $this->languageId;
    }

    public function addLanguageId(Language $languageId): static
    {
        if (!$this->languageId->contains($languageId)) {
            $this->languageId->add($languageId);
        }

        return $this;
    }

    public function removeLanguageId(Language $languageId): static
    {
        $this->languageId->removeElement($languageId);

        return $this;
    }
}
