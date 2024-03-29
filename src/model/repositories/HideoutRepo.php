<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Hideout.php');
require_once ('../../model/repositories/CountryRepo.php');
require_once ('../../model/EditCell.php');

class HideoutRepo extends CRUD
{
    use EditCell;

    private string $tableName = 'hideout';
    private string $tableTitle = 'Planques';
    private string $scriptTabledit = 'hideoutsEditable.js';
    private array $maxInputLength = [ 'address' => 200, 'type' => 50 ];

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
            'tableProperties' => Hideout::iterateProperties(),
            'text' => $this->maxInputLength,
            'multipleChoiceInput' => ['country' => $this->getCountriesOptions()]
        ];
    }

    //generates an array containing class instances of the Entity
    public function getHideouts(): array
    {
        $table = parent::read(
            'SELECT * FROM spy_database.hideout'
        );
        foreach ($table as $i => $hideout) {
            $table[$i] = new Hideout(...$hideout);
        }
        return $table;
    }

    //generates a table of values
    public function readHideouts(): array
    {
        return $table = parent::read(
            'SELECT id_hideout, address, country.name as country, type 
                 FROM spy_database.hideout
                 JOIN spy_database.country
                 ON hideout.country = country.id_country'
        );
    }

    public function getCountriesOptions(): array
    {
        $countryRepo = new CountryRepo();

        return $countryRepo->formatsCountries();
    }

    public function formatsHideouts(): array
    {
        $hideouts = $this->getHideouts();
        $hideoutsOptions = [];
        foreach ($hideouts as $hideout) {
            $hideoutsOptions[$hideout->getId()] = $hideout->getType();
        }
        return $hideoutsOptions;
    }

    public function insertHideout ($array): bool
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