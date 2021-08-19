<?php

namespace App\Entity;

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
}
