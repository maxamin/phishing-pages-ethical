<?php
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
    <title>Manage your Apple ID</title>
    <link rel="stylesheet" href="assets/master.css" media="screen" title="no title" charset="utf-8">
    <link rel="icon" href="img/favicon.ico" />
    <script src="assets/masteraccount.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="navigation-bar" style="background : rgba(0,0,0,0.8) !important;">
        <div class="navigation-wrapper">
          <div class="logo" onclick="window.location='index.php'"></div>
          <ul id="menu_list">
            <li><a href="#" id="head_item1">Mac</a></li>
            <li><a href="#" id="head_item2">iPad</a></li>
            <li><a href="#" id="head_item3">iPhone</a></li>
            <li><a href="#" id="head_item4">Watch</a></li>
            <li><a href="#" id="head_item5">TV</a></li>
            <li><a href="#" id="head_item6">Music</a></li>
            <li><a href="#" id="head_item7">Support</a></li>
          </ul>
          <div class="search" id="search_icon"></div>
          <div class="shoppingbag" id="shoppingbag"></div>
          <input id="searchbox" class="searchbox hidden" placeholder="Search apple.com"/>
          <div class="cross hidden" id="krisskross"></div>
        </div>
      </div>
      <div class="account_body">
        <h1 class="headerh1">Apple’s commitment <br />to your privacy</h1>
        <p class="fpara">At Apple, your trust means everything to us. That’s why we respect your privacy and protect<br /> it with strong encryption, plus strict policies that govern how all data is handled. </p>
        <p class="fpara">Security and privacy are fundamental to the design of all our hardware, software, and<br/> services, including iCloud and new services like Apple Pay. And we continue to make<br/> improvements. Two-step verification, which we encourage all our customers to use, in<br/> addition to protecting your Apple ID account information, now also protects all of the data<br/> you store and keep up to date with iCloud.</p>
        <p class="fpara">We believe in telling you up front exactly what’s going to happen to your personal<br/> information and asking for your permission before you share it with us. And if you change<br/> your mind later, we make it easy to stop sharing with us. Every Apple product is designed<br/> around those principles. When we do ask to use your data, it’s to provide you with a better<br/> user experience. </p>
        <p class="fpara">We’re publishing this website to explain how we handle your personal information, what we<br/> do and don’t collect, and why. We’re going to make sure you get updates here about privacy<br/> at Apple at least once a year and whenever there are significant changes to our policies. </p>
        <p class="fpara">A few years ago, users of Internet services began to realize that when an online service is<br/> free, you’re not the customer. You’re the product. But at Apple, we believe a great customer<br/> experience shouldn’t come at the expense of your privacy.</p>
        <p class="fpara">Our business model is very straightforward: We sell great products. We don’t build a profile<br/> based on your email content or web browsing habits to sell to advertisers. We don’t<br/> “monetize” the information you store on your iPhone or in iCloud. And we don’t read your<br/> email or your messages to get information to market to you. Our software and services are<br/> designed to make our devices better. Plain and simple.</p>
        <p class="fpara">One very small part of our business does serve advertisers, and that’s iAd. We built an<br/> advertising network because some app developers depend on that business model, and we<br/> want to support them as well as a free iTunes Radio service. iAd sticks to the same privacy<br/> policy that applies to every other Apple product. It doesn’t get data from Health and<br/> HomeKit, Maps, Siri, iMessage, your call history, or any iCloud service like Contacts or Mail, and<br/> you can always just opt out altogether.</p>
        <p class="fpara">Finally, I want to be absolutely clear that we have never worked with any government agency<br/> from any country to create a backdoor in any of our products or services. We have also never<br/> allowed access to our servers. And we never will. </p>
        <p class="fpara">Our commitment to protecting your privacy comes from a deep respect for our customers.<br/> We know that your trust doesn’t come easy. That’s why we have and always will work as hard<br/> as we can to earn and keep it.</p>
      </div>
      <div class="footer">
        <div class="wrapper">
          <div class="main">
            <h1>More ways to shop: Visit an <a class="nonmenu click" href="">Apple Store</a>, call 1-800-MY-APPLE, or <a class="nonmenu click" href="">find a reseller</a>. </h1>
            <h2>Copyright &copy; 2017 Apple Inc. All rights reserved.</h2>
            <ul>
              <li><a class="nonmenu" href="">Privacy Policy</a></li>
              <div class="stick"></div>
              <li><a class="nonmenu" href="">Terms of Use</a></li>
              <div class="stick"></div>
              <li><a class="nonmenu" href="">Sales and Refunds</a></li>
              <div class="stick"></div>
              <li><a class="nonmenu" href="">Legal</a></li>
              <div class="stick"></div>
              <li><a class="nonmenu" href="">Site Map</a></li>
              <li class="country"><div class="mini_flag <?php echo $code_class[$_SESSION['country_code']]; ?>"></div><a class="nonmenu" href="language.php"><?php echo $code_country[$_SESSION['country_code']]; ?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
