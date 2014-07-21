<?php
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/Search.php');
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
</head>
<?php
if ($_GET['act']==null) {
$_GET['act']="Search"; }
if ($_GET['type']==null) {
$_GET['type']="Members"; }
if ($_GET['type']=="Users") {	$_GET['type']="Members"; }
if ($_GET['act']=="Search") { 
	if ($_GET['type']=="Members") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['searching for members']; ?></title>
<?php } }
	if ($_GET['act']=="Search") { 
	if ($_GET['type']=="FindMembers") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['searching for members']; ?></title>
<?php } }
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
<div align="center">
<TABLE WIDTH="720" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0">
	<TR>
		<TD COLSPAN="2">
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_04.png" WIDTH="21" HEIGHT="21" ALT=""></TD>
		<TD COLSPAN="3" valign="middle" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_05.png);" class="navbar"><?php if ($_SESSION['BotName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['BotName'] ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="View Your Profile"><?php echo $_SESSION['MemberName'] ?></a>	<span class="style1">/ </span><a href="Members.php?act=Logout" title="<?php echo $lang['logout']; ?>"><?php echo $lang['logout']; ?></a>	<span class="style1">/ </span><?php } if($Groups['Can_pm']=="yes") { ?><a href="Messenger.php?act=View" title="Goto MailBox"><?php echo $lang['mailbox']; ?></a><a title="<?php echo $lang['new pms 1']; ?><?php echo $PMNumber; ?><?php echo $lang['new pms 2']; ?>">(<?php echo $PMNumber; ?>)</a>	<span class="style1">/ </span><?php } if ($Groups['Has_mod_cp']=="yes"&&$Groups['Has_admin_cp']=="no") {?><a href="Mod/Login.php?act=Login" title="<?php echo $lang['goto mod tools']; ?>"><?php echo $lang['mod cp']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Has_admin_cp']=="yes") {?><a href="Admin/Login.php?act=Login" title="<?php echo $lang['goto admin cp']; ?>"><?php echo $lang['admin cp']; ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']==null) { ?><a href="Members.php?act=Login" title="<?php echo $lang['login']; ?>"><?php echo $lang['login']; ?></a>	<span class="style1">/ </span><a href="Members.php?act=Signup" title="<?php echo $lang['register']; ?>"><?php echo $lang['register']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_make_topics']=="yes") { ?><a href="Forum.php?id=1&amp;CatID=1&amp;act=Create" title="<?php echo $lang['create new topic']; ?>"><?php echo $lang['new topic']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_make_topics']=="no") { ?><!--<a href="Forum.php?id=1&amp;CatID=1&amp;act=Create" title="<?php echo $lang['Create New Topic']; ?>">--><span title="<?php echo "You cant make a topic."; ?>"><?php echo $lang['new topic']; ?></span><!--</a>-->	<span class="style1">/ </span><?php } ?><a href="Help.php?act=View" title="<?php echo $lang['help files']; ?>"><?php echo $lang['help']; ?></a>	<span class="style1">/ </span><a href="Calendar.php?act=View" title="<?php echo $lang['view calendar']; ?>"><?php echo $lang['calendar']; ?></a>	<span class="style1">/ </span><a href="TagBoard.php?act=View" title="<?php echo $lang['goto tag boards']; ?>"><?php echo $lang['tag board']; ?></a></TD>
		<TD COLSPAN="2" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_06.png);"></TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
	<TR>
		<TD background="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5><div align="center">
