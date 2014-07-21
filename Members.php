<?php
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/Members.php');
$StatSQL = mysql_connect($mysqlhost,$username,$password,null,'MYSQL_CLIENT_COMPRESS')or die(mysql_error());
@mysql_select_db($database)or die(mysql_error());
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
<?php
if ($_GET['id']==null&&$_GET['u']!=null) { $_GET['id']=$_GET['u']; }
if ($_GET['id']=="ShowMe") {
	$SkipThis="Yes"; }
if ($_GET['id']=="Name") {
	$SkipThis="Yes"; }
if ($SkipThis!="Yes") {
	$_GET['id']= (int) $_GET['id']; }
if ($_GET['act']=="Staff"||$_GET['act']=="staff") { $_GET['act']="ViewStaff"; }
if ($_GET['act']==null||$_GET['act']=="viewstaff") { $_GET['act']="ViewStaff"; }
if ($_GET['act']=="DeleteSession") { $_GET['act']="Login"; }
if ($_GET['act']=="View") { $_GET['act']="Profile"; }
if ($_GET['act']=="ViewProfile") { $_GET['act']="Profile"; }
if ($_GET['act']=="Stats") {
	$_GET['act']="MemberStats"; }
if ($_GET['act']=="MemberStats") {
	echo"<title>".$BoardName." - Member Stats</title>";
	if ($_GET['id']==null) {
    $_GET['id']=1; }
    if ($_GET['id']=="ShowMe") {
    $_GET['id']=$_SESSION['UserID']; } } 
if ($_GET['act']=="Signup") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['signing up for account']; ?></title>
<?php }
if ($_GET['act']=="Leaders"||$_GET['act']=="leaders"||$_GET['act']=="viewstaff") {
$_GET['act']="ViewStaff"; }
if ($_GET['act']=="ViewStaff") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['viewing mod team']; ?></title>
<?php }
if ($_GET['act']=="NewMember") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['signing up for account']; ?></title>
<?php }
if ($_GET['act']=="Login") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['loging in']; ?></title>
<?php }
if ($_GET['act']=="LoginMember") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['loging in']; ?></title>
<?php } 
if ($_GET['act']=="EditProfile") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['editing']; ?> <?php echo $_SESSION['MemberName']; ?>'s Profile</title>
<?php }
if ($_GET['act']=="EditYourProfile") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['editing']; ?> <?php echo $_SESSION['MemberName']; ?>'s Profile</title>
<?php } 
if ($_GET['act']=="List") {
$_GET['act']="ViewList"; } 
if ($_GET['act']=="ViewList") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['viewing user list']; ?></title>
<?php }
if ($_GET['act']=="Profile") {
if ($_GET['id']==null) {
$_GET['id']=1; }
if ($_GET['id']=="ShowMe") {
$_GET['id']= (int) $_SESSION['UserID'];
if ($_SESSION['MemberName']==null) { 
$_GET['id']=1; } }
if ($_GET['id']=="Name") {?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['viewing']; ?> <?php echo $_GET['Name'];?>'s Profile</title>
<?php }
$member_query = mysql_query("SELECT Name FROM ".$TablePreFix."Members WHERE (id=".$_GET['id'].")");
$Member = mysql_fetch_array($member_query); 
if ($Member==null) { exit(); }
?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['viewing']; ?> <?php echo $Member['Name'];?>'s Profile</title>
<?php } ?></head><?php 
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
$querys007="SELECT * FROM ".$TablePreFix."Messenger WHERE (SenderID=".$YourUserID.")";
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
		<TD COLSPAN="3" valign="middle" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_05.png);" class="navbar"><?php if ($_SESSION['BotName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['BotName'] ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="View Your Profile"><?php echo $_SESSION['MemberName'] ?></a>	<span class="style1">/ </span><a href="Members.php?act=Logout" title="<?php echo $lang['logout']; ?>"><?php echo $lang['logout']; ?></a>	<span class="style1">/ </span><?php } if($Groups['Can_pm']=="yes") { ?><a href="Messenger.php?act=View" title="Goto MailBox"><?php echo $lang['mailbox']; ?></a><a title="<?php echo $lang['new pms 1']; ?><?php echo $PMNumber; ?><?php echo $lang['new pms 2']; ?>">(<?php echo $PMNumber; ?>)</a>	<span class="style1">/ </span><?php } if ($Groups['Has_mod_cp']=="yes"&&$Groups['Has_admin_cp']=="no") {?><a href="Mod/Login.php?act=Login" title="<?php echo $lang['goto mod tools']; ?>"><?php echo $lang['mod cp']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Has_admin_cp']=="yes") {?><a href="Admin/Login.php?act=Login" title="<?php echo $lang['goto admin cp']; ?>"><?php echo $lang['admin cp']; ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']==null) { ?><a href="Members.php?act=Login" title="<?php echo $lang['login']; ?>"><?php echo $lang['login']; ?></a>	<span class="style1">/ </span><a href="Members.php?act=Signup" title="<?php echo $lang['register']; ?>"><?php echo $lang['register']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_make_topics']=="yes") { ?><a href="Forum.php?id=1&amp;CatID=1&amp;act=Create" title="<?php echo $lang['create new topic']; ?>"><?php echo $lang['new topic']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_make_topics']=="no") { ?><!--<a href="Forum.php?id=1&amp;CatID=1&amp;act=Create" title="<?php echo $lang['Create New Topic']; ?>">--><span title="<?php echo "You cant make a topic."; ?>"><?php echo $lang['new topic']; ?></span><!--</a>-->	<span class="style1">/ </span><?php } ?><a href="Help.php?act=View" title="<?php echo $lang['help files']; ?>"><?php echo $lang['help']; ?></a>	<span class="style1">/ </span><a href="Calendar.php?act=View" title="<?php echo $lang['view calendar']; ?>"><?php echo $lang['calendar']; ?></a>	<span class="style1">/ </span><a href="TagBoard.php?act=View" title="<?php echo $lang['goto tag boards']; ?>"><?php echo $lang['tag board']; ?></a></TD>
		<TD COLSPAN="2" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_06.png);"></TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
