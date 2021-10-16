// Disable error pop-up after clicking on it.
function disableMessage() {
  var x = document.getElementById("errorMessage");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}