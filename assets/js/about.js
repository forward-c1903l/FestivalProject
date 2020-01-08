function initMap(){
    coords = new google.maps.LatLng(10.778, 106.690);
    let map = new google.maps.Map(
        document.querySelector(".map-com"), {zoom: 17, center: coords}
    );
    var marker = new google.maps.Marker({position: coords, map: map});
}
