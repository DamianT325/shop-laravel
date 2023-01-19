/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
$(function () {
  var filter_btn = $('a.filter');
  var form_filter = $('form.form_filter');
  filter_btn.click(function () {
    var form_data = form_filter.serialize();
    // console.log(decodeURI(form_data));
    $.ajax({
      method: "GET",
      url: "/",
      data: form_data
    }).done(function (response) {
      $('div#products-wrapper').empty();
      $.each(response.data, function (index, product) {
        var html = '<div class="col-6 col-md-6 col-lg-4 mb-3">\n' + '                                <div class="card h-100 border-0">\n' + '                                    <div class="card-img-top h-100">\n' + '                                            <img src="' + storagePath + product.image_path + '" class="img-fluid mx-auto d-block h-100" alt="Zdjęcie produktu">\n' + '                                    </div>\n' + '                                    <div class="card-body text-center">\n' + '                                        <h4 class="card-title">\n' + product.name + '                                        </h4>\n' + '                                        <h5 class="card-price small">\n' + '                                            <i>PLN ' + product.price + '</i>\n' + '                                        </h5>\n' + '                                    </div>\n' + '                                </div>\n' + '                            </div>';
        $('div#products-wrapper').append(html);
      });
    }).fail(function (data) {
      // Swal.fire('Oops...', data.responseJSON.message, data.responseJSON.status);
      alert('error');
    });
  });
});
/******/ })()
;