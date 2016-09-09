function alertOverlay(title, text, type) {
    swal({
        title: title,
        type: type,
        text: text,
        timer: 2000,
        showConfirmButton: false
    });
}

function alertConfirm(text, confirmFunc) {
    swal({
        title: "¿Esta seguro?",
        text: text,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, Eliminar!",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false
    }, confirmFunc);
}