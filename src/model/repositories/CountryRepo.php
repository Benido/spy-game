<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Country.php');

class CountryRepo extends CRUD
{
    private string $tableName = 'country';
    private string $tableTitle = 'Pays';
    private string $scriptTabledit = 'countriesEditable.js';

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData() {
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


   /* public function update ($id, $column, $value): void
    {
        $sql = 'UPDATE country
        SET :column = :value
        WHERE id_mission = :id';
    }*/

}