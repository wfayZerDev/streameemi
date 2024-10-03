<?php

namespace App\Entity;

use App\Repository\SubscriptionHistoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionHistoryRepository::class)]
class SubscriptionHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $startDate = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $endDate = null;

    /**
     * @var Collection<int, Subscription>
     */
    #[ORM\ManyToMany(targetEntity: Subscription::class, inversedBy: 'subscriptionHistories')]
    private Collection $subscriptionId;

    public function __construct()
    {
        $this->subscriptionId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeImmutable $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeImmutable $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return Collection<int, Subscription>
     */
    public function getSubscriptionId(): Collection
    {
        return $this->subscriptionId;
    }

    public function addSubscriptionId(Subscription $subscriptionId): static
    {
        if (!$this->subscriptionId->contains($subscriptionId)) {
            $this->subscriptionId->add($subscriptionId);
        }

        return $this;
    }

    public function removeSubscriptionId(Subscription $subscriptionId): static
    {
        $this->subscriptionId->removeElement($subscriptionId);

        return $this;
    }
}
