<?php
session_start();
error_reporting(0);
include("../inc/config.inc.php");
if(isset($_SESSION['pass'])) {
  if($_SESSION['pass'] == $trackpass) {
    ?>
    <script type="text/javascript">
      window.location = "dashboard.php";
    </script>
    <?php
  }
}
if(isset($_POST['pass'])) {
  if($_POST['pass'] == $trackpass) {
    $_SESSION['pass'] = $trackpass;
    ?>
    <script type="text/javascript">
      window.location = "dashboard.php";
    </script>
    <?php
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CryptoLog System V 0.1 | Login ! </title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content" style="margin-top : 32.5%;">
            <form action="" method="post">
              <h1>CryptoLog</h1>
              <div>
                <input type="password" name="pass" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" style="width : 100%;">Log in</<button>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
