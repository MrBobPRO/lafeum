//Install Jquery
window.$ = require('jquery');

//AJAX request setup
$.ajaxSetup({
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});