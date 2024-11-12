<?php
/*Time to See How Long it Takes to Load*/
require( '../Settings.php');
if ($Settings['use_gzip']==true) {
if($Settings['preinset']=="on") {
ini_set("zlib.output_compression","On");
ini_set("zlib.output_compression_level","2"); }
ob_start( 'ob_gzhandler' );	}
/*ini_set("session.save_path","http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/misc/tmp");
session_save_path("http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/misc/tmp");*/
require('../misc/SafeSQL.class.php');
$SessionPre = $Settings['sql_tableprefix'];
/*if ($SessionPre==null) {
	$SessionPre = "DF2k_"; }*/
session_name($SessionPre.'ID');
if($Settings['preinset']=="on") {
ini_set("session.name",$SessionPre."ID"); }
session_cache_limiter('private_no_expire');
session_cache_expire(60);
if($Settings['preinset']=="on") {
ini_set("session.use_trans_sid","1");
ini_set("session.use_cookies","1");
ini_set("session.use_only_cookies","1");
ini_set("magic_quotes_gpc","On");
//ini_set("magic_quotes_runtime","On");
ini_set("default_charset","iso-8859-15");
ini_set("display_errors","On");
ini_set("log_errors","On");
ini_set("log_errors_max_len",1024); 
/*session.hash_function allows you to specify the 
hash algorithm used to generate the session IDs
'0' means MD5 (128 bits) and '1' means SHA-1 (160 bits)*/
ini_set("session.hash_function","1"); }
session_set_cookie_params(3600);
if($Settings['preinset']=="on") {
ini_set("ssession.cookie_lifetime",3600); }
session_start();
/* Change Some PHP Settings Fix the & to &amp; */
if($Settings['preinset']=="on") {
ini_set("arg_separator.output","&amp;"); }
/*putenv("TZ=US/Central");*/
$starttime = microtime();
$startarray = explode(" ", $starttime);
$starttime = $startarray[1] + $startarray[0];
/*Your DataBase info and Board Name Here*/
$BoardName=$Settings['board_name'];
if($Settings['preinset']=="on") {
ini_set("user_agent",$BoardName); }
$AdminPassword=$Settings['admin_password'];//Password used to add new Forums
$username=$Settings['sql_username'];
$password=$Settings['sql_password'];
$database=$Settings['sql_database'];
$TablePreFix=$Settings['sql_tableprefix'];//Is the PreFix Name of the Table
$mysqlhost=$Settings['sql_host'];//Might be localhost
/* Board info Here */
$KeyWords=$Settings['board_keywords'];
$Description=$Settings['board_description'];
$TitleLine = "-";
$NewBoardURL['Change'] = $TablePreFix.$database;
if ($_SESSION['BoardURL']==null) {
$_SESSION['BoardURL']	 = $TablePreFix.$database; }
if ($_SESSION['BoardURL']!=$NewBoardURL['Change']) {
session_unregister(UserName);
session_unregister(UserID);
session_unregister(UserGroup);
session_unregister(UserTimeZone);
$_SESSION['MemberName']=null;
$_SESSION['UserID']=0;
$_SESSION['UserGroup']="Guest";
$_SESSION['UserTimeZone']=0;
$_SESSION['BoardURL']	 = $TablePreFix.$database; }
/* Turn HTML on or off */
$DOHTML=$Settings['board_html'];
// IP Thing
if ($_SESSION['UserIP']!=$_SERVER['REMOTE_ADDR']) {
$_SESSION['UserIP'] = $_SERVER['REMOTE_ADDR']; }
if ($_SESSION['UserGroup']==null) {
session_unregister(UserName);
session_unregister(UserID);
session_unregister(UserGroup);
session_unregister(UserTimeZone);
$_SESSION['MemberName']=null;
$_SESSION['UserID']=0;
$_SESSION['UserGroup']="Guest";
$_SESSION['UserTimeZone']=0; }
if ($_SESSION['UserGroup']=="Guest") {
session_unregister(UserName);
session_unregister(UserID);
session_unregister(UserGroup);
session_unregister(UserTimeZone);
$_SESSION['MemberName']=null;
$_SESSION['UserID']=0;
$_SESSION['UserGroup']="Guest";
$_SESSION['UserTimeZone']=0; }
$_SESSION['DF2kVer']="v3.2.T<!-- Renee Sabonis is very lovely/Cute. ^_^ -->&nbsp;Beta 4";
//Skining Stuff
if ($HTTP_COOKIE_VARS[UseSkin]==null) {
setcookie("UseSkin", 1, time() + (7 * 86400) ); }
if ($_SESSION['Browser']==null) {
$_SESSION['Browser']=$_SERVER['HTTP_USER_AGENT']; }
if ($_SESSION['Browser']!=null) {
	if ($_SESSION['Browser']!=$_SERVER['HTTP_USER_AGENT']) {
		session_regenerate_id();
		session_unregister(UserName);
		session_unregister(UserID);
		session_unregister(UserGroup);
		session_unregister(UserTimeZone);
		session_unregister(UserTimeZone);
		$_SESSION['MemberName']=null;
		$_SESSION['UserID']=0;
		$_SESSION['UserGroup']="Guest";
		$_SESSION['UserTimeZone']=SeverOffSet(null);
		$_SESSION['Browser']=$_SERVER['HTTP_USER_AGENT']; }
if ($_SESSION['Browser']!=$_SERVER['HTTP_USER_AGENT']) {
	$_SESSION['Browser']=$_SERVER['HTTP_USER_AGENT'];
} }
if ($_SESSION['Skin']==null) {
$_SESSION['Skin'] = $HTTP_COOKIE_VARS[UseSkin]; }
if ($_GET['SetSkin']!=null) {
setcookie("UseSkin", $_GET['SetSkin'], time() + (7 * 86400) );
$_SESSION['Skin'] = $_GET['SetSkin']; }
if ($_SESSION['Skin']>=3) {
setcookie("UseSkin", 2, time() + (7 * 86400) );
$_SESSION['Skin'] = 2; }
if ($_SESSION['Skin']<=1) {
setcookie("UseSkin", 1, time() + (7 * 86400) );
$_SESSION['Skin'] = 1; }
if ($_SESSION['UserTimeZone']==null) {
$_SESSION['UserTimeZone']=0;
if ($_SESSION['UserGroup']=="Guest") {
$_SESSION['UserTimeZone']=-6; } }
$YourOffSet = $_SESSION['UserTimeZone'];
if ($_SESSION['YourID']==null) {
$_SESSION['YourID1'] = uniqid(rand(), true);
$_SESSION['YourID2'] = md5($_SESSION['YourID1']);
$_SESSION['YourID3'] = sha1($_SESSION['YourID2']); }
if ($_SESSION['YourID']!=null) { /* Do Somthing Cool Here! */ }
//Set to text/html or application/xhtml+xml
header('Content-type: text/html');
//$DTDURL = " \"http://www.w3.org/TR/html4/loose.dtd\"";
//$DTDURL = " \"http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/misc/html4.dtd\"";
$DTDURL = null;
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN"<?php echo $DTDURL; ?>>
<html>
<head>
<meta http-equiv="content-language" content="en-us">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-15">
<meta name="robots" content="noindex,follow"> 
<meta http-equiv="IMAGETOOLBAR" content="false">
<?php
$URLPart	 = $_SERVER['PHP_SELF'];
$URLPart	 = preg_replace("/\/\//isxS", "/", $URLPart);
$Google['ads'] = false;
?>
<base href="<?php echo "http://".$_SERVER['HTTP_HOST'].$URLPart; ?>">
<link rel="prefetch" href="../misc/FavIcon.png">
<link rel="prefetch" href="../misc/Toggle.js">
<link rel="prefetch alternate stylesheet" title="Designed for DF2k" href="../Skin/Skin1/CSS.php">
<link rel="prefetch alternate stylesheet" title="Designed for DF2k" href="../Skin/Skin2/CSS.php">
<link rel="stylesheet" type="text/css" href="../Skin/Skin<?php echo $_SESSION["Skin"] ?>/CSS.php" media="all">
<link rel="icon" href="../misc/FavIcon.png" type="image/png">
<script type="text/javascript" src="../misc/Toggle.js"></script>
<script type="text/javascript" language="Javascript">
<!--
/* lycos.co.uk Fix	 */
if (window != window.top)
top.location.href = location.href;
// Copyright 1999 InsideDHTML.com, LLC.  

