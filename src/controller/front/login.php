<?php

namespace app\src\controller\front\login;

use app\src\model\DatabaseConnection\DatabaseConnection;

session_start();

if (!array_key_exists('username', $_SESSION)){
require_once('../../model/DatabaseConnection.php');
$Database = new DatabaseConnection();
$errorMessage = '';

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `user` WHERE username='$username' AND password='" . hash('sha256', $password) . "' LIMIT 1";
    $data = $Database->select($query);
    if (!empty($data)) {
       $_SESSION['username'] = $username;
        header("Location: ../back/panel.php");
    } else {
        $errorMessage = "Le nom d'utilisateur ou le mot de passe est incorrect";
    }
}

require_once('../../templates/front/login.php');
} else {
echo 'Vous êtes déjà connecté. <a href="logout.php"> Vous déconnecter ?</a>';
}