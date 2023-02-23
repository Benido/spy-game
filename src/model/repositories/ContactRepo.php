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

    public function getPersonsOptions(): array
    {
        $personRepo = new PersonRepo();
        return $personRepo->getFormatedAvailablePersons();
    }

    public function readContacts()
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
        $contacts = $this->readcontacts();
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