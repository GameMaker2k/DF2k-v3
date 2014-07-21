<?php
require( '../misc/banned.php');
require( 'MySQL.php');
require( '../lang/en/NavBar.php');
require( '../lang/en/Settings.php');
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
if ($_GET['act']==null) {
	$_GET['act']="View"; }
if ($_GET['act']=="View") {?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $adminlang3['admin cp']; ?> <?php echo $TitleLine ?> <?php echo $adminlang3['board setting tools']; ?></title>
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
 <th align="center"><a><?php echo $adminlang3['board settings tool']; ?></a></th>
  </tr>
   <tr>
 <td align="center"><?php echo $adminlang3['edit your settings for your board']; ?><br />
<form method="POST" action="?act=Edit">
<label for="NewBoardName"><?php echo $adminlang3['insert board name']; ?></label><br />
<input type="text" name="NewBoardName" class="TextBox" id="NewBoardName" size="20"
value="<?php echo $Settings['board_name'] ?>"><br />
<label for="DatabaseName"><?php echo $adminlang3['insert database name']; ?></label><br />
<input type="text" name="DatabaseName" class="TextBox" id="DatabaseName" size="20"
value="<?php echo $Settings['sql_database'] ?>"><br />
<label for="DatabaseUserName"><?php echo $adminlang3['insert database username']; ?></label><br />
<input type="text" name="DatabaseUserName" class="TextBox" id="DatabaseUserName" size="20"
value="<?php echo $Settings['sql_username'] ?>"><br />
<label for="DatabasePassword"><?php echo $adminlang3['insert database password']; ?></label><br />
<input type="password" name="DatabasePassword" class="TextBox" id="DatabasePassword" size="20"
value="<?php echo $Settings['sql_password']; ?>"><br />
<label for="tableprefix"><?php echo $adminlang3['insert table prefix']; ?></label><br />
<input type="text" name="tableprefix" class="TextBox" id="tableprefix"
value="<?php echo $Settings['sql_tableprefix'] ?>" size="20"><br />
<label for="DatabaseHost"><?php echo $adminlang3['insert database host']; ?></label><br />
<input type="text" name="DatabaseHost" class="TextBox" id="DatabaseHost" size="20"
value="<?php echo $Settings['sql_host'] ?>"><br />
<!--<label for="AdminPassword"><?php echo $adminlang3['insert admin password']; ?></label><br />-->
<input type="hidden" name="AdminPassword" class="HiddenTextBox" style="display: none;" id="AdminPassword" size="20"
value="<?php echo $Settings['admin_password'] ?>"><!--<br />-->
<!-- <label for="LogoFile"><?php echo $adminlang3['insert logo url']; ?></label><br /> -->
<input type="hidden" name="LogoFile" class="TextBox" id="LogoFile" size="20"
value="<?php echo $Settings['board_logo'] ?>"><!--<br />-->
<label for="BoardKeywords"><?php echo $adminlang3['insert keywords']; ?></label><br />
<input name="BoardKeywords" id="BoardKeywords" class="TextBox" id="LogoFile0" size="20"
value="<?php echo $Settings['board_keywords'] ?>"><br />
<label for="LogoFile1"><?php echo $adminlang3['insert description about board']; ?></label><br />
<input name="BoardDescription" class="TextBox" id="LogoFile1" size="20"
value="<?php echo $Settings['board_description'] ?>"><br />
<label for="MaxSigSize"><?php echo $adminlang3['insert max sig size:']; ?></label><br />
<input name="MaxSigSize" class="TextBox" id="MaxSigSize" size="20"
value="<?php echo $Settings['max_sig_size'] ?>"><br />
<label for="MaxSigSizeAdmin"><?php echo $adminlang3['insert max sig size admin']; ?></label><br />
<input name="MaxSigSizeAdmin" class="TextBox" id="MaxSigSizeAdmin" size="20"
value="<?php echo $Settings['max_sig_size_admin'] ?>"><br />
<label for="MaxSigSizeMod"><?php echo $adminlang3['insert max sig size mod']; ?></label><br />
<input name="MaxSigSizeMod" class="TextBox" id="MaxSigSizeMod" size="20"
value="<?php echo $Settings['max_sig_size_moderator'] ?>"><br />
<label for="MaxSigSizeUser"><?php echo $adminlang3['insert max sig size member']; ?></label><br />
<input name="MaxSigSizeUser" class="TextBox" id="MaxSigSizeUser" size="20"
value="<?php echo $Settings['max_sig_size_member'] ?>"><br />
<label for="MaxPM"><?php echo $adminlang3['insert max number pms send']; ?></label><br />
<input name="MaxPM" class="TextBox" id="MaxPM" size="20"
value="<?php echo $Settings['max_pms'] ?>"><br />
<label for="DOHTML2"><?php echo $adminlang3['turn html in board']; ?></label><br />
<select size="1" class="Menu" name="DOHTML2">
<option selected value="No"><?php echo $adminlang3['no']; ?></option>
<option value="Yes"><?php echo $adminlang3['yes']; ?></option>
</select><br />
<label for="BoardOffline"><?php echo $adminlang3['turn board offline']; ?></label><br />
<select size="1" class="Menu" name="BoardOffline">
<option selected value="No"><?php echo $adminlang3['no']; ?></option>
<option value="Yes"><?php echo $adminlang3['yes']; ?></option>
</select><br />
<label for="GoogleAds"><?php echo $adminlang3['turn google ads on']; ?></label><br />
<select size="1" class="Menu" name="GoogleAds" id="GoogleAds">
<option selected value="false"><?php echo $adminlang3['no']; ?></option>
<option value="true"><?php echo $adminlang3['yes']; ?></option>
</select><br />
<label for="GoogleAdsTop"><?php echo $adminlang3['google ads on top']; ?></label><br />
<select size="1" class="Menu" name="GoogleAdsTop" id="GoogleAdsTop">
<option selected value="false"><?php echo $adminlang3['no']; ?></option>
<option value="true"><?php echo $adminlang3['yes']; ?></option>
</select><br />
<label for="GoogleAdsBottom"><?php echo $adminlang3['google ads on bottom']; ?></label><br />
<select size="1" class="Menu" name="GoogleAdsBottom" id="GoogleAdsBottom">
<option selected value="false"><?php echo $adminlang3['no']; ?></option>
<option value="true"><?php echo $adminlang3['yes']; ?></option>
</select><br />
<label for="RegisterWithgd"><?php echo $adminlang3['use gd image']; ?></label><br />
<select size="1" class="Menu" name="RegisterWithgd" id="RegisterWithgd">
<option selected value="false"><?php echo $adminlang3['no']; ?></option>
<option value="true"><?php echo $adminlang3['yes']; ?></option>
</select><br />
<label for="UserGroup">Pick the Group for Members</label><br />
<select size="1" name="UserGroup" id="UserGroup" class="Menu">
<option value="<?php echo $Settings['member_group']; ?>" selected="selected" class="Menu"><?php echo $Settings['member_group']; ?></option>
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
<?php echo "\n"; ++$GroupNum4; } ?>
</select><br />
<?php $GroupNum2=0; ?>
<label for="GuestGroup">Pick the Group for Guests</label><br />
<select size="1" name="GuestGroup" id="GuestGroup" class="Menu">
<option value="<?php echo $Settings['guest_group']; ?>" selected="selected" class="Menu"><?php echo $Settings['guest_group']; ?></option>
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
<?php echo "\n"; ++$GroupNum4; } ?>
</select><br />
<label for="UseGzip">Do you want to GZip(Faster PLoad and Less Bandwidth but more CPU Power)</label><br />
<select size="1" class="Menu" name="GZip" id="UseGzip">
<option selected value="false"><?php echo $adminlang3['no']; ?></option>
<option value="true"><?php echo $adminlang3['yes']; ?></option>
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
if ($_GET['act']=="Edit") {
	$BoardSettings="<?php\n\$Settings['sql_host'] = '".$_POST['DatabaseHost']."';\n\$Settings['sql_database'] = '".$_POST['DatabaseName']."';\n\$Settings['sql_tableprefix'] = '".$_POST['tableprefix']."';\n\$Settings['sql_username']	= '".$_POST['DatabaseUserName']."';\n\$Settings['sql_password']	= '".$_POST['DatabasePassword']."';\n\$Settings['admin_password'] = '".$_POST['AdminPassword']."';\n\$Settings['board_name'] = '".$_POST['NewBoardName']."';\n\$Settings['board_keywords'] = '".$_POST['BoardKeywords']."';\n\$Settings['board_description'] = '".$_POST['BoardDescription']."';\n\$Settings['board_html']	= '".$_POST['DOHTML2']."';\n\$Settings['board_logo']	= '".$_POST['LogoFile']."';\n\$Settings['board_offline'] = '".$_POST['BoardOffline']."';\n\$Settings['max_sig_size'] = ".$_POST['MaxSigSize'].";\n\$Settings['max_sig_size_admin'] = ".$_POST['MaxSigSizeAdmin'].";\n\$Settings['max_sig_size_moderator'] = ".$_POST['MaxSigSizeMod'].";\n\$Settings['max_sig_size_member'] = ".$_POST['MaxSigSizeUser'].";\n\$Settings['max_pms'] = ".$_POST['MaxPM'].";\n\$Settings['google_ads'] = ".$_POST['GoogleAds'].";\n\$Settings['google_ads_top'] = ".$_POST['GoogleAdsTop'].";\n\$Settings['google_ads_bottom'] = ".$_POST['GoogleAdsBottom'].";\n\$Settings['use_gd_register'] = ".$_POST['RegisterWithgd'].";\n\$Settings['use_gzip'] = ".$_POST['GZip'].";\n\$Settings['member_group'] = ".$_POST['UserGroup'].";\n\$Settings['guest_group'] = ".$_POST['GuestGroup'].";\n?>";
//unlink("../BK_Settings.php");
//copy("../Settings.php", "BK_Settings.php");
$fp = fopen("../Settings.php","w+");
fwrite($fp, $BoardSettings);
fclose($fp);
echo "<meta	http-equiv=\"Refresh\" Content=\"0; URL=index.php?act=View\">"; }
?><?php	$status = explode('  ', mysql_stat($Stat3SQL));  
require( '../misc/Footer.php');
mysql_close(); ?><center><a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="../Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="../Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a></center>
</body></html>