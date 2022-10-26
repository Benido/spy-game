<?php

require_once('../../model/entities/MissionType.php');
require_once('../../model/repositories/MissionTypeRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new MissionTypeRepo();

//If called by the edit script, controller asks the model to treat updates
if (!empty($_POST)) {
    $repo->editCell('mission_type');};

//We get the table content and data(columns, title, edit script) and make it available to the view
$table = $repo->readMissionTypes();
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');
