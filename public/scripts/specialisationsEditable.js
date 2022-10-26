$(function(){
    $('#specialisation').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_specialisation'],
            editable: [
                [1, 'title'],
                [2, 'description']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/specialisations.php'
    });
});