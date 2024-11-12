<?php
require( '../misc/banned.php');
require( 'MySQL.php');
require( '../lang/en/NavBar.php');
require( '../lang/en/Members.php');
$Stat4SQL = mysql_connect($mysqlhost,$username,$password,null,'MYSQL_CLIENT_COMPRESS')or die(mysql_error());
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
<?php
if ($_GET['act']==null) {
	$_GET['act']="View"; }
if ($_GET['act']=="View") {?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $adminlang2['logging into mod tools']; ?></title>
<?php }
if ($_GET['act']==null) { $_GET['act']="Login"; }
if ($_GET['act']=="Stats") {
	$_GET['act']="MemberStats"; }
if ($_GET['act']=="MemberStats") {
	echo"<title>".$BoardName." - Member Stats</title>";
	if ($id==null) {
    $id=1; }
    if ($id=="ShowMe") {
    $id=$_SESSION['UserID']; } } 
if ($_GET['act']=="Login") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $adminlang2['loging in']; ?></title>
<?php }
if ($_GET['act']=="LoginMember") { ?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $adminlang2['loging in']; ?></title>
<?php } ?> 
</head><?php 
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
		<TD COLSPAN="3" valign="middle" background="../Skin/Skin1/index_05.png"><?php if ($_SESSION['MemberName']!=null) { ?><?php echo $adminlang['logged in']; ?><a href="../Members.php?act=Profile&id=ShowMe" title="View Your Profile"><?php echo $_SESSION['MemberName'] ?></a>	<span class="style1">/ </span><a href="Login.php?act=Logout" title="<?php echo $adminlang['logout']; ?>"><?php echo $adminlang['logout']; ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']==null) { ?><a href="Login.php?act=Login" title="<?php echo $adminlang['login']; ?>"><?php echo $adminlang['login mod tools']; ?></a> <span class="style1">/ </span><?php } if ($Groups['Has_admin_cp']=="yes" || $Groups['Has_mod_cp']=="yes") { ?><a href="../Mod/" title="<?php echo $adminlang['use mod tools']; ?>"><?php echo $adminlang['mod tools']; ?></a><?php } ?></TD>
		<TD COLSPAN="2">
		<IMG SRC="../Skin/Skin1/index_06.png" WIDTH="106" HEIGHT="21" ALT=""></TD>
	</TR>
	</TR>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="../Skin/Skin1/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
<?php
if ($_GET['act']=="Login") { ?>
	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center">
<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="28%">
  <form method="post" name="Member" action="?act=LoginMember">
<label for="Name"><?php echo $adminlang2['insert user name']; ?><br />
</label><input type="text" class="TextBox" name="Name" size="20" id="Name" /><br />
<label for="Password"><?php echo $adminlang2['insert password']; ?><br />
</label><input type="password" class="TextBox" name="Password" size="20" id="Password" /><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="LastActive" value="<?php echo date('F j, Y, g:i a T'); ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="UserIP" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>" />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="LoginMember" />
<input type="submit" class="Button" value="Login" /><input type="reset" class="Button" value="Reset" />
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
</TABLE>
<?php }
if ($_GET['act']=="LoginMember") {
if ($_POST['Name']==null) {
$Error="Yes";?>
	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center">
<?php echo $adminlang2['please fix the errors']; ?> <br />
<strong><?php echo $adminlang2['you need username']; ?></strong><br />
</TD>
<?php }
if ($_POST['Password']==null) {
$Error="Yes";?>
	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center">
<?php echo $adminlang2['please fix the errors']; ?> <br />
<strong><?php echo $adminlang2['you need password']; ?></strong><br />
</TD>
<?php }
if ($Error=="Yes") {
mysql_close();
?>		<TD background="../Skin/Skin1/index_10.png">&nbsp;</TD>
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
<center><a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a></center>
</body></html><?php
exit(); }
$YourName = stripcslashes(htmlentities($_POST['Name'], ENT_QUOTES));
$YourName = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $YourName);
$YourPasswordMD5 = md5($_POST['Password']);
$YourPassword = sha1($YourPasswordMD5);
$Password = stripcslashes(htmlentities($_POST['Password'], ENT_QUOTES));
$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[1]==$YourName) {
$UserName=$row[1];
if ($row[2]==$YourPassword) {
$UserPassword=$row[2];
$UserID=$row[0];
$UserGroup=$row[4];
$UserLastActive=$row[8];
$UserIP=$row[13]; } } }
if ($_GET['act']=="LoginMember") {
if ($YourPassword==$UserPassword) {
$NewDay=date('F j, Y, g:i a T');
$NewIP=$_SERVER['REMOTE_ADDR'];
$query="UPDATE ".$TablePreFix."Members SET LastActive='$NewDay',IP='$NewIP' WHERE id=$UserID";
mysql_query($query);
$_SESSION['MemberName']=$UserName;
$_SESSION['UserID']=$UserID;
$_SESSION['UserGroup']=$UserGroup;
echo 'The Password is Right Welcome to the Board '.$_SESSION['MemberName'].'.';
echo '<meta http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
if ($YourPassword!=$UserPassword) {
echo 'The Password is Not Right.<meta	http-equiv="Refresh" Content="0; URL=Login.php?act=Login">'; } }	}
if ($_GET['act']=="Logout") {
session_unregister(UserName);
session_unregister(UserID);
session_unregister(UserGroup);
$_SESSION['MemberName']=null;
$_SESSION['UserID']=0;
$_SESSION['UserGroup']="Guest";
echo '<meta	http-equiv="Refresh" Content="0; URL=Login.php?act=Login">'; }
$status = explode('  ', mysql_stat($Stat4SQL)); 
require( '../misc/Footer.php');
mysql_close(); ?><center><a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="../Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="../Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a></center>
</body></html>