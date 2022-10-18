<?php

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'mission') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                require_once('src/controller/front/missionDetail.php');
            } else {
                throw new Exception('Erreur : aucun identifiant de mission n\'a été envoyé');
            }
        } else {
            throw new Exception('Erreur 404 : la page que vous recherchez n\'existe pas');
        }
    } else {
        require_once('src/controller/front/homepage.php');
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require_once('src/templates/errorPage.php');
}