<?php
include_once('../../model/CRUD.php');

session_start();

$input = filter_input_array(INPUT_POST);

if ($input['action'] == 'edit') {
    $update_field = [];
    if (isset($input['agent'])) {
        $update_field = ['agent', trim($input['agent'])];
    } else if (isset($input['target'])) {
        $update_field = ['target', trim($input['target'])];
    } else if (isset($input['contact'])) {
        $update_field = ['contact', trim($input['contact'])];
    } else if (isset($input['code_name'])) {
        $update_field = ['code_name', trim($input['code_name'])];
    } else if (isset($input['mission_type'])) {
        $update_field = ['mission_type', trim($input['mission_type'])];
    } else if (isset($input['status'])) {
        $update_field = ['status', trim($input['status'])];
    } else if (isset($input['country'])) {
        $update_field = ['country', trim($input['country'])];
    } else if (isset($input['hideout'])) {
        $update_field = ['hideout', trim($input['hideout'])];
    } else if (isset($input['specialisation'])) {
        $update_field = ['specialisation', trim($input['specialisation'])];
    } else if (isset($input['start_date'])) {
        $update_field = ['start_date', trim($input['start_date'])];
    } else if (isset($input['end_date'])) {
        $update_field = ['end_date', trim($input['end_date'])];
    }
    if ($update_field && $input['id_mission']) {
        $db = new CRUD();
        $db->update('mission', $update_field[0], $update_field[1], 'id_mission', (int) ($input['id_mission']));
        echo("<script>alert('PHP:' . var_dump($db->error );</script>");
        $_SESSION['error']= $db->error;
    }
}