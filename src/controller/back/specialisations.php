<?php

require_once('../../model/entities/Specialisation.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$table = $db->read('SELECT * FROM specialisation');
foreach ($table as $i => $specialisation) {
    $table[$i] = new specialisation(...$specialisation);
}
$properties = Specialisation::iterateProperties();
$tableName = 'specialisation';
$title = 'Spécialisation';
$script = 'specialisationEditable.js';

require_once('../../templates/back/panel.php');
