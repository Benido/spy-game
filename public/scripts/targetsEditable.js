//Apply the Tabledit function to the table
$(function edit(){
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

    //Send form data to server and update table with new data
    $('#target_form').on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        let posting = $.post( '../../controller/back/targets.php', formData);
        posting.done(function(data) {
            let newData =$(data).find('#target').html()
            $('#target_form').find('input[type=text]').val('')
            $('#target').html(newData)
            edit();
            $('#insertModal').modal('hide');
        })
    })
});