function doBlink() {
  // Blink, Blink, Blink...
  var blink = document.all.tags("BLINK")
  for (var i=0; i < blink.length; i++)
    blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}

function startBlink() {
  // Make sure it is IE4
  if (document.all)
    setInterval("doBlink()",1000)
}
function echo(Text) {
document.writeln(Text);
}
function title(Text) {
document.title=Text;
}
function BGColor(Text) {
document.bgColor=Text;
}
function	message(Text) {
alert(Text);
}
function ask(Text) {
confirm(Text);
}
function ask2(Text1,Text2) {
prompt(Text1, Text2);
}
function NewWindow(Text1,Text2) {
window.open(Text1,Text2);
}
function NewWindow2(Text1,Text2,Text3) {
window.open(Text1,Text2,Text3);
}
function BrowserInfo() {
document.writeln(navigator.appName);
}
function CPUInfo() {
document.writeln(navigator.platform);
}
function DisplaySize() {
document.writeln(screen.width+"x"+screen.height);
}
window.onload = startBlink;
<?php if ($Google['ads']==true) {?>
google_ad_client = "pub-1";
google_ad_width = 728;
google_ad_height = 90;
google_ad_format = "728x90_as";
google_ad_type = "text_image";
google_ad_channel ="";
google_color_border = "333333";
google_color_bg = "000000";
google_color_link = "FFFFFF";
google_color_url = "999999";
google_color_text = "CCCCCC";
<?php echo "\n\r"; } ?>
//-->
</script>
<?php  
$_SESSION["Skin"] = "";
if ($Skip!="Yes") {
echo "<style type='text/css'>\r\n";
echo "@import url(../Skin/Skin1/CSS.php);\r\n";
//require( '../CSS'.$_SESSION["Skin"].'.php');echo"\r\n";
echo "</style>"; }
$Logo=$Settings['board_logo'];
$OffLine=$Settings['board_offline'];
if ($_SESSION['UserGroup']=="Banned") { 
        echo "<title> You are Banned From Here. </title><br />Your banned From Here!<br />The IP of: " . $_SERVER['REMOTE_ADDR'];
		echo " is Banned From Here";
        exit(); }
?>