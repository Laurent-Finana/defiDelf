<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningRepository::class)]
class Planning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Delf_A1 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Delf_A2 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Delf_B1 = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Delf_B2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDelfA1(): ?\DateTimeInterface
    {
        return $this->Delf_A1;
    }

    public function setDelfA1(?\DateTimeInterface $Delf_A1): static
    {
        $this->Delf_A1 = $Delf_A1;

        return $this;
    }

    public function getDelfA2(): ?\DateTimeInterface
    {
        return $this->Delf_A2;
    }

    public function setDelfA2(?\DateTimeInterface $Delf_A2): static
    {
        $this->Delf_A2 = $Delf_A2;

        return $this;
    }

    public function getDelfB1(): ?\DateTimeInterface
    {
        return $this->Delf_B1;
    }

    public function setDelfB1(?\DateTimeInterface $Delf_B1): static
    {
        $this->Delf_B1 = $Delf_B1;

        return $this;
    }

    public function getDelfB2(): ?\DateTimeInterface
    {
        return $this->Delf_B2;
    }

    public function setDelfB2(?\DateTimeInterface $Delf_B2): static
    {
        $this->Delf_B2 = $Delf_B2;

        return $this;
    }
}
