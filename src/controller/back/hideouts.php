<?php

require_once('../../model/entities/Hideout.php');
require_once('../../model/repositories/HideoutRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new HideoutRepo();

$table = $repo->readHideouts();

//We prepare the data used in the view
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');