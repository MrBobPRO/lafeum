// AJAX request setup
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// --------------Owl Carousel start----------------
var quotes_owl = $('.quotes-carousel');
if (quotes_owl) 
    quotes_owl.owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        items: 1,
        dots: false
    });


// Owl carousel navigations
let owl_prev_nav = document.getElementById('owl_prev_nav'),
    owl_next_nav = document.getElementById('owl_next_nav');

if (owl_prev_nav) 
    owl_prev_nav.addEventListener("click", function () {
        quotes_owl.trigger('prev.owl.carousel');
    });


if (owl_next_nav) 
    owl_next_nav.addEventListener("click", function () {
        quotes_owl.trigger('next.owl.carousel');
    });

// --------------Owl Carousel end----------------
