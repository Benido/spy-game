$(function(){
    $('#agent').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_agent'],
            editable: [
                [1, 'person'],
                [2, 'specialisation']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/agents.php'
    });
});