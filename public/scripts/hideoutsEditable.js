$(function(){
    $('#hideout').Tabledit({
        deleteButton: false,
        editButton: false,
        columns: {
            identifier: [0, 'id_hideout'],
            editable: [
                [1, 'address'],
                [2, 'country'],
                [3, 'type']
            ]
        },
        hideIdentifier: false,
        url: '../../model/forms/hideoutsEdit.php'
    });
});