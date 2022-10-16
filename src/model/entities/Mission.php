<?php

class Mission
{
    private int $idMission;
    private Agent $agent;
    private Target $target;
    private Contact $contact;
    private string $codeName;
    private string $status;
    private Country $country;
    private Hideout $hideout;
    private Specialisation $specialisation;
    private DateTime $startDate;
    private DateTime $endDate;
    private MissionType $missionType;

    /**
     * @param int $idMission
     * @param Agent $agent
     * @param Target $target
     * @param Contact $contact
     * @param string $codeName
     * @param string $status
     * @param Country $country
     * @param Hideout $hideout
     * @param Specialisation $specialisation
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @param MissionType $missionType
     */
    public function __construct(int $idMission, Agent $agent, Target $target, Contact $contact, string $codeName, string $status, Country $country, Hideout $hideout, Specialisation $specialisation, DateTime $startDate, DateTime $endDate, MissionType $missionType)
    {
        $this->idMission = $idMission;
        $this->agent = $agent;
        $this->target = $target;
        $this->contact = $contact;
        $this->codeName = $codeName;
        $this->status = $status;
        $this->country = $country;
        $this->hideout = $hideout;
        $this->specialisation = $specialisation;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->missionType = $missionType;
    }

    /**
     * @return int
     */
    public function getIdMission(): int
    {
        return $this->idMission;
    }

    /**
     * @param int $idMission
     */
    public function setIdMission(int $idMission): void
    {
        $this->idMission = $idMission;
    }

    /**
     * @return Agent
     */
    public function getAgent(): Agent
    {
        return $this->agent;
    }

    /**
     * @param Agent $agent
     */
    public function setAgent(Agent $agent): void
    {
        $this->agent = $agent;
    }

    /**
     * @return Target
     */
    public function getTarget(): Target
    {
        return $this->target;
    }

    /**
     * @param Target $target
     */
    public function setTarget(Target $target): void
    {
        $this->target = $target;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact(Contact $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @return string
     */
    public function getCodeName(): string
    {
        return $this->codeName;
    }

    /**
     * @param string $codeName
     */
    public function setCodeName(string $codeName): void
    {
        $this->codeName = $codeName;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @param Country $country
     */
    public function setCountry(Country $country): void
    {
        $this->country = $country;
    }

    /**
     * @return Hideout
     */
    public function getHideout(): Hideout
    {
        return $this->hideout;
    }

    /**
     * @param Hideout $hideout
     */
    public function setHideout(Hideout $hideout): void
    {
        $this->hideout = $hideout;
    }

    /**
     * @return Specialisation
     */
    public function getSpecialisation(): Specialisation
    {
        return $this->specialisation;
    }

    /**
     * @param Specialisation $specialisation
     */
    public function setSpecialisation(Specialisation $specialisation): void
    {
        $this->specialisation = $specialisation;
    }

    /**
     * @return DateTime
     */
    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    /**
     * @param DateTime $startDate
     */
    public function setStartDate(DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return DateTime
     */
    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    /**
     * @param DateTime $endDate
     */
    public function setEndDate(DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return MissionType
     */
    public function getMissionType(): MissionType
    {
        return $this->missionType;
    }

    /**
     * @param MissionType $missionType
     */
    public function setMissionType(MissionType $missionType): void
    {
        $this->missionType = $missionType;
    }
}