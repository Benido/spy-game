<?php
require_once ('../../model/iterateTrait.php');

class Nationality
{
    use iterateTrait;

    private int $id_nationality;
    private string $name;
    private Country $country;

    /**
     * @param int $id_nationality
     * @param string $name
     * @param Country $country
     */
    public function __construct(int $id_nationality, string $name, Country $country)
    {
        $this->id_nationality = $id_nationality;
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