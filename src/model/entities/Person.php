<?php
require_once ('../../model/iterateTrait.php');
require_once 'Nationality.php';

class Person
{
    use iterateTrait;

    private int $id_person;
    private int $identification_code;
    private string $first_name;
    private string $last_name;
    private string $birth_date;
    private int $nationality;

    /**
     * @param int $id_person
     * @param int $identification_code
     * @param string $first_name
     * @param string $last_name
     * @param string $birth_date
     * @param int $nationality
     */
    public function __construct(int $id_person, int $identification_code, string $first_name, string $last_name, string $birth_date, int $nationality)
    {
        $this->id_person = $id_person;
        $this->identification_code = $identification_code;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->birth_date = $birth_date;
        $this->nationality = $nationality;
    }
}