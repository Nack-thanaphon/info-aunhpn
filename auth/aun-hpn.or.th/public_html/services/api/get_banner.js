var html, data;

$(document).ready(function() {
    banner();
})

function banner() {

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://www.info-aun-hpn.com/api/get_banner.php",
        data: {},
        success: function(data) {
            data = data.result;
            for (var i = 0; i < data.length; i++) {
                $bn = `
                <div class="carousel-item active">
                <a href="${data[i].link}" target="blank">
                    <img src="https://info-aun-hpn.com/bos/uploads/banner/${data[i].image}" class=" ">
                    <div class="carousel-caption d-none d-md-block">

                    </div>
                </a>
            </div>     
       `
                $('.slideshow').slick('slickAdd', $bn);
            };

        },
        error: function(err) {

            console.log("bad", err)
        }
    })

}


$(document).ready(() => {
    $('.slideshow').slick({
        autoplay: true,
        autoplaySpeed: 3500,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        slide: 'div',
        cssEase: 'linear'
    });
    $('.slideshow').slick('slickRemove');
});