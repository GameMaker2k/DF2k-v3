<?php
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/Forum.php');
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
}
$_GET['id'] = (int)	 $_GET['id'];
$_GET['CatID'] = (int) $_GET['CatID'];
if ($_GET['id']==null) {
	$_GET['id']=1; }
if ($_GET['id']==null) {
	$_GET['id']=1; }
if ($_GET['CatID']==null) {
	$_GET['CatID']=1; }
?>
<meta name="generator" content="Edit Plus v2.12">
<meta name="author" content="Cool Dude 2k">
<meta name="copyright" content="Game Makeer 2k&copy; 2004">
<meta name="keywords" content="Discussion Forums 2k, DF2k, <?php echo $BoardName ?>, <?php echo $KeyWords ?>">
<meta name="description" content="<?php echo $Description ?>">
<link rel="alternate" type="application/rss+xml" title="Forum Topics RSS Feed" href="misc/RSS2.php?id=<?php echo $_GET['id']; ?>&amp;CatID=<?php echo $_GET['CatID']; ?>">
<?php
$topic_query = mysql_query("SELECT Name FROM ".$TablePreFix."Forums WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
$Forum = mysql_fetch_array($topic_query);
if ($Forum==null) { exit(); }
if ($_GET['act']==null) {
	$_GET['act']="View"; }
if ($_GET['act']=="View") {
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['viewing'].' '.$Forum['Name'].' Forum</title>'; }
if ($_GET['act']=="Lo-Fi") {
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['lo-fi version'].' '.$TitleLine.' '.$lang2['viewing'].' '.$Forum['Name'].' '.$lang2['forum'].'</title>'; }
if ($_GET['act']=="Create") {
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['making topic in'].' '.$Forum['Name'].' '.$lang2['forum'].'</title>'; }
?></head><?php
if ($_GET['Backwards']=="Yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="on") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']!="on") {
    echo "\n<body>"; }
?><?php
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
		<TD COLSPAN="3" valign="middle" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_05.png);" class="navbar"><?php if ($_SESSION['BotName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['BotName'] ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="View Your Profile"><?php echo $_SESSION['MemberName'] ?></a>	<span class="style1">/ </span><a href="Members.php?act=Logout" title="<?php echo $lang['logout']; ?>"><?php echo $lang['logout']; ?></a>	<span class="style1">/ </span><?php } if($Groups['Can_pm']=="yes") { ?><a href="Messenger.php?act=View" title="Goto MailBox"><?php echo $lang['mailbox']; ?></a><a title="<?php echo $lang['new pms 1']; ?><?php echo $PMNumber; ?><?php echo $lang['new pms 2']; ?>">(<?php echo $PMNumber; ?>)</a>	<span class="style1">/ </span><?php } if ($Groups['Has_mod_cp']=="yes"&&$Groups['Has_admin_cp']=="no") {?><a href="Mod/Login.php?act=Login" title="<?php echo $lang['goto mod tools']; ?>"><?php echo $lang['mod cp']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Has_admin_cp']=="yes") {?><a href="Admin/Login.php?act=Login" title="<?php echo $lang['goto admin cp']; ?>"><?php echo $lang['admin cp']; ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']==null) { ?><a href="Members.php?act=Login" title="<?php echo $lang['login']; ?>"><?php echo $lang['login']; ?></a>	<span class="style1">/ </span><a href="Members.php?act=Signup" title="<?php echo $lang['register']; ?>"><?php echo $lang['register']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_make_topics']=="yes") { ?><a href="Forum.php?id=<?php echo $_GET['id']; ?>&amp;CatID=<?php echo $_GET['CatID']; ?>&amp;act=Create" title="<?php echo $lang['create new topic']; ?>"><?php echo $lang['new topic']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_make_topics']=="no") { ?><!--<a href="Forum.php?id=<?php echo $_GET['id']; ?>&amp;CatID=<?php echo $_GET['CatID']; ?>&amp;act=Create" title="<?php echo $lang['Create New Topic']; ?>">--><span title="<?php echo "You cant make a topic."; ?>"><?php echo $lang['new topic']; ?></span><!--</a>-->	<span class="style1">/ </span><?php } ?><a href="Help.php?act=View" title="<?php echo $lang['help files']; ?>"><?php echo $lang['help']; ?></a>	<span class="style1">/ </span><a href="Calendar.php?act=View" title="<?php echo $lang['view calendar']; ?>"><?php echo $lang['calendar']; ?></a>	<span class="style1">/ </span><a href="TagBoard.php?act=View" title="<?php echo $lang['goto tag boards']; ?>"><?php echo $lang['tag board']; ?></a></TD>
		<TD COLSPAN="2" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_06.png);"></TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
