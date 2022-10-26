$(function(){
    $('#mission').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_mission'],
            editable: [
                [1, 'agent'],
                [2, 'target'],
                [3, 'contact'],
                [4, 'code_name'],
                [5, 'mission_type'],
                [6, 'status'],
                [7, 'country'],
                [8, 'hideout'],
                [9, 'specialisation'],
                [10, 'start_date'],
                [11, 'end_date'],
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/missions.php'
    });
});