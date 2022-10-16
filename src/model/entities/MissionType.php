<?php

class MissionType
{
    private int $idMissionType;
    private string $title;
    private string $description;

    /**
     * @param int $idMissionType
     * @param string $title
     * @param string $description
     */
    public function __construct(int $idMissionType, string $title, string $description)
    {
        $this->idMissionType = $idMissionType;
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