<?php
if ($Show=="") {
	$Show="0"; }
if ($_GET['act']=="Help") {
	echo '<meta	http-equiv="Refresh" Content="0; URL=Help.php?act=View">'; }
if ($_GET['act']=="Stats") {
	$_GET['act']="ForumStats"; }
if ($_GET['act']=="ForumStats") {
	$topic_query = mysql_query("SELECT Name FROM ".$TablePreFix."Forums WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
    $Forum = mysql_fetch_array($topic_query);
	echo"<title>".$BoardName." - ".$Forum['Name']." Forum Stats</title>"; } 
if ($_GET['act']=="View") {
	?>
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
<?php/*<div align="center">*/?>
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <th style="text-align: center;" width="2%">&nbsp;</th>
   <th width="27%"><?php echo $lang2['topics']; ?></th>
   <th width="36%"><?php echo $lang2['time created']; ?></th>
   <th width="31%"><?php echo $lang2['created by']; ?></th>
   <th width="6%"><?php echo $lang2['replys']; ?></th>
  </tr>
<?php
$query="SELECT * FROM ".$TablePreFix."Topics WHERE (ForumID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].") ORDER BY Pinned DESC, LastUpdate DESC";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$TopicID=mysql_result($result,$i,"ID");
$UsersID=mysql_result($result,$i,"UserID");
$GuestName=mysql_result($result,$i,"GuestName");
$TheTime=mysql_result($result,$i,"TimeStamp");
$TheTime=GMTimeChange("F j, Y, g:i a",$TheTime,$YourOffSet);
$TopicName=mysql_result($result,$i,"TopicName");
$PinnedTopic=mysql_result($result,$i,"Pinned");
$TopicStat=mysql_result($result,$i,"Closed");
$result2 = mysql_query("SELECT * FROM ".$TablePreFix."Members");
		while ($row = mysql_fetch_array($result2, MYSQL_NUM)) {
        if ($row[0]==$UsersID) {
        $User1Name = $row[1];
        $User1Email = $row[3];
        $User1Signature = $row[9];
        $User1Avatar = $row[10];
        $User1Website = $row[11];
		if($User1Name=="Guest") { $User1Name=$GuestName; }  }	 }
$queryone="SELECT * FROM ".$TablePreFix."Posts WHERE (TopicID=$TopicID) AND (CategoryID=".$_GET['CatID'].")";
$resultone=mysql_query($queryone);
$ReplyNumber=mysql_num_rows($resultone);
if ($PinnedTopic==0) {
	if ($PinnedTopic==0) {
		$PreTopic="&nbsp;"; } }
if ($PinnedTopic==1) {
	$PreTopic="<img src=\"Skin/Skin".$_SESSION["Skin"]."/pin.png\" alt=\"Pinned!\" title=\"Pinned Topic!\" />"; }
if ($TopicStat==1) {
	$PreTopic="<img src=\"Skin/Skin".$_SESSION["Skin"]."/lock.png\" alt=\"Closed!\" title=\"Closed Topic!\" />"; }
if ($PinnedTopic==0) {
	if ($TopicStat==0) {
	$Style=" style=\"font-weight: none; font-style: none;\" "; } }
if ($PinnedTopic==1) {
	if ($TopicStat==0) {
	$Style=" style=\"font-weight: bold; font-style: none;\" "; } }
if ($PinnedTopic==0) {
	if ($TopicStat==1) {
	$Style=" style=\"font-weight: none; font-style: italic;\" "; } }
if ($PinnedTopic==1) {
	if ($TopicStat==1) {
	$Style=" style=\"font-weight: bold; font-style: italic;\" "; } }
?>
  <tr>
   <td style="text-align: center;" width="2%"><?php echo $PreTopic; ?></td>
   <td width="27%"><a id="topic<?php echo $TopicID ?>" name="topic<?php echo $TopicID ?>"><!-- The Topic --></a><span class="TopicText"><a href="Topic.php?id=<?php echo $TopicID ?>&amp;ForumID=<?php echo $_GET['id']; ?>&amp;CatID=<?php echo $_GET['CatID']; ?>&amp;act=View"<?php echo $Style ?>title="<?php echo $lang2['topic created by']; ?> <?php echo $User1Name ?> <?php echo $lang2['at']; ?> <?php echo $TheTime ?>"><?php echo $TopicName ?></a></span></td>
   <td width="36%"><a title="<?php echo $lang2['topic created on']; ?> <?php echo $TheTime ?>"><?php echo $TheTime ?></a></td>
   <td width="31%"><a href="Members.php?act=Profile&amp;id=<?php echo $UsersID ?>" title="<?php echo $lang2['view users profile']; ?>"><?php echo $User1Name ?></a></td>
   <td width="6%" align="center"><a title="There are <?php echo $ReplyNumber ?> <?php echo $lang2['replys in']; ?> <?php echo $TopicName ?>"><?php echo $ReplyNumber ?></a></td>
  </tr>
<?php
++$i; 
} }
if ($num=="0") {
$result3 = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result3, MYSQL_NUM)) {
        if ($row[0]==1) {
        $User1Name = $row[1];
        $User1Email = $row[3];
        $User1Signature = $row[9];
        $User1Avatar = $row[10];
        $User1Website = $row[11]; }	 }
