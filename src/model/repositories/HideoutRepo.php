<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Hideout.php');

class HideoutRepo extends CRUD
{
    private string $tableName = 'hideout';
    private string $tableTitle = 'Planques';
    private string $scriptTabledit = 'hideoutsEditable.js';

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData()
    {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'tableProperties' => Hideout::iterateProperties(),
            'scriptTabledit' => $this->scriptTabledit
        ];;
    }

    public function readHideouts()
    {
        $table = parent::read(
            'SELECT * FROM hideout'
        );
        foreach ($table as $i => $hideout) {
            $table[$i] = new Hideout(...$hideout);
        }
        return $table;
    }

}