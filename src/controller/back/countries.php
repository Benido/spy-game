<?php

require_once('../../model/entities/Country.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$countries = $db->read('SELECT * FROM country');
foreach ($countries as $i => $country) {
    $countries[$i] = new Country(...$country);
}
$table = 'countryTable.php';
$script = 'countriesEditable.js';
$error = $db->error;

require_once('../../templates/back/panel.php');