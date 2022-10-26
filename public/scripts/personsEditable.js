$(function(){
    $('#person').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_person'],
            editable: [
                [1, 'identification_code'],
                [2, 'first_name'],
                [3, 'last_name'],
                [4, 'birth_date'],
                [5, 'nationality']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/persons.php'
    });
});