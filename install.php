<?php
require( './misc/banned.php');
$InstallCheck="Stop";
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/install.php');
if ($_GET['act']==null) {
	$_GET['act']="View"; }
if ($_GET['act']=="disable") { chmod("install.php",0600); }
if ($_GET['act']!="Install_Board") {
	?><title><?php echo $lang2['instaling df2k']; ?> <?php echo $_SESSION['DF2kPreVer']; ?></title>
<center><a href="./install.php" title="<?php echo $lang2['instaling df2k']; ?> Alpha 1"><img src="Skin/Skin1/Logo.png" width="730" height="100" border="0" alt="<?php echo $lang2['instaling df2k']; ?> Alpha 1" /></a></center><br />
<TABLE WIDTH="720" BORDER="0" align="center" CELLPADDING="0" CELLSPACING="0">
	<TR>
		<TD COLSPAN="2">
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_04.png" WIDTH="21" HEIGHT="21" ALT=""></TD>
		<TD COLSPAN="3" valign="middle" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_05.png);"><a href="./install.php" title="<?php echo $lang['install DF2k']; ?> <?php echo $_SESSION['DF2kPreVer']; ?>"><?php echo $lang['install DF2k']; ?> <?php echo $_SESSION['DF2kPreVer']; ?></a></TD>
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
   <td width="28%">	<p><?php echo $lang2['install df2k on sever']; ?></p>
<form method="POST" action="install.php?act=Install_Board">
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
<label for="DatabaseHost"><?php echo $lang2['insert database host']; ?></label><br>
<input type="text" name="DatabaseHost" class="TextBox" id="DatabaseHost" size="20"
value="localhost"><br>
<label for="AdminUser"><?php echo $lang2['insert admin user name']; ?></label><br>
<input type="text" name="AdminUser" class="TextBox" id="AdminUser" size="20"><br>
<label for="AdminPassword"><?php echo $lang2['insert admin password']; ?></label><br>
<input type="password" name="AdminPasswords" class="TextBox" id="AdminPassword" size="20"><br>
<label for="UseGzip">Do you want to GZip Pages(Faster Page Load and Less Bandwidth but more CPU Power)</label><br />
<select size="1" class="Menu" name="GZip" id="UseGzip">
<option selected value="false">Yes</option>
<option value="true">No</option>
</select><br>
<!--<label for="LogoFile"><?php echo $lang2['insert logo file']; ?></label><br>
<input name="LogoFile" class="TextBox" id="LogoFile" size="20" value="./Pics/Logo.png"><br>-->
 <input type="submit" class="Button" value="<?php echo $lang2['install board']; ?>" name="Install_Board"><input type="reset"
