<?php
$File1Name = dirname($_SERVER['PHP_SELF'])."/";
$File2Name = $_SERVER['PHP_SELF'];
$File3Name=str_replace($File1Name, null, $File2Name);
if ($File3Name=="Act.php"||$File3Name=="/Act.php") {
	echo "<title>".$File3Name." (PHP File)</title>\n\r<b>Warning</b>: Failed to open stream: Permission denied in <b>".$File3Name."</b> on line <b>1</b>!<br />";
	exit(); }
require( './Settings.php');
$BoardName=$Settings['board_name'];
/*How Many Times Someone Has Come to This Board*/
if (!session_is_registered('count')) {
   session_register('count');
   $_SESSION['count'] = 1;
} else {
   $_SESSION['count']++;
}
/* 
$_GET_Test is same as $_GET['Test'];
*/ 
import_request_variables("g", "_GET_");
/* 
$_POST_Test is same as $_POST['Test'];
*/ 
import_request_variables("p", "_POST_");
/* 
$_COOKIE_Test is same as $_COOKIE['Test'];
*/ 
import_request_variables("c", "_COOKIE_");
/* 
$_GET2_Test will get both $_POST['Test'] and $_GET['Test'] but will use $_GET['Test'] If they both have a Value.
*/
import_request_variables("pg", "_GET2_");
/* 
$_POST2_Test will get both $_POST['Test'] and $_GET['Test'] but will use $_POST['Test'] If they both have a Value.
*/
import_request_variables("gp", "_POST2_");
$Test1 = strpos(strtoupper($_GET['highlight']), "SYSTEM");
if ($_GET['act']==null&&$_GET['action']!=null) { $_GET['act']=$_GET['action']; }
if ($_GET['act']==null&&$_GET['mode']!=null) { $_GET['act']=$_GET['mode']; }
if ($_GET['act']==null&&$_GET['show']!=null) { $_GET['act']=$_GET['show']; }
if ($_GET['act']==null&&$_GET['do']!=null) { $_GET['act']=$_GET['do']; }
if ( $Test1 !== false ) { die; }
//CD2k = Cool Dude 2k
$CD2k = "Cool Dude 2k"; $GM2k = "Game Maker 2k";
$DF2k = "Discussion Forums 2k"; $TB2k = "Tag Boards 2k";
$PHPQA = "PHP-Quick-Arcade"; $CD2k_Loves="Renee Sabonis";
/*Set Cookies or Delete Them and Sessions*/
if ($InstallCheck!="Stop") {
if ($Settings['sql_host']==null||$Settings['sql_database']==null) {
	header("Location: install.php?act=View"); } }
if ($_GET['act']=="php"||$_GET['act']=="PHP") {
	header('Location: http://php.net/'); }
if ($_GET['act']=="MySQL"||$_GET['act']=="mysql") {
	header('Location: http://mysql.com/'); }
if ($_GET['act']=="Apache"||$_GET['act']=="apache") {
	header('Location: http://apache.org/'); }
if ($_GET['act']=="PHPLogo"||$_GET['act']=="phplogo") {
	header('Location: ./Pics/php.gif'); }
if ($_GET['act']=="MySQLLogo"||$_GET['act']=="mysqllogo") {
	header('Location: ./Pics/MySQL.gif'); }
if ($_GET['act']=="XML"||$_GET['act']=="xml") {
	header('Location: ./Pics/xml.gif'); }
if ($_GET['act']=="RSS"||$_GET['act']=="rss") {
	header('Location: ./Pics/rss.gif'); }
if ($_GET['act']=="FavIcon"||$_GET['act']=="favicon") {
	header('Location: ./misc/FavIcon.png'); }
if ($_GET['act']=="GM2kSite"||$_GET['act']=="gm2ksite") {
	header('Location: http://developer.berlios.de/projects/df2k/'); }
if ($_GET['act']=="GM2kBoard"||$_GET['act']=="gm2kboard") {
	header('Location: http://df2k.berlios.de/board/index.php?act=View'); }
if ($_GET['act']=="GM2kTagBoard"||$_GET['act']=="gm2ktagboard") {
	header('Location: http://df2k.berlios.de/TagBoard.php?act=View'); }
