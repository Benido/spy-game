$(function(){
    $('#taret').Tabledit({
        deleteButton: false,
        editButton: false,
        columns: {
            identifier: [0, 'id_target'],
            editable: [
                [1, 'person']
            ]
        },
        hideIdentifier: false,
        url: '../../model/forms/targetsEdit.php'
    });
});