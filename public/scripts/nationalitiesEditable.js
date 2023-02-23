//Apply the Tabledit function to the table
$(function edit(){
    $('#nationality').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_nationality'],
            editable: [
                [1, 'name'],
                [2, 'country']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/nationalities.php'
    });

    //Send form data to server and update table with new data
    $('#nationality_form').on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        let posting = $.post( '../../controller/back/nationalities.php', formData);
        posting.done(function(data) {
            let newData =$(data).find('#nationality').html()
            $('#nationality_form').find('input[type=text]').val('')
            $('#nationality').html(newData)
            edit();
            $('#insertModal').modal('hide');
        })
    })

});