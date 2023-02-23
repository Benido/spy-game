//Apply the Tabledit function to the table
$(function edit(){
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

    //Send form data to server and update table with new data
    $('#mission_type_form').on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        let posting = $.post( '../../controller/back/missionTypes.php', formData);
        posting.done(function(data) {
            let newData =$(data).find('#mission_type').html()
            $('#mission_type_form').find('input[type=text]').val('')
            $('#mission_type').html(newData)
            edit();
            $('#insertModal').modal('hide');
        })
    })
});