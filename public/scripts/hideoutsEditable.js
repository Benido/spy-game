$(function(){
    $('#hideout').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_hideout'],
            editable: [
                [1, 'address'],
                [2, 'country', '{"1": "1", "2": "2","3": "3"}'],
                [3, 'type']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/hideouts.php'
    });
});