const form = document.querySelector(".msg-textbox"),
  inputField = form.querySelector(".input-field"),
  sendBtn = document.querySelector(".msg-textbox #send-btn button"),
  chatBox = document.querySelector(".user-chat-area #chatbox");

form.onsubmit = (e) => {
  e.preventDefault();
};

sendBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./insert-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = "";
      }
    }
  };

  //formdata from ajax to php
  let formData = new FormData(form);
  xhr.send(formData);
  // console.log("Hello");
};

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
}, 500);
