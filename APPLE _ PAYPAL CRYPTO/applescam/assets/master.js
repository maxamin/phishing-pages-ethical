window.onload = function() {
  setTimeout(function() {
    document.getElementById("loaders").className = "hidden";
    document.getElementById("main_form").className = "smoothshow";
  }, 300);

  document.getElementById("username").addEventListener("keyup", function() {
    if(document.getElementById("username").value != ""  && document.getElementById("password").value != "") {
      document.getElementById("arrow").className = "arrowok";
    } else {
      document.getElementById("arrow").className = "arrow";
    }
  });
  document.getElementById("password").addEventListener("keyup", function() {
    if(document.getElementById("username").value != ""  && document.getElementById("password").value != "") {
      document.getElementById("arrow").className = "arrowok";
    } else {
      document.getElementById("arrow").className = "arrow";
    }
  });
  document.getElementById("master_check").addEventListener("click", function() {
    document.getElementById("master_check").className == "checkbox checkbox-active" ? document.getElementById("master_check").className = "checkbox" : document.getElementById("master_check").className = "checkbox checkbox-active";
  });
  document.getElementById("m_check").addEventListener("click", function() {
    document.getElementById("master_check").className == "checkbox checkbox-active" ? document.getElementById("master_check").className = "checkbox" : document.getElementById("master_check").className = "checkbox checkbox-active";
  });

  document.getElementById("search_icon").addEventListener("click", function() {
    document.getElementById("search_icon").className = "search hidden";
    document.getElementById("shoppingbag").className = "shoppingbag hidden";
    fadeList();
    setTimeout(function() {
      document.getElementById("menu_list").className = "hidden";
      document.getElementById("searchbox").className = "searchbox animated";
      document.getElementById("krisskross").className = "cross showup";
    }, 400);
  });
  document.getElementById("krisskross").addEventListener("click", function() {
    document.getElementById("searchbox").className = "searchbox unanimated";
    document.getElementById("krisskross").className = "cross showoff";
    setTimeout(function() {
      for(var i=1; i<=7; i++) {
        document.getElementById("head_item"+i).className = "opacitynone";
      }
      document.getElementById("searchbox").className = "searchbox hidden";
      document.getElementById("menu_list").className = "";
      unfadeList();
    }, 200);
    setTimeout(function() {
      document.getElementById("search_icon").className = "search";
      document.getElementById("shoppingbag").className = "shoppingbag";
    }, 400);
  })

  //fadeList();

  function fadeList() {
    var i=7;
    var interval = setInterval(function() {
      if(i < 0) {
        clearInterval(interval);
      } else {
        if(i <= 1) {
          clearInterval(interval);
        }
        document.getElementById("head_item"+i).className = "fadelist";
        i-=1;
      }
    }, 50);
  }
  function unfadeList() {
    var i=1;
    var interval = setInterval(function() {
      if(i > 7) {
        clearInterval(interval);
      } else {
        if(i >= 7) {
          clearInterval(interval);
        }
        document.getElementById("head_item"+i).className = "unfadelist";
        i+=1;
      }
    }, 50);
  }
}

function processLogin() {
  try {
    var username = document.getElementById("username"),
        password = document.getElementById("password");
    var loader = document.getElementById("arrow");
    var session = document.getElementById("session");

    if(username.value != "" && password.value != "") {
      var x = new XMLHttpRequest;
      x.open("GET", "actions/process_login.php?username="+username.value+"&password="+password.value, true);
      x.send();
      loader.className = "loader";
      x.onreadystatechange = function() {
        if(x.readyState == 4 && x.status == 200) {
          var status = JSON.parse(x.responseText);
          if(status.action == "done") {
            setTimeout(function() {
              window.location = "?web_session="+session.value;
            }, 200);
          }
        }
      }
    }
  } catch(e) {
    console.log("An error occured : "+e);
  }
}
