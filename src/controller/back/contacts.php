<?php

require_once('../../model/entities/Contact.php');
require_once ('../../model/CRUD.php');

session_start();

if(!isset($_SESSION["username"])) {
    header("Location: ../front/login.php");
    exit();
}
$db = new CRUD();

$table = $db->read('SELECT * FROM contact');
foreach ($table as $i => $contact) {
    $table[$i] = new Contact(...$contact);
}

$properties = Contact::iterateProperties();
$tableName = 'contact';
$title = 'Contacts';
$script = 'contactsEditable.js';


require_once('../../templates/back/panel.php');