<?php
require_once('../../model/IterateTrait.php');

class Hideout
{
    use IterateTrait;

    private int $id_hideout;
    private string $address;
    private int $country;
    private string $type;

    /**
     * @param int $id_hideout
     * @param string $address
     * @param int $country
     * @param string $type
     */
    public function __construct(int $id_hideout, string $address, int $country, string $type)
    {
        $this->id_hideout = $id_hideout;
        $this->address = $address;
        $this->country = $country;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id_hideout;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * @param int $country
     */
    public function setCountry(int $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }
}