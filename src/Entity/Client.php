<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column
     */
    private ?int $id = null;

    /**
     * @ORM\Column(length: 255)
     */
    private ?string $Nom = null;

    /**
     * @ORM\Column(length: 255)
     */
    private ?string $Prenom = null;

    /**
     * @ORM\Column
     */
    private ?int $Age = null;

    /**
     * @ORM\Column(length: 255, nullable: true)
     */
    private ?string $Adresse = null;

    /**
     * @ORM\Column(length: 20)
     */
    private ?string $Telephone = null;

    /**
     * @ORM\Column(length: 255)
     */
    private ?string $Email = null;

    /**
     * @ORM\Column
     */
    private ?string $motDePasse = null; // Assurez-vous que cette propriété existe

    // Ajoutez ces méthodes pour implémenter l'interface UserInterface

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function getPassword(): string
    {
        // Retournez le mot de passe de l'utilisateur
        return $this->motDePasse;
    }

    public function getSalt(): ?string
    {
        // Vous pouvez ignorer cette méthode si vous n'utilisez pas de sel pour le mot de passe
        return null;
    }

    public function getUsername(): string
    {
        // Retournez le nom d'utilisateur de l'utilisateur
        return $this->email;
    }

    public function eraseCredentials(): void
    {
        // Vous pouvez effectuer des opérations liées à la suppression des informations d'identification si nécessaire
    }
}
