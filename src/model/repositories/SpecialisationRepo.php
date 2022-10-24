<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Specialisation.php');

class SpecialisationRepo extends CRUD
{
    private string $tableName = 'specialisation';
    private string $tableTitle = 'Spécialisations';
    private string $scriptTabledit = 'specialisationsEditable.js';

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData()
    {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'tableProperties' => Specialisation::iterateProperties(),
            'scriptTabledit' => $this->scriptTabledit
        ];;
    }

    public function readSpecialisations()
    {
        $table = parent::read(
            'SELECT * FROM specialisation'
        );
        foreach ($table as $i => $specialisation) {
            $table[$i] = new Specialisation(...$specialisation);
        }
        return $table;
    }

}