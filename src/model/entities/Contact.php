<?php
require_once ('../../model/iterateTrait.php');
require_once 'Person.php';

class Contact
{
    use iterateTrait;

    private int $id_contact;
    private int $person;

    /**
     * @param int $id_contact
     * @param int $person
     */
    public function __construct(int $id_contact, int $person)
    {

        $this->id_contact = $id_contact;
        $this->person = $person;
    }

    /**
     * @return int
     */
    public function getIdContact(): int
    {
        return $this->id_contact;
    }

    /**
     * @param int $id_contact
     */
    public function setIdContact(int $id_contact): void
    {
        $this->id_contact = $id_contact;
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
    public function setIdPerson(int $person): void
    {
        $this->person = $person;
    }
}