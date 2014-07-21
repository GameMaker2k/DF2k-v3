<?php
require( '../misc/banned.php');
require( 'MySQL.php');
require( '../lang/en/NavBar.php');
require( '../lang/en/Category.php');
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
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $adminlang2['admin cp']; ?> <?php echo $TitleLine ?> <?php echo $adminlang2['category tools']; ?></title>
<?php }
if ($Backwards=="Yes") {
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
 <td align="center"><?php echo $adminlang2['here you edit forums.']; ?><br />
<form method="POST" action="?php=php>asp">
<label for="BoardOffline"><?php echo $adminlang2['delete/edit forum']; ?></label><br />
<?php
$query="SELECT * FROM ".$TablePreFix."Categorys ORDER BY ID";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$CategoryID=mysql_result($result,$i,"ID");
$CategoryName=mysql_result($result,$i,"Name");
$CategoryShow=mysql_result($result,$i,"ShowCategory");
$CategoryDescription=mysql_result($result,$i,"Description");
?><input type="radio" id="ID<?php echo $CategoryID ?>" name="IDN" value="<?php echo $CategoryID ?>" /><label for="ID<?php echo $CategoryID ?>"><?php echo $CategoryName ?></label><?php echo "<br />\r\n"; ++$i; } ?>
<select size="1" class="Menu" name="act">
<option selected value="Edit"><?php echo $adminlang2['edit category']; ?></option>
<option value="Delete"><?php echo $adminlang2['delete category']; ?></option>
<option value="New"><?php echo $adminlang2['new Category']; ?></option>
</select><br />
<input type="submit" class="Button" value="<?php echo $adminlang2['edit settings']; ?>" name="Edit"><input type="reset" class="Button" value="<?php echo $adminlang2['reset form']; ?>" name="Reset">
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
$result = mysql_query("SELECT * FROM ".$TablePreFix."Categorys");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$_POST['IDN']) {
$OldCategoryid=$row[0];
$OldCategoryName =$row[1];
$OldShowCategory=$row[2];
$OldInSubForum=$row[3];
$OldCategoryDescription=$row[4]; } }?>	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center">
<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="28%"><form method="post" name="Member" action="?act=EditCategory">
<label for="IDNumber"><?php echo $adminlang2['insert id number for category']; ?></label><br />
<input type="text" class="TextBox" name="NewCategoryid" size="20" id="IDNumber" value="<?php echo $OldCategoryid ?>" /><br />
<label for="CategoryName"><?php echo $adminlang2['insert name for category']; ?></label><br />
<input type="text" class="TextBox" name="NewCategoryName" id="CategoryName" value="<?php echo $OldCategoryName ?>" size="20" /><br />
<label for="VisibleCategory"><?php echo $adminlang2['should category be visible']; ?></label><br />
<select size="1" name="NewShowCategory" id="VisibleCategory" class="Menu"><option value="<?php echo $OldShowCategory ?>" selected="selected" class="Menu"><?php echo $adminlang2['keep old']; ?></option><option value="Yes"><?php echo $adminlang2['yes']; ?></option><option value="No"><?php echo $adminlang2['no']; ?></option></select><br />
<label for="InSubForum"><?php echo $adminlang2['category should be in']; ?><br /> <?php echo $adminlang2['subforum number use']; ?></label><br />
<input type="text" class="TextBox" name="NewInSubForum" size="20" value="<?php echo $OldInSubForum ?>" id="InSubForum" /><br />
<label for="CategoryDescription"><?php echo $adminlang2['insert description about category']; ?></label><br />
<textarea class="TextBox" rows="3" name="NewCategoryDescription" cols="20" id="CategoryDescription"><?php echo $OldCategoryDescription ?></textarea><br />
<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" checked="checked" /><label for="LineBreaks1" title="<?php echo $adminlang2['use to put linebreaks']; ?>"><?php echo $adminlang2['auto linebreaks mode']; ?></label> 
<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" /><label for="LineBreaks2" title="<?php echo $adminlang2['use if you are making table/list']; ?>"><?php echo $adminlang2['raw linebreaks mode']; ?></label><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="OldCategoryid" value="<?php echo $OldCategoryid ?>" /> 
<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="EditCategory" /> 
<input type="submit" class="Button" value="Edit Category" /> <input type="reset" class="Button" value="Reset" />
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
if ($_POST['act']=="EditCategory") {
$NewCategoryName = stripcslashes(htmlentities($_POST['NewCategoryName'], ENT_QUOTES));
$NewCategoryName = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewCategoryName);
$NewCategoryDescription = stripcslashes(htmlentities($_POST['NewCategoryDescription'], ENT_QUOTES));
$YourPost = $NewCategoryDescription;
require( '../misc/HTMLTags.php');
$NewCategoryDescription = $YourPost;
$NewCategoryDescription = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewCategoryDescription);
$query="UPDATE ".$TablePreFix."Categorys SET ID=".$_POST['NewCategoryid'].",Name='".$NewCategoryName."',ShowCategory='".$_POST['NewShowCategory']."',InSubForum=".$_POST['NewInSubForum'].",Description='".$NewCategoryDescription."' WHERE ID=".$_POST['OldCategoryid']."";
mysql_query($query);
echo '<meta http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
if ($_POST['act']=="Delete") {
	$sqlrowdelete = "DELETE FROM ".$TablePreFix."Categorys WHERE id=".$_POST['IDN']."";
    $resultdelete = mysql_query($sqlrowdelete);
	echo '<meta http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
if ($_POST['act']=="New") {
$OldShowCategory = "Yes";
$NewInSubForum	= "0";
?>	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center">
<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="28%"><form method="post" name="Member" action="?act=NewCategory">
<label for="IDNumber"><?php echo $adminlang2['insert id number for category']; ?></label><br />
<input type="text" class="TextBox" name="NewCategoryid" size="20" id="IDNumber" /><br />
<label for="CategoryName"><?php echo $adminlang2['insert name for category']; ?></label><br />
<input type="text" class="TextBox" name="NewCategoryName" id="CategoryName" size="20" /><br />
<label for="VisibleCategory"><?php echo $adminlang2['should category be visible']; ?></label><br />
<select size="1" name="NewShowCategory" id="VisibleCategory" class="Menu"><option value="<?php echo $OldShowCategory ?>" selected="selected" class="Menu"><?php echo $adminlang2['keep old']; ?></option><option value="Yes"><?php echo $adminlang2['yes']; ?></option><option value="No"><?php echo $adminlang2['no']; ?></option></select><br />
<label for="InSubForum"><?php echo $adminlang2['category should be in']; ?></label><br />
<input type="text" class="TextBox" name="NewInSubForum" size="20" value="<?php echo $OldInSubForum ?>" id="InSubForum" /><br />
<label for="CategoryDescription"><?php echo $adminlang2['insert description about category']; ?></label><br />
<textarea class="TextBox" rows="3" name="NewCategoryDescription" cols="20" id="CategoryDescription"><?php echo $OldCategoryDescription ?></textarea><br />
<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" checked="checked" /><label for="LineBreaks1" title="<?php echo $adminlang2['use to put linebreaks']; ?>"><?php echo $adminlang2['auto linebreaks mode']; ?></label> 
<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" /><label for="LineBreaks2" title="<?php echo $adminlang2['use if you are making table/list']; ?>"><?php echo $adminlang2['raw linebreaks mode']; ?></label><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="NewCategory" /> 
<input type="submit" class="Button" value="<?php echo $adminlang2['create category']; ?>" /> <input type="reset" class="Button" value="<?php echo $adminlang2['reset form']; ?>" />
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
if ($_POST['act']=="NewCategory") {
if ($_POST['NewCategoryid']==null) {
$Error="Yes";
echo "".$adminlang2['please the errors']." <br />\n<strong>".$adminlang2['you need id number']."</strong><br />"; }
if ($_POST['NewCategoryName']==null) {
$Error="Yes";
echo "".$adminlang2['please the errors']." <br />\n<strong>".$adminlang2['you need category name']."</strong><br />"; }
if ($_POST['NewInSubForum']==null) {
$_POST['NewInSubForum']=0; }
if ($_POST['NewCategoryDescription']==null) {
$Error="Yes";
echo "".$adminlang2['please the errors']." <br />\n<strong>".$adminlang2['you need description about category']."</strong><br />"; }
?><!--<?php
$sql_id_check = mysql_query("SELECT Email FROM ".$TablePreFix."Categorys WHERE ID=".$_POST['NewCategoryid']."");
$id_check = mysql_num_rows($sql_id_check);
?>--><?php
if($id_check > 0) {
echo "".$adminlang2['please the errors']." <br />\n<strong>".$adminlang2['you need new id number']."</strong><br />"; }
if ($Error=="Yes") {
mysql_close();
exit(); }
$NewCategoryName = stripcslashes(htmlentities($_POST['NewCategoryName'], ENT_QUOTES));
$NewCategoryName = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewCategoryName);
$NewCategoryDescription = stripcslashes(htmlentities($_POST['NewCategoryDescription'], ENT_QUOTES));
$YourPost = $NewCategoryDescription;
require( '../misc/HTMLTags.php');
$NewCategoryDescription = $YourPost;
$NewCategoryDescription = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewCategoryDescription);
$query = "INSERT INTO ".$TablePreFix."Categorys VALUES (".$_POST['NewCategoryid'].",'".$NewCategoryName."','".$_POST['NewShowCategory']."',".$_POST['NewInSubForum'].",'".$NewCategoryDescription."')";
mysql_query($query);
	echo '<meta http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
	$status = explode('  ', mysql_stat($Stat3SQL)); 
require( '../misc/Footer.php');
mysql_close(); ?><center><a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="../Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="../Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a></center>
</body></html>