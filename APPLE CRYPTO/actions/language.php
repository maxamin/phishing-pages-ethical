<?php
session_start();
header("Content-type: application/json");

if(isset($_GET['code']) && $_GET['code'] != "") {
  $cd = $_GET['code'];
  if($cd == "dz" || $cd == "be" || $cd == "bj" || $cd == "bf" || $cd == "ca" || $cd == "td" || $cd == "cd" || $cd == "lu" || $cd == "ch" ||
  $cd == "gw" || $cd == "mg" || $cd == "ml" || $cd == "mu" || $cd == "ma" || $cd == "ne" || $cd == "sn" || $cd == "sc" || $cd == "tn" ||
  $cd == "fr" || $cd == "pg") {
    $_SESSION['country_code'] = $cd;
    $_SESSION['country_language'] = "fr";
  } else if($cd == "cn" || $cd == "hk" || $cd == "mo" || $cd == "sg" || $cd == "tw" || $cd == "id" || $cd == "ml" || $cd == "th") {
    $_SESSION['country_code'] = $cd;
    $_SESSION['country_language'] = "cn";
  } else if($cd == "sp" || $cd == "ar" || $cd == "bo" || $cd == "cl" || $cd == "co" || $cd == "cr" || $cd == "dp" || $cd == "ec" || $cd == "sv"
  || $cd == "gt" || $cd == "hn" || $cd == "mx" || $cd == "ni" || $cd == "pa" || $cd == "py" || $cd == "pe" || $cd == "uy" || $cd == "ve") {
    $_SESSION['country_code'] = $cd;
    $_SESSION['country_language'] = "sp";
  } else if($cd == "pt" || $cd == "ao" || $cd == "br" || $cd == "cv" || $cd == "mz" || $cd == "mo" || $cd == "st") {
    $_SESSION['country_code'] = $cd;
    $_SESSION['country_language'] = "pt";
  } else {
    $_SESSION['country_code'] = $cd;
    $_SESSION['country_language'] = "en";
  }
  echo '{"request" : "done"}';
}

?>
