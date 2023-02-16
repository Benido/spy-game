$(function edit(){
    $('#hideout').Tabledit({
        eventType: 'dblclick',
        editButton: false,
        columns: {
            identifier: [0, 'id_hideout'],
            editable: [
                [1, 'address'],
                [2, 'country', '{"1": "1", "2": "2","3": "3"}'],
                [3, 'type']
            ]
        },
        hideIdentifier: false,
        url: '../../controller/back/hideouts.php'
    });

    $('#hideout_form').on('submit', function (event){
        event.preventDefault();
        let formData = $(this).serialize();
        alert(formData);
        let posting = $.post( '../../controller/back/hideouts.php', formData);
        posting.done(function(data) {
            let newData =$(data).find('#hideout').html()
            $('#hideout_form').find('input[type=text]').val('')
            $('#hideout').html(newData)
            edit();
            $('#insertModal').modal('hide');
        })
    })
});