<?php
include_once('../../model/CRUD.php');

session_start();

$input = filter_input_array(INPUT_POST);

if ($input['action'] == 'edit') {
    $update_field = [];
    if (isset($input['title'])) {
        $update_field = ['title', trim($input['title'])];
    } else if (isset($input['description'])) {
        $update_field = ['description', trim($input['description'])];
    }
    if ($update_field && $input['id_mission_type']) {
        $db = new CRUD();
        $db->update('mission_type', $update_field[0], $update_field[1], 'id_mission_type', (int) ($input['id_mission_type']));
        echo('PHP:' . var_dump($input));
        $_SESSION['error']= $db->error;
    }
}