?>
  <tr>
   <td style="text-align: center;" width="2%">&nbsp;</td>
   <td width="37%"><a name="NoTopics"><!-- Create Topic --></a><!-- Create Topic --><a href="Forum.php?id=<?php echo $_GET['id']; ?>&amp;CatID=<?php echo $_GET['CatID']; ?>&amp;act=Create" title="<?php echo $lang2['create new topic']; ?>"><?php echo $lang2['create new topic']; ?></a></td>
   <td width="36%"><?php echo GMTimeGet("F j, Y, g:i a",$YourOffSet); ?></td>
   <td width="31%"><a href="Members.php?act=Profile&amp;id=1" title="<?php echo $lang2['view users profile']; ?>"><?php echo $User1Name ?></a></td>
   <td width="6%" align="center"><a title="<?php echo $lang2['there are no replys']; ?>">0</a></td>
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
if ($num!="0") {
$result3 = mysql_query("SELECT * FROM ".$TablePreFix."Members");
while ($row = mysql_fetch_array($result3, MYSQL_NUM)) {
        if ($row[0]==1) {
        $User1Name = $row[1];
        $User1Email = $row[3];
        $User1Signature = $row[9];
        $User1Avatar = $row[10];
        $User1Website = $row[11]; }	 }
?><tr>
   <td style="text-align: center;" width="2%">&nbsp;</td>
   <td width="37%"><a name="CreateTopic"><!-- Create Topic --></a><!-- Create Topic --><a href="Forum.php?id=<?php echo $_GET['id']; ?>&amp;CatID=<?php echo $_GET['CatID']; ?>&amp;act=Create" title="Create a New Topic"><?php echo $lang2['create new topic']; ?></a></td>
   <td width="36%"><?php echo GMTimeGet("F j, Y, g:i a",$YourOffSet); ?></td>
   <td width="31%"><a href="Members.php?act=Profile&amp;id=1" title="<?php echo $lang2['view users profile']; ?>"><?php echo $User1Name ?></a></td>
   <td width="6%" align="center"><a title="<?php echo $lang2['there are no replys']; ?>">0</a></td>
  </tr><?php } ?>
<?php /* ?>	<td width="34%" class="MenuTable2">
    <p align="center"><a href="Forum.php?act=View&amp;Show=<?php echo $Back ?>">&#8592; Back</a></p>
 </td>
   <td width="33%" class="MenuTable2"></td>
   <td width="33%" class="MenuTable2">
    <p align="center"><a href="Forum.php?act=View&amp;Show=<?php echo $Next ?>">Next &#8594;</a></p>
 </td> --> <?php */ ?>
 </table>
 <?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 </center>
</TD>
<?php/*</div>*/?>
		<?php echo $TableEnd; ?>
<?php }
$Next=$Show+5;
if ($Next>=$num) {
	$Next=$Show; } 
$Back=$Show-5;
if ($Back<=0) {
	$Back=0; }
