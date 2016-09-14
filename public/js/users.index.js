function addRow(data) {
    var html = '';

    html += '<tr>';
    html += '<td>' + data.id + '</td>';
    html += '<td>' + data.name + '</td>';
    html += '<td>' + data.email + '</td>';
    html += '<td> Admin</td>';
    html += '<td><span class="label label-success label-mini">Activo</span></td>'
    html += '<td>' +
        '<button href="#" class="btn btn-success btn-xs btn-edit"><i class="fa fa-pencil"></i> Editar</button> ' +
        '<button href="#" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i> Eliminar</button>' +
        '</td>';
    html += '</tr>';

    $('table tbody').append(html);
}

function createUserByAjax(uri, data) {
    $.post(uri, data, function (response) {
        addRow(response);
        alertOverlay('Hecho!', 'Usuario registrado.', 'success');
    }).fail(function () {
        alertOverlay('Error!', 'No se pudo realizar la operación', 'error');
    });
}

function deleteUserByAjax(id, row) {
    var form = $('#destroyForm');
    var url  = form.attr('action').replace(':id', id);

    $.ajax({
        url: url,
        type: 'DELETE',
        data: form.serialize()
    }).done(function (response) {
        swal("Eliminado!", response, "success");
        row.fadeOut();
    }).fail(function () {
        swal("Error!", 'No se pudo procesar la operación solicitada.', "error");
    });
}

function updateUserByAjax() {
    var form = $('#editForm');
    var url  = form.attr('action').replace(':id', form.data('id'));

    $.ajax({
        url: url,
        type: 'PUT',
        data: form.serialize()
    }).done(function (user) {
        swal("Actualizado!", "Los datos fueron guardados con exito.", "success");
        // Update row
        location.reload();

    }).fail(function () {
        swal("Error!", 'No se pudo procesar la operación solicitada.', "error");
    });
}

$('#createForm').submit(function (e) {
    e.preventDefault();
    $('#createModal').modal('hide');
    createUserByAjax($(this).attr('action'), $(this).serialize());
});

$('#editForm').submit(function (e) {
    e.preventDefault();
    $('#editModal').modal('hide');
    updateUserByAjax();
});

$('tbody').on('click', '.btn-delete', function () {
    var row = $(this).parents('tr');
    var id = row.data('id');
    
    alertConfirm("Se eliminará los datos asociados a este usuario.", function (isConfirm) {
        if (isConfirm) {
            deleteUserByAjax(id, row);
        }
    });
});

$('tbody').on('click', '.btn-edit', function () {
    var row = $(this).parents('tr');
    var id = row.data('id');

    $('#editForm').data('id', id);
    $('#editModal').modal('show');
});

$('#createModal').on('show.bs.modal', function () {
    $('#name').val("");
    $('#email').val("");
    $('#password').val("");
});

$('#editModal').on('show.bs.modal', function () {
    $('#nameEdit').val("");
    $('#emailEdit').val("");
    $('#passwordEdit').val("");
});


