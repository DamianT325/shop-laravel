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
    }).done(function (data) {
      alert(data);
    }).fail(function (data) {
      // Swal.fire('Oops...', data.responseJSON.message, data.responseJSON.status);
      alert('error');
    });
  });
});
/******/ })()
;