<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Get;
use App\Repository\ParticipationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new Post(normalizationContext: ['groups' => 'participation:item']),
        new Get(normalizationContext: ['groups' => 'participation:item']),
        new GetCollection(normalizationContext: ['groups' => 'participation:list'])
    ]
)]
#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['participation:list', 'participation:item'])]

    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    #[Groups(['participation:list', 'participation:item'])]

    private ?string $lastname = null;

    #[ORM\Column]
    #[Groups(['participation:list', 'participation:item'])]

    private ?string $phone = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    #[Groups(['participation:list', 'participation:item', 'event:item'])]

    private ?Event $event = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }
}