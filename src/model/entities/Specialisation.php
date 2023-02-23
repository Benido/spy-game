<?php
require_once('../../model/IterateTrait.php');

class Specialisation
{
    use IterateTrait;

    private int $id_specialisation;
    private string $title;
    private string $description;

    /**
     * @param int $id_specialisation
     * @param string $title
     * @param string $description
     */
    public function __construct(int $id_specialisation, string $title, string $description)
    {
        $this->id_specialisation = $id_specialisation;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id_specialisation;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}