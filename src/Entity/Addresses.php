<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Contacts;

/**
 * Addresses
 *
 * @ORM\Table(name="addresses", indexes={@ORM\Index(name="idContact", columns={"idContact"})})
 * @ORM\Entity(repositoryClass="App\Repository\AddressesRepository")
 */
class Addresses
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=225, nullable=false)
     */
    private $street;

    /**
     * @var int
     *
     * @ORM\Column(name="postalCode", type="integer", nullable=false)
     */
    private $postalcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=225, nullable=false)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=225, nullable=false)
     */
    private $country;

    /**
     * @var Contacts
     *
     * @ORM\ManyToOne(targetEntity="Contacts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idContact", referencedColumnName="id")
     * })
     */
    private $idcontact;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Addresses
     */
    public function setId(int $id): Addresses
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return Addresses
     */
    public function setNumber(int $number): Addresses
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Addresses
     */
    public function setStreet(string $street): Addresses
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return int
     */
    public function getPostalcode(): int
    {
        return $this->postalcode;
    }

    /**
     * @param int $postalcode
     * @return Addresses
     */
    public function setPostalcode(int $postalcode): Addresses
    {
        $this->postalcode = $postalcode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Addresses
     */
    public function setCity(string $city): Addresses
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Addresses
     */
    public function setCountry(string $country): Addresses
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return Contacts
     */
    public function getIdcontact(): Contacts
    {
        return $this->idcontact;
    }

    /**
     * @param Contacts $idcontact
     * @return Addresses
     */
    public function setIdcontact(Contacts $idcontact): Addresses
    {
        $this->idcontact = $idcontact;
        return $this;
    }




}
