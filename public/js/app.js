/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
//AJAX request setup
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
}); //--------------Owl Carousel start----------------

var quotes_owl = $('.quotes-carousel');
if (quotes_owl) quotes_owl.owlCarousel({
  loop: true,
  margin: 0,
  nav: false,
  items: 1,
  dots: false
}); // Owl carousel navigations

window.prev_slide = function () {
  quotes_owl.trigger('next.owl.carousel');
};

window.next_slide = function () {
  quotes_owl.trigger('prev.owl.carousel');
}; //--------------Owl Carousel end----------------
/******/ })()
;