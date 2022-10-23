<?php

require_once('../../model/entities/Nationality.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$table = $db->read('SELECT * FROM nationality');
foreach ($table as $i => $nationality) {
    $table[$i] = new Nationality(...$nationality);
}
$properties = Nationality::iterateProperties();
$tableName = 'nationality';
$title = "Nationalité";
$script = 'nationalitiesEditable.js';

require_once('../../templates/back/panel.php');
