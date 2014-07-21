<?php
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/Messenger.php');
$StatSQL = mysql_connect($mysqlhost,$username,$password,null,'MYSQL_CLIENT_COMPRESS')or die(mysql_error());
@mysql_select_db($database) or die( "Unable to select database");
//Count the number of MySQL Queries	Part 1
function cnt_mysql_query($sql=FALSE)
{
static $queries = 0;
if (!$sql)
return $queries;
$queries ++;
return mysql_query($sql);
} ?>
<meta name="generator" content="Edit Plus v2.12">
<meta name="author" content="Cool Dude 2k">
<meta name="copyright" content="Game Maker 2k&copy; 2004">
<meta name="keywords" content="Discussion Forums 2k, DF2k, <?php echo $BoardName ?>, <?php echo $KeyWords ?>">
<meta name="description" content="<?php echo $Description ?>">
<?php if ($_GET['act']!="Cool") { 
$_GET['id'] = (int)	 $_GET['id'];
$Type = "PM";
$YourUserID = $_SESSION['UserID'];
$query="SELECT * FROM ".$TablePreFix."Messenger WHERE `PMSentID`=".$YourUserID." and `Read`=0";
$result=mysql_query($query);
$PMNumber=mysql_num_rows($result);
$querys="SELECT * FROM ".$TablePreFix."Messenger WHERE `SenderID`=".$YourUserID."";
$results=mysql_query($querys);
$SentPMNumber=mysql_num_rows($results); }
/* Group Info Here */
$querys711="SELECT * FROM ".$TablePreFix."Groups WHERE Name='".$_SESSION['UserGroup']."'";
$results711=mysql_query($querys711);
$GroupNum1=mysql_num_rows($results711);
$GroupNum2=0;
while ($GroupNum2 < $GroupNum1) {
$Groups['ID']=mysql_result($results711,$GroupNum2,"id");
$Groups['Name']=mysql_result($results711,$GroupNum2,"Name");
$Groups['Name_prefix']=mysql_result($results711,$GroupNum2,"Name_prefix");
$Groups['Name_suffix']=mysql_result($results711,$GroupNum2,"Name_suffix");
$Groups['View_board']=mysql_result($results711,$GroupNum2,"View_board");
$Groups['Edit_profile']=mysql_result($results711,$GroupNum2,"Edit_profile");
$Groups['Can_make_topics']=mysql_result($results711,$GroupNum2,"Can_make_topics");
$Groups['Can_make_replys']=mysql_result($results711,$GroupNum2,"Can_make_replys");
$Groups['Can_edit_replys']=mysql_result($results711,$GroupNum2,"Can_edit_replys");
$Groups['Can_delete_replys']=mysql_result($results711,$GroupNum2,"Can_delete_replys");
$Groups['Can_add_events']=mysql_result($results711,$GroupNum2,"Can_add_events");
$Groups['Can_pm']=mysql_result($results711,$GroupNum2,"Can_pm");
$Groups['Can_dohtml']=mysql_result($results711,$GroupNum2,"Can_dohtml");
$Groups['Promote_to']=mysql_result($results711,$GroupNum2,"Promote_to");
$Groups['Promote_posts']=mysql_result($results711,$GroupNum2,"Promote_posts");
$Groups['Has_mod_cp']=mysql_result($results711,$GroupNum2,"Has_mod_cp");
$Groups['Has_admin_cp']=mysql_result($results711,$GroupNum2,"Has_admin_cp");
++$GroupNum2; }
if($Groups['View_board']=="no") {
	echo"<script type=\"text/javascript\">\n<!--\ndocument.title='403: Forbend';\n//-->\n</script>";
	die("<h2>403: Forbidden</h2>\n<h3>You cant view the board. &lt;_&lt;</h3>\n</body>\n</html>");
}
if ($_GET['act']=="Stats") {
	$_GET['act']="BoardStats"; }
if ($_GET['act']=="BoardStats") {
	echo"<title>".$BoardName." - Board Stats</title>"; } 