<?php
if ($_GET['act']=="Signup") {?>
<!--<?php
$query="SELECT * FROM ".$TablePreFix."Members";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$querys="SELECT * FROM ".$TablePreFix."Members";
	$results=mysql_query($querys);
	$nums=mysql_num_rows($results);
	$numss=$num-1;
	$UseID=mysql_result($result,$numss,"id");
$id=$UseID+1;
?>-->
	<TR>
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
   <td width="28%">
<form method="post" name="Member" action="?act=NewMember">
<input type="hidden" class="HiddenTextBox" style="display: none;" name="id" value="<?php echo $id; ?>" />
<label for="Name"><?php echo $lang2['insert user name']; ?><br />
</label><input type="text" class="TextBox" name="Name" size="20" id="Name" /><br />
<label for="Password"><?php echo $lang2['insert password']; ?><br />
</label><input type="password" class="TextBox" name="Password" size="20" id="Password" /><br />
<label for="Email"><?php echo $lang2['insert your email']; ?><br />
</label><input type="text" class="TextBox" name="Email" size="20" id="Email" /><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="Group" value="<?php echo $Settings['member_group']; ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="Interests" value="None" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="Title" value="" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="Joined" value="<?php echo GMTimeSend(null); ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="LastActive" value="<?php echo GMTimeSend(null); ?>" />
<label for="YourOffSet"><?php echo $lang2['your timezone']; ?></label><br />
<select id="YourOffSet" name="YourOffSet" class="Menu">
<option value="-12"><?php echo $lang2['GMT minus 12 hours']; ?></option><option value="-11"><?php echo $lang2['GMT minus 11 hours']; ?></option><option value="-10"><?php echo $lang2['GMT minus 10 hours']; ?></option><option value="-9"><?php echo $lang2['GMT minus 9 hours']; ?></option><option value="-8"><?php echo $lang2['GMT minus 8 hours']; ?></option><option value="-7"><?php echo $lang2['GMT minus 7 hours']; ?></option><option value="-6"><?php echo $lang2['GMT minus 6 hours']; ?></option><option value="-5"><?php echo $lang2['GMT minus 5 hours']; ?></option><option value="-4"><?php echo $lang2['GMT minus 4 hours']; ?></option><option value="-3"><?php echo $lang2['GMT minus 3 hours']; ?></option><option value="-2"><?php echo $lang2['GMT minus 2 hours']; ?></option><option value="-1"><?php echo $lang2['GMT minus 1 hour']; ?></option><option selected="selected" value="0"><?php echo $lang2['GMT']; ?></option><option value="1"><?php echo $lang2['GMT plus 1 hour']; ?></option><option value="2"><?php echo $lang2['GMT plus 2 hours']; ?></option><option value="3"><?php echo $lang2['GMT plus 3 hours']; ?></option><option value="4"><?php echo $lang2['GMT plus 4 hours']; ?></option><option value="5"><?php echo $lang2['GMT plus 5 hours']; ?></option><option value="6"><?php echo $lang2['GMT plus 6 hours']; ?></option><option value="7"><?php echo $lang2['GMT plus 7 hours']; ?></option><option value="8"><?php echo $lang2['GMT plus 8 hours']; ?></option><option value="9"><?php echo $lang2['GMT plus 9 hours']; ?></option><option value="10"><?php echo $lang2['GMT plus 10 hours']; ?></option><option value="11"><?php echo $lang2['GMT plus 11 hours']; ?></option><option value="12"><?php echo $lang2['GMT plus 12 hours']; ?></option>
</select><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="PostCount" value="0" />
<label for="Website"><?php echo $lang2['insert a url']; ?><br />
</label><input type="text" class="TextBox" name="Website" size="20" value="http://" id="Website" /><br />
<label for="Avatar"><?php echo $lang2['insert url for avatar']; ?><br />
</label><input type="text" class="TextBox" name="Avatar" size="20" value="http://" id="Avatar" /><br />
<label for="AvatarSize"><?php echo $adminlang2['insert avatarsize']; ?></label><br />
<label for="AvatarSizeW"><?php echo $lang2['width']; ?></label>
<select size="1" name="AvatarSizeW" id="AvatarSizeW" class="Menu">
<option value="100" selected="selected" class="Menu"><?php echo $lang2['keep old size']; ?></option><?php echo "\n"; $r=0; while ($r <= 120) { ?><option value="<?php echo $r ?>"><?php echo $r; ?></option><?php echo "\n"; ++$r; } ?>
</select>
<label for="AvatarSizeH"><?php echo $lang2['height']; ?></label>
<select size="1" name="AvatarSizeH" id="AvatarSizeH" class="Menu">
<option value="100" selected="selected" class="Menu"><?php echo $lang2['keep old size']; ?></option><?php echo "\n"; $s=0; while ($s <= 120) { ?><option value="<?php echo $s ?>"><?php echo $s; ?></option><?php echo "\n"; ++$s; } ?>
</select><br />
<label for="Signature"><?php echo $lang2['insert signature']; ?><br />
</label><textarea class="TextBox" rows="3" name="Signature" cols="20" id="Signature"></textarea><br
/>
<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" checked="checked" /><label for="LineBreaks1" title="<?php echo $lang2['use to put linebreak']; ?>"><?php echo $lang2['auto linebreaks mode']; ?></label> 
<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" /><label for="LineBreaks2" title="<?php echo $lang2['use if you are making table/list']; ?>"><?php echo $lang2['raw linebreaks mode']; ?></label><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="UserIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
<?php 
$StartGD1 = rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
$StartGD2 = urlencode(base64_encode($StartGD1));
if ($_SESSION['GDCode']!=null) { session_unregister(GDCode); }
$_SESSION['GDCode']=$StartGD1;
if ($UseGD=="Yes") {?>
<a id="GDCode" name="GDCode">&nbsp;</a><label for="GDCheck"><a onclick="window.open('Pics/GD.php?GDNumbers=<?php echo $StartGD2 ?>','<?php echo $StartGD2 ?>','width=210,height=65,resizable=no');" title="<?php echo $lang2['click to see numbers']; ?>" href="<?php echo $_SERVER['PHP_SELF']; ?>?act=Signup#GDCode"><img  title="<?php echo $lang2['click to see numbers']; ?>" alt="<?php echo $lang2['click to see numbers']; ?>" src="Pics/GD.php?GDNumbers=<?php echo $StartGD2 ?>" /></a><br />
</label><input type="text" class="TextBox" name="GDCheck" size="20" id="GDCheck" /><br />
<?php } ?>
<label for="TOSBox"><?php echo $lang2['tos1']; ?></label><br />
<textarea rows="8" id="TOSBox" name="TOSBox" class="TextBox" cols="50" readonly="readonly" accesskey="T"><?php echo $lang2['tos2']; ?></textarea><br />
<input type="checkbox" class="TextBox" name="TOS" value="Agree" id="TOS"><label for="TOS"><?php echo $lang2['i agree']; ?></label><br/>
<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="NewMember" />
<input type="submit" class="Button" value="<?php echo $lang2['sign up']; ?>" /><input type="reset" class="Button" value="<?php echo $lang2['reset']; ?>" />
</form></td>
  </tr>
 </table>
 </center>
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
if ($_GET['act']=="NewMember") {
/*$expression = "^[_A-Za-z0-9-]+@[_A-Za-z-]+(\.[A-Za-z]+)(\.[A-Za-z]+)*$";*/
if ($_POST['TOS']!="Agree") {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need to agree with tos']."</strong><br />"; }
if ($_POST['Name']==null) {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need a username']."</strong><br />"; }
if ($_POST['Name']=="ShowMe") {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you cant have username']."</strong><br />"; }
if ($_POST['Password']==null) {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need a password']."</strong><br />"; }
if ($_POST['Email']==null) {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need a email']."</strong><br />";	 }
/*if(!ereg("$expression",$address)) {   //if $address is not matching to $expression
$Error="Yes";
echo "Please fix the following errors: <br />\n<strong>Thats not a valid email. ^_^</strong><br />";	 }*/
if (strlen($_POST['Signature'])>=501) {
	echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['your signature is too big']."</strong><br />";
	$Error="Yes"; }
if ($UseGD=="Yes") {
	if ($_POST['GDCheck']!=$_SESSION['GDCode']) {
		echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['numbers are not same']."</strong><br />";
	$Error="Yes"; } }
if ($Error=="Yes") {
mysql_close();
?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center>
</body></html><?php
exit(); }
$Name = stripcslashes(htmlentities($_POST['Name'], ENT_QUOTES));
$Name = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $Name);
$Email = stripcslashes(htmlentities($_POST['Email'], ENT_QUOTES));
//Start Checking
$sql_email_check = mysql_query("SELECT Email FROM ".$TablePreFix."Members WHERE Email='".$Email."'"); 
$sql_username_check = mysql_query("SELECT Name FROM ".$TablePreFix."Members WHERE Name='".$Name."'"); 
$email_check = mysql_num_rows($sql_email_check); 
$username_check = mysql_num_rows($sql_username_check); 
if(($email_check > 0) || ($username_check > 0)) {     
echo "".$lang2['please fix the errors']." <br />";     
if($email_check > 0) {         
echo "<strong>".$lang2['email address already used']."</strong><br />";         
require( './misc/Footer.php');
mysql_close();
?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center>
</body></html><?php
exit(); }     
if($username_check > 0) {         
echo "<strong>".$lang2['username already used']."</strong><br />";         
require( './misc/Footer.php');
mysql_close();
?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center>
</body></html><?php
exit(); } }
//End the Check
if ($_POST['id']!=null) {
if ($Name!=null) {
if ($_POST['Password']!=null) {
if ($Email!=null) {
$NewPasswordMD5 = md5($_POST['Password']);
$NewPassword = sha1($NewPasswordMD5);
$_GET['YourPost'] = $_POST['Signature'];
require( './misc/HTMLTags.php');
$Signature = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $Signature);
$NewSignature = $_GET['YourPost'];
$Password = stripcslashes(htmlentities($Password, ENT_QUOTES));
$Password = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $Password);
$Avatar = stripcslashes(htmlentities($_POST['Avatar'], ENT_QUOTES));
$Website = stripcslashes(htmlentities($_POST['Website'], ENT_QUOTES));
$query = "INSERT INTO ".$TablePreFix."Members VALUES (null,'".$Name."','".$NewPassword."','".$Email."','".$_POST['Group']."','0','".$_POST['Interests']."','".$_POST['Title']."',".$_POST['Joined'].",".$_POST['LastActive'].",'".$NewSignature."','".$Avatar."','".$_POST['AvatarSizeW']."x".$_POST['AvatarSizeH']."','".$Website."',".$_POST['PostCount'].",'".$_POST['YourOffSet']."','".$_POST['UserIP']."')";
mysql_query($query);
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
$SerchUserID=$row[0];
if ($row[1]==$Name) {
$_SESSION['MemberName']=$row[1];
$_SESSION['UserID']=$row[0];
$_SESSION['UserGroup']=$row[4];
$_SESSION['UserTimeZone']=$row[15];
$SendPMtoID=$row[0];
$YourPMID = 1;
$PMTitle = "Welcome ".$Name.".";
$YourMessage = "Hello ".$Name.". Welcome to ".$Settings['board_name'].". I hope you have fun here. ^_^ ";
$_POST['YourDate'] = $_POST['Joined'];
$query = "INSERT INTO ".$TablePreFix."Messenger VALUES (null,".$YourPMID.",".$SendPMtoID.",'".$PMTitle."','".$YourMessage."',".$_POST['YourDate'].",0)";
mysql_query($query); } }
echo "<meta	http-equiv='Refresh' Content='0; URL=index.php?act=View'>"; } } } } }
if ($_GET['act']=="Login") { ?>
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
   <td width="28%">
  <form method="post" name="Member" action="?act=LoginMember">
<label for="Name"><?php echo $lang2['insert user name']; ?><br />
</label><input type="text" class="TextBox" name="Name" size="20" id="Name" /><br />
<label for="Password"><?php echo $lang2['insert password']; ?><br />
</label><input type="password" class="TextBox" name="Password" size="20" id="Password" /><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="LastActive" value="<?php echo GMTimeSend(null); ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="UserIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="LoginMember" />
<input type="submit" class="Button" value="Login" /><input type="reset" class="Button" value="Reset" />
</form>
<a href="Members.php?act=DeleteSession" title="If you cant login use this and try agan.">Cant Login</a></td>
  </tr>
 </table>
 </center>
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
if ($_GET['act']=="LoginMember") {
if ($_POST['Name']==null) {
$Error="Yes";
echo "".$adminlang2['please fix the errors']." <br />\n<strong>".$lang2['you need a username']."</strong><br />"; }
if ($_POST['Password']==null) {
$Error="Yes";
echo "".$adminlang2['please fix the errors']." <br />\n<strong>".$lang2['you need a password']."</strong><br />"; }
if ($Error=="Yes") {
mysql_close();
?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center>
</body></html><?php
exit(); }
$YourName = stripcslashes(htmlentities($_POST['Name'], ENT_QUOTES));
$YourName = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $YourName);
$YourPasswordMD5 = md5($_POST['Password']);
$YourPassword = sha1($YourPasswordMD5);
$Password = stripcslashes(htmlentities($Password, ENT_QUOTES));
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[1]==$YourName) {
$UserName=$row[1];
if ($row[2]==$YourPassword) {
$UserPassword=$row[2];
$UserID=$row[0];
$UserGroup=$row[4];
$UserLastActive=$row[9];
$TimeZone=$row[15];
$UserIP=$row[16]; } } }
if ($_GET['act']=="LoginMember") {
if ($YourPassword==$UserPassword) {
$NewDay=GMTimeSend(null);
$NewIP=$_SERVER['REMOTE_ADDR'];
$query="UPDATE ".$TablePreFix."Members SET LastActive=".$NewDay.",IP='".$NewIP."' WHERE id=".$UserID."";
mysql_query($query);
$_SESSION['MemberName']=$UserName;
$_SESSION['UserID']=$UserID;
$_SESSION['UserGroup']=$UserGroup;
$_SESSION['UserTimeZone']=$TimeZone;
echo ''.$lang2['password is right welcome'].' '.$_SESSION['MemberName'].'.';
echo '<meta http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
if ($YourPassword!=$UserPassword) {
echo ''.$lang2['password is not right'].' <meta	http-equiv="Refresh" Content="0; URL=Members.php?act=Login">'; } }	}
if ($_GET['act']=="Logout") {
session_unregister(UserName);
session_unregister(UserID);
session_unregister(UserGroup);
session_unregister(UserTimeZone);
session_unregister(BotName);
session_destroy();
session_unset();
$_SESSION['BotName']=null;
$_SESSION['MemberName']=null;
$_SESSION['UserID']=0;
$_SESSION['UserGroup']="Guest";
$_SESSION['UserTimeZone']=0;
echo "<meta	http-equiv='Refresh' Content='0; URL=Members.php?act=Login'>"; }
if ($_GET['act']=="EditProfile") { 
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$_SESSION['UserID']) {
$OldUserid=$row[0];
$OldUserName =$row[1];
$OldUserPassword=$row[2];
$OldUserEmail=$row[3];
$OldInterests=$row[6];
$OldUserTitle=$row[7];
$OldLastActive=$row[9];
$OldUserSignature=$row[10];
$OldUserAvatar=$row[11];
$OldAvatarSize=$row[12];
$OldUserWebsite=$row[13];
$OldUserTimeZone=$row[15];
$OldUserIP=$row[16]; } }
$OldUserid=$_SESSION['UserID'];
if ($OldUserid==0) {
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need to be member profile']." <a href='Members.php?act=Signup' title='Signup'>Signup</a>. ^_^</strong><br />";
$_GET['act']="CanNotMakeProfile";
exit(); }
if ($OldUserid==null) {
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need to be member profile']." <a href='Members.php?act=Signup' title='Signup'>Signup</a>. ^_^</strong><br />";
$_GET['act']="CanNotMakeProfile";
exit(); }
$Avatars = explode("x", $OldAvatarSize);
$AvatarSizeW = $Avatars[0]; $AvatarSizeH = $Avatars[1];
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
   <td width="28%"><form method="post" name="Member" action="?act=EditYourProfile">
