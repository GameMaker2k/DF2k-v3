<?php
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/TagBoard.php');
$StatSQL = mysql_connect($mysqlhost,$username,$password,null,'MYSQL_CLIENT_COMPRESS')or die(mysql_error());
@mysql_select_db($database) or die( "Unable to select database");
//Count the number of MySQL Queries	Part 1
function cnt_mysql_query($sql=FALSE)
{
static $queries = 0;
if (!$sql)
return $queries;
$queries ++;
//return mysql_query($sql);
} ?><title><?php echo $BoardName ?> <?php echo $lang['powered by tb2k']; ?><?php echo $_SESSION['DF2kPreVer']; ?></title><?php
//This is Where You Put The Name of This File and Your Board Name
$filename="TagBoard";
$boardname=$BoardName;
?>
<meta name="generator" content="Edit Plus v2.12">
<meta name="author" content="Cool Dude 2k">
<meta name="copyright" content="Game Maker 2k&copy; 2004">
<meta name="keywords" content="Tag Boards 2k, TB2k, <?php echo $BoardName ?>, <?php echo $KeyWords ?>">
<meta name="description" content="<?php echo $Description ?>">
</head>
<?php
if ($_GET['Backwards']=="Yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="yes") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="on") {
	echo "\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']!="on") {
    echo "\n<body>"; }
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
<div align="center"><a href="./index.php?act=View" title="<?php echo $BoardName; ?> <?php echo $lang['powered by tb2k']; ?><?php echo $_SESSION['DF2kPreVer']; ?>"><img src="Skin/Skin<?php echo $_SESSION["Skin"] ?>/Logo.png" width="730" height="100" border="0" alt="<?php echo $BoardName; ?> <?php echo $lang['powered by tb2k']; ?><?php echo $_SESSION['DF2kPreVer']; ?>" /></a>
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
if ($_GET['act']=="Stats") {
	$_GET['act']="BoardStats"; }
if ($_GET['act']=="TagBoardStats") {
	$_GET['act']="BoardStats"; }
if ($_GET['act']=="BoardStats") {
	echo '<meta	http-equiv="Refresh" Content="0; URL=index.php?act=BoardStats">'; }
if ($_GET['act']=="") {
 $_GET['act']="View"; } 
	if ($Groups['Can_make_replys']=="yes") {
		if ($_GET['act']=="Send") {
		$_GET['act'] = "View";
		echo "".$lang2['please fix the errors']." <br />\n<strong>".$lang2['need to be a Member to post tag']." <a href='Members.php?act=Signup' title='".$lang2['signup']."'>".$lang2['signup']."</a>'. ^_^</strong><br />"; }	 }
?><?php
if ($_GET['act']=="Create") {
	if ($Groups['Can_make_replys']=="yes") {
$YourName = $_POST['yourname'];
$YourEmail = $_POST['youremail'];
$YourPost = $_POST['yourtext'];
require( './misc/HTMLTags.php');
$_POST['YourName'] = $YourName;
$_POST['YourEmail'] = $YourEmail;
$_POST['YourPost'] = $YourPost;
if($Groups['Can_dohtml']=="no") {
$_POST['YourPost'] = preg_replace("/\[DoHTML\]/isxS", "&#91;dohtml&#93;", $_POST['YourPost']);
$_POST['YourPost'] = preg_replace("/\[\/DoHTML\]/isxS", "&#91;&#47;dohtml&#93;", $_POST['YourPost']); }
$YourIDNew = $_SESSION['UserID'];
if($YourIDNew==0) { $YourOldID=$YourIDNew; $YourIDNew=2; $IDChange="Yes"; }
$query = "INSERT INTO ".$TablePreFix.$filename." VALUES (null,".$YourIDNew.",'".$_POST['YourName']."','".$_POST['YourPost']."')";
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
		echo "<meta	http-equiv='Refresh' Content='0; URL=".$filename.".php?act=View'>";
		} }
?>
	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5>
<div align="center">
<center>
<?php if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
<table border="1" cellpadding="2" cellspacing="3" width="100%">
<?php
$query="SELECT * FROM ".$TablePreFix.$filename."";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$IDT=mysql_result($result,$i,"ID");
$UsersID=mysql_result($result,$i,"UserID");
$GuestName=mysql_result($result,$i,"GuestName");
$Post=mysql_result($result,$i,"Post");
$post['Post'] = $Post;
require( './misc/BBTags.php');
$result2 = mysql_query("SELECT * FROM ".$TablePreFix."Members");
		while ($row = mysql_fetch_array($result2, MYSQL_NUM)) {
        if ($row[0]==$UsersID) {
        $User1Name = $row[1];
        $User1Email = $row[3];
        $User1Signature = $row[9];
        $User1Avatar = $row[10];
        $User1Website = $row[11];
		if($User1Name=="Guest") { $User1Name=$GuestName; }  }	 }
