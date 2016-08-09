$('.user').on('click', function(event) {
    event.preventDefault();

    var userAttributes = event.target.childNodes;
    $('#user-id').val(userAttributes[1].textContent);
    $('#user-id').val(userAttributes[2].textContent);
    $('#dynamic-modal-dlg').modal();
});
