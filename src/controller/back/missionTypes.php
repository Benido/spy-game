<?php

require_once('../../model/entities/MissionType.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$missionTypes = $db->read('SELECT * FROM mission_type');
foreach ($missionTypes as $i => $missionType) {
    $missionTypes[$i] = new MissionType(...$missionType);
}
$table = 'missionTypeTable.php';
$script = 'missionTypesEditable.js';
$error = $db->error;

require_once('../../templates/back/panel.php');
