<?php

class Hideout
{
    private int $idHideout;
    private string $address;
    private Country $country;
    private string $type;

    /**
     * @param int $idHideout
     * @param string $address
     * @param Country $country
     * @param string $type
     */
    public function __construct(int $idHideout, string $address, Country $country, string $type)
    {
        $this->idHideout = $idHideout;
        $this->address = $address;
        $this->country = $country;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getIdHideout(): int
    {
        return $this->idHideout;
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
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @param Country $country
     */
    public function setCountry(Country $country): void
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