/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/ikon.js ***!
  \******************************/
function ikon() {
  var lathatatlan = document.getElementById("login");
  var reg_2 = document.getElementById("login_lathato");
  if (lathatatlan) {
    lathatatlan.id = "login_lathato";
  } else if (reg_2) {
    reg_2.id = "login";
  }
}
var btnIkon = document.querySelector('#ikon, #navbarDropdown');
btnIkon.addEventListener('click', function (event) {
  ikon();
});
/******/ })()
;