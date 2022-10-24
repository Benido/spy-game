<?php

require_once('../../model/entities/Contact.php');
require_once('../../model/repositories/ContactRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new ContactRepo();

$table = $repo->readContacts();
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');