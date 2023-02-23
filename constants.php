<?php

const MISSIONS_SQL = "SELECT 
                id_mission AS id, 
                code_name AS 'nom de code',       
                CONCAT(person_agent.first_name, ' ', person_agent.last_name) AS agent,
                country.name AS pays,
                specialisation.title AS specialisation, 
                start_date AS 'date de début',
                status 
                FROM spy_database.mission
                INNER JOIN spy_database.country ON mission.country = country.id_country
                INNER JOIN spy_database.specialisation ON mission.specialisation = specialisation.id_specialisation
                INNER JOIN spy_database.agent ON mission.agent = agent.id_agent
                INNER JOIN spy_database.person AS person_agent ON agent.person = person_agent.id_person 
                ";

const MISSION_DETAIL_PRETTY_SQL = "SELECT 
                id_mission AS id, 
                CONCAT(person_agent.first_name, ' ', person_agent.last_name) AS agent,
                CONCAT(person_target.first_name, ' ', person_target.last_name) AS cible, 
                CONCAT(person_contact.first_name, ' ', person_contact.last_name) AS contact,
                code_name AS 'nom de code',
                mission_type.title AS 'type de mission',
                status, 
                country.name AS pays,
                hideout.address AS planque,
                hideout.type AS 'type de planque',
                specialisation.title AS specialisation, 
                start_date AS 'date de début',
                end_date AS 'date de fin'
                FROM spy_database.mission
                INNER JOIN spy_database.mission_type ON mission.mission_type = mission_type.id_mission_type    
                INNER JOIN spy_database.country ON mission.country = country.id_country
                INNER JOIN spy_database.hideout ON mission.hideout = hideout.id_hideout
                INNER JOIN spy_database.specialisation ON mission.specialisation = specialisation.id_specialisation
                INNER JOIN spy_database.agent ON mission.agent = agent.id_agent
                INNER JOIN spy_database.target ON mission.target = target.id_target
                INNER JOIN spy_database.contact ON mission.contact = contact.id_contact    
                INNER JOIN spy_database.person AS person_agent ON agent.person = person_agent.id_person 
                INNER JOIN spy_database.person AS person_target ON target.person = person_target.id_person
                INNER JOIN spy_database.person AS person_contact ON contact.person = person_contact.id_person
                WHERE id_mission = " ;

const BACKEND_MISSION_SQL = "SELECT 
                id_mission AS id, 
                CONCAT(person_agent.first_name, ' ', person_agent.last_name),
                CONCAT(person_target.first_name, ' ', person_target.last_name), 
                CONCAT(person_contact.first_name, ' ', person_contact.last_name),
                code_name,
                mission_type.title,
                status, 
                country.name,
                hideout.address,
                hideout.type,
                specialisation.title, 
                start_date,
                end_date
                FROM spy_database.mission
                INNER JOIN spy_database.mission_type ON mission.mission_type = mission_type.id_mission_type    
                INNER JOIN spy_database.country ON mission.country = country.id_country
                INNER JOIN spy_database.hideout ON mission.hideout = hideout.id_hideout
                INNER JOIN spy_database.specialisation ON mission.specialisation = specialisation.id_specialisation
                INNER JOIN spy_database.agent ON mission.agent = agent.id_agent
                INNER JOIN spy_database.target ON mission.target = target.id_target
                INNER JOIN spy_database.contact ON mission.contact = contact.id_contact    
                INNER JOIN spy_database.person AS person_agent ON agent.person = person_agent.id_person 
                INNER JOIN spy_database.person AS person_target ON target.person = person_target.id_person
                INNER JOIN spy_database.person AS person_contact ON contact.person = person_contact.id_person";