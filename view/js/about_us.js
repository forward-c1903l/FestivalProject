getLocation()
function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
     console.log("Geolocation is not supported by this browser.");
    }
}
function showPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;
  
    var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=400x300&sensor=false&key=AIzaSyBvC8Abuj9Y65fZNhtMbMhjhPVmXs74N_M";
  
    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";

  }

