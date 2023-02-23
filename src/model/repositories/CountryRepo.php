<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Country.php');
require_once ('../../model/EditCell.php');

class CountryRepo extends CRUD
{
    use EditCell;

    private string $tableName = 'country';
    private string $tableTitle = 'Pays';
    private string $scriptTabledit = 'countriesEditable.js';
    private array $maxInputLength = [ 'name' => 50 ];

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData(): array
    {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'tableProperties' => Country::iterateProperties(),
            'scriptTabledit' => $this->scriptTabledit,
            'text' => $this->maxInputLength
        ];
    }

    public function readCountries (): array
    {
        $table = parent::read(
            'SELECT * FROM spy_database.country'
        );
        foreach ($table as $i => $country) {
            $table[$i] = new Country(...$country);
        }
            return $table;
    }

    public function formatsCountries(): array
    {
        $countries = $this->readCountries();
        $countriesOptions = [];
        foreach ($countries as $country) {
            $countriesOptions[$country->getId()] = $country->getName();
        }
            return $countriesOptions;
    }

    public function editMissionCell () {
        $this->editCell('mission');
    }

    public function insertCountry ($array) {
        unset($array['action']);
        foreach ($array as $column => $value) {
            $columns[] = $column;
            $values[] = $value;
        }
        return $this->create($this->tableName, $columns, $values);
    }

    public function deleteRow ($id) {

        return $this->delete($this->tableName, reset($id));
    }

}