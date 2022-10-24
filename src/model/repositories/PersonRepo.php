<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Person.php');

class PersonRepo extends CRUD
{
    private string $tableName = 'person';
    private string $tableTitle = 'Personnes';
    private string $scriptTabledit = 'personsEditable.js';

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData()
    {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'tableProperties' => Person::iterateProperties(),
            'scriptTabledit' => $this->scriptTabledit
        ];;
    }

    public function readPersons()
    {
        $table = parent::read(
            'SELECT * FROM person'
        );
        foreach ($table as $i => $person) {
            $table[$i] = new Person(...$person);
        }
        return $table;
    }

}