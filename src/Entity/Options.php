<?php

namespace App\Entity;

use App\Entity\Propriete;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OptionsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @return Collection|Propriete[]
     */
    public function getPropriete(): Collection
    {
        return $this->propriete;
    }

    public function addPropriete(Propriete $propriete): self
    {
        if (!$this->propriete->contains($propriete)) {
            $this->propriete[] = $propriete;
        }

        return $this;
    }

    public function removePropriete(Propriete $propriete): self
    {
        $this->propriete->removeElement($propriete);

        return $this;
    }
}