if ($_GET['act']=="SQLServer"||$_GET['act']=="sqlserver"||$_SERVER["QUERY_STRING"]=="SQLServer"||$_SERVER["QUERY_STRING"]=="sqlserver") {
	$Settings['sql_host'];
	$SQLURL=$Settings['sql_host'][0].$Settings['sql_host'][1].$Settings['sql_host'][2].$Settings['sql_host'][3];
	$SQLURL = preg_replace("/http/isxS", "http", $SQLURL);
	$SQLGoto = $Settings['sql_host'];
	if ($SQLURL!="http") { $SQLGoto="http://".$Settings['sql_host']; }
	header('Location: '.$SQLGoto); }
if ($_GET['act']=="Send") {
	$YourNameisNow = $_SESSION['MemberName'];
	setcookie("YourNameis", $YourNameisNow, time() + (7 * 86400) );
	setcookie("YourEmailis", $YourEmail, time() + (7 * 86400) ); }
if ($_GET['act']=="DeleteCookies") {
	setcookie("YourNameis");
	setcookie("YourEmailis"); }
if ($_GET['act']=="DeleteSession") {
	session_destroy(); }
if ($_GET['act']=="ResetSession") {
	session_unset(); }
if ($_GET['act']=="NewSessionID") {
	session_regenerate_id(); }
if ($_GET['act']=="ShowSessionID") {
	echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"./Skin/Skin".$_SESSION["Skin"]."/CSS.css\" />\r\nYour Session ID is ".session_id()."\r\n<title>".$BoardName." - Your Session ID is ".session_id()."</title><br />\r\n<a href=\"./index.php?act=View\" title=\"Reload Board\">Reload Board</a>";
	exit(); }
if ($_GET['act']=="ShowIPAddress") {
	echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"./Skin/Skin".$_SESSION["Skin"]."/CSS.css\" />\r\nYour IP Address is ".$_SERVER['REMOTE_ADDR']."\r\n<title>".$BoardName." - Your IP Address is ".$_SERVER['REMOTE_ADDR']."</title><br />\r\n<a href=\"./index.php?act=View\" title=\"Reload Board\">Reload Board</a>";
	exit(); }
if ($_GET['about']=="mozilla"||$_GET['about']=="Mozilla") { $_GET['act']="about:mozilla"; }
if ($_GET['act']=="about:mozilla") {
	$_GET['act']="Mozilla";
	if ($_GET['Page']==null) {
	$_GET['Page']="12:10"; } }
if ($_GET['act']=="Mozilla") {
	if ($_GET['Page']==null) {
	$_GET['Page']="12:10"; }
	require( 'Mozilla.php');
	exit(); }
if ($_GET['about']=="cd2k"||$_GET['about']=="CD2k") { $_GET['act']="about:cooldude2k"; }
if ($_GET['act']=="about:cd2k") { $_GET['act']="about:cooldude2k"; }
if ($_GET['about']=="cooldude2k"||$_GET['about']=="CoolDude2k") { $_GET['act']="about:cooldude2k"; }
if ($_GET['act']=="about:cooldude2k") {
	$_GET['act']="CD2k";
	$_GET['Page']="CD2k"; }
if ($_GET['act']=="CD2k") {
	$_GET['Page']="CD2k";
	require( 'Mozilla.php');
	exit(); }
if ($_GET['about']=="gpl"||$_GET['about']=="GPL") { $_GET['act']="about:gpl"; }
if ($_GET['act']=="about:gpl") {
	$_GET['act']="GPL";
	$_GET['Page']="GPL"; }
if ($_GET['act']=="GPL") {
	$_GET['Page']="GPL";
	require( 'Mozilla.php');
	exit(); }
if ($_GET['about']=="df2k"||$_GET['about']=="DF2k") { $_GET['act']="about:discussionforums2k"; }
if ($_GET['act']=="about:df2k") { $_GET['act']="about:discussionforums2k"; }
if ($_GET['about']=="discussionforums2k"||$_GET['about']=="DiscussionForums2k") { $_GET['act']="about:discussionforums2k"; }
if ($_GET['act']=="about:discussionforums2k") {
	$_GET['act']="DF2k";
	$_GET['Page']="DF2k"; }
if ($_GET['act']=="DF2k") {
	$_GET['Page']="DF2k";
	require( 'Mozilla.php');
	exit(); }
if ($_GET['about']=="gm2k"||$_GET['about']=="GM2k") { $_GET['act']="about:gamemaker2k"; }
if ($_GET['act']=="about:gm2k") { $_GET['act']="about:gamemaker2k"; }
if ($_GET['about']=="gamemaker2k"||$_GET['about']=="GameMaker2k") { $_GET['act']="about:gamemaker2k"; }
if ($_GET['act']=="about:gamemaker2k") {
	$_GET['act']="GM2k";
	$_GET['Page']="GM2k"; }
