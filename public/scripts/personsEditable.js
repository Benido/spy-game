//Apply the Tabledit function to the table
$(function edit (){

    const personForm = $('#person_form');
    const personTableSelector = 'person'
    
    $('#' + personTableSelector).Tabledit({
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
    $(personForm).on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        let posting = $.post( '../../controller/back/persons.php', formData);
        posting.done(function(data) {
            let errorMessage = $(data).find('#formErrorMessage').text()
            if (errorMessage === '') {
                let newData = $(data).find('#' + personTableSelector).html()
                personForm.find('input[type=text]').val('')
                $('#' + personTableSelector).html(newData)
                edit();
                $('#insertModal').modal('hide');
            } else {
                $('#formErrorMessage').text(errorMessage).trigger('focus');
            }
        })
    })
});