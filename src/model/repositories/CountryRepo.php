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
            'scriptTabledit' => $this->scriptTabledit
        ];;
    }

    public function readCountries () {
        $table = parent::read(
            'SELECT * FROM country'
        );
        foreach ($table as $i => $country) {
            $table[$i] = new Country(...$country);
        }
            return $table;
    }

    public function editMissionCell () {
        $this->editCell('mission');
    }

    public function insertCountry ($array) {
        $sql = "";
        unset($array['action']);
        foreach ($array as $column => $value) {
            $sql .= "INSERT INTO country ($column) VALUES ('$value') ";
        }
        return $this->create($sql);

    }

    public function deleteRow ($id) {

        return $this->delete($this->tableName, reset($id));
    }

}