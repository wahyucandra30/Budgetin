var currentUser = sessionStorage.getItem("currentUser");

var username = JSON.parse(currentUser).username;
document.getElementById("userdata").innerHTML = username;