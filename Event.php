<?php
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/Event.php');
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
<?php
$_GET['id'] = (int)	 $_GET['id'];
if ($_GET['act']==null) {
	$_GET['act']="View"; }
if ($_GET['act']=="Event") {
	$queryRand="SELECT * FROM ".$TablePreFix."Events";
	$resultRand=mysql_query($queryRand);
	$numRand=mysql_num_rows($resultRand);
	if ($_GET['id']==null) {
		$_GET['id']=rand(1,$numRand); } }
if ($_GET['act']=="View") {
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['viewing all events'].'</title>'; }
if ($_GET['act']=="Create") {
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['creating new event'].'</title>'; }
if ($_GET['act']=="Send") {
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['sending new event'].'</title>'; }
if ($_GET['act']=="Event") {
$post_query = mysql_query("SELECT * FROM ".$TablePreFix."Events WHERE (ID=".$_GET['id'].")");
$Event = mysql_fetch_array($post_query);
$post_querys = mysql_query("SELECT * FROM ".$TablePreFix."Members WHERE (ID=".$Event['UserID'].")");
$Users = mysql_fetch_array($post_querys);
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['viewing event'].' '.$Event['EventName'].'</title>'; } ?>
</head>
<?php
if ($_GET['Backwards']=="Yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="on") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']!="on") {
    echo "\n<body>"; }
$YourUserID = $_SESSION['UserID'];
$query007="SELECT * FROM ".$TablePreFix."Messenger WHERE `PMSentID`=".$YourUserID." and `Read`=0";
$result007=mysql_query($query007);
$PMNumber=mysql_num_rows($result007);
$querys007="SELECT * FROM ".$TablePreFix."Messenger WHERE (SenderID=$YourUserID)";
$results007=mysql_query($querys007);
$SentPMNumber=mysql_num_rows($results007);
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
?>
<div align="center"><a href="./index.php?act=View" title="<?php echo $BoardName; ?> <?php echo $lang['powered by df2k']; ?><?php echo $_SESSION['DF2kPreVer']; ?>"><img src="Skin/Skin<?php echo $_SESSION["Skin"] ?>/Logo.png" width="730" height="100" border="0" alt="<?php echo $BoardName; ?> <?php echo $lang['powered by df2k']; ?><?php echo $_SESSION['DF2kPreVer']; ?>" /></a>
</div>
<?php/*<div align="center">*/?>
<TABLE WIDTH="720" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0">
	<TR>
		<TD COLSPAN="2">
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_04.png" WIDTH="21" HEIGHT="21" ALT=""></TD>
		<TD COLSPAN="3" valign="middle" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_05.png);" class="navbar"><?php if ($_SESSION['BotName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['BotName'] ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['MemberName'] ?></a>	<span class="style1">/ </span><a href="Members.php?act=Logout" title="<?php echo $lang['logout']; ?>"><?php echo $lang['logout']; ?></a>	<span class="style1">/ </span><?php } if($Groups['Can_pm']=="yes") { ?><a href="Messenger.php?act=View" title="Goto MailBox"><?php echo $lang['mailbox']; ?></a><a title="<?php echo $lang['new pms 1']; ?><?php echo $PMNumber; ?><?php echo $lang['new pms 2']; ?>">(<?php echo $PMNumber; ?>)</a>	<span class="style1">/ </span><?php } if ($Groups['Has_mod_cp']=="yes"&&$Groups['Has_admin_cp']=="no") {?><a href="Mod/Login.php?act=Login" title="<?php echo $lang['goto mod tools']; ?>"><?php echo $lang['mod cp']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Has_admin_cp']=="yes") {?><a href="Admin/Login.php?act=Login" title="<?php echo $lang['goto admin cp']; ?>"><?php echo $lang['admin cp']; ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']==null) { ?><a href="Members.php?act=Login" title="<?php echo $lang['login']; ?>"><?php echo $lang['login']; ?></a>	<span class="style1">/ </span><a href="Members.php?act=Signup" title="<?php echo $lang['register']; ?>"><?php echo $lang['register']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_add_events']=="yes") { ?><a href="Event.php?act=Create" title="<?php echo $lang['create new event']; ?>"><?php echo $lang['new event']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_add_events']=="no") { ?><!--<a href="Event.php?act=Create" title="<?php echo $lang['create new event']; ?>">--><span title="<?php echo $lang['not member event error']; ?>"><?php echo $lang['new event']; ?></span><!--</a>-->	<span class="style1">/ </span><?php } ?><a href="Help.php?act=View" title="<?php echo $lang['help files']; ?>"><?php echo $lang['help']; ?></a>	<span class="style1">/ </span><a href="Calendar.php?act=View" title="<?php echo $lang['view calendar']; ?>"><?php echo $lang['calendar']; ?></a>	<span class="style1">/ </span><a href="TagBoard.php?act=View" title="<?php echo $lang['goto tag boards']; ?>"><?php echo $lang['tag board']; ?></a></TD>
		<TD COLSPAN="2" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_06.png);"></TD>
	</TR>
