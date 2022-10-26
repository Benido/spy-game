$(function(){
    $('#contact').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_contact'],
            editable: [
                [1, 'person']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/contacts.php'
    });
});