<?php

namespace App\Entity;

use App\Repository\WatchedHistoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WatchedHistoryRepository::class)]
class WatchedHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $lastWatched = null;

    #[ORM\Column]
    private ?int $numberOfView = null;

    #[ORM\ManyToOne(inversedBy: 'watchedHistories')]
    private ?User $userId = null;

    /**
     * @var Collection<int, Media>
     */
    #[ORM\OneToMany(targetEntity: Media::class, mappedBy: 'watchedHistory')]
    private Collection $mediaId;

    public function __construct()
    {
        $this->mediaId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastWatched(): ?\DateTimeImmutable
    {
        return $this->lastWatched;
    }

    public function setLastWatched(\DateTimeImmutable $lastWatched): static
    {
        $this->lastWatched = $lastWatched;

        return $this;
    }

    public function getNumberOfView(): ?int
    {
        return $this->numberOfView;
    }

    public function setNumberOfView(int $numberOfView): static
    {
        $this->numberOfView = $numberOfView;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): static
    {
        $this->userId = $userId;

        return $this;
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
            $mediaId->setWatchedHistory($this);
        }

        return $this;
    }

    public function removeMediaId(Media $mediaId): static
    {
        if ($this->mediaId->removeElement($mediaId)) {
            // set the owning side to null (unless already changed)
            if ($mediaId->getWatchedHistory() === $this) {
                $mediaId->setWatchedHistory(null);
            }
        }

        return $this;
    }
}
