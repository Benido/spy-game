//Apply the Tabledit function to the table
$(function edit(){
    $('#contact').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_contact'],
            editable: [
                [1, 'person']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/contacts.php'
    });

    //Send form data to server and update table with new data
    $('#contact_form').on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        let posting = $.post( '../../controller/back/contacts.php', formData);
        posting.done(function(data) {
            let newData =$(data).find('#contact').html()
            $('#contact_form').find('input[type=text]').val('')
            $('#contact').html(newData)
            edit();
            $('#insertModal').modal('hide');
        })
    })
    
});