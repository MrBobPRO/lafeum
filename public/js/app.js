(()=>{function e(e,r){var n="undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(!n){if(Array.isArray(e)||(n=function(e,r){if(!e)return;if("string"==typeof e)return t(e,r);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return t(e,r)}(e))||r&&e&&"number"==typeof e.length){n&&(e=n);var o=0,a=function(){};return{s:a,n:function(){return o>=e.length?{done:!0}:{done:!1,value:e[o++]}},e:function(e){throw e},f:a}}throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}var c,i=!0,u=!1;return{s:function(){n=n.call(e)},n:function(){var e=n.next();return i=e.done,e},e:function(e){u=!0,c=e},f:function(){try{i||null==n.return||n.return()}finally{if(u)throw c}}}}function t(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}});var r=$(".quotes-carousel");r&&r.owlCarousel({loop:!0,margin:20,nav:!1,items:1,dots:!1,singleItem:!0,autoHeight:!0,transitionStyle:"fade"});var n=document.getElementById("owl_prev_nav"),o=document.getElementById("owl_next_nav");function a(){document.querySelectorAll("button[data-action='expand_quote'").forEach((function(e){var t=document.querySelectorAll("[data-identificator='"+e.dataset.quote+"']");t[0].clientHeight==t[0].scrollHeight&&(e.style.display="none"),e.addEventListener("click",(function(n){for(i=0;i<t.length;i++){document.querySelectorAll("[data-identificator='"+e.dataset.quote+"']")[i].classList.add("card__text--expanded")}n.target.classList.add("more__button--hidden"),r.trigger("refresh.owl.carousel")}))}))}n&&n.addEventListener("click",(function(){r.trigger("prev.owl.carousel")})),o&&o.addEventListener("click",(function(){r.trigger("next.owl.carousel")})),a();var c=document.getElementById("refresher"),u=document.getElementById("refresher_icon");u&&(u.onclick=function e(){$.ajax({type:"POST",enctype:"multipart/form-data",url:"/refresher/update",processData:!1,contentType:!1,cache:!1,timeout:6e4,success:function(t){c.innerHTML=t;var r=document.getElementById("refresher_icon");r&&(r.onclick=e)},error:function(){console.log("Refresher update error!")}})});var l=document.getElementById("filters_toggler");l&&(l.onclick=function(){l.classList.toggle("filters-toggler--active");var e=document.getElementById("category_filter");e.clientHeight?e.style.height=0:e.style.height=e.scrollHeight+"px"});var s=document.getElementById("rules_nullifier");s&&(s.onclick=function(){!function(e){document.getElementById("rules_keyword").value="";$("input[name='category_ids[]']:checked").map((function(){$(this).removeAttr("checked")}));var t=document.querySelectorAll(".category-filters__button--active");for(i=0;i<t.length;i++)t[i].classList.remove("category-filters__button--active");"quotes"==e?m():"authors"==e&&h()}(s.dataset.source)});var d=document.getElementById("rules_keyword");if(d){var f=d.dataset.source;"quotes"==f?$("#rules_keyword").on("input",(function(){m()})):"authors"==f&&$("#rules_keyword").on("input",(function(){h()}))}var g=document.getElementById("quotes_list");function m(){var t=$("#rules_form")[0],r=new FormData(t),n=$("input[name='category_ids[]']:checked").map((function(){return $(this).val()})).get(),o=JSON.stringify(n);r.append("category_ids",o),$.ajax({type:"POST",enctype:"multipart/form-data",url:"/quotes/filter",data:r,processData:!1,contentType:!1,cache:!1,timeout:6e4,success:function(t){g.innerHTML=t,a(),function(){var t,r=e(document.getElementsByClassName("ya-share2"));try{for(r.s();!(t=r.n()).done;)share_button=t.value,Ya.share2(share_button,{})}catch(e){r.e(e)}finally{r.f()}}()},error:function(){console.log("Quotes filter error!")}})}g&&document.querySelectorAll(".category-filters__button").forEach((function(e){e.addEventListener("click",(function(e){var t=e.target;t.classList.toggle("category-filters__button--active"),document.getElementById("cat"+t.dataset.inputId).toggleAttribute("checked"),m()}))}));var y=document.getElementById("authors_list");function h(){var e=$("#rules_form")[0],t=new FormData(e),r=$("input[name='category_ids[]']:checked").map((function(){return $(this).val()})).get(),n=JSON.stringify(r);t.append("category_ids",n),$.ajax({type:"POST",enctype:"multipart/form-data",url:"/authors/filter",data:t,processData:!1,contentType:!1,cache:!1,timeout:6e4,success:function(e){y.innerHTML=e},error:function(){console.log("Authors filter error!")}})}y&&document.querySelectorAll(".category-filters__button").forEach((function(e){e.addEventListener("click",(function(e){var t=e.target;t.classList.toggle("category-filters__button--active"),document.getElementById("cat"+t.dataset.inputId).toggleAttribute("checked"),h()}))}))})();