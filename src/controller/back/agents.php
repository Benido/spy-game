<?php

require_once('../../model/entities/Agent.php');
require_once('../../model/repositories/AgentRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new AgentRepo();

//If called by the edit script, controller asks the model to treat updates
try {
    if (!empty($_POST)) {
        if (array_key_exists('action', $_POST) && $_POST['action'] === "edit") {
            $repo->editCell('agent');
            exit();
        } elseif (array_key_exists('action', $_POST) && $_POST['action'] === "delete") {
            $repo->deleteRow($_POST);
            echo $repo->error;
            exit();
        } elseif (array_key_exists('action', $_POST) && $_POST['action'] === "insert") {
            $repo->insertAgent($_POST) ;
            echo $repo->error;
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

//We get the table content and data(columns, title, edit script) and make it available to the view
$table = $repo->readAgents();
$data = $repo->getTableData();


require_once('../../templates/back/panel.php');