<label for="Password"><?php echo $lang2['insert password']; ?><br />
</label><input type="password" class="TextBox" name="NewUserPassword" size="20" id="Password" value="" /><br />
<label for="Email"><?php echo $lang2['insert your email']; ?></label><br />
<input type="text" class="TextBox" name="NewUserEmail" size="20" id="Email" value="<?php echo $OldUserEmail?>" /><br />
<label for="Interests"><?php echo $lang2['insert your interests']; ?></label><br />
<input type="text" class="TextBox" name="NewInterests" id="Interests" value="<?php echo $OldInterests ?>" size="20" /><br />
<label for="Title"><?php echo $lang2['insert member title']; ?></label><br />
<input type="text" class="TextBox" name="NewUserTitle" id="Title" value="<?php echo $OldUserTitle ?>" size="20" /><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="NewLastActive" value="<?php echo GMTimeSend(null); ?>" />
<label for="YourOffSet"><?php echo $lang2['your timezone']; ?></label><br />
<select id="YourOffSet" name="YourOffSet" class="Menu">
<option selected value="<?php echo $OldUserTimeZone ?>"><?php echo $lang2['keep old timezone']; ?></option><option value="-12"><?php echo $lang2['GMT minus 12 hours']; ?></option><option value="-11"><?php echo $lang2['GMT minus 11 hours']; ?></option><option value="-10"><?php echo $lang2['GMT minus 10 hours']; ?></option><option value="-9"><?php echo $lang2['GMT minus 9 hours']; ?></option><option value="-8"><?php echo $lang2['GMT minus 8 hours']; ?></option><option value="-7"><?php echo $lang2['GMT minus 7 hours']; ?></option><option value="-6"><?php echo $lang2['GMT minus 6 hours']; ?></option><option value="-5"><?php echo $lang2['GMT minus 5 hours']; ?></option><option value="-4"><?php echo $lang2['GMT minus 4 hours']; ?></option><option value="-3"><?php echo $lang2['GMT minus 3 hours']; ?></option><option value="-2"><?php echo $lang2['GMT minus 2 hours']; ?></option><option value="-1"><?php echo $lang2['GMT minus 1 hour']; ?></option><option selected="selected" value="0"><?php echo $lang2['GMT']; ?></option><option value="1"><?php echo $lang2['GMT plus 1 hour']; ?></option><option value="2"><?php echo $lang2['GMT plus 2 hours']; ?></option><option value="3"><?php echo $lang2['GMT plus 3 hours']; ?></option><option value="4"><?php echo $lang2['GMT plus 4 hours']; ?></option><option value="5"><?php echo $lang2['GMT plus 5 hours']; ?></option><option value="6"><?php echo $lang2['GMT plus 6 hours']; ?></option><option value="7"><?php echo $lang2['GMT plus 7 hours']; ?></option><option value="8"><?php echo $lang2['GMT plus 8 hours']; ?></option><option value="9"><?php echo $lang2['GMT plus 9 hours']; ?></option><option value="10"><?php echo $lang2['GMT plus 10 hours']; ?></option><option value="11"><?php echo $lang2['GMT plus 11 hours']; ?></option><option value="12"><?php echo $lang2['GMT plus 12 hours']; ?></option>
</select><br />
<label for="Avatar"><?php echo $lang2['insert url for avatar']; ?></label><br />
<input type="text" class="TextBox" name="NewUserAvatar" size="20" value="<?php echo $OldUserAvatar ?>" id="Avatar" /><br />
<label for="AvatarSize"><?php echo $adminlang2['insert avatarsize']; ?></label><br />
<label for="AvatarSizeW"><?php echo $lang2['width']; ?><label>
<select size="1" name="AvatarSizeW" id="AvatarSizeW" class="Menu">
<option value="<?php echo $AvatarSizeW ?>" selected="selected" class="Menu"><?php echo $lang2['keep old size']; ?></option><?php echo "\n"; $r=0; while ($r <= 120) { ?><option value="<?php echo $r ?>"><?php echo $r; ?></option><?php echo "\n"; ++$r; } ?>
</select>
<label for="AvatarSizeH"><?php echo $lang2['height']; ?><label>
<select size="1" name="AvatarSizeH" id="AvatarSizeH" class="Menu">
<option value="<?php echo $AvatarSizeH ?>" selected="selected" class="Menu"><?php echo $lang2['keep old size']; ?></option><?php echo "\n"; $s=0; while ($s <= 120) { ?><option value="<?php echo $s ?>"><?php echo $s; ?></option><?php echo "\n"; ++$s; } ?>
</select><br />
<label for="Website"><?php echo $lang2['insert a url']; ?></label><br />
<input type="text" class="TextBox" name="NewUserWebsite" size="20" value="<?php echo $OldUserWebsite ?>" id="Website" /><br />
<label for="SetSkin"><?php echo $lang2['change skin']; ?><br /></label>
<select size="1" name="SetSkin" id="SetSkin" class="Menu"><option value="<?php echo $_SESSION['Skin'] ?>" selected="selected" class="Menu"><?php echo $lang2['keep old']; ?></option><option value="1" style="color: #0000FF;"><?php echo $lang2['gray skin']; ?></option><option value="2" style="color: #008000;"><?php echo $lang2['green skin']; ?></option></select><br />
<label for="Signature"><?php echo $lang2['insert signature']; ?></label><br />
<textarea class="TextBox" rows="3" name="NewUserSignature" cols="20" id="Signature"><?php echo $OldUserSignature ?></textarea><br />
<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" checked="checked" /><label for="LineBreaks1" title="<?php echo $lang2['use to put linebreak']; ?>"><?php echo $lang2['auto linebreaks mode']; ?></label> 
<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" /><label for="LineBreaks2" title="<?php echo $lang2['use if you are making table/list']; ?>"><?php echo $lang2['raw linebreaks mode']; ?></label><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="NewUserIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="OldUserid" value="<?php echo $OldUserid; ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="OldPassword" value="<?php echo $OldUserPassword; ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="EditYourProfile" /> 
<input type="submit" class="Button" value="<?php echo $lang2['edit profile']; ?>" /> <input type="reset" class="Button" value="<?php echo $lang2['reset']; ?>" />
</form></td>
  </tr>
 </table>
 </center>
