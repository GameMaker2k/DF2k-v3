<?php
require( '../misc/banned.php');
require( 'MySQL.php');
require( '../lang/en/NavBar.php');
require( '../lang/en/Help.php');
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
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $adminlang2['admin cp']; ?> <?php echo $TitleLine ?> <?php echo "Group Tools"; ?></title>
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
 <td align="center"><?php echo $adminlang2['here you can edit forums']; ?><br />
<form method="POST" action="?php=php>asp">
<label for="BoardOffline"><?php echo $adminlang2['delete or edit forum']; ?></label><br />
<?php
$query="SELECT * FROM ".$TablePreFix."Groups ORDER BY ID";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$GroupID=mysql_result($result,$i,"ID");
$GroupName=mysql_result($result,$i,"Name");
?><input type="radio" id="ID<?php echo $GroupID ?>" name="IDN" value="<?php echo $GroupID ?>" /><label for="ID<?php echo $GroupID ?>"><?php echo $GroupName ?></label><?php echo "<br />\r\n"; ++$i; } ?>
<select size="1" class="Menu" name="act">
<option selected value="Edit"><?php echo "Edit Group"; ?></option>
<option value="Delete"><?php echo "Delete Group"; ?></option>
<option value="New"><?php echo "New Group"; ?></option>
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
$result = mysql_query("SELECT * FROM ".$TablePreFix."Groups");
while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
if ($row[0]==$_POST['IDN']) {
$OldID1=$row[0];
$OldName1=$row[1];
$OldPreName1=$row[2];
$OldSufName1=$row[3]; 
$OldViewBoard1=$row[4];
$OldEditProfile1=$row[5];
$OldMakeTopics1=$row[6];
$OldMakeReplys1=$row[7]; 
$OldEditReplys1=$row[8];
$OldDeleteReplys1=$row[9];
$OldAddEvents1=$row[10];
$OldCanPm1=$row[11]; 
$OldCanDohtml1=$row[12];
$OldPromoteTo1=$row[13];
$OldPromotePosts1=$row[14];
$OldModCp1=$row[15]; 
$OldAdminCp1=$row[16]; } }?>	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center">
<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="28%"><form method="post" name="Member" action="?act=EditGroups">
<label for="IDNumber"><?php echo "Insert new ID for group: "; ?></label><br />
<input type="text" class="TextBox" name="NewGroupID" size="20" id="IDNumber" value="<?php echo $OldID1 ?>" /><br />
<label for="GroupName"><?php echo "Insert name for group: "; ?></label><br />
<input type="text" class="TextBox" name="NewGroupName" id="GroupName" value="<?php echo $OldName1 ?>" size="20" /><br />
<label for="View_board"><?php echo "Can view board?"; ?></label><br />
<select size="1" name="View_board" id="View_board" class="Menu">
<option value="<?php echo "yes"; ?>" 
<?php if($OldViewBoard1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldViewBoard1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Edit_profile"><?php echo "Can edit profile?"; ?></label><br />
<select size="1" name="Edit_profile" id="Edit_profile" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldEditProfile1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldEditProfile1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Make_topics"><?php echo "Can make topics?"; ?></label><br />
<select size="1" name="Make_topics" id="Make_topics" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldMakeTopics1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldMakeTopics1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Make_replys"><?php echo "Can make replys?"; ?></label><br />
<select size="1" name="Make_replys" id="Make_replys" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldMakeReplys1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldMakeReplys1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Edit_replys"><?php echo "Can edit replys?"; ?></label><br />
<select size="1" name="Edit_replys" id="Edit_replys" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldEditReplys1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldEditReplys1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Delete_replys"><?php echo "Can delete replys?"; ?></label><br />
<select size="1" name="Delete_replys" id="Delete_replys" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldDeleteReplys1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldDeleteReplys1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Add_events"><?php echo "Can add events?"; ?></label><br />
<select size="1" name="Add_events" id="Add_events" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldAddEvents1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldAddEvents1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Can_pm"><?php echo "Can send pm?"; ?></label><br />
<select size="1" name="Can_pm" id="Can_pm" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldCanPm1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldCanPm1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Can_dohtml"><?php echo "Can DoHTML?"; ?></label><br />
<select size="1" name="Can_dohtml" id="Can_dohtml" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldCanDohtml1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldCanDohtml1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Has_mod_cp"><?php echo "Has mod cp?"; ?></label><br />
<select size="1" name="Has_mod_cp" id="Has_mod_cp" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldModCp1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldModCp1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Has_admin_cp"><?php echo "Has admin cp?"; ?></label><br />
<select size="1" name="Has_admin_cp" id="Has_admin_cp" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldAdminCp1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldAdminCp1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<input type="hidden" class="HiddenTextBox" style="display: none;" name="OldGroupID" value="<?php echo $OldID1 ?>" /> 
<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="EditGroups" /> 
<input type="submit" class="Button" value="Edit Group" /> <input type="reset" class="Button" value="Reset" />
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
if ($_POST['act']=="EditGroups") {
$NewGroupName = stripcslashes(htmlentities($_POST['NewGroupName'], ENT_QUOTES));
$NewGroupName = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewGroupName);
$query="UPDATE ".$TablePreFix."Groups SET id=".$_POST['NewGroupID'].",Name='".$NewGroupName."',View_board='".$_POST['View_board']."',Edit_profile='".$_POST['Edit_profile']."',Can_make_topics='".$_POST['Make_topics']."',Can_make_replys='".$_POST['Make_replys']."',Can_edit_replys='".$_POST['Edit_replys']."',Can_delete_replys='".$_POST['Delete_replys']."',Can_add_events='".$_POST['Add_events']."',Can_pm='".$_POST['Can_pm']."',Can_dohtml='".$_POST['Can_dohtml']."',Has_mod_cp='".$_POST['Has_mod_cp']."',Has_admin_cp='".$_POST['Has_admin_cp']."' WHERE id=".$_POST['OldGroupID']."";
mysql_query($query);
echo '<meta http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
if ($_POST['act']=="Delete") {
	$sqlrowdelete = "DELETE FROM ".$TablePreFix."Groups WHERE id=".$_POST['IDN']."";
    $resultdelete = mysql_query($sqlrowdelete);
	echo '<meta http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
if ($_POST['act']=="New") {
$OldViewBoard1="yes";
$OldEditProfile1="yes";
$OldMakeTopics1="yes";
$OldMakeReplys1="yes"; 
$OldEditReplys1="yes";
$OldDeleteReplys1="yes";
$OldAddEvents1="yes";
$OldCanPm1="yes"; 
$OldCanDohtml1="yes";
$OldModCp1="no"; 
$OldAdminCp1="no";
?>	<TR>
		<TD background="../Skin/Skin1/index_08.png">&nbsp;</TD>
		<TD COLSPAN=5 bgcolor="494848"><div align="center">
<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="28%"><form method="post" name="Member" action="?act=NewGroups">
<label for="IDNumber"><?php echo "Insert new ID for group: "; ?></label><br />
<input type="text" class="TextBox" name="NewGroupID" size="20" id="IDNumber" value="" /><br />
<label for="GroupName"><?php echo "Insert name for group: "; ?></label><br />
<input type="text" class="TextBox" name="NewGroupName" id="GroupName" value="" size="20" /><br />
<label for="View_board"><?php echo "Can view board?"; ?></label><br />
<select size="1" name="View_board" id="View_board" class="Menu">
<option value="<?php echo "yes"; ?>" 
<?php if($OldViewBoard1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldViewBoard1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Edit_profile"><?php echo "Can edit profile?"; ?></label><br />
<select size="1" name="Edit_profile" id="Edit_profile" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldEditProfile1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldEditProfile1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Make_topics"><?php echo "Can make topics?"; ?></label><br />
<select size="1" name="Make_topics" id="Make_topics" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldMakeTopics1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldMakeTopics1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Make_replys"><?php echo "Can make replys?"; ?></label><br />
<select size="1" name="Make_replys" id="Make_replys" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldMakeReplys1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldMakeReplys1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Edit_replys"><?php echo "Can edit replys?"; ?></label><br />
<select size="1" name="Edit_replys" id="Edit_replys" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldEditReplys1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldEditReplys1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Delete_replys"><?php echo "Can delete replys?"; ?></label><br />
<select size="1" name="Delete_replys" id="Delete_replys" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldDeleteReplys1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldDeleteReplys1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Add_events"><?php echo "Can add events?"; ?></label><br />
<select size="1" name="Add_events" id="Add_events" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldAddEvents1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldAddEvents1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Can_pm"><?php echo "Can send pm?"; ?></label><br />
<select size="1" name="Can_pm" id="Can_pm" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldCanPm1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldCanPm1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Can_dohtml"><?php echo "Can DoHTML?"; ?></label><br />
<select size="1" name="Can_dohtml" id="Can_dohtml" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldCanDohtml1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldCanDohtml1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Has_mod_cp"><?php echo "Has mod cp?"; ?></label><br />
<select size="1" name="Has_mod_cp" id="Has_mod_cp" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldModCp1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldModCp1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br />
<label for="Has_admin_cp"><?php echo "Has admin cp?"; ?></label><br />
<select size="1" name="Has_admin_cp" id="Has_admin_cp" class="Menu">
<option value="<?php echo "yes"; ?>" <?php if($OldAdminCp1=="yes") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "Yes"; ?></option>
<option value="<?php echo "no"; ?>" <?php if($OldAdminCp1=="no") { ?>selected="selected"<?php } ?> class="Menu"><?php echo "No"; ?></option></select><br /> 
<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="NewGroups" /> 
<input type="submit" class="Button" value="Make Group" /> <input type="reset" class="Button" value="Reset" />
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
if ($_POST['act']=="NewGroups") {
if ($_POST['NewGroupID']==null) {
$Error="Yes";
echo "".$adminlang2['please fix the errors']." <br />\n<strong>".$adminlang2['you need id']."</strong><br />"; }
if ($_POST['NewGroupName']==null) {
$Error="Yes";
echo "".$adminlang2['please fix the errors']." <br />\n<strong>".$adminlang2['you need name']."</strong><br />"; }
$sql_id_check = mysql_query("SELECT ID FROM ".$TablePreFix."Groups WHERE ID='".$_POST['NewGroupID']."'");
$id_check = mysql_num_rows($sql_id_check);
if($id_check > 0) {
echo "".$adminlang2['please fix the errors']." <br />\n<strong>".$adminlang2['you need new id']."</strong><br />"; }
if ($Error=="Yes") {
mysql_close();
exit(); }
$NewGroupName = stripcslashes(htmlentities($_POST['NewGroupName'], ENT_QUOTES));
$NewGroupName = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $NewGroupName);
$query = "INSERT INTO ".$TablePreFix."Groups VALUES (".$_POST['NewGroupID'].",'".$NewGroupName."','','','".$_POST['View_board']."','".$_POST['Edit_profile']."','".$_POST['Make_topics']."','".$_POST['Make_replys']."','".$_POST['Edit_replys']."','".$_POST['Delete_replys']."','".$_POST['Add_events']."','".$_POST['Can_pm']."','".$_POST['Can_dohtml']."','',0,'".$_POST['Has_mod_cp']."','".$_POST['Has_admin_cp']."')";
mysql_query($query);
	echo '<meta http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
	$status = explode('  ', mysql_stat($Stat3SQL)); 
require( '../misc/Footer.php');
mysql_close(); ?><center><a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="../Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="../Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a></center>
</body></html>