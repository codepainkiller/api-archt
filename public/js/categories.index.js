function addRow(data) {
    var html = '';

    html += '<tr>';
    html += '<td>' + data.id + '</td>';
    html += '<td>' + data.name + '</td>';
    html += '<td>' +
        '<button href="#" class="btn btn-success btn-xs btn-edit"><i class="fa fa-pencil"></i> Editar</button> ' +
        '<button href="#" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o"></i> Eliminar</button>' +
        '</td>';
    html += '</tr>';

    $('table tbody').append(html);
}

function createCategoryByAjax(uri, data) {
    $.post(uri, data, function (response) {
        addRow(response);
        alertOverlay('Hecho!', 'Categoría registrada.', 'success');
    }).fail(function () {
        alertOverlay('Error!', 'No se pudo realizar la operación', 'error');
    });
}

function deleteCategoryByAjax(id, row) {
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

$('#createForm').submit(function (e) {
    e.preventDefault();

    $('#createModal').modal('hide');

    createCategoryByAjax($(this).attr('action'), $(this).serialize());
});

$('tbody').on('click', '.btn-delete', function () {
    var row = $(this).parents('tr');
    var id = row.data('id');
    
    alertConfirm("Se eliminará los lugares asociados a esta categoría.", function (isConfirm) {
        if (isConfirm) {
            deleteCategoryByAjax(id, row);
        }
    });
});

$('tbody').on('click', '.btn-edit', function () {
    alert('Edit');
});

$('#createModal').on('show.bs.modal', function () {
    $('#name').val("");
});