if ($_GET['act']=="GM2k") {
	$_GET['Page']="GM2k";
	require( 'Mozilla.php');
	exit(); }
if ($_GET['about']=="renee"||$_GET['about']=="Renee") { $_GET['act']="about:renee"; }
if ($_GET['act']=="about:reneesabonis") { $_GET['act']="about:renee"; }
if ($_GET['act']=="about:renee") { $_GET['act']="about:renee"; }
if ($_GET['about']=="renee"||$_GET['about']=="Renee") { $_GET['act']="about:renee"; }
if ($_GET['act']=="about:renee") {
	$_GET['act']="ReneeSabonis";
	$_GET['Page']="Renee"; }
if ($_GET['act']=="ReneeSabonis") {
	$_GET['Page']="Renee";
	require( 'Mozilla.php');
	exit(); }
if ($_GET['act']=="phpinfo"||$_GET['act']=="PHPInfo") {
	phpinfo();
	exit(); }
if ($_GET['act']=="Renee Sabonis"||$_GET['act']=="renee sabonis"||$_SERVER["QUERY_STRING"]=="Renee Sabonis"||$_SERVER["QUERY_STRING"]=="renee sabonis") {
	?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<base href="<?php echo "http://".$_SERVER['HTTP_HOST']."/".$URLPart; ?>">
<meta http-equiv="content-language" content="en-us">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<?php
$ReneeURL = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/?act=Renee";
echo "<style type='text/css'>\r\n";
echo "@import url(./Skin/Skin1/CSS.php);\r\n";
//require( '../CSS'.$_SESSION["Skin"].'.php');echo"\r\n";
echo "</style>\n\r<title>".$BoardName." ".$TitleLine." Renee Sabonis</title>\n\r</head>\n\r<body style='background-color: #000000;'>";
	echo "<div style='text-align: center;'><a title='Renee Sabonis' href='".$ReneeURL."'><img src='".$ReneeURL."' style='border: 0px;' alt='Renee Sabonis' title='Renee Sabonis' /></a></div>";
	exit("</body>\n\r</html>"); }
if ($_GET['act']=="GDInfo"||$_GET['act']=="gdinfo") {
	?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<base href="<?php echo "http://".$_SERVER['HTTP_HOST'].$URLPart; ?>">
<meta http-equiv="content-language" content="en-us">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<?php
echo "<style type='text/css'>\r\n";
echo "@import url(./Skin/Skin1/CSS.php);\r\n";
//require( '../CSS'.$_SESSION["Skin"].'.php');echo"\r\n";
echo "</style>\n\r<title>".$BoardName." ".$TitleLine." GDInfo</title>\n\r</head>\n\r<body>";
	var_dump(gd_info());
	die("</body>\n\r</html>"); }
/* Check to see if the User is trying to Edit Session Vars. ^_^ */
$_SESSION['DF2kVer']="v3.3.T<!-- Renee Sabonis -->";
$_SESSION['DF2kPreVer']="&nbsp;Beta 4";
if (isset($_REQUEST['UserName'])) {
   exit('An attempt to modify session data was made.'); }
if (isset($_REQUEST['UserID'])) {
   exit('An attempt to modify session data was made.'); }
if (isset($_REQUEST['UserGroup'])) {
   exit('An attempt to modify session data was made.'); }
if (isset($_REQUEST['UserTimeZone'])) {
   exit('An attempt to modify session data was made.'); }
if (isset($_REQUEST['Skin'])) {
   exit('An attempt to modify session data was made.'); }
if (isset($_REQUEST['ShowBackwards'])) {
   exit('An attempt to modify session data was made.'); }
if (isset($_REQUEST['YourID1'])) {
   exit('An attempt to modify session data was made.'); }
if (isset($_REQUEST['YourID2'])) {
   exit('An attempt to modify session data was made.'); }
if (isset($_REQUEST['YourID3'])) {
   exit('An attempt to modify session data was made.'); }
if (isset($_REQUEST['DF2kVer'])) {
   exit('An attempt to modify session data was made.'); }