value="<?php echo $lang2['reset form']; ?>" class="Button" name="Reset_Form"></p>
</form></td>
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
</TABLE><?php }
if ($_GET['act']=="Install_Board") {
$checkfile="Settings.php";
if (!is_writable($checkfile)) {
   exit('Settings is not writable.');
   chmod($checkfile, 0755);
} else {
   // Settings.php is writable install DF2k. ^_^ 
}
$StatSQL = mysql_connect($_POST['DatabaseHost'],$_POST['DatabaseUserName'],$_POST['DatabasePassword']);
@mysql_select_db($_POST['DatabaseName']) or die( "Unable to select database");
$YourDate = GMTimeSend(null);
/* Fix The User Info for DF2k */
$_POST['NewBoardName'] = htmlentities($_POST['NewBoardName'], ENT_QUOTES);
$_POST['NewBoardName'] = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $_POST['NewBoardName']);
$_POST['AdminPassword'] = stripcslashes(htmlentities($_POST['AdminPassword'], ENT_QUOTES));
$_POST['AdminPassword'] = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $_POST['AdminPassword']);
$_POST['AdminUser'] = stripcslashes(htmlentities($_POST['AdminUser'], ENT_QUOTES));
$_POST['AdminUser'] = preg_replace("/\&amp;#(.*?);/is", "&#$1;", $_POST['AdminUser']);
/* We are done now with fixing the info. ^_^ */
$query="CREATE TABLE `".$_POST['tableprefix']."Categorys` ( `ID` bigint(25) NOT NULL auto_increment, `Name` varchar(150) NOT NULL default '', `ShowCategory` varchar(5) NOT NULL default '', `InSubForum` bigint(25) NOT NULL default '0', `Description` text NOT NULL, PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Forums` ( `ID` bigint(25) NOT NULL auto_increment, `CategoryID` bigint(25) NOT NULL default '0', `Name` varchar(150) NOT NULL default '', `ShowForum` varchar(5) NOT NULL default '', `ForumType` varchar(15) NOT NULL default '', `InSubForum` bigint(25) NOT NULL default '0', `Description` text NOT NULL, PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Help` ( `ID` bigint(25) NOT NULL default '0', `HelpName` text NOT NULL, `HelpText` text NOT NULL);";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Events` ( `ID` bigint(25) NOT NULL auto_increment, `UserID` bigint(25) NOT NULL default '0', `EventName` varchar(150) NOT NULL default '', `EventText` text NOT NULL, `EventMouth` bigint(5) NOT NULL default '0', `EventMouthEnd` bigint(5) NOT NULL default '0', `EventDay` bigint(5) NOT NULL default '0', `EventDayEnd` bigint(5) NOT NULL default '0', `EventYear` bigint(5) NOT NULL default '0', `EventYearEnd` bigint(5) NOT NULL default '0', PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
/*
$query="CREATE TABLE `".$_POST['tableprefix']."Members` ( `id` bigint(25) NOT NULL auto_increment, `Name` varchar(150) NOT NULL default '', `Password` varchar(150) NOT NULL default '', `Email` varchar(150) NOT NULL default '', `Group` varchar(150) NOT NULL default '', `Interests` varchar(150) NOT NULL default '', `Title` varchar(150) NOT NULL default '', `Joined` bigint(25) NOT NULL default '0', `LastActive` bigint(25) NOT NULL default '0', `Signature` text NOT NULL default '', `Avatar` varchar(150) NOT NULL default '', `Website` varchar(150) NOT NULL default '', `PostCount` bigint(25) NOT NULL default '0', `TimeZone` varchar(5) NOT NULL default '0', `IP` varchar(20) NOT NULL default '', PRIMARY KEY  (`id`));";
*/
$query="CREATE TABLE `".$_POST['tableprefix']."Members` ( `id` bigint(25) NOT NULL auto_increment, `Name` varchar(150) NOT NULL default '', `Password` varchar(150) NOT NULL default '', `Email` varchar(150) NOT NULL default '', `Group` varchar(150) NOT NULL default '', `WarnLevel` bigint(10) NOT NULL default '0', `Interests` varchar(150) NOT NULL default '', `Title` varchar(150) NOT NULL default '', `Joined` bigint(25) NOT NULL default '0', `LastActive` bigint(25) NOT NULL default '0', `Signature` text NOT NULL, `Avatar` varchar(150) NOT NULL default '', `AvatarSize` varchar(10) NOT NULL default '', `Website` varchar(150) NOT NULL default '', `PostCount` bigint(25) NOT NULL default '0', `TimeZone` varchar(5) NOT NULL default '0', `IP` varchar(20) NOT NULL default '', PRIMARY KEY  (`id`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Messenger` ( `id` bigint(25) NOT NULL auto_increment, `SenderID` bigint(25) NOT NULL default '0', `PMSentID` bigint(25) NOT NULL default '0', `MessageTitle` varchar(150) NOT NULL default '', `MessageText` text NOT NULL, `DateSend` bigint(25) NOT NULL default '0', `Read` bigint(5) NOT NULL default '0', PRIMARY KEY  (`id`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Posts` ( `ID` bigint(25) NOT NULL auto_increment, `TopicID` bigint(25) NOT NULL default '0', `ForumID` bigint(25) NOT NULL default '0', `CategoryID` bigint(25) NOT NULL default '0', `UserID` bigint(25) NOT NULL default '0', `GuestName` varchar(150) NOT NULL default '', `TimeStamp` bigint(25) NOT NULL default '0', `Post` text NOT NULL, `IP` varchar(20) NOT NULL default '', PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Smiles` ( `ID` bigint(25) NOT NULL auto_increment, `FileName` text NOT NULL, `SmileName` text NOT NULL, `SmileText` text NOT NULL, `Directory` text NOT NULL, `Show` varchar(15) NOT NULL default '', PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."TagBoard` ( `ID` bigint(25) NOT NULL auto_increment, `UserID` bigint(25) NOT NULL default '0', `GuestName` varchar(150) NOT NULL default '', `Post` text NOT NULL, PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
/*$query="CREATE TABLE `".$_POST['tableprefix']."Members` ( `id` bigint(25) NOT NULL auto_increment, `Name` varchar(150) NOT NULL default '', `Password` varchar(150) NOT NULL default '', `Email` varchar(150) NOT NULL default '', `Group` varchar(150) NOT NULL default '', `Interests` varchar(150) NOT NULL default '', `Title` varchar(150) NOT NULL default '', `Joined` bigint(25) NOT NULL default '0', `LastActive` bigint(25) NOT NULL default '0', `Signature` text NOT NULL, `Avatar` varchar(150) NOT NULL default '', `Website` varchar(150) NOT NULL default '', `PostCount` bigint(25) NOT NULL default '0', `TimeZone` varchar(5) NOT NULL default '0', `IP` varchar(20) NOT NULL default '', PRIMARY KEY  (`id`));";
$result=mysql_query($query);*/
$query="CREATE TABLE `".$_POST['tableprefix']."Topics` ( `ID` bigint(25) NOT NULL auto_increment, `ForumID` bigint(25) NOT NULL default '0', `CategoryID` bigint(25) NOT NULL default '0', `UserID` bigint(25) NOT NULL default '0', `GuestName` varchar(150) NOT NULL default '', `TimeStamp` bigint(25) NOT NULL default '0', `LastUpdate` bigint(25) NOT NULL default '0', `TopicName` varchar(150) NOT NULL default '', `Pinned` bigint(5) NOT NULL default '0', `Closed` bigint(5) NOT NULL default '0', PRIMARY KEY  (`ID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."UserOnline` ( `id` bigint(25) NOT NULL auto_increment, `MemberID` bigint(25) NOT NULL default '0', `Name` varchar(150) NOT NULL default '', `Group` varchar(150) NOT NULL default '', `SessionID` varchar(150) NOT NULL default '', `IP` varchar(20) NOT NULL default '', `WebBrowser` varchar(150) NOT NULL default '', `LastActive` varchar(150) NOT NULL default '', PRIMARY KEY  (`id`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Sessions` ( `SessionID` varchar(255) NOT NULL default '', `LastUpdated` datetime NOT NULL default '0000-00-00 00:00:00', `DataValue` text NOT NULL, PRIMARY KEY (`SessionID`));";
$result=mysql_query($query);
$query="CREATE TABLE `".$_POST['tableprefix']."Groups` ( `id` bigint(25) NOT NULL auto_increment, `Name` varchar(150) NOT NULL default '', `Name_prefix` varchar(150) NOT NULL default '', `Name_suffix` varchar(150) NOT NULL default '', `View_board` varchar(5) NOT NULL default '', `Edit_profile` varchar(5) NOT NULL default '', `Can_make_topics` varchar(5) NOT NULL default '', `Can_make_replys` varchar(5) NOT NULL default '', `Can_edit_replys` varchar(5) NOT NULL default '', `Can_delete_replys` varchar(5) NOT NULL default '', `Can_add_events` varchar(5) NOT NULL default '', `Can_pm` varchar(5) NOT NULL default '', `Can_dohtml` varchar(5) NOT NULL default '', `Promote_to` varchar(150) NOT NULL default '', `Promote_posts` bigint(25) NOT NULL default '0', `Has_mod_cp` varchar(5) NOT NULL default '', `Has_admin_cp` varchar(5) NOT NULL default '', PRIMARY KEY  (`id`));";
$result=mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."Groups (`id`, `Name`, `Name_prefix`, `Name_suffix`, `View_board`, `Edit_profile`, `Can_make_topics`, `Can_make_replys`, `Can_edit_replys`, `Can_delete_replys`, `Can_add_events`, `Can_pm`, `Can_dohtml`, `Promote_to`, `Promote_posts`, `Has_mod_cp`, `Has_admin_cp`) VALUES (1, 'Admin', '', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'none', 0, 'yes', 'yes'), (2, 'Moderator', '', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'none', 0, 'yes', 'no'), (3, 'Member', '', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'none', 0, 'no', 'no'), (4, 'Guest', '', '', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'none', 0, 'no', 'no'), (5, 'Banned', '', '', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'none', 0, 'no', 'no');"; 
$result = mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."TagBoard VALUES (1,2,'Cool Dude 2k','Welcome to Your New Tag Board. ^_^')"; 
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
//DROP TABLE `DF2k_Categorys`; DROP TABLE `DF2k_Events`; DROP TABLE `DF2k_Help`; DROP TABLE `DF2k_Forums`; DROP TABLE `DF2k_Members`; DROP TABLE `DF2k_Messenger`; DROP TABLE `DF2k_Posts`; DROP TABLE `DF2k_Sessions`; DROP TABLE `DF2k_Smiles`; DROP TABLE `DF2k_TagBoard`; DROP TABLE `DF2k_Topics`; DROP TABLE `DF2k_UserOnline`;
$query = "INSERT INTO ".$_POST['tableprefix']."Categorys VALUES (1,'Main','Yes',0,'The Main Category.')";
$result = mysql_query($query);
$MyDay = GMTimeGet("d",$YourOffSet);
$MyMonth = GMTimeGet("m",$YourOffSet);
$MyYear = GMTimeGet("Y",$YourOffSet);
$MyYear10 = $MyYear+10;
$query = "INSERT INTO ".$_POST['tableprefix']."Events VALUES (1, 1, 'Opening', 'This is the day the Board was made. ^_^', $MyMonth, $MyMonth, $MyDay, $MyDay, $MyYear, $MyYear10)";
$result = mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."Forums VALUES (-1,1,'-1 Forum','No','Forum',0,'This is The Forum With a ID of -1.')";
$result = mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."Forums VALUES (1,1,'Test/Spam','Yes','Forum',0,'A Test Board.')";
$result = mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."Topics VALUES (1,1,1,2,'Cool Dude 2k',$YourDate,$YourDate,'Welcome',1,1)";
$result = mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."Posts VALUES (1,1,1,1,2,'Cool Dude 2k',$YourDate,'Welcome to Your Message Board. :) ','127.0.0.1')"; 
$result = mysql_query($query);
$NewPassword = sha1(md5($_POST['AdminPasswords']));
$Name = stripcslashes(htmlentities($AdminUser, ENT_QUOTES));
$YourWebsite = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php?act=View";
$UserIP = $_SERVER['REMOTE_ADDR'];
$PostCount = 2;
$Email = "admin@".$_SERVER['HTTP_HOST'];
$AdminTime=SeverOffSet(null);
$query = "INSERT INTO ".$_POST['tableprefix']."Members VALUES (1,'".$_POST['AdminUser']."','".$NewPassword."','".$Email."','Admin',0,'".$Interests."','Admin',".$YourDate.",".$YourDate.",'".$NewSignature."','".$Avatar."','100x100','".$YourWebsite."',0,'".$AdminTime."','".$UserIP."')";
$result = mysql_query($query);
$GEmail = "Guest@".$_SERVER['HTTP_HOST'];
$query = "INSERT INTO ".$_POST['tableprefix']."Members VALUES (2,'Guest','".sha1(md5('Guest'))."','".$GEmail."','Guest',0,'Guest Account','Guest',".$YourDate.",".$YourDate.",'[B]Test[/B]','http://','100x100','http://".$_SERVER['HTTP_HOST']."',".rand(-50,50).",'".$AdminTime."','127.0.0.1')";
$result = mysql_query($query);
$MyInterests = "Playing Games, and Makeing Games, walching The Simpsons, Anime and Reading Anime and manga, php, html and Doing Other Cool Things, Making Discussion Forums 2k, and Tag Boards 2k, I love Renee Sabonis, and FireFox or Mozilla.";
$result = mysql_query($query);
$query = "INSERT INTO ".$_POST['tableprefix']."Messenger VALUES (1,2,1,'Test','Thuis is a Test PM. :P ',".$YourDate.",0)";
$result = mysql_query($query);
$CHMOD = $_SERVER['PHP_SELF'];
$url_this_dir = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php?act=View";
$YourIP = $_SERVER['REMOTE_ADDR'];
//chmod($CHMOD, 0600);
//chmod("install.php",0600);
//echo "<img src='http://gamemaker2k.xignahosting.com/GDTest/IP/DF2k.php?act=Install_Board&BoardName=".$NewBoardName."&UserName=".$DatabaseUserName."&BoardURL=".$url_this_dir."&TimeCreated=".$YourDate."&IP=".$YourIP."&AdminPass=".$NewPassword."' />";
$BoardSettings="<?php\n\$Settings['sql_host'] = '".$_POST['DatabaseHost']."';\n\$Settings['sql_database'] = '".$_POST['DatabaseName']."';\n\$Settings['sql_tableprefix'] = '".$_POST['tableprefix']."';\n\$Settings['sql_username']	= '".$_POST['DatabaseUserName']."';\n\$Settings['sql_password']	= '".$_POST['DatabasePassword']."';\n\$Settings['admin_password'] = '".$_POST['AdminPasswords']."';\n\$Settings['board_name'] = '".$_POST['NewBoardName']."';\n\$Settings['board_keywords'] = '".$_POST['BoardKeywords']."';\n\$Settings['board_description'] = '".$_POST['BoardDescription']."';\n\$Settings['board_html']	= '".$_POST['DOHTMLs']."';\n\$Settings['board_logo']	= './Skin/Skin1/Logo.png';\n\$Settings['board_offline'] = '".$_POST['BoardOffline']."';\n\$Settings['max_sig_size'] = 501;\n\$Settings['max_sig_size_admin'] = 2001;\n\$Settings['max_sig_size_moderator'] = 1001;\n\$Settings['max_sig_size_member'] = 501;\n\$Settings['max_pms'] = 0;\n\$Settings['google_ads'] = false;\n\$Settings['google_ads_top'] = false;\n\$Settings['google_ads_bottom'] = false;\n\$Settings['use_gd_register'] = false;\n\$Settings['use_gzip'] = ".$_POST['GZip'].";\n\$Settings['member_group'] = 'Member';\n\$Settings['guest_group'] = 'Guest';\n?>";
$fp = fopen("./Settings.php","w+");
fwrite($fp, $BoardSettings);
fclose($fp);
$_SESSION['MemberName']=$_POST['AdminUser'];
$_SESSION['UserID']=1;
$_SESSION['UserGroup']=Admin;
$_SESSION['UserTimeZone']=$AdminTime;
echo '<meta	http-equiv="Refresh" Content="0; URL=index.php?act=View">';
$status = explode('  ', mysql_stat($StatSQL));
mysql_close(); }
/*if ($_GET['act']!="Uninstall_Board") {
	$StatSQL = mysql_connect($_POST['DatabaseHost'],$_POST['DatabaseUserName'],$_POST['DatabasePassword']);
    @mysql_select_db($_POST['DatabaseName']) or die( "Unable to select database");
	if ($Settings['sql_tableprefix']==null) {
		$Settings['sql_tableprefix']=$_POST['tableprefix']; }
	$_POST['tableprefix']=$Settings['sql_tableprefix'];
	$query="DROP TABLE `".$_POST['tableprefix']."Categorys` ,`".$_POST['tableprefix']."Forums` ,`".$_POST['tableprefix']."Help` ,`".$_POST['tableprefix']."Members` ,`".$_POST['tableprefix']."Messenger` ,`".$_POST['tableprefix']."Posts` ,`".$_POST['tableprefix']."Smiles` ,`".$_POST['tableprefix']."TagBoard` ,`".$_POST['tableprefix']."Topics` ,`".$_POST['tableprefix']."UserOnline`";
   $result=mysql_query($query); }*/
?>