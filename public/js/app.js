function alertOverlay(title, text, type) {
    swal({
        title: title,
        type: type,
        text: text,
        timer: 2000,
        showConfirmButton: false
    });
}

function alertConfirm(title, text, confirmFunc) {
    swal({
        title: title,
        text: text,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, Eliminar!",
        closeOnConfirm: false
    }, function () {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
}