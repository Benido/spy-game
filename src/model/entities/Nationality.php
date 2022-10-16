<?php

class Nationality
{
    private int $idNationality;
    private string $name;
    private Country $country;

    /**
     * @param int $idNationality
     * @param string $name
     * @param Country $country
     */
    public function __construct(int $idNationality, string $name, Country $country)
    {
        $this->idNationality = $idNationality;
        $this->name = $name;
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
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
}