<?php

namespace App\Entity;

use App\Entity\Personne;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 * @ApiResource
 */
class Client extends Personne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nickName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_Creation_Compte;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNickName(): ?string
    {
        return $this->nickName;
    }

    public function setNickName(string $nickName): self
    {
        $this->nickName = $nickName;

        return $this;
    }

    public function getDateCreationCompte(): ?\DateTimeInterface
    {
        return $this->date_Creation_Compte;
    }

    public function setDateCreationCompte(\DateTimeInterface $date_Creation_Compte): self
    {
        $this->date_Creation_Compte = $date_Creation_Compte;

        return $this;
    }

    
}
