<?php

require_once 'Person.php';

class Target extends Person
{
    private int $idTarget;

    /**
     * @param int $idTarget
     * @param int $idPerson
     * @param int $identificationCode
     * @param string $firstName
     * @param string $lastName
     * @param DateTime $birthDate
     * @param Nationality $nationality
     */
    public function __construct(int $idPerson, int $identificationCode, string $firstName, string $lastName, DateTime $birthDate, Nationality $nationality, int $idTarget)
    {
        parent::construct($idPerson, $identificationCode, $firstName, $lastName, $birthDate, $nationality);
        $this->idTarget = $idTarget;
    }

    /**
     * @return int
     */
    public function getIdPerson(): int
    {
        return $this->idPerson;
    }

    /**
     * @param int $idPerson
     */
    public function setIdPerson(int $idPerson): void
    {
        $this->idPerson = $idPerson;
    }

    /**
     * @return int
     */
    public function getIdentificationCode(): int
    {
        return $this->identificationCode;
    }

    /**
     * @param int $identificationCode
     */
    public function setIdentificationCode(int $identificationCode): void
    {
        $this->identificationCode = $identificationCode;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return DateTime
     */
    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param DateTime $birthDate
     */
    public function setBirthDate(DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return Nationality
     */
    public function getNationality(): Nationality
    {
        return $this->nationality;
    }

    /**
     * @param Nationality $nationality
     */
    public function setNationality(Nationality $nationality): void
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