<?php if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
		<?php if ($_GET['act']=="Search") { 
	if ($_GET['type']=="Members") { ?>
	<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="28%">
	<form method="get" action="?act=Search&amp;type=FindMembers">
	<label for="Name"><?php echo $lang2['insert user name']; ?><br />
    </label><input type="text" class="TextBox" id="Name" name="SearchName" value="Enter a Name.">
	<input type="submit" class="Button" name="Search" value="Find">
	<input type="reset" class="Button" name="Reset" value="Reset">
	<br /><label for="WC"><?php echo $lang2['Wildcard Type']; ?>
    </label><select size="1" id="WC" size="1" class="Menu" name="wildcard">
	<option value="UserName" selected="selected"><?php echo $lang2['username']; ?></option>
	<option value="^UserName"><?php echo $lang2['usernamewc1']; ?></option>
	<option value="^UserName^"><?php echo $lang2['usernamewc2']; ?></option>
	<option value="UserName^"><?php echo $lang2['usernamewc3']; ?></option>
	</select>
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="Search" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="type" value="FindMembers" />
	</form></td>
  </tr>
 </table>
 </center>
</div>
	<?php }
	if ($_GET['type']=="FindMembers") {
		if ($_GET['SearchName']!=null) {?>
		<div align="center">
<table border="1" cellpadding="2" cellspacing="3" width="100%">
 <tr>
   <th width="50%"><?php echo $lang2['searching for members']; ?></th>
  </tr>
 </table>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <th width="25%"><?php echo $lang2['users name']; ?></th>
   <th width="34%"><?php echo $lang2['email/pm/website']; ?></th>
   <th width="30%"><?php echo $lang2['users localtime']; ?></th>
   <th width="8%"><?php echo $lang2['post count']; ?></th>
  </tr><?php
			if ($_GET['wildcard']=="UserName") { $query="SELECT * FROM ".$TablePreFix."Members  WHERE `Name`='".$_GET['SearchName']."' order by `Name` asc"; }
			if ($_GET['wildcard']=="^UserName") { $query="SELECT * FROM ".$TablePreFix."Members  WHERE `Name` LIKE '%".$_GET['SearchName']."' order by `Name` asc"; }
			if ($_GET['wildcard']=="^UserName^") { $query="SELECT * FROM ".$TablePreFix."Members  WHERE `Name` LIKE '%".$_GET['SearchName']."%' order by `Name` asc"; }
			if ($_GET['wildcard']=="UserName^") { $query="SELECT * FROM ".$TablePreFix."Members  WHERE `Name` LIKE '".$_GET['SearchName']."%' order by `Name` asc"; }
			$result=mysql_query($query);
			$num=mysql_num_rows($result);
			$i=0;
			while ($i < $num) {
				$UsersID=mysql_result($result,$i,"id");
				$UsersName=mysql_result($result,$i,"Name");
				$UserPassword=mysql_result($result,$i,"Password");
				$UserEmail=mysql_result($result,$i,"Email");
				$UsersGroup=mysql_result($result,$i,"Group");
				$UserInterests=mysql_result($result,$i,"Interests");
				$UserTitle=mysql_result($result,$i,"Title");
				$UserJoined=mysql_result($result,$i,"Joined");
				$UserLastActive=mysql_result($result,$i,"LastActive");
				$UserJoined=GMTimeChange("F j, Y, g:i a",$UserJoined,$YourOffSet);
				$UserLastActive=GMTimeChange("F j, Y, g:i a",$UserLastActive,$YourOffSet);
				$UserSignature=mysql_result($result,$i,"Signature");
				$UserAvatar=mysql_result($result,$i,"Avatar");
				$UserWebsite=mysql_result($result,$i,"Website");
				$UserPostCount=mysql_result($result,$i,"PostCount");
				$UserTimeZone=mysql_result($result,$i,"TimeZone");
				$UserIP=mysql_result($result,$i,"IP");
				$post['Post'] = $UserSignature;
				require( './misc/BBTags.php');
				$UserSignature = $_GET['YourPost'];
				if ($UserAvatar=="http://") {
				$UserAvatar="./Pics/Avatar.png"; }
				if ($UserAvatar==null) {
				$UserAvatar="./Pics/Avatar.png"; }
				if ($UserWebsite=="http://") {
				$UserWebsite="Members.php?act=Profile&amp;id=".$UsersID; }
				if ($UserWebsite==null) {
				$UserWebsite="Members.php?act=Profile&amp;id=".$UsersID; }
				$UsersNameURL = urlencode($UsersName);
				$MaxUsers = $MaxUsers + 1; $AllUsers = $AllUsers + 1; $AllPosts = $AllPosts + 1; 
				$UserRandom[$UsersID] = $UsersName; 
				$PMRandom[$UsersID] = $UsersNameURL; 
				$EmailRandom[$UsersID] = $UserEmail; 
				$WebsiteRandom[$UsersID] = $UserWebsite; 
				$PostCountRandom[$UsersID] = $UserPostCount;
				$TimeZoneRandom[$UsersID] = $UserTimeZone; 
		?>
   <tr>
   <td width="37%"><a name="<?php echo $UsersID ?>"><!--&nbsp;--></a><a href="Members.php?act=Profile&amp;id=<?php echo $UsersID ?>" title="View <?php echo $UsersName ?>'s <?php echo $lang2['profile']; ?>"><?php echo $UsersName ?></a></td>
   <td width="36%" align="center"><a href="mailto:<?php echo $UserEmail ?>" title="<?php echo $lang2['email']; ?> <?php echo $UsersName ?>"><?php echo $lang2['email']; ?></a> / <a title="<?php echo $lang2['pm']; ?> <?php echo $UsersName; ?>" href="Messenger.php?act=Create&amp;Sendto=<?php echo $UsersNameURL; ?>"><?php echo $lang2['pm']; ?></a> / <a href="<?php echo $UserWebsite ?>" title="<?php echo $UsersName ?>'s <?php echo $lang2['website']; ?>"><?php echo $lang2['www']; ?></a></td>
   <td width="31%" align="center"><?php echo GMTimeGet("F j, Y, g:i a",$UserTimeZone); ?></td>
   <td width="6%" align="center"><a name="PostCount<?php echo $UsersID ?>" title="<?php echo $UsersName; ?> <?php echo $lang2['has made']; ?> <?php echo $UserPostCount; ?> posts"><?php echo $UserPostCount; ?></a></td>
  </tr>
<?php 
++$i; }
	
	} if ($num==0) {?>   <tr>
   <td width="37%"><?php echo $lang2['no members with name']; ?></td>
   <td width="36%" align="center">&nbsp;???&nbsp;</td>
   <td width="31%" align="center">&nbsp;???&nbsp;</td>
   <td width="6%" align="center">&nbsp;???&nbsp;</td>
  </tr> <?php } ?>
</table>
	<?php } } ?>
		<?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
		</TD>
		<TD background="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_10.png">&nbsp;</TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_11.png" WIDTH="720" HEIGHT="22" ALT=""></TD>
	</TR>
	<TR>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="13" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="8" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="356" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="161" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="76" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="92" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="14" HEIGHT="1" ALT=""></TD>
	</TR>
</TABLE>
<?php 
$status = explode('  ', mysql_stat($StatSQL));
require( './misc/Footer.php');
mysql_close(); ?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center>
</body></html>