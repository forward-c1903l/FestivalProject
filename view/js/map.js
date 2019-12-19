
function initMap(){
    let aptech = {lat: 10.778, lng:106.690};
    let map = new google.maps.Map(
        document.querySelector(".map"), {zoom: 17, center: aptech}
    );
    var marker = new google.maps.Marker({position: aptech, map: map});
}