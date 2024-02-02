<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ScheduleRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Ignore;
use Symfony\Component\Serializer\Attribute\SerializedName;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Ignore]
    private ?int $id = null;

    #[ORM\Column]
    #[Ignore]
    private ?DateTimeImmutable $startFrom = null;

    #[ORM\Column]
    #[Ignore]
    private ?DateTimeImmutable $endOn = null;

    #[ORM\Column(length: 255)]
    #[Ignore]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Ignore]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Ignore]
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

    #[SerializedName('title')]
    public function getTitle(): string
    {
        return "{$this->name} - {$this->phoneNumber}";
    }

    #[SerializedName('start')]
    public function getStart(): string
    {
        return $this->startFrom->format('Y-m-d') . 'T' . $this->startFrom->format('H:i:s');
    }

    #[SerializedName('end')]
    public function getEnd(): string
    {
        return $this->endOn->format('Y-m-d') . 'T' . $this->endOn->format('H:i:s');
    }
}