if ($_GET['Validate']=="HTML"||$_GET['validate']=="HTML") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=HTML/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=HTML/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://validator.w3.org/check?verbose=1&uri='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="HTML2"||$_GET['validate']=="HTML2") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=HTML2/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=HTML2/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://www.htmlhelp.com/cgi-bin/validate.cgi?warnings=yes&url='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="Links"||$_GET['validate']=="Links") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=Links/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=Links/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://validator.w3.org/checklink?check=Check&hide_type=all&summary=on&uri='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="CSS"||$_GET['validate']=="CSS") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=CSS/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=CSS/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://jigsaw.w3.org/css-validator/validator?profile=css2&warning=2&uri='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="WAI"||$_GET['validate']=="WAI") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=WAI/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=WAI/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://www.contentquality.com/mynewtester/cynthia.exe?rptmode=2&url1='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="Section508"||$_GET['validate']=="Section508") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=Section508/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=Section508/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://www.contentquality.com/mynewtester/cynthia.exe?rptmode=-1&url1='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="SpeedReport"||$_GET['validate']=="SpeedReport") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=SpeedReport/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=SpeedReport/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://www.websiteoptimization.com/cgi-bin/wso/wso.pl?url='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="WebXACT"||$_GET['validate']=="WebXACT") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=WebXACT/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=WebXACT/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://webxact.watchfire.com/submit.aspx?SCANURL='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="META"||$_GET['validate']=="META") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=META/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=META/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://www.scrubtheweb.com/cgi-bin/webtools/meta-check.cgi?URL='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="LoadTime"||$_GET['validate']=="LoadTime") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=LoadTime/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=LoadTime/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://www.1-hit.com/all-in-one/php/tool.loading-time-checker.php?url='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="PageRank"||$_GET['validate']=="PageRank") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=PageRank/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=PageRank/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://www.1-hit.com/all-in-one/php/tool.ranking.php?url='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="Popularity"||$_GET['validate']=="Popularity") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=Popularity/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=Popularity/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://www.seochat.com/?go=1&option=com_seotools&tool=1&toolsubmit=Check+my+Popularity&url='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="HTML2TEXT"||$_GET['validate']=="HTML2TEXT") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=HTML2TEXT/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=HTML2TEXT/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://cgi.w3.org/cgi-bin/html2txt?url='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['Validate']=="SilkTide"||$_GET['validate']=="SilkTide") {
	$NEW["REQUEST_URI"] = preg_replace("/\?Validate\=SilkTide/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Validate\=SilkTide/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://www.silktide.com/index.php?node=18444&form2=1&staticq=1&f2_url='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['php']=="Search"||$_GET['PHP']=="Search") {
	if ($_GET['Search']==null) { if ($_GET['search']!=null) { $_GET['Search']=$_GET['search']; }
	if ($_GET['search']==null) { $_GET['Search']="echo"; } }
	header('Location: http://us3.php.net/manual-lookup.php?pattern='.$_GET['Search']); }
if ($_GET['Google']=="Search"||$_GET['google']=="Search") {
	if ($_GET['Search']==null) { if ($_GET['search']!=null) { $_GET['Search']=$_GET['search']; }
	if ($_GET['search']==null) { $_GET['Search']="Renee"; } }
	header('Location: http://google.com/search?btnG=Google+Search&q='.$_GET['Search']); }
if ($_GET['Google']=="Custom"||$_GET['google']=="Custom") {
	if ($_GET['Search']==null) { if ($_GET['search']!=null) { $_GET['Search']=$_GET['search']; }
	if ($_GET['search']==null) { $_GET['Search']="Renee"; } }
	header('Location: http://www.google.com/custom?q='.$_GET['Search']); }
if ($_GET['Google']=="ImLucky"||$_GET['google']=="LuckySearch") {
	if ($_GET['Search']==null) { if ($_GET['search']!=null) { $_GET['Search']=$_GET['search']; }
	if ($_GET['search']==null) { $_GET['Search']="Renee"; } }
	header('Location: http://google.com/search?btnI=I%27m+Feeling+Lucky&q='.$_GET['Search']); }
if ($_GET['Yahoo']=="Search"||$_GET['yahoo']=="Search") {
	if ($_GET['Search']==null) { if ($_GET['search']!=null) { $_GET['Search']=$_GET['search']; }
	if ($_GET['search']==null) { $_GET['Search']="Renee"; } }
	header('Location: http://search.yahoo.com/search?p='.$_GET['Search']); }
