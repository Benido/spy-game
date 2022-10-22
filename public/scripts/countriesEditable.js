$(function(){
    $('#countries').Tabledit({
        deleteButton: false,
        editButton: false,
        columns: {
            identifier: [0, 'id_country'],
            editable: [
                [1, 'name']
            ]
        },
        hideIdentifier: false,
        url: '../../model/forms/countriesEdit.php'
    });
});