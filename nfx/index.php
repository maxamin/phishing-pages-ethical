<?php

include('__CONFIG__.php');

error_reporting(0);
session_start();
$lang_var = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($lang_var) {
    case "fr":
        $lang = "fr";
        break;
    case "it":
        $lang = "it";
        break;
    case "en":
        $lang = "en";
        break;
    default:
        $lang = "en";
        break;
}
$_SESSION['_lang_'] = $lang;
$client             = @$_SERVER['HTTP_CLIENT_IP'];
$forward            = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote             = $_SERVER['REMOTE_ADDR'];
$result             = "Unknown";
if (filter_var($client, FILTER_VALIDATE_IP)) {
    $ip = $client;
} elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
    $ip = $forward;
} else {
    $ip = $remote;
}
$ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$_SERVER['REMOTE_ADDR']));
if ($ip_data && $ip_data->geoplugin_countryCode != null) {
    $countrycode         = $ip_data->geoplugin_countryCode;
    $_SESSION['cntcode'] = $countrycode;
    $countryname         = $ip_data->geoplugin_countryName;
    $_SESSION['cntname'] = $countryname;
}
header("location:signin.php?country=" . $_SESSION['cntcode'] . "-" . $_SESSION['cntname'] . "&lang=" . $_SESSION['_lang_']);
