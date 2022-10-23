<?php

function edit (string $table) {

    include_once('../../model/CRUD.php');

    session_start();

    $input = filter_input_array(INPUT_POST);

    if ($input['action'] == 'edit') {
        $update_field = [];
        //We drop the id and action keys so we iterate only on the editable columns
        array_pop($input);
        foreach (array_slice($input, 1) as $column => $value){
            $update_field = [$column, trim($value)];
        }
        if ($update_field && $input['id_'. $table]) {
            $db = new CRUD();
            $db->update($table, $update_field[0], $update_field[1], 'id_'.$table, (int)($input['id_'.$table]));
            echo var_dump($db->error );
            echo '<br>';
            echo var_dump($update_field);
            $_SESSION['error'] = $db->error;
        }
    }
}