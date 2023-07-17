const feedback = document.querySelector(".feedback");
delete_user = document.querySelector(".delete_user");
update_psw = document.querySelector(".update_psw");

content = document.querySelector(".content");

feedback.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "./view_feedback.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        content.innerHTML = data;
      }
    }
  };
  xhr.send();
};
update_psw.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "./update_password.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        content.innerHTML = data;
      }
    }
  };
  xhr.send();
};
delete_user.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "./delete_user.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        content.innerHTML = data;
      }
    }
  };
  xhr.send();
};
