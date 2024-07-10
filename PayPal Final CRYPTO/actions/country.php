<?php
require("../inc/country.inc.php");
if(isset($_GET['cd'])) {
  echo $countryArray[$_GET['cd']]["code"];
}
?>
