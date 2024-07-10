<?php
header("Content-type: application/json");
session_start();
require_once("../../inc/config.inc.php");

if(isset($_GET['username']) && isset($_GET['password'])) {
  if($_GET['username'] == $username && $_GET['password'] == $password) {
    $_SESSION['session'] = "loggedin";
    echo '{"action":"done"}';
  } else {
    echo '{"action":"failed"}';
  }
}
?>
