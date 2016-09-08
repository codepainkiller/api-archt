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

function createAjaxCategory(uri, data) {
    $.post(uri, data, function (response) {
        addRow(response);
        alertOverlay('Hecho!', 'Categoría registrada.', 'success');
    }).fail(function () {
        alertOverlay('Error!', 'No se pudo realizar la operación', 'error');
    });
}

function deleteAjaxCategory(id) {

}

$('#createForm').submit(function (e) {
    e.preventDefault();

    $('#createModal').modal('hide');

    createAjaxCategory($(this).attr('action'), $(this).serialize());
});

$('tbody').on('click', '.btn-delete', function (e) {
   alertConfirm('¿Esta seguro?', 'Se eliminará permanentemente.', function () {
       
   });
});

$('tbody').on('click', '.btn-edit', function (e) {
    alert('Edit');
});

$('#createModal').on('show.bs.modal', function (e) {
    $('#name').val("");
});

