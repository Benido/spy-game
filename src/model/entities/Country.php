<?php

require_once('../../model/IterateTrait.php');

class Country
{
    use IterateTrait;

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
     * @return int
     */
    public function getId(): int
    {
        return $this->id_country;
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