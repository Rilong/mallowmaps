var mapData = {
  coordinates: {
      lat: 0,
      lng: 0
  }
};
var mowmap = {
    init: function () {

        var map = this.map();
        this.autocompete(map);
        this.centerEvent(map);

    },

    map: function () {
        var map = new google.maps.Map(document.getElementById('mow_admin_map'), {
            zoom: 4,
            center: {lat: -25.363, lng: 131.044}
        });
        mapData.coordinates = map.getCenter();
        return map;
    },

    autocompete: function (map) {
        var autocompete = new google.maps.places.Autocomplete(document.getElementById('mowmap_places'));
        autocompete.addListener('place_changed', function () {
            var place = autocompete.getPlace();

            if (!place.geometry) {
                alert('Place not found');
                return;
            }

            map.setCenter(place.geometry.location);
            map.setZoom(14);
        });
    },

    centerEvent: function (map) {
        map.addListener('center_changed', function () {
            mapData.coordinates = map.getCenter();
        })
    }
};

mowmap.init();

jQuery(function ($) {
    if (location.hash === '#addMap')
        addMap();

    $('#mow-add-map').on('click', function (event) {
        location = '#addMap';
        addMap();
    });

    $('#mowmap_get_center').on('click', function () {
        $('#mowmap_lat').val(mapData.coordinates.lat);
        $('#mowmap_lng').val(mapData.coordinates.lng);

    });

    $('#mowmap_maker_popup').on('click', function () {
        $.magnificPopup.open({
            items: {
                src: '#makers-popup',
                closeBtnInside:true,
                type: 'inline'
            },

            closeMarkup: "<button title=\"Close (Esc)\" type=\"button\" class=\"mfp-close icon\"></button>",
            removalDelay: 300,
            mainClass: 'mfp-fade'

        });
    });

});

function addMap() {
    var $ = jQuery;
    $('#mowmap-home').fadeOut(200, function () {
        $('#mow_admin_map-page').fadeIn(200);
    });
}