if ($_GET['act']==null) {
$_GET['act']="View"; }
if ($_GET['act']=="Reply") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['replying to pm']; ?></title>
<?php } if ($_GET['act']=="View") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['viewing your pms']; ?></title>
<?php } if ($_GET['act']=="ViewSent") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['viewing pms you sent']; ?></title>
<?php } if ($_GET['act']=="Read") {
$PM_query = mysql_query("SELECT MessageTitle FROM ".$TablePreFix."Messenger WHERE (id=".$_GET['id'].")");
$PrePM = mysql_fetch_array($PM_query); ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['reading']; ?> <?php echo $PrePM['MessageTitle']?></title>
<?php } if ($_GET['act']=="Create")  { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['creating a pm']; ?></title>
<?php } if ($_GET['act']=="SendPM")	 {	?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['sending pm to']; ?> <?php echo $SendPMto; ?></title>
<?php } ?></head><?php
if ($_GET['Backwards']=="Yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="on") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']!="on") {
    echo "\n<body>"; }
?>
<div align="center"><a href="./index.php?act=View" title="<?php echo $BoardName; ?> <?php echo $lang['powered by df2k']; ?><?php echo $_SESSION['DF2kPreVer']; ?>"><img src="Skin/Skin<?php echo $_SESSION["Skin"] ?>/Logo.png" width="730" height="100" border="0" alt="<?php echo $BoardName; ?> <?php echo $lang['powered by df2k']; ?><?php echo $_SESSION['DF2kPreVer']; ?>" /></a>
</div>
<?php/*<div align="center">*/?>
<TABLE WIDTH="720" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0">
	<TR>
		<TD COLSPAN="2">
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_04.png" WIDTH="21" HEIGHT="21" ALT=""></TD>
		<TD COLSPAN="3" valign="middle" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"]; ?>/index_05.png);" class="navbar"><?php if ($_SESSION['MemberName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php if ($_SESSION['BotName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['BotName'] ?></a>	<span class="style1">/ </span><?php } echo $_SESSION['MemberName'] ?></a>	<span class="style1">/ </span><a href="Members.php?act=Logout" title="<?php echo $lang['logout']; ?>"><?php echo $lang['logout']; ?></a>	<span class="style1">/ </span><?php } if($Groups['Can_pm']=="yes") { ?><a href="Messenger.php?act=View" title="<?php echo $lang['goto mailbox']; ?>"><?php echo $lang['mailbox']; ?></a><a title="<?php echo $lang['new pms 1']; ?><?php echo $PMNumber; ?><?php echo $lang['new pms 2']; ?>">(<?php echo $PMNumber; ?>)</a>	<?php } if ($_SESSION['MemberName']==null) { ?><span class="style1">/ </span><a href="Members.php?act=Login" title="<?php echo $lang['login']; ?>"><?php echo $lang['login']; ?></a>	<span class="style1">/ </span><a href="Members.php?act=Signup" title="<?php echo $lang['register']; ?>"><?php echo $lang['register']; ?></a>	<span class="style1">/ </span><?php } if($Groups['Can_pm']=="yes") { ?><a href="Messenger.php?act=Create" title="<?php echo $lang['send a pm']; ?>"><?php echo $lang['send pm']; ?></a>	<span class="style1">/ </span><?php if ($Groups['Has_mod_cp']=="yes"&&$Groups['Has_admin_cp']=="no") {?><a href="Mod/Login.php?act=Login" title="<?php echo $lang['goto mod tools']; ?>"><?php echo $lang['mod cp']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Has_admin_cp']=="yes") {?><a href="Admin/Login.php?act=Login" title="<?php echo $lang['goto admin cp']; ?>"><?php echo $lang['admin cp']; ?></a>	<span class="style1">/ </span><?php }?><?php } if ($Groups['Can_pm']=="no") { ?><!--<a href="Messenger.php?act=Create" title="<?php echo $lang['send a pm']; ?>">--><span title="<?php echo $lang['not member pm error']; ?>"><?php echo $lang['send pm']; ?></span><!--</a>-->	<span class="style1">/ </span><?php } ?><a href="Help.php?act=View" title="<?php echo $lang['help files']; ?>"><?php echo $lang['help']; ?></a>	<span class="style1">/ </span><a href="Calendar.php?act=View" title="<?php echo $lang['view calendar']; ?>"><?php echo $lang['calendar']; ?></a>	<span class="style1">/ </span><a href="TagBoard.php?act=View" title="<?php echo $lang['goto tag boards']; ?>"><?php echo $lang['tag board']; ?></a></TD>
		<TD COLSPAN="2" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_06.png);"></TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
<?php
if ($_GET['act']=="") {
	$_GET['act']="View"; }
if ($_GET['act']=="View") {
?>	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5>
<?php if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
		<?php/*<div align="center">*/?>
<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <th width="34%"><?php echo $lang2['message title']; ?></th>
   <th width="33%"><?php echo $lang2['sender']; ?></th>
   <th width="33%"><?php echo $lang2['date sent']; ?></th>
  </tr><?php
$YourID = $_SESSION['UserID'];
$PM_query = mysql_query("SELECT * FROM ".$TablePreFix."Messenger WHERE  PMSentID=".$YourID." order by 'DateSend' desc");
while ($PM = mysql_fetch_array($PM_query)) {
$User1SentPM = $PM['SenderID'];
$User2GotPM = $PM['PMSentID'];
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$User1SentPM) {
$User1Name = $row[1]; }	}
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$User2GotPM) {
$User2Name = $row[1]; }	}
$URLUser1Name = urlencode($User1Name);
$DateSend = GMTimeChange("F j, Y, g:i a",$PM['DateSend'],$YourOffSet);
if ($PM['Read']==0) {
	$Style=" style=\"font-weight: bold;\" "; }
