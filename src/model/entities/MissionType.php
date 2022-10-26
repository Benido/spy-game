<?php
require_once('../../model/IterateTrait.php');

class MissionType
{
    use IterateTrait;

    private int $id_mission_type;
    private string $title;
    private string $description;

    /**
     * @param int $id_mission_type
     * @param string $title
     * @param string $description
     */
    public function __construct(int $id_mission_type, string $title, string $description)
    {
        $this->id_mission_type = $id_mission_type;
        $this->title = $title;
        $this->description = $description;
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