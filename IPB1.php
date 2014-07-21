<?php
$_SESSION["Skin"]="1";
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/IPB1.php');?>
<title><?php echo $lang2['IPB to DF2k']; ?> <?php echo $_SESSION['DF2kPreVer']; ?></title>
<center><a href="./install.php" title="<?php echo $lang2['instaling df2k']; ?> <?php echo $_SESSION['DF2kPreVer']; ?>"><img src="Skin/Skin1/Logo.png" width="730" height="100" border="0" alt="<?php echo $lang2['instaling df2k']; ?> <?php echo $_SESSION['DF2kPreVer']; ?>" /></a></center><br />
<?php
if ($_GET['act']!="Install_Board") {?>
<TABLE WIDTH="720" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0">
	<TR>
		<TD COLSPAN="2">
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_04.png" WIDTH="21" HEIGHT="21" ALT=""></TD>
		<TD COLSPAN="3" valign="middle" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_05.png);"><a href="./install.php" title="<?php echo $lang['install DF2k']; ?>"><?php echo $lang['install DF2k']; ?></a></TD>
		<TD COLSPAN="2" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_06.png);"></TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5><div align="center">
<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="28%">	
   <p><?php echo $lang2['convert IPB to DF2K on sever']; ?></p>
<form method="POST" action="IPB1.php?act=Install_Board">
<p><label for="NewBoardName"><?php echo $lang2['insert board name']; ?></label><br>
<input type="text" name="NewBoardName" class="TextBox" id="NewBoardName" size="20"><br>
<label for="DatabaseName"><?php echo $lang2['insert database name']; ?></label><br>
<input type="text" name="DatabaseName" class="TextBox" id="DatabaseName" size="20"><br>
<label for="DatabaseUserName"><?php echo $lang2['insert database user name']; ?></label><br>
<input type="text" name="DatabaseUserName" class="TextBox" id="DatabaseUserName" size="20"><br>
<label for="DatabasePassword"><?php echo $lang2['insert database password']; ?></label><br>
<input type="password" name="DatabasePassword" class="TextBox" id="DatabasePassword" size="20"><br>
<label for="tableprefix"><?php echo $lang2['insert table prefix']; ?></label><br>
<input type="text" name="tableprefix" class="TextBox" id="tableprefix" value="DF2k_" size="20"><br>
<label for="ipbtableprefix"><?php echo $lang2['insert IPB prefix']; ?></label><br>
<input type="text" name="ipbtableprefix" class="TextBox" id="ipbtableprefix" value="ibf_" size="20"><br>
<label for="DatabaseHost"><?php echo $lang2['insert database host']; ?></label><br>
<input type="text" name="DatabaseHost" class="TextBox" id="DatabaseHost" size="20"
value="localhost"><br>
<!--<label for="LogoFile">Insert a Where Logo File is:</label><br>
<input name="LogoFile" class="TextBox" id="LogoFile" size="20" value="./Pics/Logo.png"><br>-->
 <input type="submit" class="Button" value="Install Board" name="Install_Board"><input type="reset"
value="Reset Form" class="Button" name="Reset_Form"></p>
</form>
</td>
  </tr>
 </table>
 </center>
</div>
</TD>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_10.png);">&nbsp;</TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_11.png" WIDTH="720" HEIGHT="22" ALT=""></TD>
	</TR>
	<TR>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="13" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="8" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="356" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="161" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="76" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="92" HEIGHT="1" ALT=""></TD>
		<TD>
			<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/spacer.png" WIDTH="14" HEIGHT="1" ALT=""></TD>
	</TR>
