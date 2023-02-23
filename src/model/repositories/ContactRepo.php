<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Contact.php');
require_once ('../../model/EditCell.php');
require_once ('../../model/repositories/PersonRepo.php');

class ContactRepo extends CRUD
{
    use EditCell;

    private string $tableName = 'contact';
    private string $tableTitle = 'Contacts';
    private string $scriptTabledit = 'contactsEditable.js';

    public function __construct()
    {
        parent::__construct();
    }


    //generates an array containing class instances of the Entity
    public function getTableData()
    {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'scriptTabledit' => $this->scriptTabledit,
            'tableProperties' => Contact::iterateProperties(),
            'multipleChoiceInput' => ['person' => $this->getPersonsOptions()]
        ];;
    }

    //generates a table of values
    public function readContacts(): array
    {
        return $table = parent::read(
            "SELECT id_contact, 
                 CONCAT(person.first_name, ' ', person.last_name) as person
                 FROM spy_database.contact
                 JOIN spy_database.person on contact.person = person.id_person");
    }

    public function getContacts(): array
    {
        $table = parent::read(
            'SELECT * FROM spy_database.contact'
        );
        foreach ($table as $i => $contact) {
            $table[$i] = new Contact(...$contact);
        }
        return $table;
    }

    public function formatsContacts(): array
    {
        $contacts = $this->getcontacts();
        $formatedContacts = [];
        foreach ($contacts as $contact) {
            $idContact = $contact->getId();
            $idPerson = $contact->getPerson();
            $personRepo = new PersonRepo();
            $contactFullName = $personRepo->formatsPerson($idPerson);
            $formatedContacts[$idContact] = $contactFullName;
        }
        return $formatedContacts;
    }

    public function getPersonsOptions(): array
    {
        $personRepo = new PersonRepo();
        return $personRepo->getFormatedAvailablePersons();
    }

    public function insertContact ($array): bool
    {
        unset($array['action']);
        foreach ($array as $column => $value) {
            $columns[] = $column;
            $values[] = $value;
        }
        return $this->create($this->tableName, $columns, $values );

    }

    public function deleteRow ($id): bool
    {
        return $this->delete($this->tableName, reset($id));
    }

}