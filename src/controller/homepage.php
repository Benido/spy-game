<?php

require_once ('../src/model/GetData.php');

function Homepage ($pdo) {

    $query = "SELECT 
                id_mission AS id, 
                agent,
                target AS cible, 
                contact,
                code_name AS 'nom de code',
                status, 
                country AS pays,
                hideout AS planque,
                specialisation, 
                start_date AS 'date de début',
                end_date AS 'date de fin'
                FROM 'mission'";
    $data = getTable($pdo);
    require ('../src/view/table.php');
}
