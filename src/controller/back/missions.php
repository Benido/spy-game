<?php

require_once('../../model/entities/Mission.php');
require_once('../../model/repositories/MissionRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new MissionRepo();
$errorMessage = '';

//If called by the edit script, controller asks the model to treat updates
try {
    if (!empty($_POST)) {
        if (array_key_exists('action', $_POST) && $_POST['action'] === "edit") {
            $repo->editCell('mission');
            exit();
        } elseif (array_key_exists('action', $_POST) && $_POST['action'] === "delete") {
            $repo->deleteRow($_POST);
            exit();
        } elseif (array_key_exists('action', $_POST) && $_POST['action'] === "insert") {
            if ($repo->insertMission($_POST)) {
                http_response_code(201);
            } else {
                //echo $repo->error;
            }
        }
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
} finally {

//We get the table content and data(columns, title, edit script) and make it available to the view
$table = $repo->readMissions();
$data = $repo->getTableData();

require_once('../../templates/back/panel.php');
}
