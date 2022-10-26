<?php

require_once('../../model/entities/Contact.php');
require_once('../../model/repositories/ContactRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new ContactRepo();

//If called by the edit script, controller asks the model to treat updates
if (!empty($_POST)) {
    $repo->editCell('contact');};

//We get the table content and data(columns, title, edit script) and make it available to the view
$table = $repo->readContacts();
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');