
function navbar() {
  var x = document.getElementById("navbar");
  if (x.className === "main-nav") {
    x.className += " responsive";
  } else {
    x.className = "main-nav";
  }
}
