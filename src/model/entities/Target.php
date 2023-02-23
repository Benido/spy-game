<?php
require_once('../../model/IterateTrait.php');
require_once 'Person.php';

class Target
{
    use IterateTrait;

    private int $id_target;
    private int $person;

    /**
     * @param int $id_target
     * @param int $person
     */
    public function __construct(int $id_target, int $person)
    {
        $this->id_target = $id_target;
        $this->person = $person;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id_target;
    }

    /**
     * @return int
     */
    public function getPerson(): int
    {
        return $this->person;
    }

    /**
     * @param int $person
     */
    public function setPerson(int $person): void
    {
        $this->person = $person;
    }

}