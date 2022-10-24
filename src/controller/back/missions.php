<?php

require_once('../../model/entities/Mission.php');
require_once('../../model/repositories/MissionRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new MissionRepo();

$table = $repo->readMissions();
$data = $repo->getTableData();


require_once('../../templates/back/panel.php');

