const form = document.querySelector(".delete-section form");
deleteBtn = form.querySelector("form #del-btn");
errorText = document.querySelector(".error-txt");

form.onsubmit = (e) => {
  e.preventDefault();
};

deleteBtn.onclick = () => {
  if (confirm("Are you sure you want to request to delete your account?")) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "./req_delete_user.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          errorText.innerHTML = data;
        }
      }
    };

    //formdata from ajax to php
    let formData = new FormData(form);
    xhr.send(formData);
    // console.log("Hello");
  } else {
    window.location = "./user_dashboard.php";
  }
};
