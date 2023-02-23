//Apply the Tabledit function to the table
$(function edit(){
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

    //Send form data to server and update table with new data
    $('#agent_form').on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        let posting = $.post( '../../controller/back/agents.php', formData);
        posting.done(function(data) {
            let newData =$(data).find('#agent').html()
            $('#agent_form').find('input[type=text]').val('')
            $('#agent').html(newData)
            edit();
            $('#insertModal').modal('hide');
        })
    })
});