<?php

require_once('../src/controller/homepage.php');
require_once('../src/controller/missionDetail.php');

try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=spy_database;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    exit('Erreur : ' . $e->getMessage());
}

if (isset($_GET['action']) && $_GET['action'] !== '') {
    if ($_GET['action'] === 'mission') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $identifier = $_GET['id'];

            mission($identifier);
        } else {
            echo 'Erreur : aucun identifiant de billet envoyé';

            die;
        }
    } else {
        echo "Erreur 404 : la page que vous recherchez n'existe pas.";
    }
} else {
    homepage($pdo);
}