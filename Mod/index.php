<?php
require( '../misc/banned.php');
require( 'MySQL.php');
require( '../lang/en/NavBar.php');
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
</head>
<?php
if ($_GET['act']=="View") {?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> Mod Tools</title>
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
if ($Groups['Has_mod_cp']=="no") {
		?>	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center"><?php
		echo "Please fix the following errors: <br />\n<strong>You need to be a Moderator to use this. ^_^</strong><br />";
		?></TD>
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
</TABLE><?php
		$act="NotModerator";	 }
if ($Groups['Has_mod_cp']=="yes") {?>
	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center">
<div align="center">
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
 <th align="center"><a>Moderator Tool</a></th>
  <th>Tool Description</th>
  </tr>
   <!--<tr>
 <td align="center"><a href="Settings.php?act=View" name="BS" title="Board Settings">Board Settings</a></td>
  <td>Change the board settings and board name.</td>
  </tr>-->
   <tr>
 <td align="center"><a href="Members.php?act=View" name="MT" title="Member Tool">Member Tool</a></td>
  <td>Edit Members with this.</td>
  </tr>
  <!--<tr>
 <td align="center"><a href="Categorys.php?act=View" name="FT" title="Forum Tool">Category Tool</a></td>
  <td>Edit Categorys, add Categorys, and Delete Categorys with this.</td>
  </tr>
  <tr>
 <td align="center"><a href="Forums.php?act=View" name="FT" title="Forum Tool">Forum Tool</a></td>
  <td>Edit Forums, add Forums, and Delete Forums with this.</td>
  </tr>-->
  <tr>
 <td align="center"><a href="Topics.php?act=View" name="TT" title="Topic Tool">Topic Tool</a></td>
  <td>Delete Topics with this.</td>
  </tr>
   <tr>
 <td align="center"><a href="Replys.php?act=View" name="RT" title="Reply Tool">Reply Tool</a></td>
  <td>Delete Replys with this.</td>
  </tr>
  <tr>
 <td align="center"><a href="Tags.php?filename=TagBoard&amp;act=View" name="TT2" title="Tag Tool">Tag Tool</a></td>
  <td>Delete Tags with this.</td>
  </tr>
  <!--<tr>
 <td align="center"><a href="HelpFiles.php?act=View" name="HFT" title="Help File Tool">Help File Tool</a></td>
  <td>Edit Help Files, add Help Files, and Delete Help Files with this.</td>
  </tr>
  <tr>
 <td align="center"><a href="CSS.php?act=View" name="HFT" title="Help File Tool">CSS File Tool</a></td>
  <td>Edit the Board's CSS File.</td>
  </tr>
    <tr>
 <td align="center"><a href="Event.php?act=View" name="HFT" title="Event Tool">Event Tool</a></td>
  <td>Edit Events and Delete Events with this.</td>
  </tr>
  <tr>
 <td align="center"><a href="CSS.php?act=View" name="HFT" title="Help File Tool">CSS File Tool</a></td>
  <td>Edit the Board's CSS File.</td>
  </tr>-->
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
<?php } ?>
<?php	$status = explode('  ', mysql_stat($Stat4SQL));  
	 require( '../misc/Footer.php');
mysql_close(); ?><center><a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="../Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="../Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a></center>
</body></html>