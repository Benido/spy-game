<?php

require_once 'Nationality.php';

class Person
{
    private int $idPerson;
    private int $identificationCode;
    private string $firstName;
    private string $lastName;
    private DateTime $birthDate;
    private Nationality $nationality;

    /**
     * @param int $idPerson
     * @param int $identificationCode
     * @param string $firstName
     * @param string $lastName
     * @param DateTime $birthDate
     * @param Nationality $nationality
     */
    public function __construct(int $idPerson, int $identificationCode, string $firstName, string $lastName, DateTime $birthDate, Nationality $nationality)
    {
        $this->idPerson = $idPerson;
        $this->identificationCode = $identificationCode;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->nationality = $nationality;
    }
}