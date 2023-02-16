<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Hideout.php');
require_once ('../../model/repositories/CountryRepo.php');

class HideoutRepo extends CRUD
{
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
            'maxInputLength' => $this->maxInputLength,
            'multipleChoiceInput' => ['country' => $this->getCountriesOptions()]
        ];
    }

    public function readHideouts(): array
    {
        $table = parent::read(
            'SELECT * FROM spy_database.hideout'
        );
        foreach ($table as $i => $hideout) {
            $table[$i] = new Hideout(...$hideout);
        }
        return $table;
    }

    public function getCountriesOptions(): array
    {
        $countryRepo = new CountryRepo();

        return $countryRepo->getCountries();;
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