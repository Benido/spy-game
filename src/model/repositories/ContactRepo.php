<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Contact.php');

class ContactRepo extends CRUD
{
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
            'tableProperties' => Contact::iterateProperties(),
            'scriptTabledit' => $this->scriptTabledit
        ];;
    }

    public function readContacts()
    {
        $table = parent::read(
            'SELECT * FROM contact'
        );
        foreach ($table as $i => $contact) {
            $table[$i] = new Contact(...$contact);
        }
        return $table;
    }

}