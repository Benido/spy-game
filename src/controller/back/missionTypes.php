<?php

require_once('../../model/entities/MissionType.php');
require_once('../../model/repositories/MissionTypeRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new MissionTypeRepo();

$table = $repo->readMissionTypes();
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');
