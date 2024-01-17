<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\MappedSuperclass;

// use 'mappedSuperClass' from doctrine to allow attributes & methodes to be inherited
#[MappedSuperclass]
abstract class Animal
{
    // ATTRIBUTES
    // will be used for both 'Cat' and 'Dog' Entities
    #[Column(type: 'string')]
    protected string $numICAD;
    #[Column(type: 'string')]
    protected string $name;
    #[Column(type: 'string')]
    protected string $sex;
    #[Column(type: 'boolean')]
    protected bool $hasDateBirth;
    #[Column(type: 'date')]
    protected DateTime $dateBirth;
    #[Column(type: 'string')]
    protected string $descShort;
    #[Column(type: 'text')]
    protected string $descLong;

    // METHODS
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

    public function isHasDateBirth(): ?bool
    {
        return $this->hasDateBirth;
    }

    public function setHasDateBirth(bool $hasDateBirth): static
    {
        $this->hasDateBirth = $hasDateBirth;

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

    public function getDescShort(): ?string
    {
        return $this->descShort;
    }

    public function setDescShort(?string $descShort): static
    {
        $this->descShort = $descShort;

        return $this;
    }

    public function setDescLong(?string $descLong): static
    {
        $this->descLong = $descLong;

        return $this;
    }
};

?>