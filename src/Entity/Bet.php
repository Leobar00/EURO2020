<?php

namespace App\Entity;

use App\Repository\BetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BetRepository::class)]
class Bet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'bets')]
    private ?User $user_id = null;

    #[ORM\OneToMany(mappedBy: 'bet', targetEntity: Game::class)]
    private Collection $match_id;

    #[ORM\Column]
    private ?int $home_score = null;

    #[ORM\Column]
    private ?int $away_score = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    public function __construct()
    {
        $this->match_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getMatchId(): Collection
    {
        return $this->match_id;
    }

    public function addMatchId(Game $matchId): self
    {
        if (!$this->match_id->contains($matchId)) {
            $this->match_id->add($matchId);
            $matchId->setBet($this);
        }

        return $this;
    }

    public function removeMatchId(Game $matchId): self
    {
        if ($this->match_id->removeElement($matchId)) {
            // set the owning side to null (unless already changed)
            if ($matchId->getBet() === $this) {
                $matchId->setBet(null);
            }
        }

        return $this;
    }

    public function getHomeScore(): ?int
    {
        return $this->home_score;
    }

    public function setHomeScore(int $home_score): self
    {
        $this->home_score = $home_score;

        return $this;
    }

    public function getAwayScore(): ?int
    {
        return $this->away_score;
    }

    public function setAwayScore(int $away_score): self
    {
        $this->away_score = $away_score;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
