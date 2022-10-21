<?php

require_once 'Person.php';

class Agent extends Person
{
    use iterateTrait;

    private int $id_agent;
    private int $specialisation;

    /**
     * @param int $id_agent
     * @param int $specialisation
     * @param int $id_person
     * @param int $identification_code
     * @param string $first_name
     * @param string $last_name
     * @param string $birth_date
     * @param int $nationality
     *
     */
    public function __construct(int $id_person, int $identification_code, string $first_name, string $last_name, string $birth_date, int $nationality, int $id_agent, int $specialisation)
    {
        parent::construct($id_person, $identification_code, $first_name, $last_name, $birth_date, $nationality);
        $this->id_agent = $id_agent;
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
    public function getIdPerson(): int
    {
        return $this->id_person;
    }

    /**
     * @param int $id_person
     */
    public function setIdPerson(int $id_person): void
    {
        $this->id_person = $id_person;
    }

    /**
     * @return int
     */
    public function getIdentificationCode(): int
    {
        return $this->identification_code;
    }

    /**
     * @param int $identification_code
     */
    public function setIdentificationCode(int $identification_code): void
    {
        $this->identification_code = $identification_code;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birth_date;
    }

    /**
     * @param string $birth_date
     */
    public function setBirthDate(string $birth_date): void
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return int
     */
    public function getNationality(): int
    {
        return $this->nationality;
    }

    /**
     * @param int $nationality
     */
    public function setNationality(int $nationality): void
    {
        $this->nationality = $nationality;
    }
}