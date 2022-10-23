<?php

require_once('../../model/entities/Mission.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$table = $db->read('SELECT * FROM mission');
foreach ($table as $i => $mission) {
    $table[$i] = new Mission(...$mission);
}

$properties = Mission::iterateProperties();
$tableName = "mission";
$title = 'Missions';
$script = 'missionsEditable.js';


require_once('../../templates/back/panel.php');

