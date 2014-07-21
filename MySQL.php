<?php
$File1Name = dirname($_SERVER['PHP_SELF'])."/";
$File2Name = $_SERVER['PHP_SELF'];
$File3Name=str_replace($File1Name, null, $File2Name);
if ($File3Name=="MySQL.php"||$File3Name=="/MySQL.php") {
	echo "<title>".$File3Name." (PHP File)</title>\n\r<b>Warning</b>: Failed to open stream: Permission denied in <b>".$File3Name."</b> on line <b>1</b>!<br />";
	exit(); }
if ($Skip!="Yes") {
require( './Settings.php'); }
if ($Skip=="Yes") {
require( '../Settings.php'); }
if ($Settings['use_gzip']==true) {
if($Settings['preinset']=="on") {
ini_set("zlib.output_compression","On");
ini_set("zlib.output_compression_level","2"); }
ob_start( 'ob_gzhandler' );	}
/*ini_set("session.save_path","http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/misc/tmp");
session_save_path("http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/misc/tmp");*/
if ($Skip!="Yes") {
require('./misc/SafeSQL.class.php');
require( './misc/Act.php');
require( './lang/en/Settings.php'); }
if ($Skip=="Yes") {
require('../misc/SafeSQL.class.php');
require( '../misc/Act.php');
require( '../lang/en/Settings.php'); }
$SessionPre = $Settings['sql_tableprefix'];
/*if ($SessionPre==null) {
	$SessionPre = "DF2k_"; }*/
if($Settings['preinset']=="on") {
ini_set("magic_quotes_gpc","On");
ini_set("default_charset","iso-8859-15");
ini_set("display_errors","On");
ini_set("log_errors","On");
ini_set("log_errors_max_len",1024); }
/*session.hash_function allows you to specify the 
hash algorithm used to generate the session IDs
'0' means MD5 (128 bits) and '1' means SHA-1 (160 bits)*/
if($Settings['preinset']=="on") {
ini_set("session.hash_function","1"); }
error_reporting(E_ERROR);
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
$FixMinute=-60;
/* Board info Here */
$KeyWords=$Settings['board_keywords'];
$Description=$Settings['board_description'];
$TitleLine = "&raquo;";
$NewBoardURL['Change'] = $TablePreFix.$database;
if ($_SESSION['BoardURL']==null) {
$_SESSION['BoardURL']	 = $TablePreFix.$database; }
if ($_SESSION['BoardURL']!=$NewBoardURL['Change']) {
session_unregister(UserName);
session_unregister(UserID);
session_unregister(UserGroup);
session_unregister(UserTimeZone);
session_unregister(BotName);
$_SESSION['BotName']=null;
$_SESSION['MemberName']=null;
$_SESSION['UserID']=0;
$_SESSION['UserGroup']="Guest";
$_SESSION['UserTimeZone']=0;
$_SESSION['BoardURL']	 = $TablePreFix.$database; }
if ($_SESSION['LastUpdate']==null) {
$_SESSION['LastUpdate'] = gmdate(mktime(date('H'),date('i'),date('s'),date('n'),date('j'),date('Y'))); }
$SETTINGS['ThisUpdate'] = gmdate(mktime(date('H')-1,date('i'),date('s'),date('n'),date('j'),date('Y')));
if ($_SESSION['LastUpdate']<$SETTINGS['ThisUpdate']) {
session_unregister(UserName);
session_unregister(UserID);
session_unregister(UserGroup);
session_unregister(UserTimeZone);
session_unregister(BotName);
$_SESSION['BotName']=null;
$_SESSION['MemberName']=null;
$_SESSION['UserID']=0;
$_SESSION['UserGroup']="Guest";
$_SESSION['UserTimeZone']=SeverOffSet(null); }
if ($_SESSION['LastUpdate']>=$SETTINGS['ThisUpdate']) {
$_SESSION['LastUpdate'] = gmdate(mktime(date('H'),date('i'),date('s'),date('n'),date('j'),date('Y'))); }
/* Turn HTML on or off */
$DOHTML=$Settings['board_html'];
function SeverOffSet($Cool)
{
$TestHour1 = date("H")+1;
$TestHour2 = gmdate("H")+1;
$TestHour3 = $TestHour1-$TestHour2;
$TestHour4 = $TestHour3-24;
return $TestHour4;
}
// IP Thing
if ($_SESSION['UserIP']!=$_SERVER['REMOTE_ADDR']) {
$_SESSION['UserIP'] = $_SERVER['REMOTE_ADDR']; }
if ($_SESSION['UserGroup']==null) {
session_unregister(UserName);
session_unregister(UserID);
session_unregister(UserGroup);
session_unregister(UserTimeZone);
session_unregister(BotName);
$_SESSION['BotName']=null;
$_SESSION['MemberName']=null;
$_SESSION['UserID']=0;
$_SESSION['UserGroup']="Guest";
$_SESSION['UserTimeZone']=SeverOffSet(null); }
if ($_SESSION['UserGroup']=="Guest") {
session_unregister(UserName);
session_unregister(UserID);
session_unregister(UserGroup);
session_unregister(UserTimeZone);
session_unregister(BotName);
$_SESSION['BotName']=null;
$_SESSION['MemberName']=null;
$_SESSION['UserID']=0;
$_SESSION['UserGroup']="Guest";
$_SESSION['UserTimeZone']=SeverOffSet(null); }
$MaxPMs=$Settings['max_pms'];//Sets the Max number of PMs a User can Send 0 means no limit.
$MaxSig['Member']=$Settings['max_sig_size_member'];
$MaxSig['Moderator']=$Settings['max_sig_size_moderator'];
$MaxSig['Admin']=$Settings['max_sig_size_admin'];
$MaxSig=$Settings['max_sig_size'];
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
		session_unregister(BotName);
		$_SESSION['BotName']=null;
		$_SESSION['MemberName']=null;
		$_SESSION['UserID']=0;
		$_SESSION['UserGroup']="Guest";
		$_SESSION['UserTimeZone']=SeverOffSet(null);
		$_SESSION['Browser']=$_SERVER['HTTP_USER_AGENT']; }
