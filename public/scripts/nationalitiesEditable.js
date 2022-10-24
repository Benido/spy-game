$(function(){
    $('#nationality').Tabledit({
        eventType: 'dblclick',
        deleteButton: false,
        editButton: false,
        columns: {
            identifier: [0, 'id_nationality'],
            editable: [
                [1, 'name'],
                [2, 'country']
            ]
        },
        hideIdentifier: false,
        url: '../../model/forms/nationalitiesEdit.php'
    });
});