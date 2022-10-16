<?php


function getTable(PDO $pdo) : Array
{
    //ajouter une vérification sur l'existence de la table ?

    $stmt = $pdo->query("SELECT 
                id_mission AS id, 
                CONCAT(person_agent.first_name, ' ', person_agent.last_name) AS agent,
                CONCAT(person_target.first_name, ' ', person_target.last_name) AS cible, 
                CONCAT(person_contact.first_name, ' ', person_contact.last_name) AS contact,
                code_name AS 'nom de code',
                status, 
                country.name AS pays,
                hideout.address AS planque,
                hideout.type AS 'type de planque',
                specialisation.title AS specialisation, 
                start_date AS 'date de début',
                end_date AS 'date de fin'
                FROM spy_database.mission
                INNER JOIN spy_database.country ON mission.country = country.id_country
                INNER JOIN spy_database.hideout ON mission.hideout = hideout.id_hideout
                INNER JOIN spy_database.specialisation ON mission.specialisation = specialisation.id_specialisation
                INNER JOIN spy_database.agent ON mission.agent = agent.id_agent
                INNER JOIN spy_database.target ON mission.target = target.id_target
                INNER JOIN spy_database.contact ON mission.contact = contact.id_contact    
                INNER JOIN spy_database.person AS person_agent ON agent.person = person_agent.id_person 
                INNER JOIN spy_database.person AS person_target ON target.person = person_target.id_person
                INNER JOIN spy_database.person AS person_contact ON contact.person = person_contact.id_person  
                ");
    $data = [];
    while ($tuple = $stmt->fetchObject()) {
        $data[] = $tuple;
    }
    return $data;
   // require_once('../src/view/table.php');
}

function getTuple()
{

}