<?php

namespace App\Entity;

use App\Repository\CatRepository;
use Doctrine\ORM\Mapping as ORM;

// import 'Animal' entity to use as Parent Class
use App\Entity\Animal;

#[ORM\Entity(repositoryClass: CatRepository::class)]
class Cat extends Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(length: 80, nullable: true)]
    private ?string $race = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRace(): ?string
    {
        return $this->race;
    }

    public function setRace(?string $race): static
    {
        $this->race = $race;

        return $this;
    }
}
