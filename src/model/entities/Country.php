<?php

class Country
{
    private int $idCountry;
    private string $name;

    /**
     * @param int $idCountry
     * @param string $name
     */
    public function __construct(int $idCountry, string $name)
    {
        $this->idCountry = $idCountry;
        $this->name = $name;
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




}