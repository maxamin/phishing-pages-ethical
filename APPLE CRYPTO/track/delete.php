<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../system/system.inc.php");
require_once("../inc/encryption.inc.php");
require_once("../inc/cryptodb.inc.php");
if(!isset($_SESSION['session'])) {
  header("Location: index.php");
  exit();
}

$visitorsdb = new CryptoDB("db/visitors.cryptodb");
$accountsdb = new CryptoDB("db/accounts.cryptodb", $password);
$creditsdb = new CryptoDB("db/credit.cryptodb", $password);

if(isset($_GET['type']) && isset($_GET['id'])) {
  if($_GET["type"] == "visitor") {
    $visitorsdb->deleteRow("visitors", $_GET['id']);
    ?>
    <script type="text/javascript">
      window.location = "visitors.php";
    </script>
    <?php
  } else if($_GET['type'] == "account") {
    $accountsdb->deleteRow("accounts", $_GET['id']);
    ?>
    <script type="text/javascript">
      window.location = "accounts.php";
    </script>
    <?php
  } else if($_GET['type'] == "credit") {
    $creditsdb->deleteRow("credits", $_GET['id']);
    ?>
    <script type="text/javascript">
      window.location = "credits.php";
    </script>
    <?php
  }
}
?>
