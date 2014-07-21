<?php 
$File1Name = dirname($_SERVER['PHP_SELF'])."/";
$File2Name = $_SERVER['PHP_SELF'];
$File3Name=str_replace($File1Name, null, $File2Name);
if ($File3Name=="banned.php"||$File3Name=="/banned.php") {
	echo "<title>".$File3Name." (PHP File)</title>\n\r<b>Warning</b>: Failed to open stream: Permission denied in <b>".$File3Name."</b> on line <b>1</b>!<br />";
	exit(); }
$HTTP_USER_AGENT = preg_replace("/MSIE/isxS", "MSIE", $HTTP_USER_AGENT);
preg_match("/MSIE/isxS", $HTTP_USER_AGENT, $IE);
/*Ban IE Users
if($IE[0]=="MSIE"){
	$act="GetFireFox"; }*/
//Ban Code Start
$banned_host = array(); 
$banned_host[] = 'www.test.com'; 
$banned_ip = array(); 
$banned_ip[] = '66.99.246.226'; 
$banned_ip[] = '24.11.131.86';
foreach($banned_host as $bannedHost) {
$banned_ip[] = gethostbyname($bannedHost); }
$banned_id = array(); 
$banned_id[] = ''; 
$sid = session_id();
foreach($banned_ip as $banned) { 
    if($_SERVER['HTTP_X_FORWARDED_FOR']) { $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; }
	else { $ip = $_SERVER['REMOTE_ADDR']; } 
    if($ip == $banned){ 
        echo "<title> You are Banned From Here. </title><br /><br /><br /><br /><br />Your banned From Here!<br />The IP of: " . $_SERVER['REMOTE_ADDR'];
		echo " is Banned From Here";
        exit(); 
    } }
foreach($banned_id as $banned) { 
	if($sid == $banned_id){ 
        echo "<title> You are Banned From Here. </title><br /><br /><br /><br /><br />Your banned From Here!<br />The ID of: " . session_id();
		echo " is Banned From Here";
        exit(); 
    } }
?>