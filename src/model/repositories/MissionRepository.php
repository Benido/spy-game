<?php

require_once ('../../model/entities/Mission.php');

class MissionRepository extends CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function update ($id, $column, $value): void
    {
        $sql = 'UPDATE mission
        SET :column = :value
        WHERE id_mission = :id';
    }

}