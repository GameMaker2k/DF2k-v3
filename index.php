<?php
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/index.php');
$StatSQL = mysql_connect($mysqlhost,$username,$password,null,'MYSQL_CLIENT_COMPRESS');
$StatBase = @mysql_select_db($database);
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
<link rel="alternate" type="application/rss+xml" title="Board RSS Feed" href="misc/RSS1.php">
<link rel="alternate" type="application/rss+xml" title="Category RSS Feed" href="misc/RSS5.php?SubID=0">
<?php
if ($_GET['act']==null) {
$_GET['act']="View"; }
if ($_GET['act']=="View") {?>
<title><?php echo $BoardName?> <?php echo $lang['powered by df2k']; ?><?php echo $_SESSION['DF2kPreVer']; ?></title>
<?php }
if ($_GET['act']=="Lo-Fi") {?>
<title><?php echo $BoardName?> <?php echo $TitleLine ?> <?php echo $lang2['lo-fi version']; ?> <?php echo $lang['powered by df2k']; ?><?php echo $_SESSION['DF2kPreVer']; ?></title>
<?php } ?></head><?php
if ($_GET['Backwards']=="Yes") {
	echo "\n<body dir=\"rtl\" onload=\"updatetoggle('TabStatus');\">"; }
if ($_GET['Backwards']=="yes") {
	echo "\n<body dir=\"rtl\" onload=\"updatetoggle('TabStatus');\">"; }
if ($_GET['Backwards']=="on") {
	echo "\n<body dir=\"rtl\" onload=\"updatetoggle('TabStatus');\">"; }
if ($_GET['Backwards']!="on") {
    echo "\n<body onload=\"updatetoggle('TabStatus');\">"; }
?>
<?php
$Type="Topic";
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
if ($Show=="") {
	$Show="0"; }
if ($_GET['act']=="") {
	$_GET['act']="View"; }
if ($_GET['act']=="Help") {
	echo '<meta	http-equiv="Refresh" Content="0; URL=Help.php?act=View">'; }
if ($_GET['act']=="Stats") {
	$_GET['act']="BoardStats"; }
if ($_GET['act']=="BoardStats") {
	echo"<title>".$BoardName." - Board Stats</title>"; } 
if ($_GET['act']=="View") {
	?>
	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><div align="center">
		<?php if(!$StatSQL||!$StatBase) { ?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%">
<tr><td align="center"><?php
echo "MySQL Error. &lt;_&lt;<br />\n".mysql_error();
?></td></tr>
</table>
<?php }
if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 <table border="1" width="100%" cellpadding="2" cellspacing="3">
<?php
$prequery="SELECT * FROM ".$TablePreFix."Categorys WHERE (ShowCategory='Yes' and InSubForum=0) ORDER BY ID";
$preresult=mysql_query($prequery);
$prenum=mysql_num_rows($preresult);
$prei=0;
while ($prei < $prenum) {
$CategoryID=mysql_result($preresult,$prei,"ID");
$CategoryName=mysql_result($preresult,$prei,"Name");
$CategoryShow=mysql_result($preresult,$prei,"ShowCategory");
$CategoryDescription=mysql_result($preresult,$prei,"Description");
$post['Post'] = $CategoryDescription;
require( './misc/BBTags.php');
$CategoryDescription = $_GET['YourPost'];
if($prei>=1) { ?>
</td></tr></table><?php
	echo $TableEnd; ?>
<TABLE WIDTH="720" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0">
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_12.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
		<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5>
		<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><?php
}?>
 <tr>
 <td style="width: 25%;" align="left"><span class="ForumText"><a href="Category.php?id=<?php echo $CategoryID ?>&amp;act=View" title="<?php echo $CategoryName ?>"><?php echo $CategoryName ?></a></span></td>
  <td style="width: 75%;"><span class="ForumText"><?php echo $CategoryDescription ?></span></td>
  </tr>
   <?php
	$query2="SELECT * FROM ".$TablePreFix."Forums WHERE (ShowForum='Yes' and CategoryID='$CategoryID' and InSubForum=0) ORDER BY ID";
$result2=mysql_query($query2);
$num2=mysql_num_rows($result2);
$i2=0;
$toggle="";
while ($i2 < $num2) {
$ForumID=mysql_result($result2,$i2,"ID");
$i3=$i2+1;
if ($i3!=$num2) {
$toggle=$toggle."toggletag('Forum".$ForumID."'),"; }
if ($i3==$num2) {
$toggle=$toggle."toggletag('Forum".$ForumID."');"; }
++$i2; }
?>
  <tr>
 <th align="left"><a href="?act=View#" onclick="<?php echo $toggle ?>"><?php echo $lang2['forum name']; ?></a></th>
  <th><a href="?act=View#" onclick="<?php echo $toggle ?>"><?php echo $lang2['forum description']; ?></a></th>
  </tr>
<?php
$query="SELECT * FROM ".$TablePreFix."Forums WHERE (ShowForum='Yes' and CategoryID='$CategoryID' and InSubForum=0) ORDER BY ID";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$ForumID=mysql_result($result,$i,"ID");
$ForumName=mysql_result($result,$i,"Name");
$ForumShow=mysql_result($result,$i,"ShowForum");
$ForumType=mysql_result($result,$i,"ForumType");
$ForumDescription=mysql_result($result,$i,"Description");
$post['Post'] = $ForumDescription;
require( './misc/BBTags.php');
$ForumDescription = $_GET['YourPost'];
?>
 <tr id="Forum<?php echo $ForumID ?>">
 <td align="left"><span class="ForumText"><a href="<?php echo $ForumType ?>.php?id=<?php echo $ForumID ?>&amp;CatID=<?php echo $CategoryID ?>&amp;act=View" title="<?php echo $ForumName ?>"><?php echo $ForumName ?></a></span></td>
  <td><span class="ForumText"><?php echo $ForumDescription ?></span></td>
  </tr>
<?php
++$i; }/*
 $prei2 = $prei+1;
 if ($prei2!=$prenum) { ?>  <tr>
 <th align="left">&nbsp;</th>
  <th>&nbsp;</th>
  </tr><?php } */
  ++$prei; }