if ($PM['Read']==1) {
	$Style=" style=\"font-weight: none;\" "; }
?>
<tr>
   <td width="34%"><a<?php echo $Style; ?>href="Messenger.php?act=Read&amp;id=<?php echo $PM['id']; ?>"><?php echo $PM['MessageTitle']; ?></a></td>
   <td width="33%"><a href="Members.php?act=Profile&amp;id=<?php echo $PM['SenderID']; ?>"><?php echo $User1Name; ?></a> | <a href="Messenger.php?act=Create&amp;Sendto=<?php echo $URLUser1Name; ?>">Send a <?php echo $lang2['pm']; ?></a> | <a href="Messenger.php?act=Reply&amp;id=<?php echo $PM['id']; ?>&amp;Sendto=<?php echo $URLUser1Name; ?>"><?php echo $lang2['reply']; ?></a> | <a href="Messenger.php?act=Delete&amp;id=<?php echo $PM['id']; ?>">Delete</a></td>
   <td width="33%"><?php echo $DateSend; ?></td>
  </tr>
<?php }	?>
 </table>
 <?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 </center>
</div>
</TD>
		<?php echo $TableEnd; ?>
<?php }
if ($_GET['act']=="Delete"||$_GET['act']=="DeletePM") {
?>	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><?php/*<div align="center">*/?>
<div align="center">
 <?php if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
 <tr>
   <td width="62%" align="center">PM Title: <?php echo $PrePM['MessageTitle']; ?></td>
   <td width="38%">User Info</td>
   </tr>
 <tr><?php
$YourID = $_SESSION['UserID'];
$Message_query = mysql_query("SELECT * FROM ".$TablePreFix."Messenger WHERE  id=".$_GET['id']."");
while ($Message = mysql_fetch_array($Message_query)) {
if ($Message['PMSentID']!=$YourID&&$Message['SenderID']!=$YourID) {?>
    <td width="62%" align="center">You Cant Delete This PM. :P</td>
   <td width="38%">???</td>
	</tr>
  </table>
<?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
</div>
</TD>
		<?php echo $TableEnd; ?><?php
mysql_close();
?></body></html><?php
exit(); }
if ($Message['PMSentID']==$YourID||$Message['SenderID']==$YourID) {
$sqlrowdelete = "DELETE FROM ".$TablePreFix."Messenger WHERE id=".$_GET['id']."";
$resultdelete = mysql_query($sqlrowdelete);
?>
    <td width="62%" align="center">You Deleted This PM. ^_^ </td>
   <td width="38%">???</td>
	</tr>
  </table>
</div>
</TD>
		<?php echo $TableEnd; ?><?php
	} }	}
if ($_GET['act']=="ViewSent") {
?>	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><?php/*<div align="center">*/?>
<div align="center">
 <center>
 <?php if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <th width="34%"><?php echo $lang2['message title']; ?></th>
   <th width="33%"><?php echo $lang2['sent to']; ?></th>
   <th width="33%"><?php echo $lang2['date sent']; ?></th>
  </tr><?php
$YourID = $_SESSION['UserID'];
$PM_query = mysql_query("SELECT * FROM ".$TablePreFix."Messenger WHERE SenderID=".$YourID." order by 'DateSend' desc");
while ($PM = mysql_fetch_array($PM_query)) {
$User1SentPM = $PM['SenderID'];
$User2GotPM = $PM['PMSentID'];
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$User1SentPM) {
$User1Name = $row[1]; }	}
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$User2GotPM) {
$User2Name = $row[1]; }	}
$URLUser2Name = urlencode($User2Name);
$DateSend = GMTimeChange("F j, Y, g:i a",$PM['DateSend'],$YourOffSet);
if ($PM['Read']==0) {
	$Style=" style=\"font-weight: bold;\" "; }
