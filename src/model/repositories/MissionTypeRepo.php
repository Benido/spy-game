<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/MissionType.php');
require_once ('../../model/EditCell.php');

class MissionTypeRepo extends CRUD
{
    use EditCell;

    private string $tableName = 'mission_type';
    private string $tableTitle = 'Types de mission';
    private string $scriptTabledit = 'missionTypesEditable.js';
    private array $maxInputLength = ['title' => 50, 'description' => 300];

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
            'tableProperties' => MissionType::iterateProperties(),
            'text' => $this->maxInputLength
        ];

    }

    public function readMissionTypes(): array
    {
        $table = parent::read(
            'SELECT * FROM spy_database.mission_type'
        );
        foreach ($table as $i => $missionType) {
            $table[$i] = new MissionType(...$missionType);
        }
        return $table;
    }

    public function formatsMissionTypes(): array
    {
        $missionTypes = $this->readMissionTypes();
        $missionTypesOptions = [];
        foreach ($missionTypes as $missionType) {
            $missionTypesOptions[$missionType->getId()] = $missionType->getTitle();
        }
        return $missionTypesOptions;
    }

    public function insertMissionType ($array): bool
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
