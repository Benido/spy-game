$(function(){
    $('#contact').Tabledit({
        deleteButton: false,
        editButton: false,
        columns: {
            identifier: [0, 'id_contact'],
            editable: [
                [1, 'person']
            ]
        },
        hideIdentifier: false,
        url: '../../model/forms/contactsEdit.php'
    });
});