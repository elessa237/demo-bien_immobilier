<?php

namespace App\Entity;

use App\Entity\Propriete;
use Symfony\Component\Validator\Constraints as Assert;
class Contact
{
    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $nom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $prenom;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/[0-9]{9}/")
     */
    private $numero;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $message;

    /**
     * @var Propriete|null
     */
    private $propriete;

    /**
     * Get the value of message
     *
     * @return  string|null
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @param  string|null  $message
     *
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string|null  $email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of numero
     *
     * @return  string|null
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @param  string|null  $numero
     *
     * @return  self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of prenom
     *
     * @return  string|null
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @param  string|null  $prenom
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     *
     * @return  string|null
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param  string|null  $nom
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of propriete
     *
     * @return  Propriete|null
     */
    public function getPropriete()
    {
        return $this->propriete;
    }

    /**
     * Set the value of propriete
     *
     * @param  Propriete|null  $propriete
     *
     * @return  self
     */
    public function setPropriete($propriete)
    {
        $this->propriete = $propriete;

        return $this;
    }
}