if ($PM['Read']==1) {
	$Style=" style=\"font-weight: none;\" "; }
?>
<tr>
   <td width="34%"><a<?php echo $Style; ?>href="Messenger.php?act=Read&amp;id=<?php echo $PM['id']; ?>"><?php echo $PM['MessageTitle']; ?></a></td>
   <td width="33%"><a href="Members.php?act=Profile&amp;id=<?php echo $PM['PMSentID']; ?>"><?php echo $User2Name; ?></a> | <a href="Messenger.php?act=Create&amp;Sendto=<?php echo $URLUser2Name; ?>"><?php echo $lang2['send a pm']; ?></a> | <a href="Messenger.php?act=Reply&amp;id=<?php echo $PM['id']; ?>&amp;Sendto=<?php echo $URLUser2Name; ?>"><?php echo $lang2['reply']; ?></a> | <a href="Messenger.php?act=Delete&amp;id=<?php echo $PM['id']; ?>">Delete</a></td>
   <td width="33%"><?php echo $DateSend; ?></td>
  </tr>
<?php }	?>
 </table>
 <?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 </center>
</div>
</TD>
		<?php echo $TableEnd; ?>
<?php }
if ($_GET['act']=="Read") {
?>	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><?php/*<div align="center">*/?>
<div align="center">
 <?php if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
 <tr>
   <td width="62%" align="center"><?php echo $lang2['pm title']; ?> <?php echo $PrePM['MessageTitle']; ?></td>
   <td width="38%"><?php echo $lang2['user info']; ?></td>
   </tr>
 <tr><?php
$YourID = $_SESSION['UserID'];
$Message_query = mysql_query("SELECT * FROM ".$TablePreFix."Messenger WHERE  id=".$_GET['id']."");
while ($Message = mysql_fetch_array($Message_query)) {
if ($Message['PMSentID']!=$YourID) {
if ($Message['SenderID']!=$YourID) { ?>
    <td width="62%" align="center"><?php echo $lang2['you cant read this pm']; ?></td>
   <td width="38%">???</td>
	</tr>
  </table>
<?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
</div>
</TD>
		<?php echo $TableEnd; ?><?php
mysql_close();
?></body></html><?php
exit(); }	}
$User1SentPM = $Message['SenderID'];
$User2GotPM = $Message['PMSentID'];
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$User1SentPM) {
$User1Name = $row[1];
$User1Email = $row[3];
$User1Signature = $row[10];
$User1Avatar = $row[11];
$User1AvatarSize = $row[12];
$User1Website = $row[13];
$User1IP = $row[16]; }	 }
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$User2GotPM) {
$User2Name = $row[1]; }	}
$post['Post'] = $Message['MessageText']."<br />\n<br />[B]--------------------[/B]\n<br />".$User1Signature;
require( './misc/BBTags.php'); 
$Message['MessageText'] = $post['Post'];
$AvatarSize=explode("x", $User1AvatarSize);
$AvatarSizeW=$AvatarSize[0];
$AvatarSizeH=$AvatarSize[1];
if ($User1Avatar=="http://") {
$User1Avatar="./Skin/Skin".$_SESSION["Skin"]."/Avatar.png"; }
if ($User1Avatar==null) {
$User1Avatar="./Skin/Skin".$_SESSION["Skin"]."/Avatar.png"; }
if ($User1Website=="http://") {
$User1Website="Members.php?act=Profile&amp;id=".$User1ID; }
if ($User1Website==null) {
$User1Website="Members.php?act=Profile&amp;id=".$User1ID; }
$URLUser1Name = urlencode($User1Name);
$DateSend = GMTimeChange("F j, Y, g:i a",$Message['DateSend'],$YourOffSet);
if ($User2GotPM==$_SESSION['UserID']) {
$query="UPDATE ".$TablePreFix."Messenger SET `Read`=1 WHERE `id`=".$Message['id']."";
mysql_query($query); }
?>
<tr>
   <td width="62%"><a name="<?php echo $Message['id']; ?>"><!-- The Message --></a><span class="ReplyText"><?php echo $Message['MessageText']; ?></span></td>
   <td width="38%"><center><img src="<?php echo $User1Avatar ?>" style="border: 0; height: <?php echo $AvatarSizeH; ?>; width: <?php echo $AvatarSizeW; ?>;" border="0" height="<?php echo $AvatarSizeH; ?>" width="<?php echo $AvatarSizeW; ?>" title="<?php echo $User1Name ?>'s <?php echo $lang2['avatar']; ?>" alt="<?php echo $User1Name ?>'s <?php echo $lang2['avatar']; ?>" /></center><br /><?php echo $lang2['users name']; ?> <a href="Members.php?act=Profile&amp;id=<?php echo $Message['SenderID']; ?>"><?php echo $User1Name; ?></a><br /><a title="<?php echo $lang2['pm sent on']; ?> <?php echo $DateSend ?>"><?php echo $lang2['time sent']; ?> <br /><?php echo $DateSend ?></a><br /><center><a title="<?php echo $lang2['goto']; ?> <?php echo $User1Name; ?>'s website" href="<?php echo $User1Website; ?>" target="_blank"><?php echo $lang2['www']; ?></a><br /><a title="<?php echo $lang2['email']; ?> <?php echo $User1Name; ?>" href="mailto:<?php echo $User1Email; ?>" target="_blank"><?php echo $lang2['email']; ?></a><br /><a title="<?php echo $lang2['pm']; ?> <?php echo $User1Name; ?>" href="Messenger.php?act=Create&amp;Sendto=<?php echo $URLUser1Name; ?>" target="_self"><?php echo $lang2['pm']; ?></a>
   <?php if ($Groups['Has_admin_cp']=="yes") {
   echo "\r\n<br /><a href=\"http://ws.arin.net/cgi-bin/whois.pl?queryinput=".urlencode($UserIP)."\" title=\"".gethostbyaddr($User1IP)."\" target=\"_blank\">".$User1IP."</a>"; }?></center></td>
   </tr>
