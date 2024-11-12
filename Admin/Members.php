<?php
require( '../misc/banned.php');
require( 'MySQL.php');
require( '../lang/en/NavBar.php');
require( '../lang/en/Members.php');
$Stat3SQL = mysql_connect($mysqlhost,$username,$password,null,'MYSQL_CLIENT_COMPRESS')or die(mysql_error());
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
<meta name="copyright" content="Game Makeer 2k&copy; 2004">
<meta name="keywords" content="Discussion Forums 2k, DF2k, <?php echo $BoardName ?>, <?php echo $KeyWords ?>">
<meta name="description" content="<?php echo $Description ?>">
</head>
<?php
if ($_GET['act']=="View") {?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $adminlang2['admin cp']; ?> <?php echo $TitleLine ?> <?php echo $adminlang2['member tools']; ?></title>
<?php }
if ($_GET['Backwards']=="Yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="on") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']!="on") {
    echo "\n<body>"; }
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
<center><a href="./index.php?act=View" title="<?php echo $BoardName; ?> <?php echo $lang['powered by df2k']; ?>"><img src="../<?php echo $Logo; ?>" width="730" height="100" border="0" alt="<?php echo $BoardName; ?> <?php echo $lang['powered by df2k']; ?>" /></a></center><br />
<div align="center">
<TABLE WIDTH="720" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0">
	<TR>
		<TD COLSPAN="2">
		<IMG SRC="../Skin/Skin1/index_04.png" WIDTH="21" HEIGHT="21" ALT=""></TD>
		<TD COLSPAN="3" valign="middle" background="../Skin/Skin1/index_05.png"><?php if ($_SESSION['MemberName']!=null) { ?><?php echo $adminlang['logged in']; ?><a href="../Members.php?act=Profile&id=ShowMe" title="<?php echo $adminlang['view your profile']; ?>"><?php echo $_SESSION['MemberName'] ?></a>	<span class="style1">/ </span><a href="Login.php?act=Logout" title="<?php echo $adminlang['logout']; ?>"><?php echo $adminlang['logout']; ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']==null) { ?><a href="Login.php?act=Login" title="<?php echo $adminlang['login']; ?>"><?php echo $adminlang['login admin cp']; ?></a> <span class="style1">/ </span><?php } if ($Groups['Has_mod_cp']=="yes") { ?><a href="../Mod/" title="<?php echo $adminlang['use mod tools']; ?>"><?php echo $adminlang['mod tools']; ?></a><?php } ?></TD>
		<TD COLSPAN="2">
		<IMG SRC="../Skin/Skin1/index_06.png" WIDTH="106" HEIGHT="21" ALT=""></TD>
	</TR>
	</TR>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="../Skin/Skin1/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
<?php 
if ($Groups['Has_admin_cp']=="no") {
		echo "Please fix the following errors: <br />\n<strong>You need to be a Admin to use this. ^_^</strong><br />";
		$act="NotAdmin";	 }
if ($_GET['act']=="View") {
if ($Groups['Has_admin_cp']=="yes") {?>	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center">
<div align="center">
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
 <th align="center"><a><?php echo $adminlang2['board settings tool']; ?></a></th>
  </tr>
   <tr>
 <td align="center"><?php echo $adminlang2['here you can edit member']; ?><br />
<form method="POST" action="?php=php>asp">
<label for="BoardOffline"><?php echo $adminlang2['delete/edit member']; ?></label><br />
<?php
$query="SELECT * FROM ".$TablePreFix."Members";
$result=mysql_query($query);
$num=mysql_num_rows($result)or die(mysql_error());
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
$UserSignature=mysql_result($result,$i,"Signature");
$UserAvatar=mysql_result($result,$i,"Avatar");
$UserWebsite=mysql_result($result,$i,"Website");
$UserPostCount=mysql_result($result,$i,"PostCount");
$TimeZone=mysql_result($result,$i,"TimeZone");
$UserIP=mysql_result($result,$i,"IP");
?><input type="radio" id="ID<?php echo $UsersID ?>" name="IDN" value="<?php echo $UsersID ?>" /><label for="ID<?php echo $UsersID ?>"><?php echo $UsersName ?></label><?php echo "<br />\r\n"; ++$i; } ?>
<select size="1" class="Menu" name="act">
<option selected value="Edit"><?php echo $adminlang2['edit member']; ?></option>
<option value="Delete"><?php echo $adminlang2['delete member']; ?></option>
</select><br />
<input type="submit" class="Button" value="Edit Settings" name="Edit"><input type="reset" class="Button" value="Reset Form" name="Reset">
</form></td>
  </tr>
 </table>
</div>
</TD>
		<TD background="../Skin/Skin1/index_10.png">&nbsp;</TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
			<IMG SRC="../Skin/Skin1/index_11.png" WIDTH="720" HEIGHT="22" ALT=""></TD>
	</TR>
	<TR>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="13" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="8" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="356" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="161" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="76" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="92" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="14" HEIGHT="1" ALT=""></TD>
	</TR>
</TABLE>
<?php }	}
if ($_POST['act']=="Edit") {
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$_POST['IDN']) {
$OldUserid=$row[0];
$OldUserName =$row[1];
$OldUserPassword=$row[2];
$OldUserEmail=$row[3];
$OldUserGroup=$row[4];
$OldWarnLevel=$row[5];
$OldInterests=$row[6];
$OldUserTitle=$row[7];
$OldLastActive=$row[9];
$OldUserSignature=$row[10];
$OldUserAvatar=$row[11];
$OldAvatarSize=$row[12];
$OldUserWebsite=$row[13];
$OldUserIP=$row[16]; } }?>	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center">
<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="28%"><form method="post" name="Member" action="?act=EditYourProfile">
<label for="Email"><?php echo $adminlang2['insert your email']; ?></label><br />
<input type="text" class="TextBox" name="NewUserEmail" size="20" id="Email" value="<?php echo $OldUserEmail?>" /><br />
<label for="Interests"><?php echo $adminlang2['insert your interests']; ?></label><br />
<input type="text" class="TextBox" name="NewInterests" id="Interests" value="<?php echo $OldInterests ?>" size="20" /><br />
<label for="Title"><?php echo $adminlang2['insert a member title']; ?></label><br />
<input type="text" class="TextBox" name="NewUserTitle" id="Title" value="<?php echo $OldUserTitle ?>" size="20" /><br />
<label for="Group"><?php echo $adminlang2['pick user group for member']; ?></label><br />
<select size="1" name="NewUserGroup" id="Group" class="Menu">
<option value="<?php echo $OldUserGroup ?>" selected="selected" class="Menu"><?php echo $adminlang2['keep group']; ?></option>
<?php 
$querys511="SELECT * FROM ".$TablePreFix."Groups";
$results511=mysql_query($querys511);
$GroupNum3=mysql_num_rows($results511);
$GroupNum4=0;
while ($GroupNum4 < $GroupNum3) {
$Groupz['ID']=mysql_result($results511,$GroupNum4,"id");
$Groupz['Name']=mysql_result($results511,$GroupNum4,"Name");
?>
<option value="<?php echo $Groupz['Name']; ?>"><?php echo $Groupz['Name']; ?></option>
<?php echo "\n"; ++$GroupNum4; }?>
</select><br />
<label for="NewWarnLevel"><?php echo $adminlang2['change warnlevel for member']; ?></label><br />
<select size="1" name="NewWarnLevel" id="NewWarnLevel" class="Menu">
<option value="<?php echo $OldWarnLevel ?>" selected="selected" class="Menu"><?php echo $adminlang2['keep level']; ?></option><?php echo "\n"; $i=0; while ($i <= 100) { ?><option value="<?php echo $i ?>"><?php echo $i; ?></option><?php echo "\n"; ++$i; } ?>
</select><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="NewLastActive" value="<?php echo date('F j, Y, g:i a T'); ?>" /> <label for="Avatar"><?php echo $adminlang2['insert url for avatar']; ?></label><br />
<input type="text" class="TextBox" name="NewUserAvatar" size="20" value="<?php echo $OldUserAvatar ?>" id="Avatar" /><br />
<label for="AvatarSize"><?php echo $adminlang2['insert avatarsize']; ?></label><br />
<input type="text" class="TextBox" name="NewUserAvatarSize" size="20" value="<?php echo $OldAvatarSize ?>" id="AvatarSize" /><br />
<label for="Website"><?php echo $adminlang2['insert a url']; ?></label><br />
<input type="text" class="TextBox" name="NewUserWebsite" size="20" value="<?php echo $OldUserWebsite ?>" id="Website" /><br />
<?php /*<!--<label for="SetSkin">Change Board Skin to:<br /></label>
<select size="1" name="SetSkin" id="SetSkin" class="Menu"><option value="<?php echo $_SESSION['Skin'] ?>" selected="selected" class="Menu">Keep Old</option><option value="1" style="color: #0000FF;">Blue Skin</option><option value="2" style="color: #008000;">Green Skin</option>
<option value="3" style="color: #FF0000;">Red Skin<option value="4" style="color: #FFA500;">Orange Skin</option><option value="5" style="color: #A0A0A0;">Gray Skin</option><option value="6" style="color: #FFCCFF;">Pink Skin</option></select><br />-->*/ ?>
<label for="Signature"><?php echo $adminlang2['insert signature']; ?></label><br />
<textarea class="TextBox" rows="3" name="NewUserSignature" cols="20" id="Signature"><?php echo $OldUserSignature ?></textarea><br />
<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" checked="checked" /><label for="LineBreaks1" title="<?php echo $adminlang2['use to put linebreaks']; ?>"><?php echo $adminlang2['auto linebreaks mode']; ?></label> 
<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" /><label for="LineBreaks2" title="<?php echo $adminlang2['use if you are making table/list']; ?>"><?php echo $adminlang2['raw linebreaks mode']; ?></label><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="NewUserIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="OldUserid" value="<?php echo $OldUserid; ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="<?php echo $adminlang2['edit your profile']; ?>" /> 
<input type="submit" class="Button" value="Edit Profile" /> <input type="reset" class="Button" value="<?php echo $adminlang2['reset']; ?>" />
</form></td>
  </tr>
 </table>
 </center>
