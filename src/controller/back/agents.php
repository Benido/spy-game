<?php

require_once('../../model/entities/Agent.php');
require_once('../../model/repositories/AgentRepo.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$repo = new AgentRepo();

$table = $repo->readAgents();
$data = $repo->getTableData();


require_once('../../templates/back/panel.php');