<?php

require_once 'Person.php';

class Agent extends Person
{
    private int $idAgent;
    private Specialisation $specialisation;

    /**
     * @param int $idAgent
     * @param Specialisation $specialisation
     * @param int $idPerson
     * @param int $identificationCode
     * @param string $firstName
     * @param string $lastName
     * @param DateTime $birthDate
     * @param Nationality $nationality
     *
     */
    public function __construct(int $idPerson, int $identificationCode, string $firstName, string $lastName, DateTime $birthDate, Nationality $nationality, int $idAgent, Specialisation $specialisation)
    {
        parent::construct($idPerson, $identificationCode, $firstName, $lastName, $birthDate, $nationality);
        $this->idAgent = $idAgent;
        $this->specialisation = $specialisation;
    }

    /**
     * @return int
     */
    public function getIdAgent(): int
    {
        return $this->idAgent;
    }

    /**
     * @param int $idAgent
     */
    public function setIdAgent(int $idAgent): void
    {
        $this->idAgent = $idAgent;
    }

    /**
     * @return Specialisation
     */
    public function getSpecialisation(): Specialisation
    {
        return $this->specialisation;
    }

    /**
     * @param Specialisation $specialisation
     */
    public function setSpecialisation(Specialisation $specialisation): void
    {
        $this->specialisation = $specialisation;
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
}