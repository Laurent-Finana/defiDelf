<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PlanningRepository::class)]
class Planning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $delf_a1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $delf_a2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $delf_b1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $delf_b2 = null;
  
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDelfA1(): ?string
    {
        return $this->delf_a1;
    }

    public function setDelfA1(?string $delf_a1): static
    {
        $this->delf_a1 = $delf_a1;

        return $this;
    }

    public function getDelfA2(): ?string
    {
        return $this->delf_a2;
    }

    public function setDelfA2(?string $delf_a2): static
    {
        $this->delf_a2 = $delf_a2;

        return $this;
    }

    public function getDelfB1(): ?string
    {
        return $this->delf_b1;
    }

    public function setDelfB1(?string $delf_b1): static
    {
        $this->delf_b1 = $delf_b1;

        return $this;
    }

    public function getDelfB2(): ?string
    {
        return $this->delf_b2;
    }

    public function setDelfB2(?string $delf_b2): static
    {
        $this->delf_b2 = $delf_b2;

        return $this;
    }

    
}
