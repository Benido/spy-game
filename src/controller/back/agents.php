<?php

require_once('../../model/entities/Agent.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$table = $db->read('SELECT * FROM agent');
foreach ($table as $i => $agent) {
    $table[$i] = new Agent(...$agent);
}

$properties = Agent::iterateProperties();
$tableName = 'agent';
$title = 'Agents';
$script = 'agentsEditable.js';


require_once('../../templates/back/panel.php');