<?php/*</TR>*/?>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><?php/*<div align="center">*/?>
<?php if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
		<?php
		if ($_GET['act']=="View") {
	?>
		<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><div align="center">
	<div align="center">
     <table border="1" width="100%" cellpadding="2" cellspacing="3">
      <tr>
     <th>
      <p align="center"><?php echo $lang2['event names']; ?></p></th>
     </tr>
	 <tr>
<td width="100%" align="center"><a href="Event.php?act=Event" title="<?php echo "Random Event"; ?>"><?php echo "Random Event"; ?></a></td>
</tr>
<?php
if ($_GET['act']=="View") {
$query="SELECT * FROM ".$TablePreFix."Events ORDER BY ID";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$is=0;
while ($is < $num) {
$EventID=mysql_result($result,$is,"ID");
$EventUser=mysql_result($result,$is,"UserID");
$EventName=mysql_result($result,$is,"EventName");
$EventText=mysql_result($result,$is,"EventText");
$EventMouth=mysql_result($result,$is,"EventMouth");
$EventMouthEnd=mysql_result($result,$is,"EventMouthEnd");
$EventDay=mysql_result($result,$is,"EventDay");
$EventDayEnd=mysql_result($result,$is,"EventDayEnd");
$EventYear=mysql_result($result,$is,"EventYear");
$EventYearEnd=mysql_result($result,$is,"EventYearEnd");
?>
<tr>
<td width="100%" align="center"><a href="Event.php?act=Event&amp;id=<?php echo $EventID ?>" title="<?php echo $EventName ?>"><?php echo $EventName ?></a></td>
</tr>
<?php
++$is; }
?>
 </table>
</div><?php
} }		
?>
<?php
if ($_GET['act']=="Create") {?>
<?php if ($Groups['Can_add_events']=="no") { ?>
<?php echo $lang2['cant make event']; ?>
<?php } if ($Groups['Can_add_events']=="yes") { ?>
<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="28%"><form method="post" name="Member" action="?act=Send">
<!--<label for="IDNumber">Insert a ID Number for Event:</label><br />
<input type="text" class="TextBox" name="Eventid" size="20" id="IDNumber" value="<?php echo $OldHelpFileid ?>" /><br />-->
<label for="EventName"><?php echo $lang2['insert name for event']; ?></label><br />
<input type="text" class="TextBox" name="EventName" id="EventName" value="" size="20" /><br />
<label for="EventMouth"><?php echo $lang2['insert start mouth for event']; ?></label><br />
<input type="text" class="TextBox" name="EventMouth" id="EventMouth" value="" size="20" /><br />
<label for="EventMouthEnd"><?php echo $lang2['insert end mouth for event']; ?></label><br />
<input type="text" class="TextBox" name="EventMouthEnd" id="EventMouthEnd" value="" size="20" /><br />
<label for="EventDay"><?php echo $lang2['insert start day for event']; ?></label><br />
<input type="text" class="TextBox" name="EventDay" id="EventDay" value="" size="20" /><br />
<label for="EventDayEnd"><?php echo $lang2['insert end day for event']; ?></label><br />
<input type="text" class="TextBox" name="EventDayEnd" id="EventDayEnd" value="" size="20" /><br />
<label for="EventYear"><?php echo $lang2['insert start year for event']; ?></label><br />
<input type="text" class="TextBox" name="EventYear" id="EventYear" value="" size="20" /><br />
<label for="EventYearEnd"><?php echo $lang2['insert end year for event']; ?></label><br />
<input type="text" class="TextBox" name="EventYearEnd" id="EventYearEnd" value="" size="20" /><br />
<label for="EventDescription"><?php echo $lang2['insert description for event']; ?></label><br />
<textarea class="TextBox" rows="3" name="EventDescription" cols="20" id="EventDescription"></textarea><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="Send" /> 
<input type="submit" class="Button" value="<?php echo $lang2['add event']; ?>" /> <input type="reset" class="Button" value="<?php echo $lang2['reset']; ?>" />
</form></td>
  </tr>
 </table>
 </center>
</div>
<?php } }	
if ($_GET['act']=="Send") {
if ($_POST['EventName']==null) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['you need a name']."</strong><br />"; }
if ($_POST['EventMouth']==null) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['you need to put a mouth']."</strong><br />"; }
if (strlen($_POST['EventMouth'])!=2) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['mouth is too big/small']."</strong><br />"; }
if ($_POST['EventMouthEnd']==null) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['you need to put a end mouth']."</strong><br />"; }
if (strlen($_POST['EventMouthEnd'])!=2) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['end mouth is too big/small']."</strong><br />"; }
if ($_POST['EventMouthEnd']<$_POST['EventMouth']) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['end mouth is too small']."</strong><br />"; }
if ($_POST['EventDay']==null) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['you need to put a day']."</strong><br />"; }
if (strlen($_POST['EventDay'])!=2) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['day is too big/small']."</strong><br />"; }
if ($_POST['EventDayEnd']==null) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['you need to put a end day']."</strong><br />"; }
if (strlen($_POST['EventDayEnd'])!=2) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['end day is too big/small']."</strong><br />"; }
if ($_POST['EventDayEnd']<$_POST['EventDay']) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['end day is too small']."</strong><br />"; }
if ($_POST['EventYear']==null) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['you need to put a year']."</strong><br />"; }
if (strlen($_POST['EventYear'])!=4) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['year is too big/small']."</strong><br />"; }
if ($_POST['EventYearEnd']==null) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['you need to put a end year']."</strong><br />"; }
if (strlen($_POST['EventYearEnd'])!=4) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['end year is too big/small']."</strong><br />"; }
if ($_POST['EventYearEnd']<$_POST['EventYear']) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['end year is too small']."</strong><br />"; }
if ($_POST['EventDescription']==null) {
$Error="Yes";
echo "".$lang2['Please fix the following errors: ']."<br />\n<strong>".$lang2['you need a description']."</strong><br />"; }
if ($Error!="Yes") {
$TopicName = $_POST['EventName'];
$YourPost = $_POST['EventDescription'];
require( './misc/HTMLTags.php');
$_POST['EventName'] = $TopicName;
$_POST['EventDescription'] = $YourPost;
$query = "INSERT INTO ".$TablePreFix."Events VALUES (null,".$_SESSION['UserID'].",'".$_POST['EventName']."','".$_POST['EventDescription']."',".$_POST['EventMouth'].",".$_POST['EventMouthEnd'].",".$_POST['EventDay'].",".$_POST['EventDayEnd'].",".$_POST['EventYear'].",".$_POST['EventYearEnd'].")";
mysql_query($query);
echo "<meta	http-equiv='Refresh' Content='0; URL=Calendar.php?act=View'>";  }	 }
if ($_GET['act']=="Event") {
	?>
<div align="center">
<table border="1" width="100%" cellpadding="2" cellspacing="3">
<?php
$query="SELECT * FROM ".$TablePreFix."Events WHERE ID=".$_GET['id']."";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$EventID=mysql_result($result,$is,"ID");
$EventUser=mysql_result($result,$is,"UserID");
$EventName=mysql_result($result,$is,"EventName");
$EventText=mysql_result($result,$is,"EventText");
$EventMouth=mysql_result($result,$is,"EventMouth");
$EventMouthEnd=mysql_result($result,$is,"EventMouthEnd");
$EventDay=mysql_result($result,$is,"EventDay");
$EventDayEnd=mysql_result($result,$is,"EventDayEnd");
$EventYear=mysql_result($result,$is,"EventYear");
$EventYearEnd=mysql_result($result,$is,"EventYearEnd");
$post['Post'] = $EventText;
require( './misc/BBTags.php');
$EventText = $_GET['YourPost'];
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$EventUser) {
$User1Name = $row[1];
$User1Email = $row[3];
$User1Signature = $row[10];
$User1Avatar = $row[11];
$User1AvatarSize = $row[12];
$User1Website = $row[13];
$User1IP = $row[16]; }	 }
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
?>
 <tr>
   <td width="62%" align="center"><?php echo $lang2['event title']; ?> <a href="Event.php?act=Event&amp;id=<?php echo $EventID; ?>" title="<?php echo $EventName; ?>"><?php echo $EventName; ?></a></td>
   <td width="38%"><?php echo $lang2['user info']; ?></td>
   </tr>
   <tr>
   <td width="62%"><a id="Event<?php echo $EventID; ?>" name="Event<?php echo $EventID; ?>"><!-- The Message --></a><span class="ReplyText"><?php echo $EventText; ?></span></td>
   <td width="38%"><center><img src="<?php echo $User1Avatar; ?>" style="border: 0; height: <?php echo $AvatarSizeH; ?>; width: <?php echo $AvatarSizeW; ?>;" border="0" height="<?php echo $AvatarSizeH; ?>" width="<?php echo $AvatarSizeW; ?>" title="<?php echo $UsersName ?>'s Avatar" alt="<?php echo $UsersName ?>'s Avatar" /></center><br /><?php echo $lang2['users name']; ?> <a href="Members.php?act=Profile&amp;id=<?php echo $EventUser; ?>"><?php echo $User1Name; ?></a><br /><center><a title="Goto <?php echo $User1Name; ?>'s <?php echo $lang2['website']; ?>" href="<?php echo $User1Website; ?>" target="_blank"><?php echo $lang2['WWW']; ?></a><br /><a title="<?php echo $lang2['email']; ?> <?php echo $User1Name; ?>" href="mailto:<?php echo $User1Email; ?>" target="_blank"><?php echo $lang2['email']; ?></a><br /><a title="<?php echo $lang2['pm']; ?> <?php echo $User1Name; ?>" href="Messenger.php?act=Create&amp;Sendto=<?php echo $URLUser1Name; ?>" target="_self"><?php echo $lang2['pm']; ?></a>
   <?php if ($_SESSION['UserGroup']=="Admin") {
   echo "\r\n<br /><a href=\"http://ws.arin.net/cgi-bin/whois.pl?queryinput=".urlencode($UserIP)."\" title=\"".gethostbyaddr($User1IP)."\" target=\"_blank\">".$User1IP."</a>"; }?></center></td>
   </tr>
<?php
++$i; }
?></table>
<?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
</div><?php
} ?>
		
		</TD>
		<?php echo $TableEnd; ?>
<?php 
$status = explode('  ', mysql_stat($StatSQL));
require( './misc/Footer.php');
mysql_close(); ?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center>
</body></html>