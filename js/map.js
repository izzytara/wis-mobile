var currentLocation;
// If users click I'm not here or want to locating manually
function myMap() {
    var mapCanvas = document.getElementById("map"); //Create canvas and get map by id = 'map2'
    var myCenter = new google.maps.LatLng(-27.468140, 153.027354); // Set default center of map(Brisbane in this situstion)
    var mapOptions = {
        center: myCenter, // Set the center and zoom for map
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);

    // listen for the window resize event & trigger Google Maps to update as well
    $(document).ready(function () {
        google.maps.event.addListener(map, 'idle', function () {
            google.maps.event.trigger(map, 'resize');
        });
        //Reference:https://developers.google.com/maps/documentation/javascript/reference
    });


    var geocoder = new google.maps.Geocoder();
    // Reverse geocoding code(transform coordinates into address)  
    google.maps.event.addListener(map, 'click', function (event) {
        geocoder.geocode({
            'latLng': event.latLng
        }, function (results, status) { // The returning is a .json file include places information
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    // Restrict address to be only disrict and state
                    console.log(results);
                    var district = results[0].formatted_address.split(',');
                    var district_without = district[1].split(' ');
                    district_without.splice(-1);
                    currentLocation = district_without.join(' ');
                    console.log(currentLocation);
                    $('#location').attr('value', currentLocation);
                } else {
                    window.alert('No results found'); //Error check
                }
            } else {
                //window.alert('Geocoder failed due to: ' + status); //Error check
            }
        });
        placeMarker(map, event.latLng); // Add marker on map, call placemarker function
    });
    // Reference 1: http://stackoverflow.com/questions/36892826/click-on-google-maps-api-and-get-the-address
    // Reference 2: https://developers.google.com/maps/documentation/javascript/examples/geocoding-reverse
}
var markersArray = [];
// Add marker
function placeMarker(map, location) {
    if (markersArray.length >= 1) { // The amount of marker should be one
        //alert('Please mark only one address :)'); //If user clicked more than one times
        deleteOverlays(); // Call deleteOverlays function to clear all markers 
    }
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    markersArray.push(marker); // Create an array to store all marker that user clicked
    //    console.log(markersArray);

    // Reference: http://www.w3schools.com/graphics/google_maps_overlays.asp	
}
// Clear marker
function deleteOverlays() {
    if (markersArray) {
        for (i in markersArray) {
            markersArray[i].setMap(null);
        }
        markersArray.length = 0;
    }
    // Reference:http://www.cnblogs.com/helloj2ee/archive/2013/01/10/2855645.html	
}