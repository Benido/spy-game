<?php

trait EditCell
{
    function editCell(string $table)
    {
        $input = filter_input_array(INPUT_POST);

        if ($input['action'] == 'edit') {
            $update_field = [];
            //We drop the id and action keys so we iterate only on the editable columns
            array_pop($input);
            foreach (array_slice($input, 1) as $column => $value) {
                $update_field = [$column, trim($value)];
            }
            if ($update_field && $input['id_' . $table]) {
                try {
                parent::update($table, $update_field[0], $update_field[1], 'id_' . $table, (int)($input['id_' . $table]));
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                echo var_dump($update_field) ?? '';
            }
        }
    }
}