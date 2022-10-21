<?php

require_once('../../model/entities/Specialisation.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$specialisations = $db->read('SELECT * FROM specialisation');
foreach ($specialisations as $i => $specialisation) {
    $specialisations[$i] = new specialisation(...$specialisation);
}
$table = 'specialisationTable.php';
$script = 'specialisationEditable.js';
$error = $db->error;

$sesserror = $_SESSION['error'];

echo "<p> $sesserror </p>";
require_once('../../templates/back/panel.php');
