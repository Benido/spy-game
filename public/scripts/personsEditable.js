//Apply the Tabledit function to the table
$(function edit (){
    $('#person').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_person'],
            editable: [
                [1, 'identification_code'],
                [2, 'first_name'],
                [3, 'last_name'],
                [4, 'birth_date'],
                [5, 'nationality']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/persons.php'
    });

    //Send form data to server and update table with new data
    $('#person_form').on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        let posting = $.post( '../../controller/back/persons.php', formData);
        posting.done(function(data) {
            let newData =$(data).find('#person').html()
            $('#person_form').find('input[type=text]').val('')
            $('#person').html(newData)
            edit();
            $('#insertModal').modal('hide');
        })
    })
});