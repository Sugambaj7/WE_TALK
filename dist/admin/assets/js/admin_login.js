const form = document.querySelector(".login form");
loginBtn = form.querySelector(".button input");
errorText = form.querySelector(".error-txt");

form.onsubmit = (e) => {
  e.preventDefault();
};

loginBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./validate_admin_login_data.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
        if (data == "success") {
          location.href = "./admin_dashboard.php";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };

  //formdata from ajax to php
  let formData = new FormData(form);
  xhr.send(formData);
  // console.log("Hello");
};
