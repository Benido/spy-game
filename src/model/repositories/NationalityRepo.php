<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Nationality.php');
require_once ('../../model/EditCell.php');
require_once ('../../model/repositories/CountryRepo.php');

class NationalityRepo extends CRUD
{
    use EditCell ;

    private string $tableName = 'nationality';
    private string $tableTitle = 'Nationalités';
    private string $scriptTabledit = 'nationalitiesEditable.js';
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
            'scriptTabledit' => $this->scriptTabledit,
            'tableProperties' => Nationality::iterateProperties(),
            'multipleChoiceInput' => ['country' => $this->getCountriesOptions()],
            'text' => $this->maxInputLength,
        ];
    }

    //generates an array containing class instances of the Entity
    public function getNationalities(): array
    {
        $table = parent::read(
            "SELECT * FROM spy_database.nationality"
        );
        foreach ($table as $i => $nationality) {
            $table[$i] = new Nationality(...$nationality);
        }
        return $table;
    }

    //generates a table of values
    public function readNationalities(): array
    {
        return $table = parent::read(
            'SELECT id_nationality, nationality.name, country.name as country
                 FROM spy_database.nationality
                 JOIN spy_database.country
                 ON nationality.country = country.id_country');
    }

    public function getFormatedNationalities(): array
    {
        $nationalities = $this->getNationalities();
        $nationalitiesOptions = [];
        foreach ($nationalities as $nationality) {
            $nationalitiesOptions[$nationality->getId()] = $nationality->getName();
        }
        return $nationalitiesOptions;
    }

    public function getCountriesOptions(): array
    {
        //Build an associative array with the id and name of countries that are not yet associated with a nationality
        $countryRepo = new CountryRepo();
        $countries = $countryRepo->formatsCountries();
        $countriesWithNationality = parent::readColumns(
            "SELECT country FROM spy_database.nationality"
        );
        $countriesOptions = [];
        foreach ($countries as $id => $country) {
            if (!in_array($id, $countriesWithNationality)) {
                $countriesOptions[$id] = $country;
            }
        }
        return $countriesOptions;
    }


    public function insertNationality ($array): bool
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