<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Agent.php');
require_once ('../../model/EditCell.php');
require_once ('../../model/repositories/SpecialisationRepo.php');
require_once ('../../model/repositories/PersonRepo.php');

class AgentRepo extends CRUD
{
    use EditCell;

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
            'scriptTabledit' => $this->scriptTabledit,
            'tableProperties' => Agent::iterateProperties(),
            'multipleChoiceInput' => ['specialisation' => $this->getSpecialisationOptions(), 'person' => $this->getPersonsOptions()],
        ];
    }

    //generates an array containing class instances of the Entity
    public function getAgents(): array
    {
        $table = parent::read(
            'SELECT * FROM spy_database.agent'
        );
        foreach ($table as $i => $agent) {
            $table[$i] = new Agent(...$agent);
        }
        return $table;
    }

    //generates a table of values
    public function readAgents(): array
    {
        return $table = parent::read(
            "SELECT id_agent, 
                 CONCAT(person.first_name, ' ', person.last_name) as person,
                 specialisation.title as specialisation
                 FROM spy_database.agent
                 JOIN spy_database.person ON agent.person = person.id_person
                 JOIN spy_database.specialisation ON agent.specialisation = specialisation.id_specialisation");
    }

    public function getSpecialisationOptions(): array
    {
        //Build an associative array with the id and name of specialisations
        $specialisationRepo = new SpecialisationRepo();
        return $specialisationRepo->getFormatedSpecialisations();
    }

    public function getPersonsOptions(): array
    {
        $personRepo = new PersonRepo();
        return $personRepo->getFormatedAvailablePersons();
    }

    public function formatsAgents(): array
    {
        $agents = $this->getAgents();
        $formatedAgents = [];
        foreach ($agents as $agent) {
            $idAgent = $agent->getId();
            $idPerson = $agent->getPerson();
            $personRepo = new PersonRepo();
            $agentFullName = $personRepo->formatsPerson($idPerson);
            $formatedAgents[$idAgent] = $agentFullName;
        }
        return $formatedAgents;
    }

    public function insertAgent ($array): bool
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