<?php

require_once('../../model/entities/Country.php');
require_once ('../../model/repositories/CountryRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new CountryRepo();

$table = $repo->readCountries();
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');