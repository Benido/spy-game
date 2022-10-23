<?php

require_once('../../model/entities/Hideout.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$table = $db->read('SELECT * FROM hideout');
foreach ($table as $i => $hideout) {
    $table[$i] = new Hideout(...$hideout);
}

//We prepare the data used in the view
$properties = Hideout::iterateProperties();

$tableName = 'hideout';
$title = 'Planque';
$script = 'hideoutsEditable.js';


require_once('../../templates/back/panel.php');