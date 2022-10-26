<?php

require_once('../../model/entities/Nationality.php');
require_once('../../model/repositories/NationalityRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new NationalityRepo();

//If called by the edit script, controller asks the model to treat updates
if (!empty($_POST)) {
    $repo->editCell('nationality');};

//We get the table content and data(columns, title, edit script) and make it available to the view
$table = $repo->readNationalities();
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');
