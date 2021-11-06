$(".form-delete").submit(function(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Estas seguro de eliminar?',
        text: "¡Se eliminará definitivamente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
    }).then((result) => {
        if (result.value) {
            this.submit();
        }
    })
});