if ($num=="0") {
?>
  <tr>
   <td><?php echo $lang2['there are no forums']; ?></td>
   <td>&nbsp;<!--<?php echo $lang2['there are no topics']; ?>-->&nbsp;</td>
  </tr>
  <?php
} }
$Next=$Show+5;
if ($Next>=$num) {
	$Next=$Show; } 
$Back=$Show-5;
if ($Back<=0) {
	$Back=0; }
if ($_GET['act']=="View") {
?><!--	<td width="34%" class="TopicTable">
    <p align="center"><a href="index.php?act=View&amp;Show=<?php echo $Back ?>">&#8592; Back</a></p>
 </td>
   <td width="33%" class="TopicTable"></td>
   <td width="33%" class="TopicTable">
    <p align="center"><a href="index.php?act=View&amp;Show=<?php echo $Next ?>">Next &#8594;</a></p>
 </td> -->
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
<TABLE WIDTH="720" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0">
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_12.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
		<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5>
<?php
$query_1="SELECT * FROM ".$TablePreFix."Topics";
$result_1=mysql_query($query_1);
$number_1=mysql_num_rows($result_1);
$query_2="SELECT * FROM ".$TablePreFix."Posts";
$result_2=mysql_query($query_2);
$number_2=mysql_num_rows($result_2);
$query_3="SELECT * FROM ".$TablePreFix."Members";
$result_3=mysql_query($query_3);
$number_3=mysql_num_rows($result_3);
?>
<script type="text/javascript">
<!--
function toggleview2(id)
{
if (itm.style.display == "none")
{
itm.style.display = "";
createCookie('Status1','',7);
}
else
{
itm.style.display = "none";
createCookie('Status1','none',7);
}
}
function toggletag2(id)
{
getid(id);
toggleview2(id);
}
function updatetoggle(id)
{
if(readCookie('Status1')==null)
{
getid(id);
itm.style.display = "";
}
if(readCookie('Status1')=="none")
{
getid(id);
itm.style.display = "none";
}
if(readCookie('Status1')=="")
{
getid(id);
itm.style.display = "";
}
}
//-->
</script>
<table border="1" width="100%" cellpadding="2" cellspacing="3">
 <tr>
  <th width="100%"><span class="ForumText"><a href="<?php echo $BoardQuery; ?>#BoardStat" onclick="toggletag2('TabStatus');" Name="BoardStats"><?php echo $BoardName; ?> Status</a></span></th>
 </tr>
</table>
<table id="TabStatus" border="1" width="100%" cellpadding="2" cellspacing="3">
 <tr>
  <th width="25%">
  <span class="ForumText">Board Status</span>
  </th>
  <td width="75%">
	<table border="1" width="100%" cellpadding="2" cellspacing="3">
	<tr>
	<td width="100%"><span class="ForumText">Number of Topics: <?php echo $number_1; ?></span></td>
	</tr>
	<tr>
	<td width="100%"><span class="ForumText">Number of Replys: <?php echo $number_2; ?></span></td>
	</tr>
	<tr>
	<td width="100%"><span class="ForumText">Number of Members: <?php echo $number_3-1; ?></span></td>
	</tr>
	</table>
  </td>
 </tr>
</table>
</TD>
		<?php echo $TableEnd; ?>
<?php
if ($_GET['act']=="Off") {
?>
  <div align="center">
 <center>
 <table border="4" cellpadding="4" cellspacing="4" width="80%" class="MenuTable1">
  <tr>
 <th class="MenuTable2"><?php echo $lang2['forum name']; ?></td>
  <th class="MenuTable2"><?php echo $lang2['forum description']; ?></td>
  </tr>
  <tr>
   <td width="100%" align="center" class="TopicTable"><?php echo $lang2['off line']; ?></td>
  </tr>
   </table>
 </center>
</div>
<?php
} }
$MySQLquery="SHOW STATUS";
$MySQLresult=mysql_query($MySQLquery);
echo $MySQLresult['Aborted_clients'];
$status = explode('  ', mysql_stat($StatSQL));
require( './misc/Footer.php');
?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center><?php
mysql_close(); ?>
</body></html>