if ($_GET['act']=="Create") {
if ($Groups['Can_make_topics']=="yes") {
	$query="SELECT * FROM ".$TablePreFix."Topics";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
    $nums=$num-1;
	$TopicsID=mysql_result($result,$nums,"id");
	$TopicID=$TopicsID+1;
	$query="SELECT * FROM ".$TablePreFix."Posts";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	$nums=$num-1;
	$ReplyID=mysql_result($result,$nums,"id");
	$PostID=$ReplyID+1;
	$ForumID=$_GET['id']+0;
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
   <?php require( './misc/SmileTable.php'); ?>
   <td width="72%"><?php require( './misc/Buttons.php'); ?>
<script type="text/javascript">
<!-- /* Form validation script by Prather Production, written by Michael Prather.  Visit http://www.pratherproductions.com */
function CheckForms(Reply)
{

  /*if (Topic.YourName.value == "")
  {
    alert("You Need to Put in a User Name!");
    Topic.YourName.focus();
	return (false);
     }*/

    if (Topic.TopicName.value == "")
  {
    alert("You Need to Put in a Topic Name!");
    Topic.TopicName.focus();
	return (false);
     }

  if (Topic.YourPost.value == "")
  {
    alert("You Need to Put in a Post!");
    Topic.YourPost.focus();
	return (false);
     }
  
  return (true);
  }
  //-->
  </script>
  	<form method=post name="Topic" onSubmit=" return CheckForms(this)" action="?id=<?php echo $_GET['id']; ?>&amp;CatID=<?php echo $_GET['CatID']; ?>&amp;act=Send">
	<?php if ($_SESSION['MemberName']==null) { ?>
	<label for="YourName"><?php echo $lang2['your name']; ?></label><br />
	<input type="text" name="YourName" id="YourName" class="TextBox" value="<?php echo "$HTTP_COOKIE_VARS[YourNameis]"; ?>"><br /><?php } ?>
	<label for="TopicName"><?php echo $lang2['topic name']; ?></label><br />
    <input type="text" name="TopicName" id="TopicName" class="TextBox"><br />
	<label for="YourPost"><?php echo $lang2['your post']; ?></label><br />
	<textarea rows="5" name="YourPost" id="YourPost" cols="28" class="TextBox"></textarea><br />
	<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" checked /><label for="LineBreaks1" title="<?php echo $lang2['use to put linebreaks']; ?>"><?php echo $lang2['auto linebreaks mode']; ?></label> 
    <input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" /><label for="LineBreaks2" title="<?php echo $lang2['use if you are making table/list']; ?>"><?php echo $lang2['raw linebreaks mode']; ?></label><br /> 
	<?php if ($Groups['Has_mod_cp']=="yes" || $Groups['Has_mod_cp']=="yes") {?>
	<input type="radio" value="0" checked="checked" name="PinTopic" id="PinTopicOn"><label for="PinTopicOn"><?php echo $lang2['dont pin topic']; ?></label>
    <input type="radio" value="1" name="PinTopic" id="PinTopicOff"><label for="PinTopicOff"><?php echo $lang2['pin topic']; ?></label><br />
	<input type="radio" value="0" checked="checked" name="CloseTopic" id="CloseTopicOn"><label for="CloseTopicOn"><?php echo $lang2['dont close topic']; ?></label>
    <input type="radio" value="1" name="CloseTopic" id="CloseTopicOff"><label for="CloseTopicOff"><?php echo $lang2['close topic']; ?></label><br />
	<?php } if ($Groups['Has_mod_cp']=="no") { 
		if ($Groups['Has_mod_cp']=="no") {?>
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="PinTopic" value="0" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="CloseTopic" value="0" /><?php } }?>
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="CatID" value="<?php echo $_GET['CatID']; ?>" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="ForumID" value="<?php echo $ForumID; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="TopicID" value="<?php echo $TopicID; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="PostID" value="<?php echo $PostID; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="YourDate" value="<?php echo GMTimeSend(null); ?>">
	<label for="LastReply"><?php echo $lang2['your last reply']; ?></label><br />
	<textarea rows="2" name="LastReply" id="LastReply" cols="28" class="TextBox" readonly><?php echo "$HTTP_COOKIE_VARS[LastReply]"; ?></textarea><br />
	<input type="submit" value="<?php echo $lang2['post topic']; ?>" class="Button"><input type="reset" value="<?php echo $lang2['reset topic']; ?>" class="Button">
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
	<?php } }
	if ($Groups['Can_make_topics']=="no") {
		if ($_GET['act']=="Create") {
		$_GET['act'] = "View";
		echo "".$lang2['please the errors']." <br />\n<strong>You cant make topics. &lt;_&lt;</strong><br />"; }	 }
	if ($Groups['Can_make_topics']=="no") {
		if ($_GET['act']=="Send") {
		$_GET['act'] = "View";
		echo "".$lang2['please the errors']." <br />\n<strong>You cant make topics. &lt;_&lt;</strong><br />"; }	 }
	if ($_POST['YourPost']==null) {
		if ($_GET['act']=="Send") {
		$_GET['act'] = "View";
		echo "".$lang2['please the errors']." <br />\n<strong>".$lang2['you need a post']."</strong><br />";
		exit(); } }
	if ($_GET['act']=="Send") {
		//echo '<title>'.$BoardName.' - '.$lang2['making new topic'].'</title>';
		echo"<script type=\"text/javascript\">\n<!--\ndocument.title='".$BoardName." - ".$lang2['making new topic']."';\n//-->\n</script>";
		//setcookie("LastReply");
		$SetYourPost = $_POST['YourPost'];
		//setcookie("LastReply", $SetYourPost, time() + (7 * 86400) );
		require( './misc/HTMLTags.php');
		if($Groups['Can_dohtml']=="no") {
		$_POST['YourPost'] = preg_replace("/\[DoHTML\]/isxS", "&#91;dohtml&#93;", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\[\/DoHTML\]/isxS", "&#91;&#47;dohtml&#93;", $_POST['YourPost']); }
		$YourIDNew = $_SESSION['UserID'];
		if($YourIDNew==0) { $YourOldID=$YourIDNew; $YourIDNew=2; $IDChange="Yes"; }
		$query = "INSERT INTO ".$TablePreFix."Topics VALUES (null,".$_POST['ForumID'].",".$_GET['CatID'].",".$YourIDNew.",'".$_POST['YourName']."','".$_POST['YourDate']."',".$_POST['YourDate'].",'".$_POST['TopicName']."',".$_POST['PinTopic'].",".$_POST['CloseTopic'].")";
        mysql_query($query);
		$query = "INSERT INTO ".$TablePreFix."Posts VALUES (null,".$_POST['TopicID'].",".$_POST['ForumID'].",".$_GET['CatID'].",".$YourIDNew.",'".$_POST['YourName']."',".$_POST['YourDate'].",'".$_POST['YourPost']."','".$_SERVER['REMOTE_ADDR']."')"; 
		mysql_query($query);
		if($IDChange=="Yes") { $YourIDNew=$YourOldID; }
		$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
        if ($row[0]==$_SESSION['UserID']) {
        $OldUserid=$row[0];
		$NewPostCount=$row[14]+1; } }
		$NewUserIP = $_SERVER['REMOTE_ADDR'];
		$NewLastActive = GMTimeSend(null);
		$query="UPDATE ".$TablePreFix."Members SET LastActive=".$NewLastActive.",PostCount=".$NewPostCount.",IP='".$NewUserIP."' WHERE id=".$OldUserid."";
        mysql_query($query);
		echo "<meta	http-equiv='Refresh' Content='0; URL=Topic.php?id=".$_POST['TopicID']."&amp;ForumID=".$_POST['ForumID']."&amp;CatID=".$_GET['CatID']."&amp;act=View'>"; }
		?>
<?php
if ($_GET['act']=="Off") {
?>
  <div align="center">
 <center>
 <table border="4" cellpadding="4" cellspacing="4" width="80%" class="MenuTable1">
  <tr>
   <td width="29%" class="MenuTable2"><?php echo $lang2['topics']; ?></td>
   <td width="38%" class="MenuTable2"><?php echo $lang2['time created']; ?></td>
   <td width="33%" class="MenuTable2"><?php echo $lang2['created by']; ?></td>
  </tr>
  <tr>
   <td width="40%" class="MenuTable2">&nbsp;</td>
   <td width="29%" class="MenuTable2">&nbsp;</td>
   <td width="29%" class="MenuTable2">&nbsp;</td>
  </tr>
   </table>
 </center>
</div>
<?php } ?><?php
$status = explode('  ', mysql_stat($StatSQL));
require( './misc/Footer.php');
mysql_close(); ?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center>
</body></html>