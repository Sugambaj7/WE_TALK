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
        scrllToButtom();
      }
    }
  };

  //formdata from ajax to php
  let formData = new FormData(form);
  xhr.send(formData);
  // console.log("Hello");
};
chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
};
chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
};
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chatBox.innerHTML = data;
        if (!chatBox.classList.contains("active")) {
          scrllToButtom();
        }
      }
    }
  };

  let formData = new FormData(form);
  xhr.send(formData);
}, 500);

function scrllToButtom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
