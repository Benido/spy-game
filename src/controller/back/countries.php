<?php

require_once('../../model/entities/Country.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$table = $db->read('SELECT * FROM country');
foreach ($table as $i => $country) {
    $table[$i] = new Country(...$country);
}

$properties = Country::iterateProperties();
$tableName = 'country';
$title = 'Pays';
$script = 'countriesEditable.js';


require_once('../../templates/back/panel.php');