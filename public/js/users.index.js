function addRow(data) {
    var html = '';
    var status="";
    if(data.status == 1){status = "Activo";}
    if(data.status == 0){status = "Inactivo";}

    html += '<tr>';
    html += '<td>' + data.id + '</td>';
    html += '<td>' + data.name + '</td>';
    html += '<td>' + data.email + '</td>';
    html += '<td>' + data.type + '</td>';
    html += '<td><span class="label label-success label-mini">'+ status +'</span></td>'
    html += '<td>' +
        '<button href="#" class="btn btn-success btn-xs btn-edit"><i class="fa fa-pencil"></i> Editar</button> ' +
        '<button href="#" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i> Eliminar</button>' +
        '</td>';
    html += '</tr>';

    $('table tbody').append(html);
}

function createUserByAjax(uri, data) {
    $.post(uri, data, function (response) {
        alert(response);
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

/*
function requestUserByAjax(url,id){
    $.ajax({
        url: url+'/'+id,
        type: 'GET'
    }).done(function (response) {
        $('#nameEdit').val(response.name);
        $('#emailEdit').val(response.email);
        $('#passwordEdit').val("");
    }).fail(function () {

    });
}
*/

$('tbody').on('click', '.btn-edit', function () {
    var row = $(this).parents('tr');
    var id = row.data('id');
    var name = $("#"+id+"name").html();
    var email = $("#"+id+"email").html();
    var status = $("#"+id+"status").html();
    var type = $("#"+id+"type").html();

    $('#editModal').modal('show');

    $('#nameEdit').val(name);
    $('#emailEdit').val(email);

    $('#statusEdit > option[value=status]').attr('selected', true);



    $('#typeEdit > option[value=type]').attr('selected', true);



    //$('#editForm').data('id', id);

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


