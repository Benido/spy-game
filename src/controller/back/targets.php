<?php

require_once('../../model/entities/Target.php');
require_once('../../model/repositories/TargetRepo.php');
session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new TargetRepo();

//If called by the edit script, controller asks the model to treat updates
if (!empty($_POST)) {
    $repo->editCell('target');};

//We get the table content and data(columns, title, edit script) and make it available to the view
$table = $repo->readTargets();
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');