<?php

require_once ('../../model/iterateTrait.php');

class Country
{
    use iterateTrait;

    private int $id_country;
    private string $name;

    /**
     * @param int $id_country
     * @param string $name
     */
    public function __construct(int $id_country, string $name)
    {
        $this->id_country = $id_country;
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