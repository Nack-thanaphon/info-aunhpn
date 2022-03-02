// map marker
var zoom2 = 3;

$("#tabs-2").change(function() {
    zoom2 = 8;
});

function initMap() {
    var options = {
        zoom: zoom2,
        center: {
            lat: 13.7911,
            lng: 100.325692
        }
    }


    var map = new
    google.maps.Map(document.getElementById('map'), options);

    addMarker({
        coords: { lat: 4.972665, lng: 114.8917813 },
        content: '<h6 class="py-2 text-uppercase">Universiti Brunei Darussalam</h6>' +
            '<p> Contact : <a href = "+673 246 3062" target = "_blank">+673 246 3062</a></p>' +
            '<p> Email : <a href = "office.corpcomms@ubd.edu.bn" target = "_blank">office.corpcomms@ubd.edu.bn</a></p>'
    });

    addMarker({
        coords: { lat: 11.5680248, lng: 1104.8896129 },
        content: '<h6 class="py-2 text-uppercase">Royal University of Phnom Penh</h6>' +
            '<p> Contact : <a href = "023 216 348" target = "_blank">023 216 348</a></p>' +
            '<p> Email : <a href = "rector@rule.edu.kh" target = "_blank">rector@rule.edu.kh</a></p>'
    });

    addMarker({
        coords: { lat: 11.5355911, lng: 104.922504 },
        content: '<h6 class="py-2 text-uppercase">Royal University of Law and Economics</h6>' +
            '<p> Contact : <a href = "(+855) 12 533 767" target = "_blank">(+855) 12 533 767</a></p>' +
            '<p> Email : <a href = "keo.chanvuthy@rupp.edu.kh" target = "_blank">keo.chanvuthy@rupp.edu.kh</a></p>'
    });





    // addMarker({
    //     coords: { lat: , lng: },
    //     content: '<h6 class="py-2 text-uppercase">  </h6>' +
    //         '<p> Contact : <a href = "   " target = "_blank">   </a></p>' +
    //         '<p> Email : <a href = " " target = "_blank">  </a></p>'
    // });




    // addMarker({
    //     coords: { lat: 4.972665, lng: 114.8917813 },
    //     content: '<h5 class="py-2 text-uppercase"></h5>' +
    //         '<p> Contact : <a href = "" target = "_blank">/a></p>' +
    //         '<p> Email : <a href = "" target = "_blank"></a></p>'
    // });


    //Addmarker function
    function addMarker(props) {
        var marker = new google.maps.Marker({
            position: props.coords,
            map: map
        });



        if (props.content) {
            var infoWindow = new google.maps.InfoWindow({
                content: props.content

            });

            marker.addListener('click', function() {
                infoWindow.open(map, marker);
            });
        }

    }
}