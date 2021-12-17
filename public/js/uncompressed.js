// ----------------AJAX request setup start----------------
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// ----------------AJAX request setup end----------------


// --------------Owl Carousel start----------------
let quotes_owl = $('.quotes-carousel');
if (quotes_owl) 
    quotes_owl.owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        items: 1,
        dots: false,
        singleItem : true,
        autoHeight : true,
        transitionStyle:"fade"
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


// ----------------Expand Quotes Initialization start----------------
function initialize_expanding_quotes() {
    document.querySelectorAll("button[data-action='expand_quote'").forEach(item => {
        //hide unneeded buttons
        //quotes taken in array and used Classname instead of id => because owl carousel clones items
        let quotes = document.querySelectorAll("[data-identificator='" + item.dataset.quote + "']");
        if (quotes[0].clientHeight == quotes[0].scrollHeight) {
            item.style.display = "none";
        }

        //expand quote on button click
        item.addEventListener("click", event => {
            for (i = 0; i < quotes.length; i++) {
                let quotes = document.querySelectorAll("[data-identificator='" + item.dataset.quote + "']");
                quotes[i].classList.add("card__text--expanded");
            }
            // hide more button
            event.target.classList.add("more__button--hidden");
            //refresh owl carousel height
            quotes_owl.trigger('refresh.owl.carousel');
        })
    });
}

initialize_expanding_quotes();
// ----------------Expand Quotes Initialization end----------------


// ----------------Ajax update Refresher start----------------
let refresher = document.getElementById("refresher");
let refresher_icon = document.getElementById("refresher_icon");
if (refresher_icon) 
    refresher_icon.onclick = ajax_update_refresher;

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
            if (new_refresher_icon) 
                new_refresher_icon.onclick = ajax_update_refresher;
        },

        error: function () {
            console.log("Refresher update error!");
        }
    });
}
// ----------------Ajax update Refresher end----------------


// ----------------Category filter toggler start----------------
let filters_toggler = document.getElementById("filters_toggler");
if (filters_toggler) {
    filters_toggler.onclick = toggle_filters;
}

function toggle_filters() { // toggle filter_toggler active class
    filters_toggler.classList.toggle("filters-toggler--active")

    // toggle filters height
    let category_filter = document.getElementById("category_filter");
    if (category_filter.clientHeight) {
        category_filter.style.height = 0;
    } else {
        category_filter.style.height = category_filter.scrollHeight + "px";
    }
}
// ----------------Category filter toggler end----------------


// ----------------Rules nullifier start----------------
let rules_nullifier = document.getElementById("rules_nullifier");
if (rules_nullifier) {
    rules_nullifier.onclick = function () {
        nullify_rules(rules_nullifier.dataset.source);
    }
}
    
function nullify_rules(source) {
    // nullify keyword
    let rules_keyword = document.getElementById("rules_keyword");
    rules_keyword.value = '';

    // nullify all category checkboxes
    let rules_form_category_ids = $("input[name='category_ids[]']:checked").map(function () {
        $(this).removeAttr("checked");
    });

    // remove active category classes
    let active_buttons = document.querySelectorAll(".category-filters__button--active");
    for (i = 0; i < active_buttons.length; i ++) {
        active_buttons[i].classList.remove("category-filters__button--active");
    }

    if (source == "quotes") {
        ajax_quotes_filter();
    } else if(source == "authors") {
        ajax_authors_filter();
    }

}
// ----------------Rules nullifier end----------------


// ----------------On rules search input value change start----------------
let rules_keyword = document.getElementById("rules_keyword");
if (rules_keyword) {
    let source = rules_keyword.dataset.source;
    if (source == "quotes") {
        $("#rules_keyword").on("input", function () {
            ajax_quotes_filter();
        });
    } else if (source == "authors") {
        $("#rules_keyword").on("input", function () {
            ajax_authors_filter();
        });
    }
}
// ----------------On rules search input value change end----------------


// ----------------Ajax filter & search Quotes start----------------
let quotes_list = document.getElementById("quotes_list");
if (quotes_list) {
    document.querySelectorAll(".category-filters__button").forEach(item => {
        item.addEventListener("click", event => { // higlight active button
            let target = event.target;
            target.classList.toggle("category-filters__button--active");
            // toggle checked attribute and send ajax request
            let checkbox = document.getElementById("cat" + target.dataset.inputId);
            checkbox.toggleAttribute("checked")
            ajax_quotes_filter();
        })
    })
}

function ajax_quotes_filter() {
    let rules_form = $('#rules_form')[0];
    let rules_form_data = new FormData(rules_form);

    // stringify category_ids array and attach to the FormData
    let rules_form_category_ids = $("input[name='category_ids[]']:checked").map(function () {
        return $(this).val();
    }).get();
    var encoded_rules_form_category_ids = JSON.stringify(rules_form_category_ids);
    rules_form_data.append('category_ids', encoded_rules_form_category_ids);

    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "/quotes/filter",
        data: rules_form_data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 60000,

        success: function (response) {
            quotes_list.innerHTML = response;
            //initialize expand button events and visibility for new generated quotes
            initialize_expanding_quotes();
            //initialize yandex share buttons
            initialize_yandex_share_buttons();
        },

        error: function () {
            console.log("Quotes filter error!");
        }

    });
}
// ----------------Ajax filter & search Quotes end----------------


// ----------------Ajax filter & search Authors start----------------
let authors_list = document.getElementById("authors_list");
if (authors_list) {
    document.querySelectorAll(".category-filters__button").forEach(item => {
        item.addEventListener("click", event => { // higlight active button
            let target = event.target;
            target.classList.toggle("category-filters__button--active");
            // toggle checked attribute and send ajax request
            let checkbox = document.getElementById("cat" + target.dataset.inputId);
            checkbox.toggleAttribute("checked")
            ajax_authors_filter();
        })
    })
}

function ajax_authors_filter() {
    let rules_form = $('#rules_form')[0];
    let rules_form_data = new FormData(rules_form);

    // stringify category_ids array and attach to the FormData
    let rules_form_category_ids = $("input[name='category_ids[]']:checked").map(function () {
        return $(this).val();
    }).get();
    var encoded_rules_form_category_ids = JSON.stringify(rules_form_category_ids);
    rules_form_data.append('category_ids', encoded_rules_form_category_ids);

    $.ajax({
        type: "POST",
        enctype: "multipart/form-data",
        url: "/authors/filter",
        data: rules_form_data,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 60000,

        success: function (response) {
            authors_list.innerHTML = response;
        },

        error: function () {
            console.log("Authors filter error!");
        }

    });
}
// ----------------Ajax filter & search Authors end----------------


// ----------------Initialize yandex share buttons----------------
function initialize_yandex_share_buttons() {
    let myShare = document.getElementsByClassName('ya-share2');

    for (share_button of myShare) {
        Ya.share2(share_button, {});
    }
}
// ----------------Initialize yandex share buttons----------------


// ----------------Toogle mobile menu start----------------
let mobile_menu = document.getElementById("mobile_menu");
let mobile_categories = document.getElementById("mobile_categories");

document.querySelectorAll("[data-action='toggle_mobile_menu']").forEach(item => {
    item.addEventListener("click", event => {
        mobile_menu.classList.toggle("mobile-menu--visible");
        mobile_categories.classList.remove("mobile-categories--visible");
    })
});

//toogle mobile categoreis
document.querySelectorAll("[data-action='toggle_mobile_categories']").forEach(item => {
    item.addEventListener("click", event => {
        mobile_categories.classList.toggle("mobile-categories--visible");
    })
});
// ----------------Toogle mobile menu end----------------


