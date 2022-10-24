<?php

require_once('../../model/entities/Nationality.php');
require_once('../../model/repositories/NationalityRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new NationalityRepo();

$table = $repo->readNationalities();
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');
