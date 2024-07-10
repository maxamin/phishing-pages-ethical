<?php
function track($page, $country) {
$ipaddress = $_SERVER['REMOTE_ADDR'];
$referrer = $_SERVER['HTTP_REFERER'];
$datetime = mktime();
$logline = $country . '|' . $ipaddress . '|' . $referrer . '|' . $datetime . '|' .$page . "\n";

// Write to log file:
$logfile = 'track/log.txt';

// Open the log file in "Append" mode
if (!$handle = fopen($logfile, 'a+')) {
    die("");
}

// Write $logline to our logfile.
if (fwrite($handle, $logline) === FALSE) {
    die("");
}

fclose($handle);
}

?>
