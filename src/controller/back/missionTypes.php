<?php

require_once('../../model/entities/MissionType.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$table = $db->read('SELECT * FROM mission_type');
foreach ($table as $i => $missionType) {
    $table[$i] = new MissionType(...$missionType);
}

$properties = MissionType::iterateProperties();
$tableName = 'mission_type';
$title = 'Types de mission';
$script = 'missionTypesEditable.js';

require_once('../../templates/back/panel.php');
