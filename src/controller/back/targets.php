<?php

require_once('../../model/entities/Target.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$table = $db->read('SELECT * FROM target');
foreach ($table as $i => $target) {
    $table[$i] = new Target(...$target);
}

$properties = Target::iterateProperties();
$tableName = 'target';
$title = 'Targets';
$script = 'targetsEditable.js';


require_once('../../templates/back/panel.php');