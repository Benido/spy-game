<?php
require_once ('../../model/iterateTrait.php');
require_once 'Person.php';

class Target extends Person
{
    use iterateTrait;

    private int $id_target;

    /**
     * @param int $id_target
     * @param int $id_person
     * @param int $identification_code
     * @param string $first_name
     * @param string $last_name
     * @param string $birth_date
     * @param int $nationality
     */
    public function __construct(int $id_person, int $identification_code, string $first_name, string $last_name, string $birth_date, int $nationality, int $id_target)
    {
        parent::construct($id_person, $identification_code, $first_name, $last_name, $birth_date, $nationality);
        $this->id_target = $id_target;
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
     * @param string $birthDate
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

    /**
     * @return int
     */
    public function getIdTarget(): int
    {
        return $this->idTarget;
    }

    /**
     * @param int $idTarget
     */
    public function setIdTarget(int $idTarget): void
    {
        $this->idTarget = $idTarget;
    }

}