<?php } ?>
   </tr>
  </table>
<?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
</div>
</TD>
		<?php echo $TableEnd; ?>
<?php }
if ($_GET['act']=="Reply") {
	$queryre="SELECT * FROM ".$TablePreFix."Messenger WHERE ID=".$_GET['id']."";
    $resultre=mysql_query($queryre);
    $numre=mysql_num_rows($resultre);
    $ire=0;
    while ($ire < $numire) {
    $MessageTitle=mysql_result($resultre,$ire,"MessageTitle");
    $MessageText=mysql_result($resultre,$ire,"MessageText");
	$DateSend=mysql_result($resultre,$ire,"DateSend");
	++$ire;
	}
	$DateSend = GMTimeChange("F j, Y, g:i a",$Message['DateSend'],$YourOffSet);
	$NewTitle = preg_replace("/\Re: /is", "", $MessageTitle);
	$NewTitle = "Re: ".$NewTitle."";
	$NewText = preg_replace("/\[QUOTE\=(.+?)\](.*?)\[\/QUOTE\]/is", "", $MessageText);
	$NewText = "[QUOTE=".$_GET['Sendto']." @ ".$DateSend."]".$MessageText."[/QUOTE][BR]\r\n";
	$_GET['act']="Create";
}
if ($_GET['act']=="Create") { 
$query="SELECT * FROM ".$TablePreFix."Messenger";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$querys="SELECT * FROM ".$TablePreFix."Messenger";
	$results=mysql_query($querys);
	$nums=mysql_num_rows($results);
	$numss=$num-1;
	$PMsID=mysql_result($result,$numss,"id");
$PMID=$PMsID+1; ?>
	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><?php/*<div align="center">*/?>
<div align="center">
 <center>
 <?php if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <?php require( './misc/SmileTable.php'); ?>
   <td width="72%"><?php require( './misc/Buttons.php'); ?>
<script type="text/javascript">
<!-- /* Form validation script by Prather Production, written by Michael Prather.  Visit http://www.pratherproductions.com */
function CheckForms(Reply)
{

  if (PM.SendPMto.value == "")
  {
    alert("<?php echo $lang2['you need user name to send to']; ?>");
    PM.SendPMto.focus();
	return (false);
     }

  if (PM.PMTitle.value == "")
  {
    alert("<?php echo $lang2['you need a title']; ?>");
    PM.PMTitle.focus();
	return (false);
     }
	   
if (PM.YourMessage.value == "")
  {
    alert("<?php echo $lang2['you need a message']; ?>");
    PM.YourMessage.focus();
	return (false);
     }
  
  return (true);
  }
  //-->
  </script>
	<form method=post name="PM" onSubmit=" return CheckForms(this)" action="?act=SendPM">
	<label for="SendPMto"><?php echo $lang2['send pm to']; ?></label><br />
	<input type="text" name="SendPMto" id="SendPMto" class="TextBox" value="<?php echo urldecode($_GET['Sendto']); ?>"><br />
	<label for="PMTitle"><?php echo $lang2['pm title']; ?></label><br />
	<input type="text" name="PMTitle" id="PMTitle" class="TextBox" value="<?php echo $NewTitle ?>"><br />
	<label for="YourMessage"><?php echo $lang2['your message']; ?></label><br />
	<textarea rows="5" name="YourPost" id="YourMessage" cols="28" class="TextBox"><?php echo stripcslashes($NewText); ?></textarea><br />
	<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" checked /><label for="LineBreaks1" title="<?php echo $lang2['use to put linebreaks']; ?>"><?php echo $lang2['auto linebreaks mode']; ?></label> 
    <input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" /><label for="LineBreaks2" title="<?php echo $lang2['use if you are making table/list']; ?>"><?php echo $lang2['raw linebreaks mode']; ?></label><br /> 
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="PMID" value="<?php echo $PMID; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="YourID" value="<?php echo $_SESSION['UserID']; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="YourDate" value="<?php echo GMTimeSend(null); ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="SendPM">
	<input type="submit" value="Send PM" class="Button"><input type="reset" value="Reset PM" class="Button">
	</form></td>
  </tr>
 </table>
 <?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 </center>
</div>
</TD>
		<?php echo $TableEnd; ?>
<?php }
if ($_GET['act']=="SendPM") {
if ($Groups['Has_mod_cp']=="yes" || $Groups['Has_admin_cp']=="yes") {
	$MaxPMs=0; }
if ($MaxPMs==0) {
	$MaxPMs=$SentPMNumber+1; }
if ($SentPMNumber>=$MaxPMs) {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you sent too many pms']."</strong><br />"; }
$YourMessage = $_POST['YourPost'];
/*if ($_GET['act']==$_SESSION['UserID']) {*/
if ($Groups['Can_pm']=="no") {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['You need to be member to send pm']." <a href='Members.php?act=Signup title='".$lang2['signup']."'>".$lang2['signup']."</a>'. ^_^</strong><br />"; }
if ($_POST['SendPMto']==null) {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['need a username to send to']."</strong><br />"; }
if ($_POST['PMTitle']==null) {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['need a pm title']."</strong><br />"; }
if ($YourMessage==null) {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need a message']."</strong><br />";	 }
if ($Error=="Yes") {
mysql_close();
?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center><?php
?></body></html><?php
exit(); }
$SendPMto = stripcslashes(htmlentities($_POST['SendPMto'], ENT_QUOTES));
$SendPMto = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $SendPMto);
$PMTitle = stripcslashes(htmlentities($_POST['PMTitle'], ENT_QUOTES));
$PMTitle = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $PMTitle);
$YourPost = $YourMessage;
require( './misc/HTMLTags.php');
$YourMessage = $YourPost;
$YourMessage = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $YourMessage);
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
$SerchUserID=$row[0];
if ($row[1]==$SendPMto) {
$SendPMtoID=$row[0];
$YourPMID = $_SESSION['UserID'];
if($YourPMID==0) { $YourOldID=$YourPMID; $YourPMID=2; $IDChange="Yes"; }
$query = "INSERT INTO ".$TablePreFix."Messenger VALUES (null,".$YourPMID.",".$SendPMtoID.",'".$PMTitle."','".$YourMessage."',".$_POST['YourDate'].",0)";
mysql_query($query);
if($IDChange=="Yes") { $YourPMID=$YourOldID; }
echo "<meta	http-equiv='Refresh' Content='0; URL=Messenger.php?act=View'>"; } } }
$status = explode('  ', mysql_stat($StatSQL));
require( './misc/Footer.php');
?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center><?php
mysql_close(); ?>
</body></html>