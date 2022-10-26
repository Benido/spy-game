$(function(){
    $('#country').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_country'],
            editable: [
                [1, 'name']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/countries.php'
    });
});