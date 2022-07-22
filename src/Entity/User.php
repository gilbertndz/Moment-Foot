<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\ManyToMany(targetEntity: Team::class, inversedBy: 'users')]
    private Collection $favorite_teams;

    #[ORM\ManyToMany(targetEntity: Player::class, inversedBy: 'users')]
    private Collection $favorite_players;

    public function __construct()
    {
        $this->favorite_teams = new ArrayCollection();
        $this->favorite_players = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    /**
     * @return Collection<int, Team>
     */
    public function getFavoriteTeams(): Collection
    {
        return $this->favorite_teams;
    }

    public function addFavoriteTeam(Team $favoriteTeam): self
    {
        if (!$this->favorite_teams->contains($favoriteTeam)) {
            $this->favorite_teams[] = $favoriteTeam;
        }

        return $this;
    }

    public function removeFavoriteTeam(Team $favoriteTeam): self
    {
        $this->favorite_teams->removeElement($favoriteTeam);

        return $this;
    }

    /**
     * @return Collection<int, Player>
     */
    public function getFavoritePlayers(): Collection
    {
        return $this->favorite_players;
    }

    public function addFavoritePlayer(Player $favoritePlayer): self
    {
        if (!$this->favorite_players->contains($favoritePlayer)) {
            $this->favorite_players[] = $favoritePlayer;
        }

        return $this;
    }

    public function removeFavoritePlayer(Player $favoritePlayer): self
    {
        $this->favorite_players->removeElement($favoritePlayer);

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): self
    {
        $this->role = $role;

        return $this;
    }
}
