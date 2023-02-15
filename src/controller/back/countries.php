<?php

require_once('../../model/entities/Country.php');
require_once ('../../model/repositories/CountryRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new CountryRepo();

//If called by the edit script, controller asks the model to treat updates
try {
    if (!empty($_POST)) {
        if (array_key_exists('action', $_POST) && $_POST['action'] === "edit") {
            $repo->editCell('country');
            exit();
        } elseif (array_key_exists('action', $_POST) && $_POST['action'] === "delete") {
            $repo->deleteRow($_POST);
            echo $repo->error;
            exit();
        } elseif (array_key_exists('action', $_POST) && $_POST['action'] === "insert") {
            $repo->insertCountry($_POST) ;
            echo $repo->error;
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

//We get the table content and data(columns, title, edit script) and make it available to the view
$table = $repo->readCountries();
$data = $repo->getTableData();

//we build the view
require_once('../../templates/back/panel.php');

