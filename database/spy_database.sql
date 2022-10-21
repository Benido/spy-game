DROP DATABASE IF EXISTS spy_database;

CREATE DATABASE spy_database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

#-------------------------Tables Creation---------------------------------------
use spy_database;

CREATE TABLE country
(
    id_country INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
) ENGINE = innoDB;

CREATE TABLE nationality
(
    id_nationality INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    country INT UNSIGNED NULL,
    CONSTRAINT fk_nationality_country
        FOREIGN KEY (country) REFERENCES country(id_country)
) ENGINE = innoDB;

CREATE TABLE person
(
    id_person INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
    identification_code INT UNSIGNED NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    birth_date DATE NOT NULL,
    nationality INT UNSIGNED NOT NULL,
    CONSTRAINT fk_person_nationality
        FOREIGN KEY (nationality) REFERENCES nationality(id_nationality)
            ON UPDATE CASCADE

) ENGINE = innoDB;

CREATE TABLE specialisation
(
    id_specialisation INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title   VARCHAR(50) NOT NULL,
    description VARCHAR(200)
) ENGINE = innoDB;

CREATE TABLE agent
(
    id_agent INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    person INT UNSIGNED NOT NULL,
    specialisation INT UNSIGNED NOT NULL,
    CONSTRAINT fk_agent_person
        FOREIGN KEY (person) REFERENCES person(id_person)
            ON UPDATE CASCADE
            ON DELETE CASCADE,
    CONSTRAINT fk_agent_specialisation
        FOREIGN KEY (specialisation) REFERENCES specialisation(id_specialisation)
            ON UPDATE CASCADE
) ENGINE = innoDB;

CREATE TABLE target
(
    id_target INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    person INT UNSIGNED NOT NULL,
    CONSTRAINT fk_target_person
        FOREIGN KEY (person) REFERENCES person(id_person)
            ON UPDATE CASCADE
            ON DELETE CASCADE
) ENGINE = innoDB;

CREATE TABLE contact
(
    id_contact INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    person INT UNSIGNED NOT NULL,
    CONSTRAINT fk_contact_person
        FOREIGN KEY (person) REFERENCES person(id_person)
            ON UPDATE CASCADE
            ON DELETE CASCADE
) ENGINE = innoDB;

CREATE TABLE hideout
(
    id_hideout INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    address VARCHAR(200),
    country INT UNSIGNED NOT NULL,
    type VARCHAR(50),
    CONSTRAINT fk_hideout_country
        FOREIGN KEY (country) REFERENCES country(id_country)
            ON UPDATE CASCADE
            ON DELETE CASCADE
) ENGINE = innoDB;

CREATE TABLE mission_type
(
    id_mission_type INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description VARCHAR(200)
) ENGINE = innoDB;

CREATE TABLE mission
(
    id_mission INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    agent INT UNSIGNED NOT NULL,
    target INT UNSIGNED NOT NULL,
    contact INT UNSIGNED NOT NULL,
    code_name VARCHAR(50) NOT NULL,
    mission_type INT UNSIGNED NOT NULL,
    status VARCHAR(50) NOT NULL,
    country INT UNSIGNED NOT NULL,
    hideout INT UNSIGNED,
    specialisation INT UNSIGNED,
    start_date DATE NOT NULL,
    end_date DATE,
    CONSTRAINT fk_mission_agent
        FOREIGN KEY (agent) REFERENCES agent(id_agent)
            ON UPDATE CASCADE
            ON DELETE CASCADE,
    CONSTRAINT fk_mission_target
        FOREIGN KEY (target) REFERENCES target(id_target)
            ON UPDATE CASCADE
            ON DELETE CASCADE,
    CONSTRAINT fk_mission_contact
        FOREIGN KEY (contact) REFERENCES contact(id_contact)
            ON UPDATE CASCADE
            ON DELETE CASCADE,
    CONSTRAINT fk_mission_mission_type
        FOREIGN KEY (mission_type) REFERENCES mission_type(id_mission_type)
            ON UPDATE CASCADE
            ON DELETE CASCADE,
    CONSTRAINT fk_mission_country
        FOREIGN KEY (country) REFERENCES country(id_country)
            ON UPDATE CASCADE
            ON DELETE CASCADE,
    CONSTRAINT fk_mission_hideout
        FOREIGN KEY (hideout) REFERENCES hideout(id_hideout)
            ON UPDATE CASCADE,
    CONSTRAINT fk_mission_specialisation
        FOREIGN KEY (specialisation) REFERENCES specialisation(id_specialisation)
            ON UPDATE CASCADE
            ON DELETE CASCADE
) ENGINE = innoDB;

#-----------------------Triggers definition------------------------------

DELIMITER $$

CREATE TRIGGER IF NOT EXISTS target_nationality_check
    BEFORE INSERT ON mission FOR EACH ROW
        BEGIN

            DECLARE agent_nationality INT UNSIGNED;
            DECLARE target_nationality INT UNSIGNED;
            DECLARE contact_nationality INT UNSIGNED;
            DECLARE country_nationality INT UNSIGNED;
            DECLARE hideout_location INT UNSIGNED;
            DECLARE agent_specialisation INT UNSIGNED;

            SELECT nationality
            INTO agent_nationality
            FROM person
                     JOIN agent ON id_person = person
            WHERE NEW.agent = agent.id_agent;

            SELECT nationality
            INTO target_nationality
            FROM person
                     JOIN target ON id_person = person
            WHERE NEW.target = target.id_target;

            SELECT nationality
            INTO contact_nationality
            FROM person
                     JOIN contact ON id_person = person
            WHERE NEW.contact = contact.id_contact;

            SELECT id_nationality
            INTO country_nationality
            FROM nationality
            WHERE NEW.country = nationality.country;

            SELECT country
            INTO hideout_location
            FROM hideout
            WHERE NEW.hideout = hideout.id_hideout;

            SELECT specialisation
            INTO agent_specialisation
            FROM agent
            WHERE NEW.agent = agent.id_agent;

#-------------------------Filters---------------------------------------------------------------

            IF agent_nationality = target_nationality THEN
                SIGNAL SQLSTATE '45000' SET
                    MYSQL_ERRNO = 30001,
                    MESSAGE_TEXT = 'La cible ne peut pas être de la même nationalité que l\'agent';
            ELSEIF target_nationality = country_nationality THEN
                 SIGNAL SQLSTATE '45000' SET
                     MYSQL_ERRNO = 30002,
                     MESSAGE_TEXT = 'Le contact doit être de la même nationalité que le pays de la mission';
            ELSEIF NEW.hideout IS NOT NULL && NEW.country != hideout_location THEN
                SIGNAL SQLSTATE '45000' SET
                    MYSQL_ERRNO = 30003,
                    MESSAGE_TEXT = 'La planque doit se trouver dans le même pays que la mission';
            ELSEIF NEW.specialisation != agent_specialisation THEN
                SIGNAL SQLSTATE '45000' SET
                    MYSQL_ERRNO = 30004,
                    MESSAGE_TEXT = 'Les agents doivent présenter la spécialité requise';
            END IF;

        END; $$

DELIMITER ;

#-----------------------Role Creation-------------------------------------

CREATE OR REPLACE ROLE admin;
GRANT ALL ON spy_database TO admin;

CREATE OR REPLACE USER spy_admin IDENTIFIED BY 'temporaryPassword';
GRANT admin to spy_admin;

FLUSH PRIVILEGES;