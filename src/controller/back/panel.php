<?php

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}

$greeter= 'Bienvenue '.$_SESSION["username"];
require_once('../../templates/back/panel.php');