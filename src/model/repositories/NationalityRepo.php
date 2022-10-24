<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Nationality.php');

class NationalityRepo extends CRUD
{
    private string $tableName = 'nationality';
    private string $tableTitle = 'Nationalités';
    private string $scriptTabledit = 'nationalitiesEditable.js';

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData() {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'tableProperties' => Nationality::iterateProperties(),
            'scriptTabledit' => $this->scriptTabledit
        ];;
    }

    public function readNationalities () {
        $table = parent::read(
            'SELECT * FROM nationality'
        );
        foreach ($table as $i => $nationality) {
            $table[$i] = new Nationality(...$nationality);
        }
        return $table;
    }


    /* public function update ($id, $column, $value): void
     {
         $sql = 'UPDATE nationality
         SET :column = :value
         WHERE id_mission = :id';
     }*/

}