if ($_GET['act']=="BugMeNot"||$_GET['act']=="bugmenot") {
	$NEW["REQUEST_URI"] = preg_replace("/\?act\=BugMeNot/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&act\=BugMeNot/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://bugmenot.com/view.php?url='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['act']=="Wikipedia"||$_GET['act']=="wikipedia") {
	if ($_GET['Search']==null) { if ($_GET['search']!=null) { $_GET['Search']=$_GET['search']; }
	if ($_GET['search']==null) { $_GET['Search']="Renee"; } }
	if ($_GET['Lang']==null) { if ($_GET['lang']!=null) { $_GET['lang']=$_GET['Lang']; }
	if ($_GET['lang']==null) { $_GET['lang']="en"; } }
	header('Location: http://'.$_GET['lang'].'.wikipedia.org/wiki/'.$_GET['search']); }
if ($_GET['Translate']=="AltaVista"||$_GET['Translate']=="altavista") {
	if ($_GET['TranFrom']==null) { if ($_GET['TranFrom']!=null) { $_GET['TranFrom']=$_GET['TranFrom']; }
	if ($_GET['TranFrom']==null) { $_GET['TranFrom']="en"; } }
	if ($_GET['TranTo']==null) { if ($_GET['TranTo']!=null) { $_GET['TranTo']=$_GET['TranTo']; }
	if ($_GET['TranTo']==null) { $_GET['TranTo']="es"; } }
	$NEW["REQUEST_URI"] = preg_replace("/\?Translate\=AltaVista/isxS", "?Renee=Awesome", $_SERVER["REQUEST_URI"]);
	$NEW["REQUEST_URI"] = preg_replace("/\&Translate\=AltaVista/isxS", "", $NEW["REQUEST_URI"]);
	header('Location: http://babelfish.altavista.com/babelfish/trurl_pagecontent?lp='.$_GET['TranFrom'].'_'.$_GET['TranTo'].'&url='.urlencode('http://'.$_SERVER["HTTP_HOST"].$NEW["REQUEST_URI"])); }
if ($_GET['act']=="Sleep") {
	sleep(rand(1,25));
	$_GET['act']="View"; }
if ($_GET['act']=="Install") {
	header('Location: install.php'); }
if ($_GET['act']=="Admin") {
	header('Location: Admin/Login.php?act=Login'); }
if ($_GET['act']=="Administrator") {
	header('Location: Admin/Login.php?act=Login'); }
if ($_GET['act']=="Mod") {
	header('Location: Mod/Login.php?act=Login'); }
if ($_GET['act']=="Moderator") {
	header('Location: Mod/Login.php?act=Login'); }
if ($_GET['act']=="Calendar") {
	header('Location: Calendar.php?act=View'); }
if ($_GET['act']=="TagBoard") {
	header('Location: TagBoard.php?act=View'); }
if ($_GET['act']=="ReadPM") {
	header('Location: Messenger.php?act=View'); }
if ($_GET['act']=="ReadSentPM") {
	header('Location: Messenger.php?act=View'); }
if ($_GET['act']=="ReadPMs") {
	header('Location: Messenger.php?act=View'); }
if ($_GET['act']=="ReadSentPMs") {
	header('Location: Messenger.php?act=View'); }
//if ($_GET['act']=="SendPM") {
//	header('Location: Messenger.php?act=View'); }
if ($_GET['act']=="idx") {
	$_GET['act']="View"; }
if ($_GET['act']=="view") {
	$_GET['act']="View"; }
if ($_GET['act']=="create") {
	$_GET['act']="Create"; }
if ($_GET['act']=="creat") {
	$_GET['act']="Create"; }
if ($_GET['act']=="Creat") {
	$_GET['act']="Create"; }
if ($_GET['act']=="profile") {
	$_GET['act']="Profile"; }
if ($_GET['act']=="Info") {
	$_GET['act']="Profile"; }
if ($_GET['act']=="info") {
	$_GET['act']="Profile"; }
if ($_GET['act']=="help") {
	$_GET['act']="Help"; }
if ($_GET['act']=="event") {
	$_GET['act']="Event"; }
if ($_GET['act']=="newtopic") {
	$_GET['act']="Create"; }
if ($_GET['act']=="Newtopic") {
	$_GET['act']="Create"; }
if ($_GET['act']=="NewTopic") {
	$_GET['act']="Create"; }
if ($_GET['act']=="Newreply") {
	$_GET['act']="Create"; }
if ($_GET['act']=="NewReply") {
	$_GET['act']="Create"; }
if ($_GET['act']=="SendPMs") {
	header('Location: Messenger.php?act=View'); }
if ($_GET['act']=="Register") {
	header('Location: Members.php?act=Signup'); }
if ($_GET['act']=="Signin") {
	header('Location: Members.php?act=Login'); }
if ($_GET['act']=="signout") {
	header('Location: Members.php?act=Logout'); }
if ($_GET['act']=="GetDF2k"||$_GET['act']=="getdf2k") {
	header('Location: http://developer.berlios.de/projects/df2k/'); }
if ($_GET['act']=="Jcink"||$_GET['act']=="jcink") {
	header('Location: http://jcink.com/'); }
if ($_GET['act']=="RPGNation"||$_GET['act']=="rpgnation") {
	$_GET['act']="RPG-Nation"; }
if ($_GET['act']=="RPG-Nation"||$_GET['act']=="rpg-nation") {
	header('Location: http://rpg-nation.net/'); }
if ($_GET['act']=="mvpzero") {
	header('Location: http://mvpzero.net/'); }
if ($_GET['act']=="MvpZERO") {
	header('Location: http://mvpzero.net/'); }
if ($_GET['act']=="GetFireFox") {
	header('Location: http://GetFireFox.com/'); }
if ($_GET['act']=="getfirefox") {
	header('Location: http://GetFireFox.com/'); }
if ($_GET['act']=="Renee"||$_SERVER["QUERY_STRING"]=="Renee") {
	header('Location: ./Pics/Renee.jpg'); }
if ($_GET['act']=="renee"||$_SERVER["QUERY_STRING"]=="renee") {
	header('Location: ./Pics/Renee2.jpg'); }
if ($_GET['act']=="Renée"||$_SERVER["QUERY_STRING"]=="Renée") {
	header('Location: ./Pics/Renee.jpg'); }
if ($_GET['act']=="renée"||$_SERVER["QUERY_STRING"]=="renée") {
	header('Location: ./Pics/Renee2.jpg'); }
if ($_GET['act']=="Encrypter"||$_GET['act']=="encrypter") { $_GET['act']="Encrypter2k"; }
if ($_GET['act']=="Encrypter2k"||$_GET['act']=="encrypter2k") {
	header('Location: ./misc/Tools/Encrypter.php'); }
if ($_GET['act']=="Encrypter2"||$_GET['act']=="encrypter2") { $_GET['act']="Number"; }
if ($_GET['act']=="Number"||$_GET['act']=="number") {
	header('Location: ./misc/Tools/Number.php'); }
if ($_GET['act']=="passwordTool"||$_GET['act']=="passwordtool") { $_GET['act']="PasswordTool"; }
if ($_GET['act']=="PasswordTool"||$_GET['act']=="Passwordtool") {
	header('Location: ./misc/Tools/Password.php'); }
if ($_GET['url']!=null) {
	header('Location: '.$_GET['url'].''); }
if ($_GET['act']=="BrowserINFO") {
    echo	"<link type=\"text/css\" rel=\"stylesheet\" href=\"./Skin/Skin".$_SESSION["Skin"]."/CSS.css\" />\r\n<title>".$BoardName." - Browser Info</title>\r\n";
	echo $_SERVER['HTTP_USER_AGENT'] . "\r\n<br /><a href=\"./index.php?act=View\" title=\"Reload Board\">Reload Board</a>";
    exit(); }
if ($_GET['act']=="ShowCount") {
    echo	"<link type=\"text/css\" rel=\"stylesheet\" href=\"./Skin/Skin".$_SESSION["Skin"]."/CSS.css\" />\r\n<title>".$BoardName." - Count Number</title>\r\n";
	echo $count;
    exit(); }
if ($_GET['act']=="Download") {
	$ThisFile1 = dirname($_SERVER['PHP_SELF'])."/";
	$ThisFile2 = $_SERVER['PHP_SELF'];
	$ThisFile3=str_replace($ThisFile1, null, $ThisFile2);
	$ThisFile3=preg_replace("/.php/isxS", "", $ThisFile3);
	header('Content-Disposition: attachment; filename="'.$ThisFile3.'.html"');
	$_GET['act']="View"; }
if ($_GET['Download']!=null) {
	$ThisFile1 = dirname($_SERVER['PHP_SELF'])."/";
	$ThisFile2 = $_SERVER['PHP_SELF'];
	$ThisFile3=str_replace($ThisFile1, null, $ThisFile2);
	$ThisFile3=preg_replace("/.php/isxS", "", $ThisFile3);
	header('Content-Disposition: attachment; filename="'.$ThisFile3.'.html"'); }
if ($OffLine=="Yes") {
	$_GET['act']="Off"; }
?>