if ($_SESSION['Browser']!=$_SERVER['HTTP_USER_AGENT']) {
	$_SESSION['Browser']=$_SERVER['HTTP_USER_AGENT'];
} }
/* Bot Tracker */
require('BotList.php');
$num=count($BotList);
$iz=1;
while ($iz <= $num) {
if(eregi($BotList[$iz],$_SERVER['HTTP_USER_AGENT'])) {
		$_SESSION['BotName']=$BotList[$iz];
		$_SESSION['UserID']=2;
		$_SESSION['UserGroup']="Bot";
		$_SESSION['UserTimeZone']=SeverOffSet(null);
		$_SESSION['Browser']=$_SERVER['HTTP_USER_AGENT']; }
++$iz; }
if ($_SESSION['FastReplyBox']==null) {
$_SESSION['FastReplyBox'] = "Off"; }
if ($_GET['FastReply']=="On") {
$_SESSION['FastReplyBox'] = "On"; }
if ($_GET['FastReply']=="Off") {
$_SESSION['FastReplyBox'] = "Off"; }
if ($_SESSION['FastReplyBox']=="On") {
$FastReplyShow = " ";
$FastReplyExtra = "&amp;FastReply=Off"; }
if ($_SESSION['FastReplyBox']=="Off") {
$FastReplyShow = "None";
$FastReplyExtra = "&amp;FastReply=On"; }
//Board Stats Box
if ($_SESSION['BoardStatsBox']==null) {
$_SESSION['BoardStatsBox'] = "Off"; }
if ($_GET['StatusBox']=="On") {
$_SESSION['BoardStatsBox'] = "On"; }
if ($_GET['StatusBox']=="Off") {
$_SESSION['BoardStatsBox'] = "Off"; }
if ($_SESSION['BoardStatsBox']=="On") {
$StatusBoxShow = " ";
$StatusBoxExtra = "StatusBox=Off"; }
if ($_SESSION['BoardStatsBox']=="Off") {
$StatusBoxShow = "None";
$StatusBoxExtra = "StatusBox=On"; }
if ($_SESSION['LastReply']==null) {
	$_SESSION['LastReply']=$_COOKIE['LastReply']; }
if ($_SESSION['LastReply']!=$_COOKIE['LastReply']) {
	setcookie("LastReply");
	setcookie("LastReply", $_SESSION['LastReply'], time() + (7 * 86400) ); }
//Skining Stuff
if ($HTTP_COOKIE_VARS[UseSkin]==null) {
setcookie("UseSkin", 1, time() + (7 * 86400) ); }
if ($_GET['SetSkin']==null) {
	if ($_POST['SetSkin']!=null) { $_GET['SetSkin']=$_POST['SetSkin']; } }
