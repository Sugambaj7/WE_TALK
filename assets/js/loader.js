window.addEventListener("load", function () {
  var progressBar = document.querySelector(".progress-bar");

  var width = 1;
  var interval = setInterval(function () {
    if (width >= 100) {
      clearInterval(interval);
      // Redirect to register.php
      window.location.href = "register.php";
    } else {
      width++;
      progressBar.style.width = width + "%";
    }
  }, 30);
});
