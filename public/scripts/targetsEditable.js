$(function(){
    $('#target').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_target'],
            editable: [
                [1, 'person']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/targets.php'
    });
});