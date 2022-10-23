<?php

require_once('../../model/entities/Person.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$table = $db->read('SELECT * FROM person');
foreach ($table as $i => $person) {
    $table[$i] = new Person(...$person);
}

$properties = Person::iterateProperties();
$tableName = "person";
$title = 'Personnes';
$script = 'personsEditable.js';


require_once('../../templates/back/panel.php');
