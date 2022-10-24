<?php

require_once('../../model/entities/Target.php');
require_once('../../model/repositories/TargetRepo.php');
session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new TargetRepo();

$table = $repo->readTargets();
$data = $repo->getTableData();


require_once('../../templates/back/panel.php');