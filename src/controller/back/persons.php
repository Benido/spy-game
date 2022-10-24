<?php

require_once('../../model/entities/Person.php');
require_once('../../model/repositories/PersonRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new PersonRepo();

$table = $repo->readPersons();
$data = $repo->getTableData();


require_once('../../templates/back/panel.php');