</div>
</TD>
		<TD background="../Skin/Skin1/index_10.png">&nbsp;</TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
			<IMG SRC="../Skin/Skin1/index_11.png" WIDTH="720" HEIGHT="22" ALT=""></TD>
	</TR>
	<TR>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="13" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="8" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="356" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="161" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="76" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="92" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="../Skin/Skin1/spacer.png" WIDTH="14" HEIGHT="1" ALT=""></TD>
	</TR>
</TABLE><?php }
if ($_GET['act']=="EditYourProfile") {
$NewInterests = stripcslashes(htmlentities($_POST['NewInterests'], ENT_QUOTES));
$NewInterests = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewInterests);
$NewUserTitle = stripcslashes(htmlentities($_POST['NewUserTitle'], ENT_QUOTES));
$NewUserTitle = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewUserTitle);
$NewUserSignature = stripcslashes(htmlentities($_POST['NewUserSignature'], ENT_QUOTES));
$YourPost = $NewUserSignature;
require( '../misc/HTMLTags.php');
$NewUserSignature = $YourPost;
$NewUserSignature = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewUserSignature);
$queryup="UPDATE ".$TablePreFix."Members SET `Group`='".$_POST['NewUserGroup']."',`Interests`='".$NewInterests."',`Title`='".$NewUserTitle."',`Signature`='".$NewUserSignature."',`WarnLevel`='".$NewWarnLevel."',`Avatar`='".$_POST['NewUserAvatar']."',`AvatarSize`='".$_POST['NewUserAvatarSize']."',`Website`='".$_POST['NewUserWebsite']."' WHERE ID=".$_POST['OldUserid']."";
mysql_query($queryup);
echo '<meta http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
if ($_POST['act']=="Delete") {
	if ($_POST['IDN']==1) { echo "".$adminlang2['cant delete root admin'].""; exit(); }
	if ($_POST['IDN']==2) { echo "".$adminlang2['cant delete root guest'].""; exit(); }
	$sqlrowdelete = "DELETE FROM ".$TablePreFix."Members WHERE id=".$_POST['IDN']."";
    $resultdelete = mysql_query($sqlrowdelete);
	echo '<meta http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
?><?php	$status = explode('  ', mysql_stat($Stat3SQL));  
require( '../misc/Footer.php');
mysql_close(); ?><center><a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="../Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="../Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a></center>
</body></html>