<?php
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/Topic.php');
$StatSQL = mysql_connect($mysqlhost,$username,$password,null,'MYSQL_CLIENT_COMPRESS')or die(mysql_error());
@mysql_select_db($database) or die( "Unable to select database");
if ($_GET['CatID']==null) {
	$_GET['CatID']=1; }
$_GET['id'] = (int)	 $_GET['id'];
$_GET['ForumID'] = (int) $_GET['ForumID'];
$_GET['CatID'] = (int) $_GET['CatID'];
$_GET['SubID'] = (int) $_GET['SubID'];
$topic_query = mysql_query("SELECT TopicName FROM ".$TablePreFix."Topics WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
$Topic = mysql_fetch_array($topic_query);
if ($Topic==null) { exit(); }
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
<meta name="keywords" content="Discussion Forums 2k, DF2k, <?php echo $BoardName ?>, <?php echo $Topic['TopicName']; ?>, <?php echo $KeyWords ?>">
<meta name="description" content="<?php echo $Description ?>">
<?php
if ($_GET['act']==null) {
	$_GET['act']="View"; }
if ($_GET['CatID']==null) {
	$_GET['CatID']=1; }
if ($_GET['act']=="View") {
$topic_query = mysql_query("SELECT TopicName FROM ".$TablePreFix."Topics WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
$Topic = mysql_fetch_array($topic_query);
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['viewing topic'].' '.$Topic['TopicName'].'</title>'; }
if ($_GET['act']=="Create") {
$topic_query = mysql_query("SELECT TopicName FROM ".$TablePreFix."Topics WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
$Topic = mysql_fetch_array($topic_query);
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['replying to topic'].' '.$Topic['TopicName'].'</title>'; }
if ($_GET['act']=="Stats") {
	$_GET['act']="TopicStats"; }
if ($_GET['act']=="TopicStats") {
	$topic_query = mysql_query("SELECT TopicName FROM ".$TablePreFix."Topics WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
    $Topic = mysql_fetch_array($topic_query);
	echo"<title>".$BoardName." '.$TitleLine.' ".$Topic['TopicName']." ".$lang2['topic stats']."</title>"; } 
if ($_GET['act']=="modtool") {
	$_GET['act']="ModTool"; }
if ($_GET['act']=="tool") {
	$_GET['act']="Tool"; }
if ($_GET['act']=="ModTool"||$_GET['act']=="Tool") {
	$topic_query = mysql_query("SELECT TopicName FROM ".$TablePreFix."Topics WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
    $Topic = mysql_fetch_array($topic_query);
	echo"<title>".$BoardName." ".$TitleLine." ".$adminlang['using mod tool']." on Topic ".$Topic['TopicName']."</title>"; } 
if ($_GET['act']=="Edit") {
	$topic_query = mysql_query("SELECT TopicName FROM ".$TablePreFix."Topics WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
    $Topic = mysql_fetch_array($topic_query);
	echo"<title>".$BoardName." ".$TitleLine." ".$lang2['editing reply in topic']." ".$Topic['TopicName']."</title>"; } 
$topic_query1 = mysql_query("SELECT Closed FROM ".$TablePreFix."Topics WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
$Topic = mysql_fetch_array($topic_query1);
$TopicStat=$Topic['Closed'];
$topic_query2 = mysql_query("SELECT Pinned FROM ".$TablePreFix."Topics WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
$Topics = mysql_fetch_array($topic_query2);
$TopicPin=$Topics['Pinned'];
?></head><?php
if ($_GET['Backwards']=="Yes") {
	echo "\n<body dir=\"rtl\" onload=\"updatetoggle('FastReply');\">"; }
if ($_GET['Backwards']=="yes") {
	echo "\n<body dir=\"rtl\" onload=\"updatetoggle('FastReply');\">"; }
if ($_GET['Backwards']=="on") {
	echo "\n<body dir=\"rtl\" onload=\"updatetoggle('FastReply');\">"; }
if ($_GET['Backwards']!="on") {
    echo "\n<body onload=\"updatetoggle('FastReply');\">"; }
?>
<?php
$Type="Reply";
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
<?php/*<div align="center">*/?>
<TABLE WIDTH="720" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0">
	<TR>
		<TD COLSPAN="2">
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_04.png" WIDTH="21" HEIGHT="21" ALT=""></TD>
		<TD COLSPAN="3" valign="middle" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_05.png);" class="navbar"><?php if ($_SESSION['BotName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['BotName'] ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['MemberName'] ?></a>	<span class="style1">/ </span><a href="Members.php?act=Logout" title="<?php echo $lang['logout']; ?>"><?php echo $lang['logout']; ?></a>	<span class="style1">/ </span><?php } if($Groups['Can_pm']=="yes") { ?><a href="Messenger.php?act=View" title="<?php echo $lang['goto mailbox']; ?>"><?php echo $lang['mailbox']; ?></a><a title="<?php echo $lang['new pms 1']; ?><?php echo $PMNumber; ?><?php echo $lang['new pms 2']; ?>">(<?php echo $PMNumber; ?>)</a>	<span class="style1">/ </span><?php } if ($Groups['Has_mod_cp']=="yes"&&$Groups['Has_admin_cp']=="no") {?><a href="Mod/Login.php?act=Login" title="<?php echo $lang['goto mod tools']; ?>"><?php echo $lang['mod cp']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Has_admin_cp']=="yes") {?><a href="Admin/Login.php?act=Login" title="<?php echo $lang['goto admin cp']; ?>"><?php echo $lang['admin cp']; ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']==null) { ?><a href="Members.php?act=Login" title="<?php echo $lang['login']; ?>"><?php echo $lang['login']; ?></a>	<span class="style1">/ </span><a href="Members.php?act=Signup" title="<?php echo $lang['register']; ?>"><?php echo $lang['register']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_make_replys']=="yes") { if ($TopicStat==0) { ?><a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=Create" title="<?php echo $lang['reply to topic']; ?>"><?php echo $lang['add reply']; ?></a>	<span class="style1">/ </span><?php } if ($TopicStat==1) { ?><!--<a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=Create" title="Reply to Topic">Add Reply</a>--><span title="<?php echo $lang['topic closed']; ?>"><?php echo $lang['add reply']; ?></span><!--</a>-->	<span class="style1">/ </span><?php } } if ($Groups['Can_make_replys']=="no") { ?><!--<a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=Create" title="<?php echo $lang['reply to topic']; ?>"><?php echo $lang['add reply']; ?></a>--><span title="<?php echo $lang['not member reply error']; ?>"><?php echo $lang['add reply']; ?></span><!--</a>-->	<span class="style1">/ </span><?php } ?><a href="Help.php?act=View" title="<?php echo $lang['help files']; ?>"><?php echo $lang['help']; ?></a>	<span class="style1">/ </span><a href="Calendar.php?act=View" title="<?php echo $lang['view calendar']; ?>"><?php echo $lang['calendar']; ?></a>	<span class="style1">/ </span><a href="TagBoard.php?act=View" title="<?php echo $lang['goto tag boards']; ?>"><?php echo $lang['tag board']; ?></a></TD>
		<TD COLSPAN="2" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_06.png);"></TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
<?php
if ($_GET['act']=="") {
	$_GET['act']="View"; }
if ($_GET['act']=="Help") {
	echo '<meta	http-equiv="Refresh" Content="0; URL=Help.php?act=View">'; }
if ($_GET['act']=="View") {
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
<?php
$topic_query = mysql_query("SELECT TopicName FROM ".$TablePreFix."Topics WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
$Topic = mysql_fetch_array($topic_query);
/*$post_query = mysql_query("SELECT * FROM Posts WHERE (TopicID=".$_GET['id'].") ORDER BY TimeStamp");*/
$post_query = mysql_query("SELECT * FROM ".$TablePreFix."Posts WHERE TopicID=".$_GET['id']." AND ForumID=".$_GET['ForumID']." and CategoryID=".$_GET['CatID']." ORDER BY TimeStamp");
	while ($post = mysql_fetch_array($post_query)) {
		++$Number ?>
  <?php 
		$YourPost = nl2br($post['Post']);
		$QuoteText="[QUOTE=".$post['Name']." @ ".$post['TimeStamp']."]".$YourPost."[/QUOTE]";	
		$User1ID = $post['UserID'];
 		$ThisUserID = $_SESSION['UserID'];
		$result2 = mysql_query("SELECT * FROM ".$TablePreFix."Members");
		while ($row = mysql_fetch_array($result2, MYSQL_NUM)) {
        if ($row[0]==$User1ID) {
        $User1Name = $row[1];
        $User1Email = $row[3];
        $User1Signature = $row[10];
        $User1Avatar = $row[11];
		$User1AvatarSize = $row[12];
        $User1Website = $row[13];
		$User1IP = $row[16];
		if($User1Name=="Guest") { $User1Name=$post['GuestName']; }  }	 }
		$AvatarSize=explode("x", $User1AvatarSize);
		$AvatarSizeW=$AvatarSize[0];
		$AvatarSizeH=$AvatarSize[1];
		if ($User1Avatar=="http://") {
        $User1Avatar="./Skin/Skin".$_SESSION["Skin"]."/Avatar.png"; }
        if ($User1Avatar==null) {
        $User1Avatar="./Skin/Skin".$_SESSION["Skin"]."/Avatar.png"; }
		if ($User1Website=="http://") {
        $User1Website="Members.php?act=Profile&amp;id=".$User1ID; }
        if ($User1Website==null) {
        $User1Website="Members.php?act=Profile&amp;id=".$User1ID; }
		$post['TimeStamp']=GMTimeChange("F j, Y, g:i a",$post['TimeStamp'],$YourOffSet);
		$post['Post'] = $post['Post']."<br />\n<br />[B]--------------------[/B]\n<br /><a name='Signature".$post['ID']."'><!-- --></a><!--".$User1Name."'s Signature Start-->".$User1Signature."<!--".$User1Name."'s Signature End-->";
		require( './misc/BBTags.php');
		?>
  <tr>
   <td width="62%"><a id="reply<?php echo $post['ID']; ?>" name="reply<?php echo $post['ID']; ?>"><!-- <?php echo $lang2['the post']; ?> --></a><span class="ReplyText">&nbsp;</span><?php echo $post['Post']; ?></td>
   <td width="38%"><center><img src="<?php echo $User1Avatar ?>" style="border: 0; height: <?php echo $AvatarSizeH; ?>; width: <?php echo $AvatarSizeW; ?>;" border="0" height="<?php echo $AvatarSizeH; ?>" width="<?php echo $AvatarSizeW; ?>" title="<?php echo $User1Name ?>'s <?php echo $lang2['avatar']; ?>" alt="<?php echo $User1Name ?>'s <?php echo $lang2['avatar']; ?>" /></center><br /><?php echo $lang2['users name']; ?> <a href="Members.php?act=Profile&amp;id=<?php echo $User1ID; ?>"><?php echo $User1Name; ?></a><br /><a title="<?php echo $lang2['this reply was created on']; ?> <?php echo $post['TimeStamp']; ?>"><?php echo $lang2['time posted']; ?> <br /><?php echo $post['TimeStamp']; ?></a><br /><a title="<?php echo $lang2['goto']; ?> <?php echo $User1Name; ?>'s <?php echo $lang2['website']; ?>" href="<?php echo $User1Website; ?>" target="_blank"><?php echo $lang2['www']; ?></a><br /><a title="<?php echo $lang2['email']; ?> <?php echo $User1Name; ?>" href="mailto:<?php echo $User1Email; ?>" target="_blank"><?php echo $lang2['email']; ?></a><br /><a title="<?php echo $lang2['pm']; ?> <?php echo $User1Name; ?>" href="Messenger.php?act=Create&amp;Sendto=<?php echo urlencode($User1Name); ?>" target="_self"><?php echo $lang2['pm']; ?></a><?php if ($TopicStat==0) { if ($ThisUserID==$User1ID) { if ($Groups['Can_edit_replys']=="yes") { ?><br /><a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=Edit&amp;EditID=<?php echo $post['ID']; ?>" title="<?php echo $lang2['edit reply']; ?> <?php echo $post['Name'] ?>"><?php echo $lang2['edit reply']; ?></a><?php } } if ($Groups['Has_admin_cp']=="yes"||$Groups['Has_mod_cp']=="yes") { ?><br /><a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;ReplyID=<?php echo $post['ID']; ?>&amp;act=ModTool&amp;Tool=DeleteReply" title="<?php echo $adminlang['delete reply']; ?> <?php echo $post['Name'] ?>"><?php echo $adminlang['delete reply']; ?></a><?php } ?><br /><a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=Create&amp;QuoteID=<?php echo $post['ID']; ?>" title="<?php echo $lang2['quote reply']; ?> <?php echo $post['Name'] ?>"><?php echo $lang2['quote reply']; ?></a><?php } ?>
   <?php if ($Groups['Has_admin_cp']=="yes") {
   echo "\r\n<br /><a href=\"http://ws.arin.net/cgi-bin/whois.pl?queryinput=".urlencode($UserIP)."\" title=\"".gethostbyaddr($User1IP)."\" target=\"_blank\">".$User1IP."</a>"; }?>
   </td>
  </tr>
		<?php }
    $query1="SELECT * FROM ".$TablePreFix."Posts";
	$result1=mysql_query($query1);
	$num1=mysql_num_rows($result1);
	$nums=$num1-1;
	$ReplyID=mysql_result($result1,$nums,"id");
	$TopicID=$_GET['id'];
	$PostID=$ReplyID+1;
	$ForumID=$_GET['ForumID']+0;
	?>
 </table>
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
		<TD COLSPAN=5><?php/*<div align="center">*/?>
<?php/*<div align="center">*/?>
 <?php/*<center>*/?>
 <?php if ($Groups['Can_make_replys']=="yes") {
		if ($TopicStat==0) {?>
 <?php if ($Groups['Has_admin_cp']=="yes"||$Groups['Has_mod_cp']=="yes") { 
			$usewidth="62%"; }
	   if ($Groups['Has_admin_cp']=="no"&&$Groups['Has_mod_cp']=="no") {
		   $usewidth="72%"; } ?>
<script type="text/javascript">
<!--
function toggleview2(id)
{
if (itm.style.display == "none")
{
itm.style.display = "";
createCookie('Fast1','',7);
}
else
{
itm.style.display = "none";
createCookie('Fast1','none',7);
}
}
function toggletag2(id)
{
getid(id);
toggleview2(id);
}
function updatetoggle(id)
{
if(readCookie('Fast1')==null)
{
getid(id);
itm.style.display = "";
}
if(readCookie('Fast1')=="none")
{
getid(id);
itm.style.display = "none";
}
if(readCookie('Fast1')=="")
{
getid(id);
itm.style.display = "";
}
}
//-->
</script>
 <table border="1" cellpadding="2" cellspacing="3" width="100%"><tr align="center"><th width="<?php echo $usewidth; ?>"><a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=Create" title="<?php echo $lang['reply to topic']; ?>"><?php echo $lang['add reply']; ?></a> | <a href="Topic.php<?php echo $BoardQuery; ?>#FastReply" name="FastReply" title="<?php echo $lang2['open/close fast reply']; ?>" onclick="toggletag2('FastReply');"><?php echo $lang2['fast reply']; ?></a></th><?php if ($Groups['Has_admin_cp']=="yes"||$Groups['Has_mod_cp']=="yes") { ?><th>
 <form name="ModTool" method=get action="?act=ModTool">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="ModTool" />
	<label for="ModTools"><?php echo $lang2['mod tools']; ?></label><br />
	<select id="ModTools" class="Menu" size="1" name="Tool">
	<option selected value="Nothing"><?php echo $adminlang['do nothing']; ?></option>
	<?php if ($TopicPin==0) { ?><option value="PinTopic"><?php echo $adminlang['pin topic']; ?></option><?php } ?>
	<?php if ($TopicPin==1) { ?><option value="UnpinTopic"><?php echo $adminlang['unpin topic']; ?></option><?php } ?>
	<?php if ($TopicStat==0) { ?><option value="CloseTopic"><?php echo $adminlang['close topic']; ?></option><?php } ?>
	<?php if ($TopicStat==1) { ?><option value="OpenTopic"><?php echo $adminlang['open topic']; ?></option><?php } ?>
	<option value="BumpTopic"><?php echo $adminlang['bump topic']; ?></option>
	<option value="DeleteTopic"><?php echo $adminlang['delete topic']; ?></option>
	<?php /* ?><option value="MoveTopic"><?php echo $adminlang['move topic']; ?></option><?php */ ?>
	</select>
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="CatID" value="<?php echo $_GET['CatID']; ?>" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="ForumID" value="<?php echo $_GET['ForumID']; ?>" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="id" value="<?php echo $id; ?>" />
	<input type="submit" value="<?php echo $adminlang['use mod tool']; ?>" class="Button" />
	</form></th><?php } ?></tr>
  <tr align="center" id="FastReply">
   <td width="<?php echo $usewidth; ?>">	
	<form method=post name="Reply" onSubmit=" return CheckForms(this)" action="?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;&amp;CatID=<?php echo $_GET['CatID'] ?>&act=Send">
	<?php if ($_SESSION['MemberName']==null) { ?>
	<label for="YourName"><?php echo $lang2['your name']; ?></label><br />
	<input type="text" name="YourName" id="YourName" class="TextBox" value="<?php echo "$HTTP_COOKIE_VARS[YourNameis]"; ?>" /><br />
	<?php } ?>
	<label for="YourPost"><?php echo $lang2['your post']; ?></label><br />
	<textarea rows="5" name="YourPost" id="YourPost" cols="28" class="TextBox"><?php echo stripcslashes($QuoteReply); ?></textarea><br />
	<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" checked /><label for="LineBreaks1" title="<?php echo $lang2['use to put linebreaks']; ?>"><?php echo $lang2['auto linebreaks mode']; ?></label> 
    <input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" /><label for="LineBreaks2" title="<?php echo $lang2['use if you are making table/list']; ?>"><?php echo $lang2['raw linebreaks mode']; ?></label><br /> 
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="CatID" value="<?php echo $_GET['CatID']; ?>" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="ForumID" value="<?php echo $_GET['ForumID']; ?>" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="TopicID" value="<?php echo $TopicID; ?>" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="CatID" value="<?php echo $CatID; ?>" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="PostID" value="<?php echo $PostID; ?>" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="YourDate" value="<?php echo GMTimeSend(null); ?>" />
	<input type="submit" value="<?php echo $lang2['post reply']; ?>" class="Button" /><input type="reset" value="<?php echo $lang2['reset reply']; ?>" class="Button" />
	</form>
	</td>
	<?php if ($Groups['Has_admin_cp']=="yes"||$Groups['Has_mod_cp']=="yes") { ?><th><?php echo $lang2['mod tools']; ?><br /><a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=ModTool&amp;Tool=Nothing" title="<?php echo $adminlang['do nothing']; ?>"><?php echo $adminlang['do nothing']; ?></a><br />
	<?php if ($TopicPin==0) { ?><a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=ModTool&amp;Tool=PinTopic" title="<?php echo $adminlang['pin topic']; ?>"><?php echo $adminlang['pin topic']; ?></a><br /><?php } ?>
	<?php if ($TopicPin==1) { ?><a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=ModTool&amp;Tool=UnpinTopic" title="<?php echo $adminlang['unpin topic']; ?>"><?php echo $adminlang['unpin topic']; ?></a><br /><?php } ?>
	<?php if ($TopicStat==0) { ?><a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=ModTool&amp;Tool=OpenTopic" title="<?php echo $adminlang['open topic']; ?>"><?php echo $adminlang['open topic']; ?></a><br /><?php } ?>
	<?php if ($TopicStat==1) { ?><a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=ModTool&amp;Tool=CloseTopic" title="<?php echo $adminlang['close topic']; ?>"><?php echo $adminlang['close topic']; ?></a><br /><?php } ?>
	<a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=ModTool&amp;Tool=BumpTopic" title="<?php echo $adminlang['bump topic']; ?>"><?php echo $adminlang['bump topic']; ?></a><br />
	<a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=ModTool&amp;Tool=DeleteTopic" title="<?php echo $adminlang['delete topic']; ?>"><?php echo $adminlang['delete topic']; ?></a><?php /* ?><br />
	<a href="Topic.php?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=ModTool&amp;Tool=MoveTopic" title="<?php echo $adminlang['move topic']; ?>"><?php echo $adminlang['move topic']; ?></a><?php */ ?>
	</th><?php } ?>
	</tr>
 </table>
 <?php } ?>
 <?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 <?php/*</center>
</div>*/?>
</TD>
		<?php echo $TableEnd; ?><?php }
	if ($Groups['Can_make_replys']=="no") {?>
</TD>
		<?php echo $TableEnd; ?>
<?php } }
if ($_GET['act']=="ModTool"||$_GET['act']=="Tool") {
if ($Groups['Has_admin_cp']=="no"||$Groups['Has_mod_cp']=="no") {
	exit($adminlang['cant use tools']);
}
if ($Groups['Has_admin_cp']=="yes"||$Groups['Has_mod_cp']=="yes") {
if ($_GET['Tool']=="Nothing") { echo $adminlang['doing nothing']; } 
if ($_GET['Tool']=="PinTopic"||$_GET['Tool']=="Pin") { $modquery="UPDATE ".$TablePreFix."Topics SET Pinned=1 WHERE ID=".$_GET['id'].""; $modresult=mysql_query($modquery); }
if ($_GET['Tool']=="UnpinTopic"||$_GET['Tool']=="Unpin") { $modquery="UPDATE ".$TablePreFix."Topics SET Pinned=0 WHERE ID=".$_GET['id'].""; $modresult=mysql_query($modquery);  } 
if ($_GET['Tool']=="OpenTopic"||$_GET['Tool']=="Open") { $modquery="UPDATE ".$TablePreFix."Topics SET Closed=0 WHERE ID=".$_GET['id'].""; $modresult=mysql_query($modquery); } 
if ($_GET['Tool']=="CloseTopic"||$_GET['Tool']=="Close") { $modquery="UPDATE ".$TablePreFix."Topics SET Closed=1 WHERE ID=".$_GET['id'].""; $modresult=mysql_query($modquery); }
if ($_GET['Tool']=="BumpTopic"||$_GET['Tool']=="Bump") { $modquery="UPDATE ".$TablePreFix."Topics SET LastUpdate=".GMTimeSend(null)." WHERE ID=".$_GET['id'].""; $modresult=mysql_query($modquery); }
if ($_GET['Tool']=="DeleteReply") {
	$sqlrowdelete = "DELETE FROM ".$TablePreFix."Posts WHERE id=".$_GET['ReplyID']."";
    $resultdelete = mysql_query($sqlrowdelete);	}
if ($_GET['Tool']=="DeleteTopic") {
	$sqlrowdelete = "DELETE FROM ".$TablePreFix."Topics WHERE id=".$_GET['id']."";
    $resultdelete = mysql_query($sqlrowdelete);
	$post_query = mysql_query("SELECT * FROM ".$TablePreFix."Posts WHERE TopicID=".$_GET['id']."");
	while ($posty = mysql_fetch_array($post_query)) {
		++$Number; 
		$PostyID = $posty['ID'];
		$sqlrowdeletes = "DELETE FROM ".$TablePreFix."Posts WHERE ID=".$PostyID."";
        $resultdeletes = mysql_query($sqlrowdeletes); }
		exit("<meta	http-equiv='Refresh' Content='0; URL=index.php?act=View'>");
		}
}
exit("<meta	http-equiv='Refresh' Content='0; URL=Topic.php?id=".$_GET['id']."&ForumID=".$_GET['ForumID']."&CatID=".$_GET['CatID']."&act=View'>");
}
if ($_GET['act']=="Create") {
	if ($TopicStat==0) {
	$query="SELECT * FROM ".$TablePreFix."Posts";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	$nums=$num-1;
	$ReplyID=mysql_result($result,$nums,"id");
	$TopicID=$_GET['id'];
	$PostID=$ReplyID+1;
	$_GET['ForumID']=$_GET['ForumID']+0;
	if ($_GET['QuoteID']!=null) {
	$quote_query = mysql_query("SELECT * FROM ".$TablePreFix."Posts WHERE (ID=".$_GET['QuoteID'].")");
	$Quote = mysql_fetch_array($quote_query);
	$result2 = mysql_query("SELECT * FROM ".$TablePreFix."Members");
	while ($row = mysql_fetch_array($result2, MYSQL_NUM)) {
        $User1ID=$Quote['UserID'];
		if ($row[0]==$User1ID) {
        $User1Name = $row[1];
        $User1Email = $row[3];
        $User1Signature = $row[10];
        $User1Avatar = $row[11];
		$User1AvatarSize = $row[12];
        $User1Website = $row[13]; }	 }
	$HTML1 = array("<(", ")>", '|"|', "<br />");
	$HTML2 = array("<", ">", '"', "[BR]");
	$AvatarSize=explode("x", $User1AvatarSize);
	$AvatarSizeW=$AvatarSize[0];
	$AvatarSizeH=$AvatarSize[1];
	$Quote['Post'] = preg_replace("/\<br \/>\r\n\<br \/>\r\n\<span class=\"EditReply\"\>This post has been edited by \<b\>(.+?)\<\/b> on (.+?)\<\/span>/is", "", $Quote['Post']);
	$Quote['Post'] = str_replace($HTML1, $HTML2, $Quote['Post']);
	$Quote['Post'] = preg_replace("/\[QUOTE\=(.+?)\](.*?)\[\/QUOTE\]/is", "", $Quote['Post']);
	$Quote['TimeStamp'] = GMTimeChange("F j, Y, g:i a",$Quote['TimeStamp'],$YourOffSet);
	$QuoteReply = "[QUOTE=".$User1Name." @ ".$Quote['TimeStamp']."]".$Quote['Post']."[/QUOTE][BR]\r\n"; }
	?>	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><?php/*<div align="center">*/?>
<?php/*<div align="center">
 <center>*/?>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <?php require( './misc/SmileTable.php'); ?>
   <td width="72%">	<?php require( './misc/Buttons.php'); ?>
<?php if ($Groups['Can_make_replys']=="yes") { ?>
<script type="test/javascript" language="javascript">
<!-- /* Form validation script by Prather Production, written by Michael Prather.  Visit http://www.pratherproductions.com */
function CheckForms(Reply)
{

  if (Reply.YourName.value == "")
  {
    alert("<?php echo $lang2['you need user name']; ?>");
    Reply.YourName.focus();
	return (false);
     }

  if (Reply.YourPost.value == "")
  {
    alert("<?php echo $lang2['you need a post']; ?>");
    Reply.YourPost.focus();
	return (false);
     }
  
  return (true);
  }
  //-->
  </script>
	<form method=post name="Reply" onSubmit=" return CheckForms(this)" action="?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=Send">
	<?php if ($_SESSION['MemberName']==null) { ?>
	<label for="YourName"><?php echo $lang2['your name']; ?></label><br />
	<input type="text" name="YourName" id="YourName" class="TextBox" value="<?php echo "$HTTP_COOKIE_VARS[YourNameis]"; ?>"><br />
	<?php } ?>
	<label for="YourPost"><?php echo $lang2['your post']; ?></label><br />
	<textarea rows="5" name="YourPost" id="YourPost" cols="28" class="TextBox"><?php echo stripcslashes($QuoteReply); ?></textarea><br />
	<?php if ($_GET['QuoteID']==null) { ?>
	<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" checked /><label for="LineBreaks1" title="<?php echo $lang2['use to put linebreaks']; ?>"><?php echo $lang2['auto linebreaks mode']; ?></label> 
    <input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" /><label for="LineBreaks2" title="<?php echo $lang2['use if you are making table/list']; ?>"><?php echo $lang2['raw linebreaks mode']; ?></label><br /><?php } 
    if ($_GET['QuoteID']!=null) { ?>
	<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" /><label for="LineBreaks1" title="<?php echo $lang2['use to put linebreaks']; ?>"><?php echo $lang2['auto linebreaks mode']; ?></label> 
    <input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" checked /><label for="LineBreaks2" title="<?php echo $lang2['use if you are making table/list']; ?>"><?php echo $lang2['raw linebreaks mode']; ?></label><br /><?php } ?>
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="CatID" value="<?php echo $_GET['CatID']; ?>" />
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="ForumID" value="<?php echo $_GET['ForumID']; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="TopicID" value="<?php echo $TopicID; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="PostID" value="<?php echo $PostID; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="YourDate" value="<?php echo GMTimeSend(null); ?>">
	<label for="LastReply"><?php echo $lang2['your last reply was']; ?></label><br />
	<textarea rows="2" name="LastReply" id="LastReply" cols="28" class="TextBox" readonly><?php echo "$HTTP_COOKIE_VARS[LastReply]"; ?></textarea><br />
	<input type="submit" value="<?php echo $lang2['post reply']; ?>" class="Button"><input type="reset" value="<?php echo $lang2['reset reply']; ?>" class="Button">
	</form></td>
  </tr>
 </table>
 <?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
<?php/* </center>
</div>*/?>
</TD>
		<?php echo $TableEnd; ?>
	<?php } } }
	if ($_GET['act']=="Create") {
		if ($TopicStat==1) {
			echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['the topic is closed']."</strong><br />"; }	 }
	if ($Groups['Can_make_replys']=="no") {
		if ($_GET['act']=="Create") {
		$_GET['act'] = "View";
		echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need to be member to post']." <a href='Members.php?act=Signup' title='".$lang2['signup']."'>".$lang2['signup']."</a>. ^_^</strong><br />"; }	 }
	if ($_GET['act']=="Send") {
		if ($TopicStat==1) {
			echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['the topic is closed']."</strong><br />"; }	 }
	if ($Groups['Can_make_replys']=="no") {
		if ($_GET['act']=="Send") {
		$_GET['act'] = "View";
		echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need to be member to post']." <a href='Members.php?act=Signup' title='".$lang2['signup']."'>".$lang2['signup']."</a>. ^_^</strong><br />"; }	 }
	if ($_POST['YourPost']==null) {
		if ($_GET['act']=="Send") {
		$_GET['act'] = "View";
		echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need to have a reply']."</strong><br />";
		?></body></html><?php
		exit(); } }
	if ($_GET['act']=="Send") {
		if ($TopicStat==0) {
		require( './misc/HTMLTags.php');
		if($Groups['Can_dohtml']=="no") {
		$_POST['YourPost'] = preg_replace("/\[DoHTML\]/isxS", "&#91;dohtml&#93;", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\[\/DoHTML\]/isxS", "&#91;&#47;dohtml&#93;", $_POST['YourPost']); }
		//setcookie("LastReply");
		$SetYourPost = $_POST['YourPost'];
		//setcookie("LastReply", $SetYourPost, time() + (7 * 86400) );
		$YourIDNew = $_SESSION['UserID'];
		if($YourIDNew==0) { $YourOldID=$YourIDNew; $YourIDNew=2; $IDChange="Yes"; }
		$query = "INSERT INTO ".$TablePreFix."Posts VALUES (null,".$_POST['TopicID'].",".$_POST['ForumID'].",".$_GET['CatID'].",".$YourIDNew.",'".$_POST['YourName']."',".$_POST['YourDate'].",'".$_POST['YourPost']."','".$_SERVER['REMOTE_ADDR']."')";
		if($IDChange=="Yes") { $YourIDNew=$YourOldID; }
		mysql_query($query);
		$query="UPDATE ".$TablePreFix."Topics SET LastUpdate=".$_POST['YourDate']." WHERE id=".$_POST['TopicID']."";
        mysql_query($query);
		$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
        if ($row[0]==$_SESSION['UserID']) {
        $OldUserid=$row[0];
		$NewPostCount=$row[14]+1; } }
		$NewUserIP = $_SERVER['REMOTE_ADDR'];
		$NewLastActive = GMTimeSend(null);
		$query="UPDATE ".$TablePreFix."Members SET LastActive=".$NewLastActive.",PostCount=".$NewPostCount.",IP='".$NewUserIP."' WHERE id=".$OldUserid."";
        mysql_query($query);
		echo "<meta	http-equiv='Refresh' Content='0; URL=Topic.php?id=".$_POST['TopicID']."&amp;ForumID=".$_POST['ForumID']."&amp;CatID=".$_GET['CatID']."&amp;act=View'>"; } }
	if ($_GET['act']=="Edit") {
		if ($TopicStat==0) {
	$topic_query2 = mysql_query("SELECT TopicName FROM ".$TablePreFix."Topics WHERE (ID=".$_GET['id'].") AND (CategoryID=".$_GET['CatID'].")");
    $Topic = mysql_fetch_array($topic_query2);
	$query="SELECT * FROM ".$TablePreFix."Posts";
	$result=mysql_query($query);
	$num=mysql_num_rows($result);
	$TopicID=$_GET['id'];
	$PostID=$num+1;
	$ForumID=$_GET['ForumID']+0;
	if ($_GET['EditID']!=null) {
	$edit_query = mysql_query("SELECT * FROM ".$TablePreFix."Posts WHERE (ID=".$_GET['EditID'].")");
	$Edit = mysql_fetch_array($edit_query);
	$result2 = mysql_query("SELECT * FROM ".$TablePreFix."Members");
	while ($row = mysql_fetch_array($result2, MYSQL_NUM)) {
        $User1ID=$Edit['UserID'];
		$ThisUserID = $_SESSION['UserID'];
		if ($row[0]==$User1ID) {
        $User1Name = $row[1];
        $User1Email = $row[3];
        $User1Signature = $row[10];
        $User1Avatar = $row[11];
		$User1AvatarSize = $row[12];
        $User1Website = $row[13]; }	 } }
        $HTML1 = array("<(", ")>", '|"|', "<br />");
	    $HTML2 = array("<", ">", '"', "");
		$AvatarSize=explode("x", $User1AvatarSize);
		$AvatarSizeW=$AvatarSize[0];
		$AvatarSizeH=$AvatarSize[1];
		$Edit['Post'] = preg_replace("/\<br \/>\r\n\<br \/>\r\n\<span class=\"EditReply\"\>This post has been edited by \<b\>(.+?)\<\/b> on (.+?)\<\/span>/is", "", $Edit['Post']);
		$Edit['Post'] = str_replace($HTML1, $HTML2, $Edit['Post']);
	if ($User1ID!=$ThisUserID||$Groups['Can_edit_replys']=="no") {
		$_GET['act'] = "View";
		echo "Please fix the following errors: <br />\n<strong>You can not Edit this Reply. ^_^</strong><br />";
		?></body></html><?php
		exit(); }
	?>	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><?php/*<div align="center">*/?>
	<?php/*<div align="center
 <center>*/?>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <?php require( './misc/SmileTable.php'); ?>
   <td width="72%"><?php require( './misc/Buttons.php'); ?>
<?php if ($Groups['Can_edit_replys']=="yes"||$Groups['Can_make_replys']=="yes") { ?>
<script type="test/javascript" language="javascript">
<!-- /* Form validation script by Prather Production, written by Michael Prather.  Visit http://www.pratherproductions.com */
function CheckForms(Reply)
{

  if (Reply.YourName.value == "")
  {
    alert("<?php echo $lang2['you need user name']; ?>");
    Reply.YourName.focus();
	return (false);
     }

  if (Reply.YourPost.value == "")
  {
    alert("<?php echo $lang2['you need a post']; ?>");
    Reply.YourPost.focus();
	return (false);
     }
  
  return (true);
  }
  //-->
  </script>
	<form method=post name="Reply" onSubmit=" return CheckForms(this)" action="?id=<?php echo $_GET['id'] ?>&amp;ForumID=<?php echo $_GET['ForumID'] ?>&amp;CatID=<?php echo $_GET['CatID'] ?>&amp;act=EditReply">
	<?php if ($_SESSION['MemberName']==null) { ?>
	<label for="YourName"><?php echo $lang2['your name']; ?></label><br />
	<input type="text" name="YourName" id="YourName" class="TextBox" value="<?php echo $User1Name; ?>"><br />
	<?php } ?>
	<label for="YourPost"><?php echo $lang2['your post']; ?></label><br />
	<textarea rows="5" name="YourPost" id="YourPost" cols="28" class="TextBox"><?php echo stripcslashes($Edit['Post']); ?></textarea><br />
	<input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks1" value="Auto" checked /><label for="LineBreaks1" title="<?php echo $lang2['use to put linebreaks']; ?>"><?php echo $lang2['auto linebreaks mode']; ?></label> 
    <input type="radio" class="TextBox" name="LineBreaks" id="LineBreaks2" value="Raw" /><label for="LineBreaks2" title="<?php echo $lang2['use if you are making table/list']; ?>"><?php echo $lang2['raw linebreaks mode']; ?></label><br /> 
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="ForumID" value="<?php echo  $Edit['ForumID']; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="TopicID" value="<?php echo $Edit['TopicID']; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="PostID" value="<?php echo $Edit['ID']; ?>">
	<input type="hidden" class="HiddenTextBox" style="display: none;" name="YourDate" value="<?php echo GMTimeSend(null); ?>">
	<label for="LastReply"><?php echo $lang2['your last reply']; ?></label><br />
	<textarea rows="2" name="LastReply" id="LastReply" cols="28" class="TextBox" readonly><?php echo "$HTTP_COOKIE_VARS[LastReply]"; ?></textarea><br />
	<input type="submit" value="Edit Reply" class="Button"><input type="reset" value="Reset Reply" class="Button">
	</form></td>
  </tr>
 </table>
 <?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
<?php/* </center>
</div>*/?>
		<?php echo $TableEnd; ?><?php } } }
	if ($_GET['act']=="Edit") {
		if ($TopicStat==1) {
			echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['the topic is closed']."</strong><br />"; }	 }
	if ($_GET['act']=="EditReply") {
		if ($TopicStat==1) {
			echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['the topic is closed']."</strong><br />"; }	 }
	if ($Groups['Can_edit_replys']=="no"||$Groups['Can_make_replys']=="no") {
		if ($_GET['act']=="EditReply") {
		$_GET['act'] = "View";
		echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need to be member to post']." <a href='Members.php?act=Signup' title='".$lang2['signup']."'>".$lang2['signup']."</a>'. ^_^</strong><br />"; }	 }
	if ($Groups['Can_edit_replys']=="no"||$Groups['Can_make_replys']=="no") {
		if ($_GET['act']=="EditReply") {
		$_GET['act'] = "View";
		echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need to be member to post']." <a href='Members.php?act=Signup' title='".$lang2['signup']."'>".$lang2['signup']."</a>'. ^_^</strong><br />"; }	 }
	if ($_POST['YourPost']==null) {
		if ($_GET['act']=="EditReply") {
		$_GET['act'] = "View";
		echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['you need a post']."</strong><br />";
		?></body></html><?php
		exit(); } }
	if ($_GET['act']=="EditReply") {
	if ($User1ID!=$ThisUserID) {
		$_GET['act'] = "View";
		echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['cant edit reply']."</strong><br />";
		?></body></html><?php
		exit(); } }
	if ($_GET['act']=="EditReply") {
		if ($TopicStat==0) {
		require( './misc/HTMLTags.php');
		if($Groups['Can_dohtml']=="no") {
		$_POST['YourPost'] = preg_replace("/\[DoHTML\]/isxS", "&#91;dohtml&#93;", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\[\/DoHTML\]/isxS", "&#91;&#47;dohtml&#93;", $_POST['YourPost']); }
		//setcookie("LastReply");
		$SetYourPost = $_POST['YourPost'];
		//setcookie("LastReply", $SetYourPost, time() + (7 * 86400) );
		$YourIDNew = $_SESSION['UserID'];
		$PostEditTime = GMTimeGet("F j, Y, g:i a",$YourOffSet);
		$YourPost = $_POST['YourPost']."<br />\r\n<br />\r\n<span class=\"EditReply\">This post has been edited by <b>".$_SESSION['MemberName']."</b> on ".$PostEditTime."</span>";
		$query="UPDATE ".$TablePreFix."Posts SET Post='".$YourPost."' WHERE ID=".$_POST['PostID']."";
		mysql_query($query);
		$result = mysql_query("SELECT * FROM ".$TablePreFix."Members");
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
        if ($row[0]==$_SESSION['UserID']) {
        $OldUserid=$row[0];
		$NewPostCount=$row[14]; } }
		$NewUserIP = $_SERVER['REMOTE_ADDR'];
		$NewLastActive = GMTimeSend(null);
		$query="UPDATE ".$TablePreFix."Members SET LastActive='".$NewLastActive."',PostCount=".$NewPostCount.",IP='".$NewUserIP."' WHERE id=".$OldUserid."";
        mysql_query($query);
		echo "<meta	http-equiv='Refresh' Content='0; URL=Topic.php?id=".$_GET['id']."&amp;ForumID=".$_GET['ForumID']."&amp;CatID=".$_GET['CatID']."&amp;act=View'>"; } }
if ($_GET['act']=="View") {
	if ($Number=="") {
		echo "<meta	http-equiv='Refresh' Content='0; URL=index.php?act=View'>"; } }
		?><?php
if ($_GET['act']=="TopicStats") {
function Stats($PreFix,$TableName)
{
	$query="SELECT * FROM ".$PreFix.$TableName."";
    $result=mysql_query($query);
	$number=mysql_num_rows($result);
	return $number;
}
$query="SELECT * FROM ".$TablePreFix."Posts WHERE TopicID=".$_GET['id']." AND ForumID=".$_GET['ForumID']."";
$result=mysql_query($query);
$NumberPosts=mysql_num_rows($result);
$result=mysql_query($query);
$NumberTags=mysql_num_rows($result);
$NumberTags=Stats($TablePreFix,"TagBoard");
$NumberMembers=Stats($TablePreFix,"Members");
$NumberPMs=Stats($TablePreFix,"Messenger");
?>	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><?php/*<div align="center">*/?>
<div align="center">
<table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
 <th><?php echo $Forum['Name']; ?> Topic Stats</td>
  <th>How Many</td>
  </tr>
   <tr>
 <td><span class="ForumText">Forum Number</span></td>
  <td><span class="ForumText"><?php echo $_GET['ForumID'] ?></span></td>
  </tr>
   <tr>
 <td><span class="ForumText">Topic Number</span></td>
  <td><span class="ForumText"><?php echo $_GET['id'] ?></span></td>
  </tr>
   <tr>
 <td><span class="ForumText">Number of Posts in Topic</span></td>
  <td><span class="ForumText"><?php echo $NumberPosts ?></span></td>
  </tr>
  <tr>
 <td><span class="ForumText">Number of Tags</span></td>
  <td><span class="ForumText"><?php echo $NumberTags ?></span></td>
  </tr>
  <td class="ForumTable2"><span class="ForumText">Number of Members</span></td>
  <td class="ForumTable2"><span class="ForumText"><?php echo $NumberMembers ?></span></td>
  </tr>
  <tr>
 <td class="ForumTable2"><span class="ForumText">Number of PMs Sent</span></td>
  <td class="ForumTable2"><span class="ForumText"><?php echo $NumberPMs ?></span></td>
  </tr>
   </table>
</div>
</TD>
		<?php echo $TableEnd; ?>
<br />
<?php }
$status = explode('  ', mysql_stat($StatSQL));
require( './misc/Footer.php');
mysql_close();
?>
</body></html>