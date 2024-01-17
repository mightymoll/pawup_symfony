<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
abstract class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(length: 15, nullable: true)]
    protected ?string $numICAD = null;

    #[ORM\Column(length: 80)]
    protected ?string $name = null;

    #[ORM\Column(length: 7)]
    protected ?string $sex = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    protected ?\DateTimeInterface $dateBirth = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    protected ?string $descLong = null;

    #[ORM\Column]
    protected ?bool $hasDateBirth = false;

    #[ORM\Column(length: 200, nullable: true)]
    protected ?string $descShort = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumICAD(): ?string
    {
        return $this->numICAD;
    }

    public function setNumICAD(?string $numICAD): static
    {
        $this->numICAD = $numICAD;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): static
    {
        $this->sex = $sex;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->dateBirth;
    }

    public function setDateBirth(?\DateTimeInterface $dateBirth): static
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getDescLong(): ?string
    {
        return $this->descLong;
    }

    public function setDescLong(?string $descLong): static
    {
        $this->descLong = $descLong;

        return $this;
    }

    public function isHasDateBirth(): ?bool
    {
        return $this->hasDateBirth;
    }

    public function setHasDateBirth(bool $hasDateBirth): static
    {
        $this->hasDateBirth = $hasDateBirth;

        return $this;
    }

    public function getDescShort(): ?string
    {
        return $this->descShort;
    }

    public function setDescShort(?string $descShort): static
    {
        $this->descShort = $descShort;

        return $this;
    }
}