<?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
</div>
</TD>
		<?php echo $TableEnd; ?><?php }
if ($_GET['act']=="EditYourProfile") {
if ($_POST['OldUserid']!=$_SESSION['UserID']) {
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need to be member profile']." <a href='Members.php?act=Signup' title='Signup'>".$lang2['signup']."</a>. ^_^</strong><br />";
$_GET['act']="CanNotMakeProfile";
exit(); }
if ($_POST['NewUserPassword']==null) {
$UsePasswoed="UseOldPassword";
/*$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need a password']."</strong><br />";*/ }
if ($_POST['NewUserPassword']!=null) {
$UsePasswoed="UseNewPassword"; }
if ($_POST['NewUserEmail']==null) {
$Error="Yes";
echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need a email']."</strong><br />"; }
if (strlen($_POST['NewUserSignature'])>=$MaxSig) {
	echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['your signature too big it']." ".$MaxSig." Char. ^_^</strong><br />";
	$Error="Yes"; }
/*if (strlen($_POST['NewUserSignature'])>=$MaxSig['Member']) {
	if ($_SESSION['MemberName']=="Member") {
	echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['your signature too big it']." ".$MaxSig['Member']." Char. ^_^</strong><br />";
	$Error="Yes"; } }
if (strlen($_POST['NewUserSignature'])>=$MaxSig['Moderator']) {
	if ($_SESSION['MemberName']=="Moderator") {
	echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['your signature too big it']." ".$MaxSig['Moderator']." Char. ^_^</strong><br />";
	$Error="Yes"; } }
if (strlen($_POST['NewUserSignature'])>=$MaxSig['Admin']) {
	if ($_SESSION['MemberName']=="Admin") {
	echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['your signature too big it']." ".$MaxSig['Admin']." Char. ^_^</strong><br />";
	$Error="Yes"; } }*/
if ($UsePasswoed=="UseNewPassword") {
$NewUserPassword = stripcslashes(htmlentities($_POST['NewUserPassword'], ENT_QUOTES));
$NewUserPassword = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewUserPassword); }
$NewInterests = stripcslashes(htmlentities($_POST['NewInterests'], ENT_QUOTES));
$NewInterests = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewInterests);
$NewUserTitle = stripcslashes(htmlentities($_POST['NewUserTitle'], ENT_QUOTES));
$NewUserTitle = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewUserTitle);
$NewUserSignature = stripcslashes(htmlentities($_POST['NewUserSignature'], ENT_QUOTES));
$_POST['YourPost'] = $NewUserSignature;
require( './misc/HTMLTags.php');
$NewUserSignature = $_POST['YourPost'];
$NewUserSignature = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewUserSignature);
if ($UsePasswoed=="UseNewPassword") {
$NewUserPasswordMD5 = md5($NewUserPassword);
$NewUserPassword = sha1($NewUserPasswordMD5); }
if ($UsePasswoed=="UseOldPassword") { $NewUserPassword=$_POST['OldPassword']; }
if ($Error=="Yes") {
mysql_close();
?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center>
</body></html><?php
exit(); }
$query="UPDATE ".$TablePreFix."Members SET Password='".$NewUserPassword."',Email='".$_POST['NewUserEmail']."',Interests='".$NewInterests."',Title='".$NewUserTitle."',LastActive=".$_POST['NewLastActive'].",Signature='".$NewUserSignature."',Avatar='".$_POST['NewUserAvatar']."',AvatarSize='".$_POST['AvatarSizeW']."x".$_POST['AvatarSizeH']."',Website='".$_POST['NewUserWebsite']."',TimeZone='".$_POST['YourOffSet']."',IP='".$_POST['NewUserIP']."' WHERE id=".$_POST['OldUserid']."";
mysql_query($query);
echo "<meta http-equiv='Refresh' Content='0; URL=Members.php?act=Profile&amp;id=".$_SESSION['UserID']."'>"; }
if ($_GET['act']=="Profile") {
if ($_GET['id']!="Name") {
$query="SELECT * FROM ".$TablePreFix."Members WHERE (ID=".$_GET['id'].")";
} if ($_GET['id']=="Name") {
if ($_GET['Name']==null) {
$_GET['Name']="Cool Dude 2k"; }
$query="SELECT * FROM ".$TablePreFix."Members WHERE (Name='".$_GET['Name']."')"; }
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
$UserSignature=mysql_result($result,$i,"Signature");
$UserAvatar=mysql_result($result,$i,"Avatar");
$UserAvatarSize=mysql_result($result,$i,"AvatarSize");
$UserWebsite=mysql_result($result,$i,"Website");
$UserPostCount=mysql_result($result,$i,"PostCount");
$UserTimeZone=mysql_result($result,$i,"TimeZone");
$UserIP=mysql_result($result,$i,"IP");
$UserJoined=GMTimeChange("F j, Y, g:i a",$UserJoined,$YourOffSet);
$UserLastActive=GMTimeChange("F j, Y, g:i a",$UserLastActive,$YourOffSet);
$post['Post'] = $UserSignature;
require( './misc/BBTags.php');
$UserSignature = $_GET['YourPost'];
$AvatarSize=explode("x", $UserAvatarSize);
$AvatarSizeW=$AvatarSize[0];
$AvatarSizeH=$AvatarSize[1];
if ($UserAvatar=="http://") {
$UserAvatar="./Skin/Skin".$_SESSION["Skin"]."/Avatar.png"; }
if ($UserAvatar==null) {
$UserAvatar="./Skin/Skin".$_SESSION["Skin"]."/Avatar.png"; }
if ($UserWebsite=="http://") {
$UserWebsite="Members.php?act=Profile&amp;id=".$UsersID; }
if ($UserWebsite==null) {
$UserWebsite="Members.php?act=Profile&amp;id=".$UsersID; }
$UsersNameURL = urlencode($UsersName);
$Next = $_GET['id']	+ 1; $Back = $_GET['id']	- 1; $NextTwo = $_GET['id']	+ 2; $BackTwo = $_GET['id']	- 2;
?>
  	<TR>
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
   <td align="center" width="50%"><?php echo $lang2['viewing profile for']; ?> <a href="Members.php?act=Profile&amp;id=<?php echo $UsersID ?>" title="<?php echo $lang2['view']; ?> <?php echo $UsersName ?>'s <?php echo $lang2['profile']; ?>"><?php echo $UsersName ?></a></td>
   <?php if ($_SESSION['MemberName']!=null) { ?>
   <td align="center" width="50%"><a href="Members.php?act=EditProfile" title="<?php echo $lang2['edit']; ?> <?php echo $_SESSION['MemberName']; ?>'s <?php echo $lang2['profile']; ?>"><?php echo $lang2['edit profile']; ?></a> | <a href="Members.php?act=Logout" title="<?php echo $lang2['logout']; ?>"><?php echo $lang2['logout']; ?></a></td>
   <?php } if ($_SESSION['MemberName']==null) { ?>
   <td align="center" width="50%"><a href="Members.php?act=Login" title="<?php echo $lang2['login']; ?>"><?php echo $lang2['login']; ?></a> | <a href="Members.php?act=Signup" title="<?php echo $lang2['register']; ?>"><?php echo $lang2['register']; ?></a></td>
   <?php } ?>
  </tr>
  </table>
  <table border="1" cellpadding="2" cellspacing="3" width="100%">  
	<tr>
   <td width="34%" align="center"><?php echo $lang2['user post count']; ?> <a id="PostCount" name="PostCount" title="<?php echo $UsersName ?> <?php echo $lang2['has made']; ?> <?php echo $UserPostCount ?> <?php echo $lang2['posts']; ?>"><?php echo $UserPostCount ?></a></td>
   <td width="33%" align="center"><?php echo $lang2['member title']; ?><br /> <?php echo $UserTitle ?></td>
   <td width="33%" align="center"><?php echo $lang2['user in group']; ?> <a id="Group" name="Group" title="<?php echo $UsersName ?> <?php echo $lang2['is in the']; ?> <?php echo $UsersGroup ?> <?php echo $lang2['group']; ?>"><?php echo $UsersGroup ?></a>
   <?php if ($_SESSION['UserGroup']=="Admin") {
   echo "\r\n<br />".$lang2['ip']." <a href=\"http://ws.arin.net/cgi-bin/whois.pl?queryinput=".urlencode($UserIP)."\" title=\"".gethostbyaddr($UserIP)."\" target=\"_blank\">".$UserIP.""; }?></a></td>
  </tr>
  <tr>
   <td width="33%"><?php echo $lang2['users signature']; ?><br /> <?php echo $UserSignature ?></td>
   <td width="33%" align="center"><img src="<?php echo $UserAvatar ?>" style="border: 0; height: <?php echo $AvatarSizeH; ?>; width: <?php echo $AvatarSizeW; ?>;" border="0" height="<?php echo $AvatarSizeH; ?>" width="<?php echo $AvatarSizeW; ?>" title="<?php echo $UsersName ?>'s <?php echo $lang2['avatar']; ?>" alt="<?php echo $UsersName ?>'s <?php echo $lang2['avatar']; ?>" /></td>
   <td width="34%"><?php echo $lang2['interests']; ?><br /> <?php echo $UserInterests ?></td>
  </tr>
  <tr>
   <td width="34%"><?php echo $lang2['users localtime']; ?><br /> <?php echo GMTimeGet("F j, Y, g:i a",$UserTimeZone); ?></td>
   <td width="33%"><?php echo $lang2['user joined at']; ?><br /> <?php echo $UserJoined ?></td>
   <td width="33%"><?php echo $lang2['users last active']; ?><br /> <?php echo $UserLastActive ?></td>
  </tr>
  <tr>
   <td width="34%" align="center"><a href="Members.php?act=Profile&amp;id=<?php echo $BackTwo; ?>" title="<?php echo $lang2['go back two users']; ?>"><?php echo $lang2['back 2']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Members.php?act=Profile&amp;id=<?php echo $Back; ?>" title="<?php echo $lang2['go back one user']; ?>"><?php echo $lang2['back']; ?></a></td>
   <td width="33%" align="center"><?php echo $lang2['email/pm/webpage']; ?><br /> <a href="mailto:<?php echo $UserEmail ?>" title="<?php echo $lang2['email']; ?> <?php echo $UsersName ?>"><?php echo $lang2['email']; ?></a>/<a title="<?php echo $lang2['pm']; ?> <?php echo $UsersName; ?>" href="Messenger.php?act=Create&amp;Sendto=<?php echo $UsersNameURL; ?>"><?php echo $lang2['pm']; ?></a>/<a href="<?php echo $UserWebsite ?>" title="<?php echo $UsersName ?>'s <?php echo $lang2['website']; ?>"><?php echo $lang2['www']; ?></a></td>
   <td align="center"><a href="Members.php?act=Profile&amp;id=<?php echo $Next; ?>" title="<?php echo $lang2['goto next user']; ?>"><?php echo $lang2['next']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Members.php?act=Profile&amp;id=<?php echo $NextTwo; ?>" title="<?php echo $lang2['goto next two user']; ?>"><?php echo $lang2['next 2']; ?></a></td>
  </tr>
<?php 
++$i; }  
$query="SELECT * FROM ".$TablePreFix."Members";
$result=mysql_query($query);
$num=mysql_num_rows($result);
if ($_GET['id']>$num) {
$RandID = rand(1,$num);
$queryS="SELECT * FROM ".$TablePreFix."Members WHERE (ID=2)";
$resultS=mysql_query($queryS);
$numS=mysql_num_rows($resultS);
$iS=0;
while ($iS < $numS) {
$UsersID=mysql_result($resultS,$iS,"id");
$UsersName=mysql_result($resultS,$iS,"Name");
$UserPassword=mysql_result($resultS,$iS,"Password");
$UserEmail=mysql_result($resultS,$iS,"Email");
$UsersGroup=mysql_result($resultS,$iS,"Group");
$UserInterests=mysql_result($resultS,$iS,"Interests");
$UserTitle=mysql_result($resultS,$iS,"Title");
$UserJoined=mysql_result($resultS,$iS,"Joined");
$UserLastActive=mysql_result($resultS,$iS,"LastActive");
$UserSignature=mysql_result($resultS,$iS,"Signature");
$UserAvatar=mysql_result($resultS,$iS,"Avatar");
$UserAvatarSize=mysql_result($resultS,$iS,"AvatarSize");
$UserWebsite=mysql_result($resultS,$iS,"Website");
$UserPostCount=mysql_result($resultS,$iS,"PostCount");
$UserTimeZone=mysql_result($resultS,$iS,"TimeZone");
$UserIP=mysql_result($resultS,$iS,"IP");
$UserJoined=GMTimeChange("F j, Y, g:i a",$UserJoined,$YourOffSet);
$UserLastActive=GMTimeChange("F j, Y, g:i a",$UserLastActive,$YourOffSet);
$post['Post'] = $UserSignature;
require( './misc/BBTags.php');
$UserSignature = $_GET['YourPost'];
$AvatarSize=explode("x", $UserAvatarSize);
$AvatarSizeW=$AvatarSize[0];
$AvatarSizeH=$AvatarSize[1];
if ($UserAvatar=="http://") {
$UserAvatar="./Skin/Skin".$_SESSION["Skin"]."/Avatar.png"; }
if ($UserAvatar==null) {
$UserAvatar="./Skin/Skin".$_SESSION["Skin"]."/Avatar.png"; }
if ($UserWebsite=="http://") {
$UserWebsite="Members.php?act=Profile&amp;id=".$UsersID; }
if ($UserWebsite==null) {
$UserWebsite="Members.php?act=Profile&amp;id=".$UsersID; }
$UsersNameURL = urlencode($UsersName);
$Next = $_GET['id']	+ 1; $Back = $_GET['id']	- 1; $NextTwo = $_GET['id']	+ 2; $BackTwo = $_GET['id']	- 2;?>  	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><?php/*<div align="center">*/?>
  <div align="center">
  <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td align="center" width="50%"><?php echo $lang2['viewing profile for']; ?> <a href="Members.php?act=Profile&amp;id=<?php echo $UsersID ?>" title="View <?php echo $UsersName ?>'s Profile"><?php echo $UsersName ?></a></td>
   <?php if ($_SESSION['MemberName']!=null) { ?>
   <td align="center" width="50%"><a href="Members.php?act=EditProfile" title="Edit <?php echo $_SESSION['MemberName']; ?>'s Profile"><?php echo $lang2['edit your profile']; ?></a> | <a href="Members.php?act=Logout" title="<?php echo $lang2['logout']; ?>"><?php echo $lang2['logout']; ?></a></td>
   <?php } if ($_SESSION['MemberName']==null) { ?>
   <td align="center" width="50%"><a href="Members.php?act=Login" title="<?php echo $lang2['login']; ?>"><?php echo $lang2['login']; ?></a> | <a href="Members.php?act=Signup" title="<?php echo $lang2['register']; ?>"><?php echo $lang2['register']; ?></a></td>
   <?php } ?>
  </tr>
  </table>
  <table border="1" cellpadding="2" cellspacing="3" width="100%">  
	<tr>
   <td width="34%" align="center"><?php echo $lang2['user post count']; ?>: <a id="PostCount" name="PostCount" title="<?php echo $UsersName ?> <?php echo $lang2['has made']; ?> <?php echo $UserPostCount ?> <?php echo $lang2['posts']; ?>"><?php echo $UserPostCount ?></a></td>
   <td width="33%" align="center"><?php echo $lang2['member title']; ?><br /> <?php echo $UserTitle ?></td>
   <td width="33%" align="center"><?php echo $lang2['user in group']; ?> <a id="Group" name="Group" title="<?php echo $UsersName ?> <?php echo $lang2['is in the']; ?> <?php echo $UsersGroup ?> <?php echo $lang2['group']; ?>"><?php echo $UsersGroup ?></a>
   <?php if ($_SESSION['UserGroup']=="Admin") {
   echo "\r\n<br />".$lang2['ip']." <a href=\"http://ws.arin.net/cgi-bin/whois.pl?queryinput=".urlencode($UserIP)."\" title=\"".gethostbyaddr($UserIP)."\" target=\"_blank\">".$UserIP.""; }?></td>
  </tr>
  <tr>
   <td width="33%"><?php echo $lang2['users signature']; ?><br /> <?php echo $UserSignature ?></td>
   <td width="33%" align="center"><img src="<?php echo $UserAvatar ?>" style="border: 0; height: <?php echo $AvatarSizeH; ?>; width: <?php echo $AvatarSizeW; ?>;" border="0" height="<?php echo $AvatarSizeH; ?>" width="<?php echo $AvatarSizeW; ?>" title="<?php echo $UsersName ?>'s Avatar" alt="<?php echo $UsersName ?>'s Avatar" /></td>
   <td width="34%"><?php echo $lang2['interests']; ?><br /> <?php echo $UserInterests ?></td>
  </tr>
  <tr>
   <td width="34%"><?php echo $lang2['users localtime']; ?><br /> <?php echo GMTimeGet("F j, Y, g:i a",$UserTimeZone); ?></td>
   <td width="33%"><?php echo $lang2['user joined at']; ?><br /> <?php echo $UserJoined ?></td>
   <td width="33%"><?php echo $lang2['users last active']; ?><br /> <?php echo $UserLastActive ?></td>
  </tr>
  <tr>
   <td width="34%" align="center"><a href="Members.php?act=Profile&amp;id=<?php echo $BackTwo; ?>" title="Goto Back Two Users."><?php echo $lang2['back 2']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Members.php?act=Profile&amp;id=<?php echo $Back; ?>" title="Goto Back One User.">&#8592; Back</a></td>
   <td width="33%" align="center"><?php echo $lang2['email/pm/webpage']; ?><br /> <a href="mailto:<?php echo $UserEmail ?>" title="<?php echo $lang2['email']; ?> <?php echo $UsersName ?>"><?php echo $lang2['email']; ?></a>/<a title="<?php echo $lang2['pm']; ?> <?php echo $UsersName; ?>" href="Messenger.php?act=Create&amp;Sendto=<?php echo $UsersNameURL; ?>"><?php echo $lang2['pm']; ?></a></a>/<a href="<?php echo $UserWebsite ?>" title="<?php echo $UsersName ?>'s <?php echo $lang2['website']; ?>"><?php echo $lang2['www']; ?></a></td>
   <td align="center"><a href="Members.php?act=Profile&amp;id=<?php echo $Next; ?>" title="<?php echo $lang2['goto next user']; ?>"><?php echo $lang2['next']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="Members.php?act=Profile&amp;id=<?php echo $NextTwo; ?>" title="<?php echo $lang2['goto next two user']; ?>"><?php echo $lang2['next 2']; ?></a></td>
  </tr><?php ++$iS; }	 }
