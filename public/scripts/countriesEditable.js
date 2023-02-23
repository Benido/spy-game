//Apply the Tabledit function to the table
$(function edit(){
    $('#country').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_country'],
            editable: [
                [1, 'name']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/countries.php'
    });

    //Send form data to server and update table with new data
    $('#country_form').on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        let posting = $.post( '../../controller/back/countries.php', formData);
        posting.done(function(data) {
            let newData =$(data).find('#country').html()
            $('#country_form').find('input[type=text]').val('')
            $('#country').html(newData)
            edit();
            $('#insertModal').modal('hide');
        })
    })
});


