<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Target.php');

class TargetRepo extends CRUD
{
    private string $tableName = 'target';
    private string $tableTitle = 'Cibles';
    private string $scriptTabledit = 'targetsEditable.js';

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData()
    {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'tableProperties' => Target::iterateProperties(),
            'scriptTabledit' => $this->scriptTabledit
        ];;
    }

    public function readTargets()
    {
        $table = parent::read(
            'SELECT * FROM target'
        );
        foreach ($table as $i => $target) {
            $table[$i] = new Target(...$target);
        }
        return $table;
    }

}