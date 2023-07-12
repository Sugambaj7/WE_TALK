const form = document.querySelector(".signup form");
continueBtn = form.querySelector(".button input");

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
        console.log(data);
      }
    }
  };

  //formdata from ajax to php
  let formData = new FormData(form);
  xhr.send(formData);
  // console.log("Hello");
};
