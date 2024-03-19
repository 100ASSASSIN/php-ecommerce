function redirectToPage() {
  // Redirect to another page
  window.location.href = "/Features/sign up/sign up.php";
}
//sticky nav-bar
window.onscroll = function () {
  myFunction();
};

var navbar = document.getElementsByClassName("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}