?>
<tr><td width="100%"><a id="Reply<?php echo $IDT ?>" name="Reply<?php echo $IDT ?>"><!--<?php echo $lang2['reply number']; ?> <?php echo $ID ?>.--></a><b><a href="Members.php?act=Profile&amp;id=<?php echo $UsersID ?>" title="<?php echo $lang2['view users profile']; ?>"><?php echo $User1Name ?></a></b>: <?php echo $Post ?></td></tr>
<?php
++$i; 
} 
$querys="SELECT * FROM ".$TablePreFix.$filename."";
	$results=mysql_query($querys);
	$nums=mysql_num_rows($results);
	$numss=$num-1;
	$TagID=mysql_result($result,$numss,"id");
$NextID = $TagID+1; ?>
</table>
</center>
</div>
<?php if ($Groups['Can_make_replys']=="yes") { ?>
<div align="center">
 <center>
 <table border="1" cellpadding="2" cellspacing="3" width="100%">
  <tr>
   <td width="28%"><script type="text/javascript">
<!-- /* Form validation script by Prather Production, written by Michael Prather.  Visit http://www.pratherproductions.com */
function CheckForms(TagBoard)
{

  if (TagBoard.yourname.value == "")
  {
    alert("<?php echo $lang2['you need a user name']; ?>");
    TagBoard.yourname.focus();
	return (false);
     }

  if (TagBoard.yourtext.value == "")
  {
    alert("<?php echo $lang2['you need a post']; ?>");
    TagBoard.yourtext.focus();
	return (false);
     }
  
  return (true);
  }
  //-->
  </script>
   <form method="post" name="TagBoard" onsubmit=" return CheckForms(this)" action="?act=Create" id="TagBoard">
      <div align="center">
		<?php if ($_SESSION['MemberName']==null) { ?>
        <label for="yourname"><?php echo $lang2['your name']; ?></label><br />
         <INPUT TYPE="text" NAME="yourname" id="yourname"  value="<?php echo "$HTTP_COOKIE_VARS[YourNameis]"; ?>" class="TextBox"><br /><?php } ?>
        <label for="yourtext"><?php echo $lang2['your post']; ?></label><br>
		<input type="text" name="yourtext" id="yourtext" class="TextBox"><br>
        <input type="hidden" class="HiddenTextBox" style="display: none;" name="IDT" value="<?php echo $NextID; ?>"> <input type="hidden" class="HiddenTextBox" style="display: none;" name="act" value="Create"> <input type="submit" value="Send Post" class="Button"><input type="reset" class="Button">
      </div>
    </form></td>
  </tr>
 </table>
 <?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
 </center>
</div>
<?php }	?>
		<?php echo $TableEnd; ?><br /><?php 
$status = explode('  ', mysql_stat($StatSQL));
//Count the number of MySQL Queries	Part 2
$sql= "SELECT 8+9";
cnt_mysql_query($sql);
$result = cnt_mysql_query('SELECT 4*12');
cnt_mysql_query('SELECT 78+5');
$QueriesUsed = ' ' . cnt_mysql_query() . ' Queries Used'; 
$Random404 = rand(0, 7);
?>
<div class="copyright"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=GM2kTagBoard" title="Tag Boards 2k">Tag Boards 2k</a> <?php echo $_SESSION['DF2kVer']; ?><?php echo $_SESSION['DF2kPreVer']; ?> &copy; is Copyright of <a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=GM2kSite" title="Game Maker 2k">Game Maker 2k&copy;</a>
<?php
$endtime = microtime();
$endarray = explode(" ", $endtime);
$endtime = $endarray[1] + $endarray[0];
$totaltime = $endtime - $starttime; 
$totaltime = round($totaltime,5);
echo "<br />The page loaded in $totaltime seconds. ".$status[$Random404]."";
?> <br /><a href="<?php echo $_SERVER['PHP_SELF']; ?>?act=PHP" title="Powered by PHP" target="_blank"><img src="<?php echo $_SERVER['PHP_SELF']; ?>?act=PHPLogo" width="80" height="15" border="0" alt="Powered by PHP" /></a>
<?php mysql_close(); ?><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></div>
</body></html>