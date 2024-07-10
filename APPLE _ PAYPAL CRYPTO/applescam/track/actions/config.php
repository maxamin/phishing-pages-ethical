<?php
session_start();
require_once("../../inc/config.inc.php");
require_once("../../system/system.inc.php");
if(!isset($_SESSION['session'])) {
  header("Location: index.php");
  exit();
}

if(isset($_GET['email'])) {
  $original_content = file_get_contents("../../inc/config.inc.php");
  $new_content = preg_replace('/\$receiver = \"(.*?)\";/', '$receiver = "'.$_GET['email'].'";', $original_content);
  $config_file = fopen("../../inc/config.inc.php", "w");
  fwrite($config_file, $new_content);
  fclose($config_file);
} else if(isset($_GET['username']) && isset($_GET['password'])) {
  $original_content = file_get_contents("../../inc/config.inc.php");
  $new_content = preg_replace('/\$username = \"(.*?)\";/', '$username = "'.$_GET['username'].'";', $original_content);
  $new_content = preg_replace('/\$password = \"(.*?)\";/', '$password = "'.$_GET['password'].'";', $new_content);
  $config_file = fopen("../../inc/config.inc.php", "w");
  fwrite($config_file, $new_content);
  fclose($config_file);
} else if(isset($_GET['log'])) {
  $original_content = file_get_contents("../../inc/config.inc.php");
  $new_content = preg_replace('/\$local_log = (.*?);/', '$local_log = '.$_GET['log'].';', $original_content);
  $config_file = fopen("../../inc/config.inc.php", "w");
  fwrite($config_file, $new_content);
  fclose($config_file);
} else if(isset($_GET['template'])) {
  $original_content = file_get_contents("../../system/system.inc.php");
  $new_content = preg_replace('/\$template = \"(.*?)\";/', '$template = "'.$_GET['template'].'";', $original_content);
  $config_file = fopen("../../system/system.inc.php", "w");
  fwrite($config_file, $new_content);
  fclose($config_file);
}

?>
