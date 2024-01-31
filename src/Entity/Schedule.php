<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ScheduleRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?DateTimeImmutable $startFrom = null;

    #[ORM\Column]
    private ?DateTimeImmutable $endOn = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $phoneNumber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartFrom(): ?DateTimeImmutable
    {
        return $this->startFrom;
    }

    public function setStartFrom(DateTimeImmutable $startFrom): self
    {
        $this->startFrom = $startFrom;

        return $this;
    }

    public function getEndOn(): ?DateTimeImmutable
    {
        return $this->endOn;
    }

    public function setEndOn(DateTimeImmutable $endOn): self
    {
        $this->endOn = $endOn;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}
