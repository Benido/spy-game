<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/MissionType.php');

class MissionTypeRepo extends CRUD
{
    private string $tableName = 'mission_type';
    private string $tableTitle = 'Types de mission';
    private string $scriptTabledit = 'missionTypesEditable.js';

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData()
    {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'tableProperties' => MissionType::iterateProperties(),
            'scriptTabledit' => $this->scriptTabledit
        ];

    }

    public function readMissionTypes()
    {
        $table = parent::read(
            'SELECT * FROM mission_type'
        );
        foreach ($table as $i => $missionType) {
            $table[$i] = new MissionType(...$missionType);
        }
        return $table;
    }
}
