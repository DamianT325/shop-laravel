$(function (){
    const filter_btn = $('a.filter')
    const form_filter = $('form.form_filter')
    filter_btn.click(function (){
       const form_data = form_filter.serialize();
        // console.log(decodeURI(form_data));
        $.ajax({
            method: "GET",
            url: "/",
            data: form_data,
        })
            .done(function (data) {
                alert(data)
            })
            .fail(function (data) {
                // Swal.fire('Oops...', data.responseJSON.message, data.responseJSON.status);
                alert('error')
            });
    })

})

