<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ArticleRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 * @ApiResource
 */
class Article
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
    private $designation;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix_Unitaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_Article;

    /**
     * @ORM\Column(type="integer")
     */
    private $qte_En_Stock;

    /**
     * @ORM\ManyToOne(targetEntity=Vendeur::class, inversedBy="articles")
     */
    private $vendeur;

     /**
     * @ORM\ManyToOne(targetEntity=Commande::class, inversedBy="articles")
     */
    private $commande;

    /**
     * @ORM\ManyToOne(targetEntity=Panier::class, inversedBy="articles")
     */
    private $panier;

    /**
     * @ORM\ManyToMany(targetEntity=Categorie::class, inversedBy="articles")
     * @ORM\JoinColumn(nullable=true)
     */
    private $categorie;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
    }

    

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrixUnitaire(): ?int
    {
        return $this->prix_Unitaire;
    }

    public function setPrixUnitaire(int $prix_Unitaire): self
    {
        $this->prix_Unitaire = $prix_Unitaire;

        return $this;
    }

    public function getImageArticle(): ?string
    {
        return $this->image_Article;
    }

    public function setImageArticle(string $image_Article): self
    {
        $this->image_Article = $image_Article;

        return $this;
    }

    public function getQteEnStock(): ?int
    {
        return $this->qte_En_Stock;
    }

    public function setQteEnStock(int $qte_En_Stock): self
    {
        $this->qte_En_Stock = $qte_En_Stock;

        return $this;
    }

    public function getVendeur(): ?vendeur
    {
        return $this->vendeur;
    }

    public function setVendeur(?vendeur $vendeur): self
    {
        $this->vendeur = $vendeur;

        return $this;
    }

   

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getPanier(): ?panier
    {
        return $this->panier;
    }

    public function setPanier(?panier $panier): self
    {
        $this->panier = $panier;

        return $this;
    }

    /**
     * @return Collection|categorie[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(categorie $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(categorie $categorie): self
    {
        if ($this->categorie->contains($categorie)) {
            $this->categorie->removeElement($categorie);
        }

        return $this;
    }



    

    
}
