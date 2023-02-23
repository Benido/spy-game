//Apply the Tabledit function to the table
$(function edit(){
    $('#specialisation').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_specialisation'],
            editable: [
                [1, 'title'],
                [2, 'description']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/specialisations.php'
    });

    //Send form data to server and update table with new data
    $('#specialisation_form').on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        let posting = $.post( '../../controller/back/specialisations.php', formData);
        posting.done(function(data) {
            let newData =$(data).find('#specialisation').html()
            $('#specialisation_form').find('input[type=text]').val('')
            $('#specialisation').html(newData)
            edit();
            $('#insertModal').modal('hide');
        })
    })
});