<?php
define("INC", "true");
require_once("../inc/system.inc.php");
if(!$_setup) {
  include("setup.php");
} else {
  echo "ERROR:ALREADY_INSTALLED";
}
?>
