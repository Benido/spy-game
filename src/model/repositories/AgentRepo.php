<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Agent.php');

class AgentRepo extends CRUD
{
    private string $tableName = 'agent';
    private string $tableTitle = 'Agents';
    private string $scriptTabledit = 'agentsEditable.js';

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData()
    {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'tableProperties' => Agent::iterateProperties(),
            'scriptTabledit' => $this->scriptTabledit
        ];;
    }

    public function readAgents()
    {
        $table = parent::read(
            'SELECT * FROM agent'
        );
        foreach ($table as $i => $agent) {
            $table[$i] = new Agent(...$agent);
        }
        return $table;
    }

}