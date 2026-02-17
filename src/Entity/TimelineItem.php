<?php

namespace App\Entity;

use App\Repository\TimelineItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimelineItemRepository::class)]
class TimelineItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $date = null;

    #[ORM\Column(length: 1020)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'timelineItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?timeline $timeline = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTimeline(): ?timeline
    {
        return $this->timeline;
    }

    public function setTimeline(?timeline $timeline): static
    {
        $this->timeline = $timeline;

        return $this;
    }

    public function __toString(): string
    {
        return $this->title ?? 'Nouvel item';
    }
}
