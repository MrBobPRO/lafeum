// AJAX request setup
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// --------------Owl Carousel start----------------
let quotes_owl = $('.quotes-carousel');
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


// ----------------Ajax update Refresher start----------------
let refresher = document.getElementById("refresher");
let refresher_icon = document.getElementById("refresher_icon");
if (refresher_icon) refresher_icon.onclick = ajax_update_refresher;

function ajax_update_refresher() {
    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "/refresher/update",
        processData: false,
        contentType: false,
        cache: false,
        timeout: 60000,

        success: function (response) {
            refresher.innerHTML = response;
            let new_refresher_icon = document.getElementById("refresher_icon");
            if (new_refresher_icon) new_refresher_icon.onclick = ajax_update_refresher;
        },

        error: function () {
            console.log("Refresher update error!");
        }

    });
}
// ----------------Ajax update Refresher end----------------