use spy_database;

insert into country (id_country, name) values (1, 'France');
insert into country (id_country, name) values (2, 'Angleterre');
insert into country (id_country, name) values (3, 'Espagne');

insert into nationality (id_nationality, name, country) values (1, 'français', 1);
insert into nationality (id_nationality, name, country) values (2, 'anglais', 2);
insert into nationality (id_nationality, name, country) values (3, 'espagnol', 3);

insert into person (id_person, identification_code, first_name, last_name, birth_date, nationality) values (1, 372, 'Gaïa', 'Martinelli', '1951-10-05', 1);
insert into person (id_person, identification_code, first_name, last_name, birth_date, nationality) values (2, 533, 'Almérinda', 'Puller', '1978-12-17', 2);
insert into person (id_person, identification_code, first_name, last_name, birth_date, nationality) values (3, 783, 'Pò', 'Westhead', '1965-04-20', 3);
insert into person (id_person, identification_code, first_name, last_name, birth_date, nationality) values (4, 112, 'James', 'Bond', '1986-08-22', 1);
insert into person (id_person, identification_code, first_name, last_name, birth_date, nationality) values (5, 980, 'Austin', 'Powers', '1960-11-11', 2);
insert into person (id_person, identification_code, first_name, last_name, birth_date, nationality) values (6, 285, 'El', 'Capitan', '1978-05-21', 3);

insert into specialisation (id_specialisation, title, description) values (1, 'dictumst', 'sem praesent id massa id nisl venenatis');
insert into specialisation (id_specialisation, title, description) values (2, 'lorem', 'sed nisl nunc rhoncus dui vel sem sed sagittis nam');
insert into specialisation (id_specialisation, title, description) values (3, 'primis', 'blandit non interdum in ante vestibulum ante');

insert into agent (id_agent, person, specialisation) values (1, 1, 1);
insert into agent (id_agent, person, specialisation) values (2, 5, 2);

insert into target (id_target, person) values (1, 2);
insert into target (id_target, person) values (2, 4);

insert into contact (id_contact, person) values (1, 3);
insert into contact (id_contact, person) values (2, 6);

insert into hideout (id_hideout, address, country, type) values (1, '442 Lillian Trail', 1, 'mollis molestie lorem');
insert into hideout (id_hideout, address, country, type) values (2, '7 Oxford Center', 2, 'ut massa quis');
insert into hideout (id_hideout, address, country, type) values (3, '0598 Hudson Lane', 3, 'augue');

insert into mission_type (id_mission_type, title, description) values (1, 'eu', 'sed tincidunt eu felis fusce posuere felis sed lacus morbi');
insert into mission_type (id_mission_type, title, description) values (2, 'nunc', 'congue diam id ornare imperdiet sapien urna pretium nisl ut volutpat sapien arcu sed');
insert into mission_type (id_mission_type, title, description) values (3, 'nulla', 'ligula pellentesque ultrices phasellus id sapien in sapien iaculis congue vivamus metus arcu adipiscing molestie');

insert into mission (id_mission, agent, target, contact, code_name, mission_type, status, country, hideout, specialisation, start_date, end_date) values (1, 1, 1, 1, 'nunc commodo', 'porta',2, 3, 3, 1,'2023-07-17', '2022-12-12');
insert into mission (id_mission, agent, target, contact, code_name, mission_type, status, country, hideout, specialisation, start_date, end_date) values (2, 2, 2, 2, 'corbeau chatoyant', 'porta',1, 3, 3, 2,'2023-07-17', '2022-12-12');

