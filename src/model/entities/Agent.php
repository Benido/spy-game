<?php

require_once 'Person.php';

class Agent
{
    use IterateTrait;

    private int $id_agent;

    private int $person;

    private int $specialisation;




    /**
     * @param int $id_agent
     * @param int $person
     * @param int $specialisation

     *
     */
    public function __construct(int $id_agent, int $person, int $specialisation)
    {
        $this->id_agent = $id_agent;
        $this->person = $person;
        $this->specialisation = $specialisation;
    }

    /**
     * @return int
     */
    public function getIdAgent(): int
    {
        return $this->id_agent;
    }

    /**
     * @param int $id_agent
     */
    public function setIdAgent(int $id_agent): void
    {
        $this->id_agent = $id_agent;
    }

    /**
     * @return int
     */
    public function getSpecialisation(): int
    {
        return $this->specialisation;
    }

    /**
     * @param int $specialisation
     */
    public function setSpecialisation(int $specialisation): void
    {
        $this->specialisation = $specialisation;
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