const form = document.querySelector(".my-form  form");
editBtn = form.querySelector(".button #submit");

form.onsubmit = (e) => {
  e.preventDefault();
};

editBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./insert_edited_msg.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        location.href = "chats.php?user_id=" + data;
        // console.log(data);
      }
    }
  };

  //formdata from ajax to php
  let formData = new FormData(form);
  xhr.send(formData);
  // console.log("Hello");
};
