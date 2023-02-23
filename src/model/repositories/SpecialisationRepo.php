<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Specialisation.php');
require_once ('../../model/EditCell.php');

class SpecialisationRepo extends CRUD
{
    use EditCell;

    private string $tableName = 'specialisation';
    private string $tableTitle = 'Spécialisations';
    private string $scriptTabledit = 'specialisationsEditable.js';
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
            'tableProperties' => Specialisation::iterateProperties(),
            'text' => $this->maxInputLength
        ];;
    }

    public function readSpecialisations()
    {
        $table = parent::read(
            'SELECT * FROM spy_database.specialisation'
        );
        foreach ($table as $i => $specialisation) {
            $table[$i] = new Specialisation(...$specialisation);
        }
        return $table;
    }

    public function getFormatedSpecialisations(): array
    {
        $specialisations = $this->readSpecialisations();
        $specialisationsOptions = [];
        foreach ($specialisations as $specialisation) {
            $specialisationsOptions[$specialisation->getId()] = $specialisation->getTitle();
        }
        return $specialisationsOptions;
    }

    public function insertSpecialisation ($array): bool
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