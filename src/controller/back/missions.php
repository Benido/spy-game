<?php

require_once('../../model/entities/Mission.php');
require_once('../../model/repositories/MissionRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new MissionRepo();

//If called by the edit script, controller asks the model to treat updates
if (!empty($_POST)) {
    $repo->editCell('missions');};

//We get the table content and data(columns, title, edit script) and make it available to the view
$table = $repo->readMissions();
$data = $repo->getTableData();


require_once('../../templates/back/panel.php');

