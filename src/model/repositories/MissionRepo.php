<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Mission.php');

class MissionRepo extends CRUD
{
    private string $tableName = 'mission';
    private string $tableTitle = 'Missions';
    private string $scriptTabledit = 'countriesEditable.js';

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData() {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'tableProperties' => Mission::iterateProperties(),
            'scriptTabledit' => $this->scriptTabledit
        ];;
    }

    public function readMissions () {
        $table = parent::read(
            'SELECT * FROM mission'
        );
        foreach ($table as $i => $mission) {
            $table[$i] = new Mission(...$mission);
        }
        return $table;
    }

  /*  public function update ($id, $column, $value): void
    {
        $sql = 'UPDATE mission
        SET :column = :value
        WHERE id_mission = :id'
    }
*/
}