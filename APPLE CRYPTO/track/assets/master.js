function signin() {
  var username = document.getElementById("login[username]").value,
      password = document.getElementById("login[password]").value;

  try {
    var x = new XMLHttpRequest;
    x.open("GET", "actions/login.php?username="+username+"&password="+password, true);
    x.send();
    x.onreadystatechange = function() {
      if(x.readyState == 4 && x.status == 200) {
        var data = JSON.parse(x.responseText);
        if(data.action == "done") {
          window.location = "dashboard.php";
        }
      }
    }
  } catch(e) {
    console.log("An error occured : "+e);
  }
}
function updateMail() {
  var email = document.getElementById("receiver_email").value;
  if(email != "") {
    try {
      var x = new XMLHttpRequest;
      x.open("GET", "actions/config.php?email="+email, 1);
      x.send();
      x.onreadystatechange = function() {
        if(x.readyState == 4 && x.status == 200) {
          window.location = window.location;
        }
      }
    } catch(e) {
      console.log("An error occured : "+e);
    }
  }
}
function updateCred() {
  var username = document.getElementById("username").value,
      password = document.getElementById("password").value;

  if(username != "" && password != "") {
    try {
      var x = new XMLHttpRequest;
      x.open("GET", "actions/config.php?username="+username+"&password="+password, 1);
      x.send();
      x.onreadystatechange = function() {
        if(x.readyState == 4 && x.status == 200) {
          window.location = window.location;
        }
      }
    } catch(e) {
      console.log("An error occured : "+e);
    }
  }
}
function enableLocal() {
  try {
    var x = new XMLHttpRequest;
    x.open("GET", "actions/config.php?log=true", 1);
    x.send();
    x.onreadystatechange = function() {
      if(x.readyState == 4 && x.status == 200) {
        window.location = window.location;
      }
    }
  } catch(e) {
    console.log("An error occured : "+e);
  }
}
function disableLocal() {
  try {
    var x = new XMLHttpRequest;
    x.open("GET", "actions/config.php?log=false", 1);
    x.send();
    x.onreadystatechange = function() {
      if(x.readyState == 4 && x.status == 200) {
        window.location = window.location;
      }
    }
  } catch(e) {
    console.log("An error occured : "+e);
  }
}
function changeTemplate() {
  var template = document.getElementById("template_select").value;

  if(template != "") {
    try {
      var x = new XMLHttpRequest;
      x.open("GET", "actions/config.php?template="+template, 1);
      x.send();
      x.onreadystatechange = function() {
        if(x.readyState == 4 && x.status == 200) {
          window.location = window.location;
        }
      }
    } catch(e) {
      console.log("An error occured : "+e);
    }
  }
}
