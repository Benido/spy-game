$(function(){
    $('#agent').Tabledit({
        deleteButton: false,
        editButton: false,
        columns: {
            identifier: [0, 'id_agent'],
            editable: [
                [1, 'person'],
                [2, 'specialisation']
            ]
        },
        hideIdentifier: false,
        url: '../../model/forms/agentsEdit.php'
    });
});