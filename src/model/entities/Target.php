<?php
require_once ('../../model/iterateTrait.php');
require_once 'Person.php';

class Target
{
    use iterateTrait;

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