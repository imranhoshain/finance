(function ($) {
    "use strict";

    $(document).ready(function ($) {


        /*---------------------------------------------------
                            Google Map
        ---------------------------------------------------*/
        var myCenter = new google.maps.LatLng(40.7143528, -74.0059731);

        function initialize() {
            var mapProp = {
                center: myCenter,
                scrollwheel: false,
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker = new google.maps.Marker({
                position: myCenter,
                animation: google.maps.Animation.BOUNCE,
                icon: '',
                map: map,
            });
            var styles = [{
                stylers: [{
                        hue: "#96C346"
                    },
                    {
                        saturation: -100
                    }
                ]
            }, ];
            map.setOptions({
                styles: styles
            });
            marker.setMap(map);
        }
        google.maps.event.addDomListener(window, 'load', initialize);

     });


    $(window).load(function () {

    });

}(jQuery));