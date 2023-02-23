<?php

require_once ('../../model/CRUD.php');
require_once ('../../model/entities/Mission.php');
require_once ('../../model/EditCell.php');
require_once ('../../model/repositories/AgentRepo.php');
require_once ('../../model/repositories/TargetRepo.php');
require_once ('../../model/repositories/ContactRepo.php');
require_once ('../../model/repositories/MissionTypeRepo.php');
require_once ('../../model/repositories/HideoutRepo.php');
require_once ('../../model/repositories/SpecialisationRepo.php');
require_once('../../../constants.php');

class MissionRepo extends CRUD
{
    use EditCell;

    private string $tableName = 'mission';
    private string $tableTitle = 'Missions';
    private string $scriptTabledit = 'missionsEditable.js';
    private array $maxInputLength = [ 'code_name' => 50, 'status' => 50 ];

    public function __construct()
    {
        parent::__construct();
    }


    public function getTableData() {
        return $data = [
            'tableName' => $this->tableName,
            'tableTitle' => $this->tableTitle,
            'scriptTabledit' => $this->scriptTabledit,
            'tableProperties' => Mission::iterateProperties(),
            'multipleChoiceInput' =>
                ['agent' => $this->getAgentsOptions(),
                'target' => $this->getTargetsOptions(),
                'contact' => $this->getContactsOptions(),
                'mission_type' => $this->getMissionTypesOptions(),
                'country' => $this->getCountriesOptions(),
                'hideout' => $this->getHideoutsOptions(),
                'specialisation' => $this->getSpecialisationsOptions()
                ],
            'date' => ['start_date', 'end_date'],
            'text' => $this->maxInputLength
        ];
    }

    public function readMissions(): array
    {
        return $table = parent::read(BACKEND_MISSION_SQL);
    }

    public function getMissions () {
        $table = parent::read(
            'SELECT * FROM spy_database.mission'
        );
        foreach ($table as $i => $mission) {
            $table[$i] = new Mission(...$mission);
        }
        return $table;
    }

    public function getAgentsOptions(): array
    {
        $agentRepo = new AgentRepo();

        return $agentRepo->formatsAgents();
    }

    public function getTargetsOptions(): array
    {
        $targetRepo = new TargetRepo();

        return $targetRepo->formatsTargets();
    }

    public function getContactsOptions(): array
    {
        $targetRepo = new ContactRepo();

        return $targetRepo->formatsContacts();
    }

    public function getCountriesOptions(): array
    {
        $countryRepo = new CountryRepo();

        return $countryRepo->formatsCountries();
    }

    public function getHideoutsOptions(): array
    {
        $countryRepo = new HideoutRepo();

        return $countryRepo->formatsHideouts();
    }

    public function getMissionTypesOptions(): array
    {
        $missionTypesRepo = new MissionTypeRepo();

        return $missionTypesRepo->formatsMissionTypes();
    }

    public function getSpecialisationsOptions(): array
    {
        $specialisationRepo = new SpecialisationRepo();

        return $specialisationRepo->getFormatedSpecialisations();
    }


    public function insertMission ($array): bool
    {
        unset($array['action']);
        if (($array['start_date'] || $array['end_date']) < '1900-01-01' ) {
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