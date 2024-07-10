<?php
session_start();
if(isset($_SESSION['session'])) {
  header("Location: dashboard.php");
  exit();
}
?>
<html>
  <head>
    <title>CryptoTracker V 0.2</title>
    <link rel="stylesheet" href="assets/master.css" media="screen" title="no title" charset="utf-8">
    <script src="assets/master.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="login-form drop">
      <div class="login-box">
        <input type="text" placeholder="Username" id="login[username]" />
        <input type="password" placeholder="Password" id="login[password]" />
        <button onclick="signin()">Sign In</button>
      </div>
    </div>
  </body>
</html>
