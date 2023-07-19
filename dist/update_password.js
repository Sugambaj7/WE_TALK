const form = document.querySelector(".my-form form ");
updateBtn = form.querySelector(".button #submit-btn");
errorText = form.querySelector(".err-txt");

form.onsubmit = (e) => {
  e.preventDefault();
};

updateBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./update_password_process.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        errorText.innerHTML = data;
      } else {
        errorText.textContent = data;
        errorText.style.display = "block";
      }
    }
  };

  //formdata from ajax to php
  let formData = new FormData(form);
  xhr.send(formData);
  // console.log("Hello");
};
