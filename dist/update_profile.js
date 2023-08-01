const formOne = document.querySelector(".update_name form");
formTwo = document.querySelector(".update_phone form");
formThree = document.querySelector(".update_addr form");
formFour = document.querySelector(".update_image form");

updateNameBtn = formOne.querySelector(".button input");
updatePhnBtn = formTwo.querySelector(".button input");
updateAddrBtn = formThree.querySelector(".button input");
updateImageBtn = formFour.querySelector(".button input");

errorText = document.querySelector(".error-txt");

formOne.onsubmit = (e) => {
  e.preventDefault();
};

formTwo.onsubmit = (e) => {
  e.preventDefault();
};

formThree.onsubmit = (e) => {
  e.preventDefault();
};

updateNameBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./validate_name.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "success") {
          errorText.textContent = "Name updated successfully!";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };

  //formdata from ajax to php
  let formData = new FormData(formOne);
  xhr.send(formData);
  // console.log("Hello");
};

updatePhnBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./validate_phone.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "success") {
          errorText.textContent = "Phone Number updated successfully!";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };

  //formdata from ajax to php
  let formData2 = new FormData(formTwo);
  xhr.send(formData2);
  // console.log("Hello");
};

updateAddrBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./validate_address.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "success") {
          errorText.textContent = "Address updated successfully!";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };

  //formdata from ajax to php
  let formData3 = new FormData(formThree);
  xhr.send(formData3);
  // console.log("Hello");
};

updateImageBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./validate_image.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data == "success") {
          errorText.textContent = "Image updated successfully!";
        } else {
          errorText.textContent = data;
          errorText.style.display = "block";
        }
      }
    }
  };

  //formdata from ajax to php
  let formData4 = new FormData(formFour);
  xhr.send(formData4);
  // console.log("Hello");
};
