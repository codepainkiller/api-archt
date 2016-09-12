function deletePlaceByAjax(id, row) {
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

$('#placesTable').on('click', '.btn-delete', function (e) {
    e.preventDefault();

    var row = $(this).parents('tr');
    var id = row.data('id');

    alertConfirm("Se eliminará también fotos y audios asociados.", function (isConfirm) {
        if (isConfirm) {
            deletePlaceByAjax(id, row);
        }
    });
});