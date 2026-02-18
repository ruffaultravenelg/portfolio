<?php

namespace App\Entity;

use App\Repository\GlobalsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GlobalsRepository::class)]
class Globals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $bannerTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $bannerDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $cv_url = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBannerTitle(): ?string
    {
        return $this->bannerTitle;
    }

    public function setBannerTitle(string $bannerTitle): static
    {
        $this->bannerTitle = $bannerTitle;

        return $this;
    }

    public function getBannerDescription(): ?string
    {
        return $this->bannerDescription;
    }

    public function setBannerDescription(string $bannerDescription): static
    {
        $this->bannerDescription = $bannerDescription;

        return $this;
    }

    public function getCvUrl(): ?string
    {
        return $this->cv_url;
    }

    public function setCvUrl(string $cv_url): static
    {
        $this->cv_url = $cv_url;

        return $this;
    }
}
