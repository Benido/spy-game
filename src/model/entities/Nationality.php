<?php
require_once('../../model/IterateTrait.php');

class Nationality
{
    use IterateTrait;

    private int $id_nationality;
    private string $name;
    private int $country;

    /**
     * @param int $id_nationality
     * @param string $name
     * @param int $country
     */
    public function __construct(int $id_nationality, string $name, int $country)
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
}