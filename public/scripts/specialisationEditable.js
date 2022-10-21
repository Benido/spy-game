$(function(){
    $('#specialisations').Tabledit({
        deleteButton: false,
        editButton: false,
        columns: {
            identifier: [0, 'id_specialisation'],
            editable: [
                [1, 'title'],
                [2, 'description']
            ]
        },
        hideIdentifier: false,
        url: '../../model/forms/specialisationsEdit.php'
    });
});