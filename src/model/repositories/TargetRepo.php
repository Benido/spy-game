<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Target.php');
require_once ('../../model/EditCell.php');
require_once ('../../model/repositories/PersonRepo.php');

class TargetRepo extends CRUD
{
    use EditCell;

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
            'scriptTabledit' => $this->scriptTabledit,
            'tableProperties' => Target::iterateProperties(),
            'multipleChoiceInput' => ['person' => $this->getPersonsOptions()]
        ];
    }
       
    //generates an array containing class instances of the Entity
    public function getTargets()
    {
        $table = parent::read(
            'SELECT * FROM spy_database.target'
        );
        foreach ($table as $i => $target) {
            $table[$i] = new Target(...$target);
        }
        return $table;
    }

    //generates a table of values
    public function readTargets(): array
    {
        return $table = parent::read(
            "SELECT id_target, 
                 CONCAT(person.first_name, ' ', person.last_name) as person
                 FROM spy_database.target
                 JOIN spy_database.person on target.person = person.id_person");
    }

    public function formatsTargets(): array
    {
        $targets = $this->getTargets();
        $formatedTargets = [];
        foreach ($targets as $target) {
            $idTarget = $target->getId();
            $idPerson = $target->getPerson();
            $personRepo = new PersonRepo();
            $targetFullName = $personRepo->formatsPerson($idPerson);
            $formatedTargets[$idTarget] = $targetFullName;
        }
        return $formatedTargets;
    }

    public function formatsOneTarget($idTarget): string
    {
        $findTarget = parent::findById($idTarget, $this->tableName);
        $target = new Target(...$findTarget);
        $idPerson = $target->getPerson();
        $personRepo = new PersonRepo();
        return $personRepo->formatsPerson($idPerson);
    }

    public function getTargetFullName($id): string
    {
        $personRepo = new PersonRepo();
        return $personRepo->formatsPerson($this->per);
    }

    public function getPersonsOptions(): array
    {
        $personRepo = new PersonRepo();
        return $personRepo->getFormatedAvailablePersons();
    }
    
    public function insertTarget ($array): bool
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