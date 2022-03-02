// Nav Slidebar

var window_height;
var window_width;
var navbar_initialized = false;
var nav_toggle;

var offCanvas = {
    sidenav: {
        // Sidenav is not visible by default.
        // Change to 1 if necessary
        sidenav_visible: 0
    },
    initSideNav: function initSideNav() {
        if (!navbar_initialized) {
            var $nav = $('nav');

            // Add the offcanvas class to the navbar if it's not initialized
            $nav.addClass('navbar-offcanvas');

            // Clone relevant navbars
            var $navtop = $nav.find('.navbar-top').first().clone(true);
            var $navbar = $nav.find('.navbar-collapse').first().clone(true);

            // Let's start with some empty vars
            var ul_content = '';
            var top_content = '';

            // Set min-height of the new sidebar to the screen height
            $navbar.css('min-height', window.screen.height);

            // Take the content of .navbar-top
            $navtop.each(function() {
                var navtop_content = $(this).html();
                top_content = top_content + navtop_content;
            });

            // Take the content of .navbar-collapse
            $navbar.children('ul').each(function() {
                var nav_content = $(this).html();
                ul_content = ul_content + nav_content;
            });

            // Wrap the new content inside an <ul>
            ul_content = '<ul class="navbar-nav sidebar-nav">' + ul_content + '</ul>';

            // Insert the html content into our cloned content
            $navbar.html(ul_content);
            $navtop.html(top_content);

            // Append the navbar to body,
            // and insert the content of the navicons navbar just below the logo/nav-image
            $('body').append($navbar);
            $('.nav-image').after($navtop);


            // Set the toggle-variable to the Bootstrap navbar-toggler button
            var $toggle = $('.navbar-toggler');

            // Add/remove classes on toggle and set the visiblity of the sidenav,
            // and append the overlay. Also if the user clicks the overlay,
            // the sidebar will close
            $toggle.on('click', function() {
                if (offCanvas.sidenav.sidenav_visible == 1) {
                    $('html').removeClass('nav-open');
                    offCanvas.sidenav.sidenav_visible = 0;
                    $('#overlay').remove();
                    setTimeout(function() {
                        $toggle.removeClass('toggled');
                    }, 300);
                } else {
                    setTimeout(function() {
                        $toggle.addClass('toggled');
                    }, 300);

                    // Add the overlay and make it close the sidenav on click
                    var div = '<div id="overlay"></div>';
                    $(div).appendTo("body").on('click', function() {
                        $('html').removeClass('nav-open');
                        offCanvas.sidenav.sidenav_visible = 0;
                        $('#overlay').remove();
                        setTimeout(function() {
                            $toggle.removeClass('toggled');
                        }, 300);
                    });

                    $('html').addClass('nav-open');
                    offCanvas.sidenav.sidenav_visible = 1;
                }
            });
            // Set navbar to initialized
            navbar_initialized = true;
        }
    }
};







$(document).ready(function() {
    window_width = $(window).width();

    nav_toggle = $('nav').hasClass('navbar-offcanvas') ? true : false;

    // Responsive checks
    if (window_width < 992 || nav_toggle) {
        offCanvas.initSideNav();
    }

    // Close the sidebar if the user clicks a link or a dropdown-item,
    // and close the sidebar
    $('.nav-link:not(.dropdown-toggle), .dropdown-item').on('click', function() {
        var $toggle = $('.navbar-toggler');

        $('html').removeClass('nav-open');
        offCanvas.sidenav.sidenav_visible = 0;
        setTimeout(function() {
            $toggle.removeClass('toggled');
        }, 300);
    });
});

$(window).resize(function() {
    window_width = $(window).width();

    // More responsive checks if the user resize the browser
    if (window_width < 992) {
        offCanvas.initSideNav();
    }

    if (window_width > 992 && !nav_toggle) {
        $('nav').removeClass('navbar-offcanvas');
        offCanvas.sidenav.sidenav_visible = 1;
        navbar_initialized = false;
    }
});

// Nav Slidebar


// Nav Slidepicture

$(document).ready(() => {

    $('#activities').slick({
        autoplay: true,
        autoplaySpeed: 2500,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        centerMode: true,
        slidesToShow: 1,

    });
});

//End Nav Slidepicture

// To top Button
var btn = $('#button');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});
// End To top Button



// google map

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, '300');
});

function initMap() {

    const uluru = { lat: 13.7948786, lng: 100.3194293 };

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: uluru,
    });

    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}
// end google map



// google translate

function googleTranslateElementInit() {
    new google.translate.TranslateElement({ pageLanguage: 'en', includedLanguages: 'th,en,', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
}
$('document').ready(function() {
    $("#google_translate_element").on("click", function() {
        // Change font family and color
        $("iframe")
            .contents()
            .find(
                ".goog-te-menu2-item div, .goog-te-menu2-item:link div, .goog-te-menu2-item:visited div, .goog-te-menu2-item:active div, .goog-te-menu2 *"
            )
            .css({
                color: "#544F4B",
                "font-family": "Roboto",
                width: "100%"
            });
        // Change menu's padding
        $("iframe")
            .contents()
            .find(".goog-te-menu2-item-selected")
            .css("display", "none");

        // Change menu's padding
        $("iframe").contents().find(".goog-te-menu2").css("padding", "0px");

        // Change the padding of the languages
        $("iframe").contents().find(".goog-te-menu2-item div").css("padding", "20px");

        // Change the width of the languages
        $("iframe").contents().find(".goog-te-menu2-item").css("width", "100%");
        $("iframe").contents().find("td").css("width", "50%");

        // Change hover effects
        $("iframe")
            .contents()
            .find(".goog-te-menu2-item div")
            .hover(
                function() {
                    $(this)
                        .css("background-color", "#4385F5")
                        .find("span.text")
                        .css("color", "white");
                },
                function() {
                    $(this)
                        .css("background-color", "white")
                        .find("span.text")
                        .css("color", "#544F4B");
                }
            );

        // Change Google's default blue border
        $("iframe").contents().find(".goog-te-menu2").css("border", "none");

        // Change the iframe's box shadow
        $(".goog-te-menu-frame").css(
            "box-shadow",
            "0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3)"
        );

        // Change the iframe's size and position?
        $(".goog-te-menu-frame").css({
            height: "100%",
            width: "100%",
            top: "-10px"
        });
        // Change iframes's size
        $("iframe").contents().find(".goog-te-menu2").css({
            height: "100%",
            width: "100%"
        });
    });
});


// end google map

const facebookBtn = document.querySelector(".facebook-btn");
const twitterBtn = document.querySelector(".twitter-btn");
const linkedinBtn = document.querySelector(".linkedin-btn");

function init() {

    let postUrl = encodeURI(document.location.href);


    const facebook = `https://www.facebook.com/sharer.php?u=${postUrl}`;
    const twitter = `https://twitter.com/share/url?url=${postUrl}`;
    const linkedin = `https://www.linkedin.com/shareArticle?url=${postUrl}`;


    facebookBtn.addEventListener('click', () => {
        window.open(url = facebook, target = 'blank')
    })


    twitterBtn.addEventListener('click', () => {
        window.open(url = twitter, target = 'blank')

    })

    linkedinBtn.addEventListener('click', () => {
        window.open(url = linkedin, target = 'blank')

    })
}
init();


$(document).ready(function() {
    setInterval(function() {
        $(".hero-slider .slider img").toggleClass("banner").toggleClass("scale-animation");
    }, 6000);
});