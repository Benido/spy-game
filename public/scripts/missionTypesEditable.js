$(function(){
    $('#mission_type').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_mission_type'],
            editable: [
                [1, 'title'],
                [2, 'description']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/missionTypes.php'
    });
});