//Renee Sabonis
?>
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
if ($_GET['act']=="ViewList") {
?>
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
   <th width="25%"><?php echo $lang2['users name']; ?></th>
   <th width="34%"><?php echo $lang2['email/pm/webpage']; ?></th>
   <th width="30%"><?php echo $lang2['users localtime']; ?></th>
   <th width="8%"><?php echo $lang2['post count']; ?></th>
  </tr>
 <?php
if ($_GET['Order']==null) {
	$OrderList="Name";
	$_GET['OrderDone']="Yes";
	$OrderType="asc"; }
if ($_GET['Order']==ID) {
	$OrderList="id";
	$_GET['OrderDone']="Yes";
	$OrderType="asc"; }
if ($_GET['Order']=="Name") {
	$OrderList="Name";
	$_GET['OrderDone']="Yes";
	$OrderType="asc"; }
if ($_GET['Order']=="JoinDay") {
	$OrderList="Joined";
	$_GET['OrderDone']="Yes";
	$OrderType="asc"; }
if ($_GET['Order']=="LastActive") {
	$OrderList="LastActive";
	$_GET['OrderDone']="Yes";
	$OrderType="asc"; }
if ($_GET['Order']=="PostCount") {
	$OrderList="PostCount";
	$_GET['OrderDone']="Yes";
	$OrderType="desc"; }
if ($_GET['Order']=="TimeZone") {
	$OrderList="TimeZone";
	$_GET['OrderDone']="Yes";
	$OrderType="asc"; }
if ($_GET['OrderDone']!="Yes") {
	$OrderList="Name";
	$OrderType="asc"; }
$query="SELECT * FROM ".$TablePreFix."Members order by `".$OrderList."` ".$OrderType."";
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
$UserJoined=GMTimeChange("F j, Y, g:i a",$UserJoined,$YourOffSet);
$UserLastActive=GMTimeChange("F j, Y, g:i a",$UserLastActive,$YourOffSet);
$UserSignature=mysql_result($result,$i,"Signature");
$UserAvatar=mysql_result($result,$i,"Avatar");
$UserAvatarSize=mysql_result($result,$i,"AvatarSize");
$UserWebsite=mysql_result($result,$i,"Website");
$UserPostCount=mysql_result($result,$i,"PostCount");
$UserTimeZone=mysql_result($result,$i,"TimeZone");
$UserIP=mysql_result($result,$i,"IP");
$post['Post'] = $UserSignature;
require( './misc/BBTags.php');
$UserSignature = $_GET['YourPost'];
$AvatarSize=explode("x", $UserAvatarSize);
$AvatarSizeW=$AvatarSize[0];
$AvatarSizeH=$AvatarSize[1];
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
if ($UsersName!="Guest") {
	if ($UsersGroup!="Guest") {
?>
   <tr>
   <td width="37%"><a id="user<?php echo $UsersID ?>" name="user<?php echo $UsersID ?>"><!--&nbsp;--></a><a href="Members.php?act=Profile&amp;id=<?php echo $UsersID ?>" title="View <?php echo $UsersName ?>'s Profile"><?php echo $UsersName ?></a></td>
   <td width="36%" align="center"><a href="mailto:<?php echo $UserEmail ?>" title="<?php echo $lang2['email']; ?> <?php echo $UsersName ?>"><?php echo $lang2['email']; ?></a> / <a title="<?php echo $lang2['pm']; ?> <?php echo $UsersName; ?>" href="Messenger.php?act=Create&amp;Sendto=<?php echo $UsersNameURL; ?>"><?php echo $lang2['pm']; ?></a> / <a href="<?php echo $UserWebsite ?>" title="<?php echo $UsersName ?>'s <?php echo $lang2['website']; ?>"><?php echo $lang2['www']; ?></a></td>
   <td width="31%" align="center"><?php echo GMTimeGet("F j, Y, g:i a",$UserTimeZone); ?></td>
   <td width="6%" align="center"><a id="PostCount<?php echo $UsersID ?>" name="PostCount<?php echo $UsersID ?>" title="<?php echo $UsersName; ?> <?php echo $lang2['has made']; ?> <?php echo $UserPostCount; ?> <?php echo $lang2['posts']; ?>"><?php echo $UserPostCount; ?></a></td>
  </tr>
<?php } }
++$i; }  
$RandUser = rand(1,$MaxUsers);
?>
   <tr>
   <td width="37%"><a id="Rand" name="Rand"><!--&nbsp;--></a><a href="Members.php?act=Profile&amp;id=<?php echo $RandUser ?>" title="View <?php echo $UserRandom[$RandUser] ?>'s <?php echo $lang2['profile']; ?>"><?php echo $UserRandom[$RandUser] ?></a></td>
   <td width="36%" align="center"><a href="mailto:<?php echo $EmailRandom[$RandUser]; ?>" title="<?php echo $lang2['email']; ?> <?php echo $UserRandom[$RandUser]; ?>"><?php echo $lang2['email']; ?></a> / <a title="<?php echo $lang2['pm']; ?> <?php echo $UserRandom[$RandUser]; ?>" href="Messenger.php?act=Create&amp;Sendto=<?php echo $PMRandom[$RandUser]; ?>"><?php echo $lang2['pm']; ?></a> / <a href="<?php echo $WebsiteRandom[$RandUser]; ?>" title="<?php echo $UserRandom[$RandUser]; ?>'s <?php echo $lang2['website']; ?>"><?php echo $lang2['www']; ?></a></td>
   <td width="31%" align="center"><?php echo GMTimeGet("F j, Y, g:i a",$TimeZoneRandom[$RandUser]); ?></td>
   <td width="31%" align="center"><a id="RandPostCount" name="RandPostCount" title="<?php echo $UserRandom[$RandUser]; ?> <?php echo $lang2['has made']; ?> <?php echo $PostCountRandom[$RandUser]; ?> <?php echo $lang2['posts']; ?>"><?php echo $PostCountRandom[$RandUser]; ?></a></td>
  </tr>
  </table>
  <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="100%" style="text-align: center;"><a href="Search.php" title="<?php echo $lang2['search for member']; ?>"><?php echo $lang2['search users']; ?></a></td>
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
		<?php echo $TableEnd; ?><!--Number of Members: <?php echo $AllUsers; ?>-->
