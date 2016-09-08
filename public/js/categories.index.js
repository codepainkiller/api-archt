function addRow(data) {
    var html = '';

    html += '<tr>';
    html += '<td>' + data.id + '</td>';
    html += '<td>' + data.name + '</td>';
    html += '<td>' +
        '<button href="#" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Editar</button> ' +
        '<button href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eliminar</button>' +
        '</td>';
    html += '</tr>';

    $('tbody').append(html);
}


$('#createForm').submit(function (e) {
    e.preventDefault();
    $('#createModal').modal('hide');

    var uri = $(this).attr('action');
    var data = $(this).serialize();

    $.post(uri, data, function (data) {
        addRow(data);
        alert('Categoría registrada!');
    }).fail(function () {
        alert('No se pudo realizar la operación');
    });
});

$('#createModal').on('show.bs.modal', function (e) {
    $('#name').val("");
});

swal({   title: "Auto close alert!",   text: "I will close in 2 seconds.",   timer: 2000,   showConfirmButton: false });
