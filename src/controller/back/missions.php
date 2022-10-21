<?php

require_once('../../model/entities/Mission.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$missions = $db->read('SELECT * FROM mission');
foreach ($missions as $i => $mission) {
    $missions[$i] = new Mission(...$mission);
}
$table = 'missionTable.php';
$script = 'missionsEditable.js';
$error = $db->error;

$sesserror = $_SESSION['error'];

echo "<p> $sesserror </p>";
require_once('../../templates/back/panel.php');

