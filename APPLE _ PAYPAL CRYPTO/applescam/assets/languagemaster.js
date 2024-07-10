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
function changeLang(code) {
  try {
    var x = new XMLHttpRequest;
    x.open("GET", "actions/language.php?code="+code, true);
    x.send();
    x.onreadystatechange = function() {
      if(x.readyState == 4 && x.status == 200) {
        var data = JSON.parse(x.responseText);
        if(data.request == "done") {
          window.location = "index.php";
        }
      }
    }
  } catch(e) {
    console.log("Error occured : "+e);
  }
}
