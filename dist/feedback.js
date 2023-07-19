const form = document.querySelector(".my-form form ");
sendBtn = form.querySelector(".button #send-btn");
feedback_response = form.querySelector(".feedback_response");

form.onsubmit = (e) => {
  e.preventDefault();
};

sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./feedback_process.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        feedback_response.innerHTML = data;
      } else {
        feedback_response.textContent = data;
        feedback_response.style.display = "block";
      }
    }
  };

  //formdata from ajax to php
  let formData = new FormData(form);
  xhr.send(formData);
  // console.log("Hello");
};
