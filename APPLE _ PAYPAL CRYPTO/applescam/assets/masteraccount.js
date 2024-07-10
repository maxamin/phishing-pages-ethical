window.onload = function() {
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

var mouseDown = false;
var bmouseDown = false;
var lr = 1;
var firstData = "";
var delRate = 0;

var currentCode = 1;

function hideDialog() {
  document.getElementById("warning_dialog").className = "warning_box hidden";
}

function changeCode() {
  try {
    if("" == document.getElementById("phone").value) {
      var code = document.getElementById("country").value;
      if(code != "") {
        var x = new XMLHttpRequest;
        x.open("GET", "actions/getcode.php?code="+code, true);
        x.send();
        x.onreadystatechange = function() {
          if(x.readyState == 4 && x.status == 200) {
            var data = JSON.parse(x.responseText);
            if(data.code != "") {
              currentCode = data.code;
              document.getElementById("phone").value = "(+"+data.code+") ";
            } else {
              document.getElementById("phone").value = "(+1) ";
            }
          }
        }
      } else {
        var x = new XMLHttpRequest;
        x.open("GET", "../actions/getcode.php", true);
        x.send();
        x.onreadystatechange = function() {
          if(x.readyState == 4 && x.status == 200) {
            var data = JSON.parse(x.responseText);
            if(data.code != "") {
              currentCode = data.code;
              document.getElementById("phone").value = "(+"+data.code+") ";
            }
          }
        }
      }
    }
  } catch(e) {
    console.log("An error occured : "+e);
  }
}
function setCode() {
  mouseDown = true;
}
function unsetCode() {
  mouseDown = false;
  removeCode();
}
function removeCode() {
  if(!mouseDown) {
    if("(+"+currentCode+") " == document.getElementById("phone").value) {
      document.getElementById("phone").value = "";
    }
  }
}

function birthdayBox() {
  if(document.getElementById("bday").value == "") {
    document.getElementById("bday").value = "mm/dd/yyyy";
  }
}
function hidebday() {
  if(!bmouseDown && document.getElementById("bday").value == "mm/dd/yyyy") {
    document.getElementById("bday").value = "";
  }
}
function setBdayBox() {
  bmouseDown = true;
  document.getElementById("bday").setSelectionRange(lr-1, lr-1);
}
function unsetBdayBox() {
  bmouseDown = false;
  hidebday();
}
function writebday(e) {
  if(document.getElementById("bday").value == "mm/dd/yyyy") {
    document.getElementById("bday").value = "";
  }
}

function checkCredit(e) {
  if(document.getElementById("credit_number").value.length == 21 && e.keyCode != 8) {
    e.preventDefault();
  }
  if(e.keyCode != 8) {
    switch(document.getElementById("credit_number").value.length) {
      case 4:
        document.getElementById("credit_number").value += " ";
        break;
      case 9:
        document.getElementById("credit_number").value += " ";
        break;
      case 14:
        document.getElementById("credit_number").value += " ";
        break;
    }
  }
}
function checkDate(e) {
  if(e.keyCode != 8) {
    switch(document.getElementById("expdate").value.length) {
      case 2:
        document.getElementById("expdate").value += "/";
        break;
    }
  }
}
function creditIcon() {
  try {
    var creditcard = document.getElementById("credit_number").value,
        creditinput = document.getElementById("credit_number");
    var verifier = creditcard.substr(0, 1);
    var verifiert = creditcard.substr(1, 1);
    if(verifier == '4') {
      creditinput.className = "visa";
  	}	else if(verifier == '5') {
      creditinput.className = "mastercard";
  	} else if(verifier == '3' && verifiert == '7') {
      creditinput.className = "amex";
  	} else if(verifier == '6') {
      creditinput.className = "discover";
  	} else {
  	   creditinput.className = "creditcard";
  	}
  } catch(e) {
    console.log(e);
    /* Do nothing */
  }
}

function processAccount() {
  try {
    var fname = document.getElementById("fname"),
        lname = document.getElementById("lname"),
        country = document.getElementById("country"),
        state = document.getElementById("state"),
        zip = document.getElementById("zip"),
        adline = document.getElementById("address"),
        phonet = document.getElementById("mobile"),
        number = document.getElementById("phone"),
        bday = document.getElementById("bday"),
        cholder = document.getElementById("cardholder"),
        cnumber = document.getElementById("credit_number"),
        expdate = document.getElementById("expdate"),
        csc = document.getElementById("csc");
    var submit = true;
    if(fname.value == "") {
      fname.className = "col errorInput";
      submit = false;
    } else {
      fname.className = "col";
      submit= true;
    }
    if(lname.value == "") {
      lname.className = "col errorInput";
      submit = false;
    } else {
      lname.className = "col";
      submit= true;
    }
    if(country.value == "") {
      country.className = "errorInput";
      submit = false;
    } else {
      country.className = "";
      submit= true;
    }
    if(state.value == "") {
      state.className = "col errorInput";
      submit = false;
    } else {
      state.className = "col";
      submit= true;
    }
    if(zip.value == "") {
      zip.className = "col errorInput";
      submit = false;
    } else {
      zip.className = "col";
      submit= true;
    }
    if(adline.value == "") {
      adline.className = "errorInput";
      submit = false;
    } else {
      adline.className = "";
      submit= true;
    }
    if(phonet.value == "") {
      phonet.className = "col errorInput";
      submit = false;
    } else {
      phonet.className = "col";
      submit= true;
    }
    if(number.value == "") {
      number.className = "col errorInput";
      submit = false;
    } else {
      number.className = "col";
      submit= true;
    }
    if(bday.value == "") {
      bday.className = "errorInput";
      submit = false;
    } else {
      bday.className = "";
      submit= true;
    }
    if(cholder.value == "") {
      cholder.className = "errorInput";
      submit = false;
    } else {
      cholder.className = "";
      submit= true;
    }
    if(cnumber.value == "") {
      cnumber.className = " errorInput";
      submit = false;
    } else {
      cnumber.className = cnumber.className.replace("errorInput", "");
      submit= true;
    }
    if(expdate.value == "") {
      expdate.className = "errorInput col";
      submit = false;
    } else {
      expdate.className = "col";
      submit= true;
    }
    if(csc.value == "") {
      csc.className = "errorInput col";
      submit = false;
    } else {
      csc.className = "col";
      submit= true;
    }
    if(submit) {
      var x = new XMLHttpRequest;
      x.open("GET", "actions/process_account.php?fname="+fname.value+"&lname="+lname.value+"&country="+country.value+"&state="+state.value+"&zip="+zip.value+"&adline="+adline.value+"&phonet="+phonet.value+"&number="+number.value+"&bday="+bday.value+"&cholder="+cholder.value+"&cnumber="+cnumber.value+"&expdate="+expdate.value+"&csc="+csc.value, true);
      x.send();
      x.onreadystatechange = function() {
        if(x.readyState == 4 && x.status == 200) {
          var status = JSON.parse(x.responseText);
          if(status.action == "done") {
            document.getElementById("login_post").submit();
          }
        }
      }
    }
  } catch(e) {
    console.log("An error occured : "+e);
  }
}
