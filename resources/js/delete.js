$(function() {
    $('.delete').click(function() {
        Swal.fire({
            title: "Czy na pewno chcesz usunac rekord?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Tak',
            cancelButtonText: 'Nie'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: "DELETE",
                    url: $(this).data("id")
                })
                    .done(function (data) {
                        window.location.reload();
                    })
                    .fail(function (data) {
                        Swal.fire('Oops...', data.responseJSON.message, data.responseJSON.status);
                    });
            }
        })
    });
});