$_GET['SetSkin'] = (int)	 $_GET['SetSkin'];
if ($_SESSION['Skin']==null) {
$_SESSION['Skin'] = $HTTP_COOKIE_VARS[UseSkin]; }
if ($_GET['SetSkin']!=null) {
setcookie("UseSkin", $_GET['SetSkin'], time() + (7 * 86400) );
$_SESSION['Skin'] = $_GET['SetSkin']; }
if ($_SESSION['Skin']>=4) {
setcookie("UseSkin", 3, time() + (7 * 86400) );
$_SESSION['Skin'] = 3; }
if ($_SESSION['Skin']<=1) {
setcookie("UseSkin", 1, time() + (7 * 86400) );
$_SESSION['Skin'] = 1; }
if ($_SESSION['ShowBackwards']==null) {
$_SESSION['ShowBackwards']="No"; }
if ($_GET['Backwards']==null) {
$_GET['Backwards']=$_SESSION['ShowBackwards']; }
if ($_GET['Backwards']!=null) {
$_SESSION['ShowBackwards']=$_GET['Backwards']; }
$YourOffSet = $_SESSION['UserTimeZone'];
if ($_SESSION['YourID1']==null) {
$_SESSION['YourID1'] = uniqid(rand(), true);
$_SESSION['YourID2'] = md5($_SESSION['YourID1']);
$_SESSION['YourID3'] = sha1($_SESSION['YourID2']); }
if ($_SESSION['YourID1']!=null) { /* Do Somthing Cool Here! */ }
//Set to text/html or application/xhtml+xml
header("Cache-control: private");
header('Content-type: text/html');
/*if ($TimeAdd==null) {
$TimeAdd = 0;
}*/
$TableEnd = "<TD style=\"background-image: url(Skin/Skin".$_SESSION["Skin"]."/index_10.png);\">&nbsp;</TD>\n	</TR>\n	<TR>\n		<TD COLSPAN=7>\n			<IMG SRC=\"Skin/Skin".$_SESSION["Skin"]."/index_11.png\" WIDTH=\"720\" HEIGHT=\"22\" ALT=\"\"></TD>\n	</TR>\n	<TR>\n		<TD>\n			<IMG SRC=\"Skin/Skin".$_SESSION["Skin"]."/spacer.png\" WIDTH=\"13\" HEIGHT=\"1\" ALT=\"\"></TD>\n		<TD>\n			<IMG SRC=\"Skin/Skin".$_SESSION["Skin"]."/spacer.png\" WIDTH=\"8\" HEIGHT=\"1\" ALT=\"\"></TD>\n		<TD>\n			<IMG SRC=\"Skin/Skin".$_SESSION["Skin"]."/spacer.png\" WIDTH=\"356\" HEIGHT=\"1\" ALT=\"\"></TD>\n		<TD>\n			<IMG SRC=\"Skin/Skin".$_SESSION["Skin"]."/spacer.png\" WIDTH=\"161\" HEIGHT=\"1\" ALT=\"\"></TD>\n		<TD>\n			<IMG SRC=\"Skin/Skin".$_SESSION["Skin"]."/spacer.png\" WIDTH=\"76\" HEIGHT=\"1\" ALT=\"\"></TD>\n		<TD>\n			<IMG SRC=\"Skin/Skin".$_SESSION["Skin"]."/spacer.png\" WIDTH=\"92\" HEIGHT=\"1\" ALT=\"\"></TD>\n		<TD>\n			<IMG SRC=\"Skin/Skin".$_SESSION["Skin"]."/spacer.png\" WIDTH=\"14\" HEIGHT=\"1\" ALT=\"\"></TD>\n	</TR>\n</TABLE>";
function PassHash2x($Text)
{
$Text = md5($Text);
$Text = sha1($Text);
return $Text;
}
function GMTimeChange($format,$timestamp,$offset)
{
$Time[Hour] = date("G",$timestamp);
$Time[Minute] = date("i",$timestamp);
$Time[Second] = date("s",$timestamp);
$Time[Month] = date("n",$timestamp);
$Time[Day] = date("j",$timestamp);
$Time[Year] = date("Y",$timestamp);
return gmdate($format,mktime($Time[Hour]+$offset,$Time[Minute]-1,$Time[Second],$Time[Month],$Time[Day],$Time[Year]));
}
function GMTimeSend($none)
{
return gmdate(mktime(date('H'),date('i'),date('s'),date('n'),date('j'),date('Y')));
}
function GMTimeGet($format,$offset)
{
$TimeFix	 = $FixMinute;
return gmdate($format,mktime(date('H')+$offset,date('i')-1,date('s'),date('n'),date('j'),date('Y')));
}
if ($_SESSION['BoardMove']=="Yes") {
$FileName = preg_replace("/\/board/isxS", "", $_SERVER['REQUEST_URI']);
header('Location: '.$FileName.''); }
//$DTDURL = " \"http://www.w3.org/TR/html4/loose.dtd\"";
$DTDURL = " \"http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/misc/html4.php\"";
//$DTDURL = null;
echo "<?xml version=\"1.0\" encoding=\"iso-8859-15\" ?>\n";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"<?php echo $DTDURL; ?>>
<html lang="en-US">
<head profile="http://gmpg.org/xfn/1">
<meta http-equiv="content-language" content="en-us">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-15">
<meta http-equiv="IMAGETOOLBAR" content="false">
<meta http-equiv="Set-Cookie" content="Renee=Renee Sabonis;expires=Friday, 31-Dec-<?php echo date("y"); ?> 23:59:59 GMT; path=/">
<meta http-equiv="Window-target" content="_top">
<meta name="ROBOTS" content="FOLLOW, ARCHIVE">
<meta name="GOOGLEBOT" content="FOLLOW, SNIPPET, ARCHIVE">
<?php
$URLPart	 = $_SERVER['PHP_SELF'];
$URLPart	 = preg_replace("/\/\//isxS", "/", $URLPart);
$Google['ads'] = $Settings['google_ads'];
$Google['adsTop'] = $Settings['google_ads_top'];
$Google['adsBottom'] = $Settings['google_ads_bottom'];
?>
<base href="<?php echo "http://".$_SERVER['HTTP_HOST'].$URLPart; ?>">
<link rel="prefetch" href="<?php echo $_SERVER['PHP_SELF']; ?>?act=FavIcon">
<link rel="prefetch" href="misc/Toggle.php">
<link rel="prefetch alternate stylesheet" title="Designed for DF2k" href="Skin/Skin1/CSS.php">
<link rel="prefetch alternate stylesheet" title="Designed for DF2k" href="Skin/Skin2/CSS.php">
<link rel="prefetch alternate stylesheet" title="Designed for DF2k" href="Skin/Skin3/CSS.php">
<link rel="stylesheet" type="text/css" href="Skin/Skin<?php echo $_SESSION["Skin"] ?>/CSS.php" media="all">
<link rel="icon" href="<?php echo $_SERVER['PHP_SELF']; ?>?act=FavIcon" type="image/png">
<script type="text/javascript" src="misc/Toggle.php"></script>
<script type="text/javascript" src="misc/miscjs.php?Skin=<?php echo $_SESSION["Skin"]; ?>"></script>
<?php if ($_GET['JavaScript']!=null||$_POST['JavaScript']!=null) {
	if ($_GET['JavaScript']==null) { $_GET['JavaScript']=$_POST['JavaScript']; } ?>
<script type="text/javascript">
<!--
<?php echo stripslashes($_GET['JavaScript'])."\n"; ?>
//-->
</script>
<?php } ?>
<?php  
if ($Skip!="Yes") {
echo "<style type='text/css'>\r\n";
echo "@import url(Skin/Skin".$_SESSION["Skin"]."/CSS.php);\r\n";
//require( './CSS'.$_SESSION["Skin"].'.php');echo"\r\n";
echo "</style>\r\n"; }
if ($Skip=="Yes") {
echo "<style type='text/css'>\r\n";
echo "@import url(Skin/Skin".$_SESSION["Skin"]."/CSS.php);\r\n";
//require( './CSS'.$_SESSION["Skin"].'.php');echo"\r\n";
echo "</style>\r\n"; }
$Logo=$Settings['board_logo'];
$OffLine=$Settings['board_offline'];
if ($Settings['use_gd_register']=="true") {
$UseGD = "Yes"; }
if ($OffLine=="Yes") {
	$act="Off";
	$_POST['act']="Off";
	$_GET['act']="Off";
	echo "<title>".$BoardName." ".$TitleLine." ".$lang3['Off Line']."</title>"; }
if ($_SESSION['UserGroup']=="Banned") { 
        echo "<title>".$BoardName." ".$TitleLine." ".$lang3['you are banned']." </title><br />".$lang3['you are banned']."!<br />The IP of: " . $_SERVER['REMOTE_ADDR'];
		echo " is Banned From Here";
        exit(); }
?>