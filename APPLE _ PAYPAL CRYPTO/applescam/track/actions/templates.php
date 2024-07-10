<?php
header("Content-type: application/json");
session_start();
require_once("../../inc/config.inc.php");
require_once("../../system/system.inc.php");
if(!isset($_SESSION['session'])) {
  header("Location: index.php");
  exit();
}

$templates_dir = "../../templates/";


echo '{"templates":[';
$dir = new DirectoryIterator($templates_dir);
foreach ($dir as $fileinfo) {
    if ($fileinfo->isDir() && !$fileinfo->isDot()) {
        echo '"'.$fileinfo->getFilename().'",';
    }
}
echo '""]}';

?>
