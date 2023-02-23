//Apply the Tabledit function to the table
$(function edit(){
    
    const missionForm = $('#mission_form');
    const missionTableSelector = 'mission'
    
    $('#' + missionTableSelector).Tabledit({
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
  
    //Send form data to server and update table with new data
    missionForm.on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        let posting = $.post( '../../controller/back/missions.php', formData);
        posting.done(function(data) {
            let errorMessage = $(data).find('#formErrorMessage').text()
            if (errorMessage === '') {
                let newData = $(data).find('#' + missionTableSelector).html()
                missionForm.find('input[type=text]').val('')
                $('#' + missionTableSelector).html(newData)
                edit();
                $('#insertModal').modal('hide');
            } else {
                $('#formErrorMessage').text(errorMessage).trigger('focus');
            }
        })
    })
});

