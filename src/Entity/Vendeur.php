<?php

namespace App\Entity;

use App\Entity\Personne;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\VendeurRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=VendeurRepository::class)
 * @ApiResource
 */
class Vendeur extends Personne
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
    private $nom_Magasin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_Creation_Magasin;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="vendeur")
     */
    private $articles;

   

    public function __construct()
    {
        $this->article = new ArrayCollection();
        $this->articles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMagasin(): ?string
    {
        return $this->nom_Magasin;
    }

    public function setNomMagasin(string $nom_Magasin): self
    {
        $this->nom_Magasin = $nom_Magasin;

        return $this;
    }

    public function getDateCreationMagasin(): ?\DateTimeInterface
    {
        return $this->date_Creation_Magasin;
    }

    public function setDateCreationMagasin(\DateTimeInterface $date_Creation_Magasin): self
    {
        $this->date_Creation_Magasin = $date_Creation_Magasin;

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setVendeur($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
            // set the owning side to null (unless already changed)
            if ($article->getVendeur() === $this) {
                $article->setVendeur(null);
            }
        }

        return $this;
    }

   
}
