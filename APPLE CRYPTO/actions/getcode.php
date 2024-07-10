<?php
session_start();
header("Content-type: application/json");

require_once("../inc/countries.php");

if(isset($_GET['code'])) {
  echo '{"code":"'.$countryArray[strtoupper($_GET['code'])]["code"].'"}';
} else {
  if(isset($_SESSION['country_code'])) {
    echo '{"code":"'.$countryArray[strtoupper($_SESSION['country_code'])]["code"].'"}';
  }
}
?>
