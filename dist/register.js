const form = document.querySelector(".signup form");
continueBtn = form.querySelector(".button input");
errorText = form.querySelector(".error-txt");
nameErrText = form.querySelector(".name_Err");
phoneErrText = form.querySelector(".phone_Err");
addressErrText = form.querySelector(".address_Err");
emailErrText = form.querySelector(".email_Err");
passwordErrText = form.querySelector(".password_Err");

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./validatedata.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "success") {
          location.href = "user_dashboard.php";
        }

        if (
          data.includes(
            "Name must be between 3 and 20 and start with capital letter!"
          )
        ) {
          nameErrText.textContent =
            "Name must be between 3 and 20 and start with capital letter!";
          nameErrText.style.display = "block";
        } else {
          nameErrText.style.display = "none";
        }

        if (data.includes("Phone number must be 10 digits!")) {
          phoneErrText.textContent = "Phone number must be 10 digits!";
          phoneErrText.style.display = "block";
        } else if (
          data.includes("Phone number must start with 96 or 97 or 98!")
        ) {
          phoneErrText.textContent =
            "Phone number must start with 96 or 97 or 98!";
          phoneErrText.style.display = "block";
        } else {
          // errorText.textContent = data;
          phoneErrText.style.display = "none";
          // errorText.style.display = "block";
        }

        if (data.includes("Address must be in format: *** or ***,***")) {
          addressErrText.textContent =
            "Address must be in format: *** or ***,***";
          addressErrText.style.display = "block";
        } else {
          addressErrText.style.display = "none";
        }

        if (
          data.includes(
            "Password must contain atleast one number, one special character and must be between 7 and 10 characters!"
          )
        ) {
          passwordErrText.textContent =
            "Password must contain atleast one number, one special character and must be between 7 and 10 characters!";
          passwordErrText.style.display = "block";
        } else {
          passwordErrText.style.display = "none";
        }

        if (data.includes("Email must be in format: *****@gmail.com")) {
          emailErrText.textContent = "Email must be in format: *****@gmail.com";
          emailErrText.style.display = "block";
        } else if (data.includes("Email has been previously used!")) {
          emailErrText.textContent = "Email has been previously used!";
          emailErrText.style.display = "block";
        } else {
          emailErrText.style.display = "none";
        }

        if (data.includes("Valid formats : png, jpeg, jpg")) {
          errorText.textContent = "Valid formats : png, jpeg, jpg";
          errorText.style.display = "block";
        } else {
          errorText.style.display = "none";
        }

        if (data.includes("All input fields are required")) {
          errorText.textContent = "All input fields are required";
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
