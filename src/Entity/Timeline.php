<?php

namespace App\Entity;

use App\Repository\TimelineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimelineRepository::class)]
class Timeline
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, TimelineItem>
     */
    #[ORM\OneToMany(targetEntity: TimelineItem::class, mappedBy: 'timeline', orphanRemoval: true)]
    private Collection $timelineItems;

    public function __construct()
    {
        $this->timelineItems = new ArrayCollection();
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
     * @return Collection<int, TimelineItem>
     */
    public function getTimelineItems(): Collection
    {
        return $this->timelineItems;
    }

    public function addTimelineItem(TimelineItem $timelineItem): static
    {
        if (!$this->timelineItems->contains($timelineItem)) {
            $this->timelineItems->add($timelineItem);
            $timelineItem->setTimeline($this);
        }

        return $this;
    }

    public function removeTimelineItem(TimelineItem $timelineItem): static
    {
        if ($this->timelineItems->removeElement($timelineItem)) {
            // set the owning side to null (unless already changed)
            if ($timelineItem->getTimeline() === $this) {
                $timelineItem->setTimeline(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name ?? 'Nouvelle timeline';
    }
}
