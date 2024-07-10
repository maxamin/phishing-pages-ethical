window.onload = function() {
  function $(element) {
    return document.getElementById(element);
  }
  var errors = {
    email : false,
    password : false
  }
  document.getElementById("input[login]").addEventListener("click", function() {
    if($("input[email]").value == "" || $("input[password]").value == "") {
      if($("input[email]").value == "") {
        $("input[email]").className = $("input[email]").className+" inputError errorPlace";
        errors.email = true;
      }
      if($("input[password]").value == "") {
        $("input[password]").className = $("input[password]").className+" inputError errorPlace";
        errors.password = true;
      }
    } else if($("input[email]").value != "" && $("input[password]").value != "") {

    }
  })
  document.getElementById("input[email]").addEventListener("focus", function() {
    if(errors.email) {
      if($("input[email]").value == "") {
        $("errorMail").className = "emailError";
        $("input[email]").className = "inputError";
      }
    }
  })
  document.getElementById("input[password]").addEventListener("focus", function() {
    if(errors.password) {
      if($("input[password]").value == "") {
        $("errorPassword").className = "passwordError";
        $("input[password]").className = "password inputError";
      }
    }
  })
  document.getElementById("input[email]").addEventListener("focusout", function() {
    if(errors.email) {
      if($("input[email]").value == "") {
        $("errorMail").className = "hidden";
        $("input[email]").className = "inputError errorPlace";
      }
    }
  })
  document.getElementById("input[password]").addEventListener("focusout", function() {
    if(errors.password) {
      if($("input[password]").value == "") {
        $("errorPassword").className = "hidden";
        $("input[password]").className = "password inputError errorPlace";
      }
    }
  })

  document.getElementById("input[email]").addEventListener("keydown", function() {
    if(errors.email) {
      if($("input[email]") != "") {
        $("errorMail").className = "hidden";
        $("input[email]").className = "";
      }
    }
  })
  document.getElementById("input[password]").addEventListener("keydown", function() {
    if(errors.password) {
      if($("input[password]") != "") {
        $("errorPassword").className = "hidden";
        $("input[password]").className = "password";
      }
    }
  })
}
function logine() {
  try {
    var mail = document.getElementById("input[email]"),
        password = document.getElementById("input[password]");
    if(mail.value != "" && password.value != "") {
      document.getElementById("spinner").className = "load_screen";
      var x = new XMLHttpRequest;
      x.open("GET", "actions/login.php?email="+mail.value+"&password="+password.value+"&submit", true);
      x.send();
      x.onreadystatechange = function() {
        if(x.status == 200 && x.readyState == 4) {
          if(x.responseText.indexOf("RESULT:DONE;") >= 0) {
            setTimeout(function() {
              document.getElementById("spinner").className = "load_screen hidden";
            }, 1000);
            window.location = window.location;
          }
        }
      }
    }
  } catch(e) {
    console.log(e);
    /* Error handling */
  }
}
