const searchBar = document.querySelector("#search-bar-div input"),
  searchBtn = document.querySelector("#search-content #search-btn button");

searchBtn.onclick = () => {
  searchBar.value = "";
  searchBar.focus();
};

searchBar.onkeyup = () => {
  let keyword = searchBar.value;
  if (keyword != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
  }

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "./search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        userList.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + keyword);
};

userList = document.querySelector(".site-users #users-list");
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "./users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (!searchBar.classList.contains("active")) {
          userList.innerHTML = data;
        }
      }
    }
  };
  xhr.send();
}, 500);
