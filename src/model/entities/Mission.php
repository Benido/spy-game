<?php
require_once('../../model/IterateTrait.php');

class Mission
{
    use IterateTrait;

    private int $id_mission;
    private int $agent;
    private int $target;
    private int $contact;
    private string $code_name;
    private int $mission_type;
    private string $status;
    private int $country;
    private int $hideout;
    private int $specialisation;
    private string $start_date;
    private string $end_date;

    /**
     * @param int $id_mission
     * @param int $agent
     * @param int $target
     * @param int $contact
     * @param string $code_name
     * @param int $mission_type
     * @param string $status
     * @param int $country
     * @param int $hideout
     * @param int $specialisation
     * @param string $start_date
     * @param string $end_date
     */
    public function __construct(int $id_mission, int $agent, int $target, int $contact, string $code_name, int $mission_type, string $status, int $country, int $hideout, int $specialisation, string $start_date, string $end_date)
    {
        $this->id_mission = $id_mission;
        $this->agent = $agent;
        $this->target = $target;
        $this->contact = $contact;
        $this->code_name = $code_name;
        $this->mission_type = $mission_type;
        $this->status = $status;
        $this->country = $country;
        $this->hideout = $hideout;
        $this->specialisation = $specialisation;
        $this->start_date =$start_date;
        $this->end_date = $end_date;
    }


}