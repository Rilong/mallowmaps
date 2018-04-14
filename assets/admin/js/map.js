jQuery(function ($) {
    if (location.hash === '#addMap')
        addMap();

   $('#mow-add-map').on('click', function (event) {
      location = '#addMap';
      addMap();
   });

});
function addMap() {
    var $ = jQuery;
    $('#mowmap-home').fadeOut(200, function () {
        $('#mow_admin_map-page').fadeIn(200);
    });
}

var map = new google.maps.Map(document.getElementById('mow_admin_map'), {
    zoom: 4,
    center: {lat: -25.363, lng: 131.044}
});