<?php }
if ($_GET['act']=="ViewStaff") {
?>
	<TR>
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
   <th width="50%"><?php echo $lang2['administrators']; ?></th>
  </tr>
 </table>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <th width="25%"><?php echo $lang2['users name']; ?></th>
   <th width="34%"><?php echo $lang2['email/pm/webpage']; ?></th>
   <th width="30%"><?php echo $lang2['users localtime']; ?></th>
   <th width="8%"><?php echo $lang2['post count']; ?></th>
  </tr>
 <?php
$query="SELECT * FROM ".$TablePreFix."Members WHERE `Group`='Admin' order by 'Name'";
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
$UserAvatarSize=mysql_result($result,$i,"AvatarSize");
$UserWebsite=mysql_result($result,$i,"Website");
$UserPostCount=mysql_result($result,$i,"PostCount");
$UserTimeZone=mysql_result($result,$i,"TimeZone");
$UserIP=mysql_result($result,$i,"IP");
$post['Post'] = $UserSignature;
require( './misc/BBTags.php');
$UserSignature = $_GET['YourPost'];
$AvatarSize=explode("x", $UserAvatarSize);
$AvatarSizeW=$AvatarSize[0];
$AvatarSizeH=$AvatarSize[1];
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
   <td width="37%"><a id="user<?php echo $UsersID ?>" name="user<?php echo $UsersID ?>"><!--&nbsp;--></a><a href="Members.php?act=Profile&amp;id=<?php echo $UsersID ?>" title="<?php echo $lang2['view']; ?> <?php echo $UsersName ?>'s <?php echo $lang2['profile']; ?>"><?php echo $UsersName ?></a></td>
   <td width="36%" align="center"><a href="mailto:<?php echo $UserEmail ?>" title="<?php echo $lang2['email']; ?> <?php echo $UsersName ?>"><?php echo $lang2['email']; ?></a> / <a title="PM <?php echo $UsersName; ?>" href="Messenger.php?act=Create&amp;Sendto=<?php echo $UsersNameURL; ?>"><?php echo $lang2['pm']; ?></a> / <a href="<?php echo $UserWebsite ?>" title="<?php echo $UsersName ?>'s <?php echo $lang2['website']; ?>"><?php echo $lang2['www']; ?></a></td>
   <td width="31%" align="center"><?php echo GMTimeGet("F j, Y, g:i a",$UserTimeZone); ?></td>
   <td width="6%" align="center"><a id="PostCount<?php echo $UsersID ?>" name="PostCount<?php echo $UsersID ?>" title="<?php echo $UsersName; ?> <?php echo $lang2['has made']; ?> <?php echo $UserPostCount; ?> <?php echo $lang2['posts']; ?>"><?php echo $UserPostCount; ?></a></td>
  </tr>
<?php 
++$i; }
if ($num==0) {?>   <tr>
   <td width="37%"><?php echo $lang2['no admins']; ?></td>
   <td width="36%" align="center">&nbsp;</td>
   <td width="31%" align="center">&nbsp;</td>
   <td width="6%" align="center">&nbsp;</td>
  </tr> <?php } ?>
