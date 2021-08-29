<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class ProprieteSearch
{
    /**
     * @var int|null
     */
    private $prixMax;

    /**
     * @var int|null
     */
    private $surfaceMax;


    /**
     * Get the value of surfaceMax
     * @return  int|null
     */
    public function getSurfaceMax()
    {
        return $this->surfaceMax;
    }
    /**
     * @var ArrayCollection
     */
    private $options;

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }
    /**
     * Set the value of surfaceMax
     *
     * @param  int|null  $surfaceMax
     *
     * @return  self
     */
    public function setSurfaceMax($surfaceMax)
    {
        return $this->surfaceMax = $surfaceMax;
    }

    /**
     * Get the value of prixMax
     *
     * @return  int|null
     */
    public function getPrixMax()
    {
        return $this->prixMax;
    }

    /**
     * Set the value of prixMax
     *
     * @param  int|null  $prixMax
     *
     * @return  self
     */
    public function setPrixMax($prixMax)
    {
        return  $this->prixMax = $prixMax;
    }

    /**
     * Get the value of options
     *
     * @return  ArrayCollection
     */
    public function getOptions() : ArrayCollection
    {
        return $this->options;
    }

    /**
     * Set the value of options
     *
     * @param  ArrayCollection  $options
     *
     * @return  self
     */
    public function setOptions(ArrayCollection $options)
    {
        $this->options = $options;

        return $this;
    }
}
