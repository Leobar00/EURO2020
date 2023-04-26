<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $home_team;

    #[ORM\Column(length: 255)]
    private string $away_team;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $start_time;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private \DateTimeInterface $end_time;

    #[ORM\Column]
    private \DateTimeImmutable $updated_at;

    #[ORM\Column]
    private \DateTimeImmutable $created_at;

    #[ORM\ManyToOne(inversedBy: 'match_id',cascade: ['all'])]
    private ?Bet $bet = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function getHomeTeam(): string
    {
        return $this->home_team;
    }

    public function setHomeTeam(string $home_team): self
    {
        $this->home_team = $home_team;

        return $this;
    }

    public function getAwayTeam(): string
    {
        return $this->away_team;
    }

    public function setAwayTeam(string $away_team): self
    {
        $this->away_team = $away_team;

        return $this;
    }

    public function getStartTime(): \DateTimeInterface
    {
        return $this->start_time;
    }

    public function setStartTime(\DateTimeInterface $start_time): self
    {
        $this->start_time = $start_time;

        return $this;
    }

    public function getEndTime(): \DateTimeInterface
    {
        return $this->end_time;
    }

    public function setEndTime(\DateTimeInterface $end_time): self
    {
        $this->end_time = $end_time;

        return $this;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getBet(): ?Bet
    {
        return $this->bet;
    }

    public function setBet(?Bet $bet): self
    {
        $this->bet = $bet;

        return $this;
    }
}
