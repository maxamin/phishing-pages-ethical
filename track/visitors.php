<?php
session_start();
error_reporting(0);
include("../inc/config.inc.php");
include("inc/country.inc.php");
if(isset($_SESSION['pass'])) {
  if($_SESSION['pass'] != $trackpass) {
    exit();
  }
} else {
  exit();
}
$logfile = "log.txt";
if (file_exists($logfile)) {
    $handle = fopen($logfile, "r");
    $log = fread($handle, filesize($logfile));
    fclose($handle);
} else {
    die ("The log file doesn't exist!");
}
$log = explode("\n", trim($log));
for ($i = 0; $i < count($log); $i++) {
    $log[$i] = trim($log[$i]);
    $log[$i] = explode('|', $log[$i]);
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

    <title>CryptoTracker V 0.1 | Visitors</title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="assets/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="assets/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="dashboard.php" class="site_title"><i class="fa fa-paw"></i> <span>Dashboard</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>CryptoRhythm</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Management</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i>Dashboard</a></li>
                  <li><a href="visitors.php"><i class="fa fa-users"></i>Visitors</a></li>
                </ul>
              </div>
            </div>
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.png" alt="">CryptoRhythm
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Visitors <small>All visitors</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Flag</th>
                        <th>IP Address</th>
                        <th>Country</th>
                        <th>Referrer</th>
                        <th>Date</th>
                        <th>Page</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                              foreach ($log as $logline) {
                        echo '<tr>';
                        echo '<td> <img src="flags/'.strtolower($logline[0]).'.png" /></td>';
                        echo '<td>' . $logline[1] . '</td>';
                        echo '<td>' . $countryArray[$logline[0]]["name"] . '</td>';
                        echo '<td>' . urldecode($logline[2]) . '</td>';
                        echo '<td>' . date('d/m/Y', $logline[3]) . '</td>';
                        echo '<td>' . $logline[4] . '</td>';
                        echo '</tr>';

                    }
                            ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="assets/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="assets/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="assets/Flot/jquery.flot.js"></script>
    <script src="assets/Flot/jquery.flot.pie.js"></script>
    <script src="assets/Flot/jquery.flot.time.js"></script>
    <script src="assets/Flot/jquery.flot.stack.js"></script>
    <script src="assets/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="assets/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="assets/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="assets/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="assets/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="assets/jqvmap/dist/jquery.vmap.js"></script>
    <script src="assets/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="assets/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="assets/moment/min/moment.min.js"></script>
    <script src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="assets/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="assets/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="assets/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="assets/jszip/dist/jszip.min.js"></script>
    <script src="assets/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
  </body>
</html>
