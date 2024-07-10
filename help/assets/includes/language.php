<?php

require_once("geoip.inc");

if(isset($_SERVER["HTTP_CF_CONNECTING_IP"])){
    $ipadr = $_SERVER["HTTP_CF_CONNECTING_IP"];
} else $ipadr = $_SERVER['REMOTE_ADDR'];


$gi = geoip_open("assets/includes/GeoIP.dat", GEOIP_STANDARD);
$country_name = geoip_country_name_by_addr($gi, $ipadr);
geoip_close($gi);

if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
    setcookie('lang', $lang, time() + (3600 * 24 * 30));
} else if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}

switch ($lang) {
    default:
        $lang_file = 'lang.other.php';

        if ($country_name == "Australia") {
            $lang_file = 'lang.au.php';
            //echo "Australia";
        }
        if ($country_name == "United Kingdom") {
            $lang_file = 'lang.gb.php';
            //echo "United Kingdom";
        }
        if ($country_name == "United States") {
            $lang_file = 'lang.usa.php';
            //echo "United States";
        }
        if ($country_name == "Hong Kong") {
            $lang_file = 'lang.hk.php';
            //echo "Hong Kong";
        }
        if ($country_name == "Canada") {
            $lang_file = 'lang.ca.php';
            //echo "Canada";
        }
        if ($country_name == "Ireland") {
            $lang_file = 'lang.ie.php';
            //echo "Ireland";
        }
        if ($country_name == "Thailand") {
            $lang_file = 'lang.th.php';
            //echo "Thailand";
        }
         if ($country_name == "India") {
            $lang_file = 'lang.in.php';
            //echo "India";
        }
         if ($country_name == "Kuwait") {
            $lang_file = 'lang.kw.php';
            //echo "Kuwait";
        }
         if ($country_name == "Greece") {
            $lang_file = 'lang.gr.php';
            //echo "Greece";
        }
        if ($country_name == "Cyprus") {
            $lang_file = 'lang.cy.php';
            //echo "Cyprus";
        }
        if ($country_name == "Saudi Arabia") {
            $lang_file = 'lang.sa.php';
            //echo "Saudi Arabia";
        }
        if ($country_name == "New Zealand") {
            $lang_file = 'lang.nz.php';
            //echo "New Zealand";
        }
        if ($country_name == "Qatar") {
            $lang_file = 'lang.qa.php';
            //echo "Qatar";
        }
}

include_once 'languages/' . $lang_file;