</TABLE>
<?php }
if ($_GET['act']=="Install_Board") {
$StatSQL = mysql_connect($_POST['DatabaseHost'],$_POST['DatabaseUserName'],$_POST['DatabasePassword']);
@mysql_select_db($_POST['DatabaseName']) or die( "Unable to select database");
$query="CREATE TABLE `".$_POST['tableprefix']."Categorys` ( `ID` bigint(25) NOT NULL auto_increment, `Name` varchar(150) NOT NULL default '', `ShowCategory` varchar(5) NOT NULL default '', `InSubForum` bigint(25) NOT NULL default '0', `Description` text NOT NULL, PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Forums` ( `ID` bigint(25) NOT NULL auto_increment, `CategoryID` bigint(25) NOT NULL default '0', `Name` varchar(150) NOT NULL default '', `ShowForum` varchar(5) NOT NULL default '', `ForumType` varchar(15) NOT NULL default '', `InSubForum` bigint(25) NOT NULL default '0', `Description` text NOT NULL, PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Help` ( `ID` bigint(25) NOT NULL default '0', `HelpName` text NOT NULL, `HelpText` text NOT NULL);";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Events` ( `ID` bigint(25) NOT NULL auto_increment, `UserID` bigint(25) NOT NULL default '0', `EventName` varchar(150) NOT NULL default '', `EventText` text NOT NULL, `EventMouth` bigint(5) NOT NULL default '0', `EventMouthEnd` bigint(5) NOT NULL default '0', `EventDay` bigint(5) NOT NULL default '0', `EventDayEnd` bigint(5) NOT NULL default '0', `EventYear` bigint(5) NOT NULL default '0', `EventYearEnd` bigint(5) NOT NULL default '0', PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Members` ( `id` bigint(25) NOT NULL auto_increment, `Name` varchar(150) NOT NULL default '', `Password` varchar(150) NOT NULL default '', `Email` varchar(150) NOT NULL default '', `Group` varchar(150) NOT NULL default '', `Interests` varchar(150) NOT NULL default '', `Title` varchar(150) NOT NULL default '', `Joined` bigint(25) NOT NULL default '0', `LastActive` bigint(25) NOT NULL default '0', `Signature` text NOT NULL default '', `Avatar` varchar(150) NOT NULL default '', `Website` varchar(150) NOT NULL default '', `PostCount` bigint(25) NOT NULL default '0', `TimeZone` varchar(5) NOT NULL default '0', `IP` varchar(20) NOT NULL default '', PRIMARY KEY  (`id`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Messenger` ( `id` bigint(25) NOT NULL auto_increment, `SenderID` bigint(25) NOT NULL default '0', `PMSentID` bigint(25) NOT NULL default '0', `MessageTitle` varchar(150) NOT NULL default '', `MessageText` text NOT NULL, `DateSend` bigint(25) NOT NULL default '0', `Read` bigint(5) NOT NULL default '0', PRIMARY KEY  (`id`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Posts` ( `ID` bigint(25) NOT NULL auto_increment, `TopicID` bigint(25) NOT NULL default '0', `ForumID` bigint(25) NOT NULL default '0', `CategoryID` bigint(25) NOT NULL default '0', `UserID` bigint(25) NOT NULL default '0', `GuestName` varchar(150) NOT NULL default '', `TimeStamp` bigint(25) NOT NULL default '0', `Post` text NOT NULL, PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Smiles` ( `ID` bigint(25) NOT NULL auto_increment, `FileName` text NOT NULL, `SmileName` text NOT NULL, `SmileText` text NOT NULL, `Directory` text NOT NULL, `Show` varchar(15) NOT NULL default '', PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."TagBoard` ( `ID` bigint(25) NOT NULL auto_increment, `UserID` bigint(25) NOT NULL default '0', `GuestName` varchar(150) NOT NULL default '', `Post` text NOT NULL, PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$MyDay = GMTimeGet("d",$YourOffSet);
$MyMonth = GMTimeGet("m",$YourOffSet);
$MyYear = GMTimeGet("Y",$YourOffSet);
$MyYear10 = $MyYear+10;
$query = "INSERT INTO ".$_POST['tableprefix']."Events VALUES (1, 1, 'Opening', 'This is the day the Board was made. ^_^', $MyMonth, $MyMonth, $MyDay, $MyDay, $MyYear, $MyYear10)";
$result = mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Members` ( `id` bigint(25) NOT NULL auto_increment, `Name` varchar(150) NOT NULL default '', `Password` varchar(150) NOT NULL default '', `Email` varchar(150) NOT NULL default '', `Group` varchar(150) NOT NULL default '', `WarnLevel` bigint(10) NOT NULL default '0', `Interests` varchar(150) NOT NULL default '', `Title` varchar(150) NOT NULL default '', `Joined` bigint(25) NOT NULL default '0', `LastActive` bigint(25) NOT NULL default '0', `Signature` text NOT NULL, `Avatar` varchar(150) NOT NULL default '', `AvatarSize` varchar(10) NOT NULL default '', `Website` varchar(150) NOT NULL default '', `PostCount` bigint(25) NOT NULL default '0', `TimeZone` varchar(5) NOT NULL default '0', `IP` varchar(20) NOT NULL default '', PRIMARY KEY  (`id`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Topics` ( `ID` bigint(25) NOT NULL auto_increment, `ForumID` bigint(25) NOT NULL default '0', `CategoryID` bigint(25) NOT NULL default '0', `UserID` bigint(25) NOT NULL default '0', `GuestName` varchar(150) NOT NULL default '', `TimeStamp` bigint(25) NOT NULL default '0', `LastUpdate` bigint(25) NOT NULL default '0', `TopicName` varchar(150) NOT NULL default '', `Pinned` bigint(5) NOT NULL default '0', `Closed` bigint(5) NOT NULL default '0', PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."UserOnline` ( `id` bigint(25) NOT NULL auto_increment, `MemberID` bigint(25) NOT NULL default '0', `Name` varchar(150) NOT NULL default '', `Group` varchar(150) NOT NULL default '', `SessionID` varchar(150) NOT NULL default '', `IP` varchar(20) NOT NULL default '', `WebBrowser` varchar(150) NOT NULL default '', `LastActive` varchar(150) NOT NULL default '', PRIMARY KEY  (`id`));";
$result=mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."TagBoard VALUES (1,1,'Invision Power Board Team','Welcome to Your New Tag Board. ^_^')"; 
$result = mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."Help VALUES (1,'How to Make a Topic', 'To Make a New Topic Click on The Create New Topic Link.')"; 
$result = mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."Help VALUES (2,'How to Make a Post','To Make a Reply Click on Topic You Want to Rely to and Click on Reply to Topic Link.')";
$result = mysql_query($query);
$query = "INSERT INTO `".$_POST['tableprefix']."Smiles` (`ID`, `FileName`, `SmileName`, `SmileText`, `Directory`, `Show`) VALUES (1, 'happy.gif', 'Happy', '^_^', 'smiles/', 'Yes'), (2, 'wink.gif', 'Wink', ';)', 'smiles/', 'Yes'), (3, 'tongue.gif', 'Tongue', ':P', 'smiles/', 'Yes'), (4, 'biggrin.gif', 'Biggrin', ':D', 'smiles/', 'Yes'), (5, 'laugh.gif', 'lol', ':lol:', 'smiles/', 'Yes'), (6, 'cool.gif', 'Cool', 'B)', 'smiles/', 'Yes'), (7, 'sleep.gif', 'Sleep', '-_-', 'smiles/', 'Yes'), (8, 'smile.gif', 'Happy', ':)', 'smiles/', 'Yes'), (9, 'sad.gif', 'Sad', ':(', 'smiles/', 'Yes'), (10, 'angry.gif', 'Angry', ':angry:', 'smiles/', 'Yes'), (11, 'huh.gif', 'huh', ':huh:', 'smiles/', 'Yes'), (12, 'ohmy.gif', 'ohmy', ':o', 'smiles/', 'Yes'), (13, 'rolleyes.gif', 'Rolleyes', ':rolleyes:', 'smiles/', 'Yes'), (14, 'unsure.gif', 'Unsure', ':unsure:', 'smiles/', 'Yes'), (15, 'blink.gif', 'Blink', ':blink:', 'smiles/', 'Yes'), (16, 'ph34r.gif', 'Ph34r', ':ph34r:', 'smiles/', 'Yes'), (17, 'blush.gif', 'Blush', ':blush:', 'smiles/', 'Yes'), (18, 'closedeyes.gif', 'Closedeyes', ':closedeyes:', 'smiles/', 'Yes'), (19, 'excl.gif', 'Excl', ':excl:', 'smiles/', 'Yes'), (20, 'glare.gif', 'Glare', ':glare:', 'smiles/', 'Yes'), (21, 'mellow.gif', 'Mellow', ':mellow:', 'smiles/', 'Yes'), (22, 'ninja.gif', 'Ninja', ':ninja:', 'smiles/', 'Yes'), (23, 'wacko.gif', 'Wacko', ':wacko:', 'smiles/', 'Yes'), (24, 'wub.gif', 'Love', ':wub:', 'smiles/', 'Yes'), (25, 'dry.gif', 'Mad', ':dry:', 'smiles/', 'Yes'), (26, 'w00t.gif', 'w00t', ':w00t:', 'smiles/', 'Yes'), (27, '2guns.gif', '2 Guns', ':2guns:', 'smiles/', 'Yes'), (28, 'bandana.gif', 'Blue Bandana', ':bandana:', 'smiles/', 'Yes'), (29, 'innocent.gif', 'Innocent', ':innocent:', 'smiles/', 'Yes'), (30, 'mad.gif', 'Mad', ':mad:', 'smiles/', 'Yes'), (31, 'thumbsup.gif', 'Thumbsup', ':thumbsup:', 'smiles/', 'Yes'), (32, 'thumbsup2.gif', 'Thumbsup', ':thumbsup2:', 'smiles/', 'Yes'), (33, 'tongue.gif', 'Tongue', ':P', 'smiles/', 'No');";
$result = mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."Help VALUES (3,'How to Use BBCodes', 'Put [B]Then Your Text Here and[/B] to Close it<br />\r\nHere are other BBCodes You Can Use<br />\r\n[B]Text[/B]<br />\r\n[I]Text[/I]<br />\r\n[U]Text[/U]<br />\r\n[S]Text[/S]<br />\r\n[H1]Text[/H1]<br />\r\n[H6]Text[/H6]<br />\r\n[URL=URL Here]Website Name[/URL]<br />\r\n[EMAIL=Your Email]Yourr Email[/H6]<br />\r\n[CODE]Code Here[/CODE]<br />\r\n[PHP]PHP Code here[/PHP]<br />\r\n[HTML]HTML Code Here[/HTML]<br />\r\n[SQL]SQL Code here[/SQL]<br />\r\n[QUOTE]Your QUOTE here[/QUOTE]<br />\r\n[QUOTE=UserName to QUOTE]Your QUOTE here[/QUOTE]<br />')";
$result = mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."Help VALUES (4,'How to Use Smiles.', 'To Use Smiles Put in :) is <img src=\"smiles/smile.png\" border=\"0\" alt=\"Happy\" /> or :D is <img src=\"smiles/biggrin.png\" border=\"0\" alt=\"Biggrin\" /><br />\r\n<br />Smile List<br />\r\n^_^ is <img src=\"smiles/happy.png\" border=\"0\" alt=\"Happy\" /><br />\r\n;) is <img src=\"smiles/wink.png\" border=\"0\" alt=\"Wink\" /><br />\r\n:P is <img src=\"smiles/tongue.png\" border=\"0\" alt=\"Tongue\" /><br />\r\n:D is <img src=\"smiles/biggrin.png\" border=\"0\" alt=\"Biggrin\" /><br />\r\n:lol: is <img src=\"smiles/laugh.png\" border=\"0\" alt=\"lol\" /><br />\r\nB) is <img src=\"smiles/cool.png\" border=\"0\" alt=\"Cool\" /><br />\r\n-_- is <img src=\"smiles/sleep.png\" border=\"0\" alt=\"Sleep\" /><br />\r\n:) is <img src=\"smiles/smile.png\" border=\"0\" alt=\"Happy\" /><br />\r\n:( is <img src=\"smiles/sad.png\" border=\"0\" alt=\"Sad\" /><br />\r\n:angry: is <img src=\"smiles/angry.png\" border=\"0\" alt=\"Angry\" /><br />\r\n:huh: is <img src=\"smiles/huh.png\" border=\"0\" alt=\"huh\" /><br />\r\n:o is <img src=\"smiles/ohmy.png\" border=\"0\" alt=\"ohmy\" /><br />\r\n:rolleyes: is <img src=\"smiles/rolleyes.png\" border=\"0\" alt=\"Rolleyes\" /><br />\r\n:unsure: is <img src=\"smiles/unsure.png\" border=\"0\" alt=\"Unsure\" /><br />\r\n:blink: is <img src=\"smiles/blink.png\" border=\"0\" alt=\"Blink\" /><br />\r\n:ph34r: is <img src=\"smiles/ph34r.png\" border=\"0\" alt=\"Ph34r\" /><br />\r\n:blush: is <img src=\"smiles/blush.png\" border=\"0\" alt=\"Blush\" /><br />\r\n:closedeyes: is <img src=\"smiles/closedeyes.png\" border=\"0\" alt=\"Closedeyes\" /><br />\r\n:excl: is <img src=\"smiles/excl.png\" border=\"0\" alt=\"Excl\" /><br />\r\n:glare: is <img src=\"smiles/glare.png\" border=\"0\" alt=\"Glare\" /><br />\r\n:mellow: is <img src=\"smiles/mellow.png\" border=\"0\" alt=\"Mellow\" /><br />\r\n:ninja: is <img src=\"smiles/ninja.png\" border=\"0\" alt=\"Ninja\" /><br />\r\n:wacko: is <img src=\"smiles/wacko.png\" border=\"0\" alt=\"Wacko\" /><br />\r\n:wub: is <img src=\"smiles/wub.png\" border=\"0\" alt=\"Love\" /><br />\r\n:dry: is <img src=\"smiles/dry.png\" border=\"0\" alt=\"Mad\" /><br />\r\n:mad: is <img src=\"smiles/mad.png\" border=\"0\" alt=\"Mad\" /><br />\r\n')";
$result = mysql_query($query);
$query="SELECT * FROM ".$_POST['ipbtableprefix']."categories";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$CategoryID=mysql_result($result,$i,"id");
$CategoryName=mysql_result($result,$i,"name");
$CategoryDescription=mysql_result($result,$i,"description");
$num2 = $num-1;
if ($i>=$num2) {
	$Next=","; }
if ($i<=$num) {
	$Next=";"; }
if ($CategoryID!=-1) {
$querys = "INSERT INTO `".$_POST['tableprefix']."Categorys` VALUES (".$CategoryID.", '".$CategoryName."', 'Yes', 0, '".$CategoryDescription."')".$Next;
$results = mysql_query($querys); }
++$i; } 
$query="SELECT * FROM ".$_POST['ipbtableprefix']."forums";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$ForumID=mysql_result($result,$i,"id");
$CategoryID=mysql_result($result,$i,"category");
$ForumName=mysql_result($result,$i,"name");
$ForumDescription=mysql_result($result,$i,"description");
$num2 = $num-1;
if ($i>=$num2) {
	$Next=","; }
if ($i<=$num) {
	$Next=";"; }
$querys = "INSERT INTO `".$_POST['tableprefix']."Forums` VALUES (".$ForumID.", ".$CategoryID.", '".$ForumName."', 'Yes', 'Forum', 0, '".$ForumDescription."')".$Next;
$results = mysql_query($querys);
++$i; }
$query="SELECT * FROM ".$_POST['ipbtableprefix']."members";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$MemberID=mysql_result($result,$i,"id");
$MemberName=mysql_result($result,$i,"name");
$MemberPassword=mysql_result($result,$i,"password");
$MemberEmail=mysql_result($result,$i,"email");
$MemberJoined=mysql_result($result,$i,"joined");
$MemberLastActive=mysql_result($result,$i,"last_activity");
$MemberIP=mysql_result($result,$i,"ip_address");
$MemberAvatar=mysql_result($result,$i,"avatar");
$MemberAvatarSize=mysql_result($result,$i,"avatar_size");
$MemberSignature=mysql_result($result,$i,"signature");
$MemberWebsite=mysql_result($result,$i,"website");
$MemberTitle=mysql_result($result,$i,"title");
$MemberInterests=mysql_result($result,$i,"interests");
$MemberWarnLevel=mysql_result($result,$i,"warn_level");
$MemberPosts=mysql_result($result,$i,"msg_total");
$MemberTimeZone=mysql_result($result,$i,"time_offset");
$num2 = $num-1;
if ($MemberName=="Guest") {
	$MemberGroup="Guest"; }
if ($MemberName=="Guest") {
	$MemberID=2; }
if ($MemberID==1) {
	$MemberGroup="Admin"; }
if ($MemberID!=1) {
	if ($MemberName!="Guest") {
	$MemberGroup="Member"; } }
if ($MemberTimeZone==NULL) {
	$MemberTimeZone=0; }
if ($MemberPosts==NULL) {
	$MemberPosts=0; }
if ($i>=$num2) {
	$Next=","; }
if ($i<=$num) {
	$Next=";"; }
$querys = "INSERT INTO `".$_POST['tableprefix']."Members` VALUES (".$MemberID.", '".$MemberName."', '".sha1($MemberPassword)."', '".$MemberEmail."', '".$MemberGroup."', ".$MemberWarnLevel.", '".$MemberInterests."', '".$MemberTitle."', ".$MemberJoined.", ".$MemberLastActive.", '".$MemberSignature."', '".$MemberAvatar."', '".$MemberAvatarSize."', '".$MemberWebsite."', ".$MemberPosts.", '".$MemberTimeZone."', '".$MemberIP."')".$Next;
$results = mysql_query($querys);
++$i; } 
$query="SELECT * FROM ".$_POST['ipbtableprefix']."messages";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$PMID=mysql_result($result,$i,"msg_id");
$PMSentDay=mysql_result($result,$i,"msg_date");
$PMTitle=mysql_result($result,$i,"title");
$PMText=mysql_result($result,$i,"message");
$PMSender=mysql_result($result,$i,"member_id");
$PMReceiver=mysql_result($result,$i,"recipient_id");
$num2 = $num-1;
if ($i>=$num2) {
	$Next=","; }
if ($i<=$num) {
	$Next=";"; }
$querys = "INSERT INTO `".$_POST['tableprefix']."Messenger` VALUES (".$PMID.", ".$PMSender.", ".$PMReceiver.", '".$PMTitle."', '".$PMText."', ".$PMSentDay.",0)".$Next;
$results = mysql_query($querys);
++$i; } 
$query="SELECT * FROM ".$_POST['ipbtableprefix']."topics";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$ID=mysql_result($result,$i,"tid");
$ForumID=mysql_result($result,$i,"forum_id");
$UserID=mysql_result($result,$i,"starter_id");
$StartName=mysql_result($result,$i,"starter_name");
$TimeStamp=mysql_result($result,$i,"start_date");
$LastUpdate=mysql_result($result,$i,"last_post");
$TopicName=mysql_result($result,$i,"title");
$PinTopic=mysql_result($result,$i,"pinned");
$Topicstate=mysql_result($result,$i,"state");
$num2 = $num-1;
$topic_query = mysql_query("SELECT category FROM ".$_POST['ipbtableprefix']."forums WHERE (id=".$ForumID.")");
$CatID = mysql_fetch_array($topic_query);
if ($Topicstate=="open") {
	$Topicstate=0; }
if ($Topicstate=="closed") {
	$Topicstate=1; }
if ($UserID==-1) {
	$UserID=1; }
if ($i>=$num2) {
	$Next=","; }
if ($i<=$num) {
	$Next=";"; }
$querys = "INSERT INTO `".$_POST['tableprefix']."Topics` VALUES (".$ID.", ".$ForumID.", ".$CatID['category'].", ".$UserID.", '".$StartName."', ".$TimeStamp.", ".$LastUpdate.", '".$TopicName."', ".$PinTopic.", ".$Topicstate.")".$Next;
$results = mysql_query($querys);
++$i; } 
$query="SELECT * FROM ".$_POST['ipbtableprefix']."posts";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$ID=mysql_result($result,$i,"pid");
$TopicID=mysql_result($result,$i,"topic_id");
$ForumID=mysql_result($result,$i,"forum_id");
$UserID=mysql_result($result,$i,"author_id");
$StartName=mysql_result($result,$i,"author_name");
$TimeStamp=mysql_result($result,$i,"post_date");
$PostReply=mysql_result($result,$i,"post");
$num2 = $num-1;
$topic_query = mysql_query("SELECT category FROM ".$_POST['ipbtableprefix']."forums WHERE (id=".$ForumID.")");
$CatID = mysql_fetch_array($topic_query);
if ($UserID==-1) {
	$UserID=1; }
if ($i>=$num2) {
	$Next=","; }
if ($i<=$num) {
	$Next=";"; }
$querys = "INSERT INTO `".$_POST['tableprefix']."Posts` VALUES (".$ID.", ".$TopicID.", ".$ForumID.", ".$CatID['category'].", ".$UserID.", '".$StartName."', ".$TimeStamp.", '".$PostReply."')".$Next;
$results = mysql_query($querys);
++$i; } 
$BoardSettings="<?php\r\n\$Settings['sql_host'] = '".$_POST['DatabaseHost']."';\r\n\$Settings['sql_database'] = '".$_POST['DatabaseName']."';\r\n\$Settings['sql_tableprefix'] = '".$_POST['tableprefix']."';\r\n\$Settings['sql_username']	= '".$_POST['DatabaseUserName']."';\r\n\$Settings['sql_password']	= '".$_POST['DatabasePassword']."';\r\n\$Settings['admin_password'] = '".$_POST['AdminPasswords']."';\r\n\$Settings['board_name'] = '".$_POST['NewBoardName']."';\r\n\$Settings['board_keywords'] = '".$_POST['BoardKeywords']."';\r\n\$Settings['board_description'] = '".$_POST['BoardDescription']."';\r\n\$Settings['board_html']	= '".$_POST['DOHTMLs']."';\r\n\$Settings['board_logo']	= './Skin/Skin1/Logo.png';\r\n\$Settings['board_offline'] = '".$_POST['BoardOffline']."';\r\n?>";
$fp = fopen("./Settings.php","w+");
fwrite($fp, $BoardSettings);
fclose($fp);
echo '<meta	http-equiv="Refresh" Content="0; URL=index.php?id=View">';
}
?>