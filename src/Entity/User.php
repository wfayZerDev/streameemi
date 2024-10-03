<?php

namespace App\Entity;

use App\Enum\UserStatusEnum;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $username = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password = null;

    #[ORM\Column(enumType: UserStatusEnum::class)]
    private ?UserStatusEnum $accountStatus = null;

    /**
     * @var Collection<int, PlaylistSubscription>
     */
    #[ORM\ManyToMany(targetEntity: PlaylistSubscription::class, mappedBy: 'UserId')]
    private Collection $playlistSubscriptions;

    /**
     * @var Collection<int, Playlist>
     */
    #[ORM\OneToMany(targetEntity: Playlist::class, mappedBy: 'UserId')]
    private Collection $playlists;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Subscription $currentSubscriptionId = null;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'userId')]
    private Collection $comments;

    /**
     * @var Collection<int, WatchedHistory>
     */
    #[ORM\OneToMany(targetEntity: WatchedHistory::class, mappedBy: 'userId')]
    private Collection $watchedHistories;

    public function __construct()
    {
        $this->playlistSubscriptions = new ArrayCollection();
        $this->playlists = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->watchedHistories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): static
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getAccountStatus(): ?UserStatusEnum
    {
        return $this->accountStatus;
    }

    public function setAccountStatus(UserStatusEnum $accountStatus): static
    {
        $this->accountStatus = $accountStatus;

        return $this;
    }

    /**
     * @return Collection<int, PlaylistSubscription>
     */
    public function getPlaylistSubscriptions(): Collection
    {
        return $this->playlistSubscriptions;
    }

    public function addPlaylistSubscription(PlaylistSubscription $playlistSubscription): static
    {
        if (!$this->playlistSubscriptions->contains($playlistSubscription)) {
            $this->playlistSubscriptions->add($playlistSubscription);
            $playlistSubscription->addUserId($this);
        }

        return $this;
    }

    public function removePlaylistSubscription(PlaylistSubscription $playlistSubscription): static
    {
        if ($this->playlistSubscriptions->removeElement($playlistSubscription)) {
            $playlistSubscription->removeUserId($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Playlist>
     */
    public function getPlaylists(): Collection
    {
        return $this->playlists;
    }

    public function addPlaylist(Playlist $playlist): static
    {
        if (!$this->playlists->contains($playlist)) {
            $this->playlists->add($playlist);
            $playlist->setUserId($this);
        }

        return $this;
    }

    public function removePlaylist(Playlist $playlist): static
    {
        if ($this->playlists->removeElement($playlist)) {
            // set the owning side to null (unless already changed)
            if ($playlist->getUserId() === $this) {
                $playlist->setUserId(null);
            }
        }

        return $this;
    }

    public function getCurrentSubscriptionId(): ?Subscription
    {
        return $this->currentSubscriptionId;
    }

    public function setCurrentSubscriptionId(?Subscription $currentSubscriptionId): static
    {
        $this->currentSubscriptionId = $currentSubscriptionId;

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
            $comment->setUserId($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getUserId() === $this) {
                $comment->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, WatchedHistory>
     */
    public function getWatchedHistories(): Collection
    {
        return $this->watchedHistories;
    }

    public function addWatchedHistory(WatchedHistory $watchedHistory): static
    {
        if (!$this->watchedHistories->contains($watchedHistory)) {
            $this->watchedHistories->add($watchedHistory);
            $watchedHistory->setUserId($this);
        }

        return $this;
    }

    public function removeWatchedHistory(WatchedHistory $watchedHistory): static
    {
        if ($this->watchedHistories->removeElement($watchedHistory)) {
            // set the owning side to null (unless already changed)
            if ($watchedHistory->getUserId() === $this) {
                $watchedHistory->setUserId(null);
            }
        }

        return $this;
    }
}
