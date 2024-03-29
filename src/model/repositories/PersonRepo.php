<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Person.php');
require_once ('../../model/repositories/NationalityRepo.php');
require_once ('../../model/repositories/AgentRepo.php');
require_once ('../../model/repositories/TargetRepo.php');
require_once ('../../model/repositories/ContactRepo.php');

class PersonRepo extends CRUD
{
    use EditCell ;

    private string $tableName = 'person';
    private string $tableTitle = 'Personnes';
    private string $scriptTabledit = 'personsEditable.js';
    private array $maxInputLength = [ 'first_name' => 100, 'last_name' => 100 ];

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
            'tableProperties' => Person::iterateProperties(),
            'multipleChoiceInput' => ['nationality' => $this->getNationalitiesOptions()],
            'date' => ['birth_date'],
            'number' => ['identification_code' => 9999],
            'text' => $this->maxInputLength
        ];
    }

    //generates an array containing class instances of the Entity
    public function getPersons(): array
    {
        $table = parent::read(
            'SELECT * FROM spy_database.person'
        );
        foreach ($table as $i => $person) {
            $table[$i] = new Person(...$person);
        }
        return $table;
    }

    //generates a table of values
    public function readPersons(): array
    {
        return $table = parent::read(
            'SELECT id_person, identification_code, first_name, last_name, birth_date, nationality.name as nationality
                 FROM spy_database.person
                 JOIN spy_database.nationality
                 ON person.nationality = nationality.id_nationality'
        );
    }

    public function getFormatedAvailablePersons(): array
    {
        $persons = $this->getPersons();
        $unavailablePersons = parent::readColumns(
            'SELECT id_person FROM spy_database.person JOIN spy_database.agent on id_person = agent.person 
                 UNION 
                 SELECT id_person FROM spy_database.person JOIN spy_database.target ON id_person = target.person 
                 UNION 
                 SELECT id_person FROM spy_database.person JOIN spy_database.contact ON id_person = contact.person'
        );
        $formatedPersons = [];
        foreach ($persons as $person) {
            $id = $person->getId();
            if (!in_array($id, $unavailablePersons))
            $formatedPersons[$id] = $person->getFullName();
        }
        return $formatedPersons;
    }

    public function formatsPerson($id): string
    {
        $personToFormat = parent::findById($id, $this->tableName);
        $person = new Person(...$personToFormat);
        return $person->getFullName();
    }

    public function getNationalitiesOptions(): array
    {
        $nationalityRepo = new NationalityRepo();
        return $nationalityRepo->getFormatedNationalities();
    }

    public function insertPerson ($array): bool
    {
        unset($array['action']);
        if ($array['birth_date'] < '1900-01-01' ) {
            throw new Exception('Veuillez sélectionner une date postérieure au 01/01/1900');
        }
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