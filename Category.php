<?php
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/Category.php');
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
<link rel="alternate" type="application/rss+xml" title="Board RSS Feed" href="misc/RSS1.php?CatID=<?php echo $_GET['id']; ?>">
<?php
$_GET['id'] = (int)	 $_GET['id'];
$_GET['SubID'] = (int) $_GET['SubID'];
if ($_GET['id']==null) {
	$_GET['id']=0; }
if ($_GET['SubID']==null) {
	$_GET['SubID']=0; }
if ($_GET['act']==null) {
$_GET['act']="View"; }
$topic_querys = mysql_query("SELECT Name FROM ".$TablePreFix."Categorys WHERE (ID=".$_GET['id'].")");
$Categorys = mysql_fetch_array($topic_querys);
if ($Categorys==null) { exit(); }
if ($_GET['act']=="View") {
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['viewing forums'].' '.$Categorys['Name'].' '.$lang2['categorys'].'</title>'; }
if ($_GET['act']=="Create") {
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['making topic'].' '.$Categorys['Name'].' '.$lang2['categorys'].'</title>'; }
?></head><?php
if ($_GET['Backwards']=="Yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="on") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']!="on") {
    echo "\n<body>"; }
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
		<TD COLSPAN="3" valign="middle" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_05.png);" class="navbar"><?php if ($_SESSION['MemberName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php if ($_SESSION['BotName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['BotName'] ?></a>	<span class="style1">/ </span><?php } echo $_SESSION['MemberName'] ?></a>	<span class="style1">/ </span><a href="Members.php?act=Logout" title="<?php echo $lang['logout']; ?>"><?php echo $lang['logout']; ?></a>	<span class="style1">/ </span><?php } if($Groups['Can_pm']=="yes") { ?><a href="Messenger.php?act=View" title="Goto MailBox"><?php echo $lang['mailbox']; ?></a><a title="<?php echo $lang['new pms 1']; ?><?php echo $PMNumber; ?><?php echo $lang['new pms 2']; ?>">(<?php echo $PMNumber; ?>)</a>	<span class="style1">/ </span><?php } if ($Groups['Has_mod_cp']=="yes"&&$Groups['Has_admin_cp']=="no") {?><a href="Mod/Login.php?act=Login" title="<?php echo $lang['goto mod tools']; ?>"><?php echo $lang['mod cp']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Has_admin_cp']=="yes") {?><a href="Admin/Login.php?act=Login" title="<?php echo $lang['goto admin cp']; ?>"><?php echo $lang['admin cp']; ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']==null) { ?><a href="Members.php?act=Login" title="<?php echo $lang['login']; ?>"><?php echo $lang['login']; ?></a>	<span class="style1">/ </span><a href="Members.php?act=Signup" title="<?php echo $lang['register']; ?>"><?php echo $lang['register']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_make_topics']=="yes") { ?><a href="Forum.php?id=1&amp;CatID=1&amp;act=Create" title="<?php echo $lang['create new topic']; ?>"><?php echo $lang['new topic']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_make_topics']=="no") { ?><!--<a href="Forum.php?id=1&amp;CatID=1&amp;act=Create" title="<?php echo $lang['create new topic']; ?>">--><span title="<?php echo "You cant make a topic."; ?>"><?php echo $lang['new topic']; ?></span><!--</a>-->	<span class="style1">/ </span><?php } ?><a href="Help.php?act=View" title="<?php echo $lang['help files']; ?>"><?php echo $lang['help']; ?></a>	<span class="style1">/ </span><a href="Calendar.php?act=View" title="<?php echo $lang['view calendar']; ?>"><?php echo $lang['calendar']; ?></a>	<span class="style1">/ </span><a href="TagBoard.php?act=View" title="<?php echo $lang['goto tag boards']; ?>"><?php echo $lang['tag board']; ?></a></TD>
		<TD COLSPAN="2" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_06.png);"></TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
<?php
if ($_GET['SubID']==null) {
	$_GET['SubID']=0; }
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
<?php if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 <table border="1" width="100%" cellpadding="2" cellspacing="3">
 <?php
	$query2="SELECT * FROM ".$TablePreFix."Forums WHERE (ShowForum='Yes' and CategoryID='".$_GET['id']."' and InSubForum=".$_GET['SubID'].") ORDER BY ID";
$result2=mysql_query($query2);
$num2=mysql_num_rows($result2);
$i2=0;
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
 <th align="left"><a href="?id=<?php echo $_GET['id']; ?>&amp;SubID=<?php echo $_GET['SubID']; ?>#" onclick="<?php echo $toggle ?>"><?php echo $lang2['forum name']; ?></a></th>
  <th><a href="?id=<?php echo $_GET['id']; ?>&amp;SubID=<?php echo $_GET['SubID']; ?>#" onclick="<?php echo $toggle ?>"><?php echo $lang2['forum description']; ?></a></th>
  </tr>
<?php
$query="SELECT * FROM ".$TablePreFix."Forums WHERE (ShowForum='Yes' and CategoryID=".$_GET['id']." and InSubForum=".$_GET['SubID'].") ORDER BY ID";
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
 <td align="left"><span class="ForumText"><a href="<?php echo $ForumType ?>.php?id=<?php echo $ForumID ?>&amp;CatID=<?php echo $_GET['id'] ?>&amp;act=View" title="<?php echo $ForumName ?>"><?php echo $ForumName ?></a></span></td>
  <td><span class="ForumText"><?php echo $ForumDescription ?></span></td>
  </tr>
<?php
++$i; } }
if ($num=="0") {
?>
  <tr>
   <td><?php echo $lang2['no forum/subforums']; ?></td>
   <td>&nbsp;<!--There Are No SubForums Here.-->&nbsp;</td>
  </tr>
  <?php
}
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
$status = explode('  ', mysql_stat($StatSQL));
require( './misc/Footer.php');
?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center><?php
mysql_close(); ?>
</body></html>