<?php

namespace App\Entity;

use App\Repository\OptionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionsRepository::class)
 */
class Options
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity=propriete::class, mappedBy="options")
     */
    private $propriete;

    public function __construct()
    {
        $this->propriete = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|propriete[]
     */
    public function getPropriete(): Collection
    {
        return $this->propriete;
    }

    public function addPropriete(propriete $propriete): self
    {
        if (!$this->propriete->contains($propriete)) {
            $this->propriete[] = $propriete;
        }

        return $this;
    }

    public function removePropriete(propriete $propriete): self
    {
        $this->propriete->removeElement($propriete);

        return $this;
    }
}
