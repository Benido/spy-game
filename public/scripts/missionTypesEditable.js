$(function(){
    $('#mission_type').Tabledit({
        eventType: 'dblclick',
        deleteButton: false,
        editButton: false,
        columns: {
            identifier: [0, 'id_mission_type'],
            editable: [
                [1, 'title'],
                [2, 'description']
            ]
        },
        hideIdentifier: false,
        url: '../../model/forms/missionTypesEdit.php'
    });
});