<?php

require_once('../../model/entities/Specialisation.php');
require_once('../../model/repositories/SpecialisationRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new SpecialisationRepo();

$table = $repo->readSpecialisations();
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');