</table>
<table border="1" cellpadding="2" cellspacing="3" width="100%">
 <tr>
   <th width="50%"><?php echo $lang2['moderators']; ?></th>
  </tr>
  </table>
  <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <th width="25%"><?php echo $lang2['users name']; ?></th>
   <th width="34%"><?php echo $lang2['email/pm/webpage']; ?></th>
   <th width="30%"><?php echo $lang2['users localtime']; ?></th>
   <th width="8%"><?php echo $lang2['post count']; ?></th>
  </tr>
 <?php
$query="SELECT * FROM ".$TablePreFix."Members  WHERE `Group`='Moderator' order by 'Name' asc";
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
$UserAvatarSize=mysql_result($result,$i,"AvatarSize");
$UserWebsite=mysql_result($result,$i,"Website");
$UserPostCount=mysql_result($result,$i,"PostCount");
$UserTimeZone=mysql_result($result,$i,"TimeZone");
$UserIP=mysql_result($result,$i,"IP");
$post['Post'] = $UserSignature;
require( './misc/BBTags.php');
$UserSignature = $_GET['YourPost'];
$AvatarSize=explode("x", $UserAvatarSize);
$AvatarSizeW=$AvatarSize[0];
$AvatarSizeH=$AvatarSize[1];
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
?>
   <tr>
   <td width="37%"><a id="user<?php echo $UsersID ?>" name="user<?php echo $UsersID ?>"><!--&nbsp;--></a><a href="Members.php?act=Profile&amp;id=<?php echo $UsersID ?>" title="View <?php echo $UsersName ?>'s <?php echo $lang2['profile']; ?>"><?php echo $UsersName ?></a></td>
   <td width="36%" align="center"><a href="mailto:<?php echo $UserEmail ?>" title="Email <?php echo $UsersName ?>"><?php echo $lang2['email']; ?></a> / <a title="<?php echo $lang2['pm']; ?> <?php echo $UsersName; ?>" href="Messenger.php?act=Create&amp;Sendto=<?php echo $UsersNameURL; ?>"><?php echo $lang2['pm']; ?></a> / <a href="<?php echo $UserWebsite ?>" title="<?php echo $UsersName ?>'s <?php echo $lang2['website']; ?>"><?php echo $lang2['www']; ?></a></td>
   <td width="31%" align="center"><?php echo GMTimeGet("F j, Y, g:i a",$UserTimeZone); ?></td>
   <td width="6%" align="center"><a id="PostCount<?php echo $UsersID ?>" name="PostCount<?php echo $UsersID ?>" title="<?php echo $UsersName; ?> <?php echo $lang2['has made']; ?> <?php echo $UserPostCount; ?> <?php echo $lang2['posts']; ?>"><?php echo $UserPostCount; ?></a></td>
  </tr>
<?php 
++$i; }  
if ($num==0) {?>   <tr>
   <td width="37%"><?php echo $lang2['no moderators']; ?></td>
   <td width="36%" align="center">&nbsp;</td>
   <td width="31%" align="center">&nbsp;</td>
   <td width="6%" align="center">&nbsp;</td>
  </tr> <?php } ?>
</table>
<?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
</div>
</TD>
		<?php echo $TableEnd; ?><!--Number of Members: <?php echo $AllUsers; ?>-->
<?php }
/*if ($_GET['act']=="Off") {
?>
  <div align="center">
 <center>
 <table border="4" cellpadding="4" cellspacing="4" width="80%" class="ForumTable1">
  <tr>
 <td class="ForumTable2">Forum Name</td>
  <td class="ForumTable2">Forum Description</td>
  </tr>
  <tr>
   <td width="100%" align="center" class="MenuTable">The Board is Off Line Right Now.</td>
  </tr>
   </table>
 </center>
</div>
<?php }*/ 
$status = explode('  ', mysql_stat($StatSQL));
require( './misc/Footer.php');
mysql_close();
?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center>
</body></html>