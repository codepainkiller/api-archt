function alertOverlay(title, text, type) {
    swal({
        title: title,
        type: type,
        text: text,
        timer: 2000,
        showConfirmButton: false
    });
}

function alertConfirm(message, confirmFunc, cancelFunc) {

}