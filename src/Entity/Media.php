<?php

namespace App\Entity;

use App\Enum\MediaTypeEnum;
use App\Repository\MediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(enumType: MediaTypeEnum::class)]
    private ?MediaTypeEnum $mediaType = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $shortDescription = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $longDescription = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coverImage = null;

    #[ORM\Column(nullable: true)]
    private ?array $staff = null;

    #[ORM\Column(nullable: true)]
    private ?array $cast = null;

    /**
     * @var Collection<int, PlaylistMedia>
     */
    #[ORM\ManyToMany(targetEntity: PlaylistMedia::class, mappedBy: 'mediaId')]
    private Collection $playlistMedia;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'mediaId')]
    private Collection $comments;

    #[ORM\ManyToOne(inversedBy: 'mediaId')]
    private ?WatchedHistory $watchedHistory = null;

    /**
     * @var Collection<int, CategorieMedia>
     */
    #[ORM\ManyToMany(targetEntity: CategorieMedia::class, mappedBy: 'mediaId')]
    private Collection $categorieMedia;

    /**
     * @var Collection<int, MediaLanguage>
     */
    #[ORM\ManyToMany(targetEntity: MediaLanguage::class, mappedBy: 'mediaId')]
    private Collection $mediaLanguages;

    public function __construct()
    {
        $this->playlistMedia = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->categorieMedia = new ArrayCollection();
        $this->mediaLanguages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMediaType(): ?MediaTypeEnum
    {
        return $this->mediaType;
    }

    public function setMediaType(MediaTypeEnum $mediaType): static
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): static
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getLongDescription(): ?string
    {
        return $this->longDescription;
    }

    public function setLongDescription(string $longDescription): static
    {
        $this->longDescription = $longDescription;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): static
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function setCoverImage(?string $coverImage): static
    {
        $this->coverImage = $coverImage;

        return $this;
    }

    public function getStaff(): ?array
    {
        return $this->staff;
    }

    public function setStaff(?array $staff): static
    {
        $this->staff = $staff;

        return $this;
    }

    public function getCast(): ?array
    {
        return $this->cast;
    }

    public function setCast(?array $cast): static
    {
        $this->cast = $cast;

        return $this;
    }

    /**
     * @return Collection<int, PlaylistMedia>
     */
    public function getPlaylistMedia(): Collection
    {
        return $this->playlistMedia;
    }

    public function addPlaylistMedium(PlaylistMedia $playlistMedium): static
    {
        if (!$this->playlistMedia->contains($playlistMedium)) {
            $this->playlistMedia->add($playlistMedium);
            $playlistMedium->addMediaId($this);
        }

        return $this;
    }

    public function removePlaylistMedium(PlaylistMedia $playlistMedium): static
    {
        if ($this->playlistMedia->removeElement($playlistMedium)) {
            $playlistMedium->removeMediaId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setMediaId($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getMediaId() === $this) {
                $comment->setMediaId(null);
            }
        }

        return $this;
    }

    public function getWatchedHistory(): ?WatchedHistory
    {
        return $this->watchedHistory;
    }

    public function setWatchedHistory(?WatchedHistory $watchedHistory): static
    {
        $this->watchedHistory = $watchedHistory;

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
            $categorieMedium->addMediaId($this);
        }

        return $this;
    }

    public function removeCategorieMedium(CategorieMedia $categorieMedium): static
    {
        if ($this->categorieMedia->removeElement($categorieMedium)) {
            $categorieMedium->removeMediaId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, MediaLanguage>
     */
    public function getMediaLanguages(): Collection
    {
        return $this->mediaLanguages;
    }

    public function addMediaLanguage(MediaLanguage $mediaLanguage): static
    {
        if (!$this->mediaLanguages->contains($mediaLanguage)) {
            $this->mediaLanguages->add($mediaLanguage);
            $mediaLanguage->addMediaId($this);
        }

        return $this;
    }

    public function removeMediaLanguage(MediaLanguage $mediaLanguage): static
    {
        if ($this->mediaLanguages->removeElement($mediaLanguage)) {
            $mediaLanguage->removeMediaId($this);
        }

        return $this;
    }
}
