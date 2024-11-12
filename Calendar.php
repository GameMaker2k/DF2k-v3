<?php
require( './misc/banned.php');
require( './MySQL.php');
require('./lang/en/NavBar.php');
require('./lang/en/Calendar.php');
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
<link rel="alternate" type="application/rss+xml" title="Forum Events RSS Feed" href="misc/RSS4.php?offset=<?php echo $_SESSION['UserTimeZone']; ?>">
<?php
$_GET['HighligtDay'] = (int) $_GET['HighligtDay'];
if ($_GET['act']==null) {
$_GET['act']='View'; }
if ($_GET['act']=="View") {
echo '<title>'.$BoardName.' '.$TitleLine.' '.$lang2['viewing calendar'].' '.$TitleLine.' '.GMTimeGet('F dS, Y',$YourOffSet).'</title>'; }
//date('F j, Y')
?></head><?php
if ($_GET['Backwards']=="Yes") {
	echo "\r\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="yes") {
	echo "\r\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']=="on") {
	echo "\r\n<body dir=\"rtl\">"; }
if ($_GET['Backwards']!="on") {
    echo "\r\n<body>"; }
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
		<TD COLSPAN="3" valign="middle" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_05.png);" class="navbar"><?php if ($_SESSION['BotName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['BotName'] ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']!=null) { ?><?php echo $lang['logged in']; ?><a href="Members.php?act=Profile&amp;id=ShowMe" title="<?php echo $lang['view your profile']; ?>"><?php echo $_SESSION['MemberName'] ?></a>	<span class="style1">/ </span><a href="Members.php?act=Logout" title="<?php echo $lang['logout']; ?>"><?php echo $lang['logout']; ?></a>	<span class="style1">/ </span><?php } if($Groups['Can_pm']=="yes") { ?><a href="Messenger.php?act=View" title="Goto MailBox"><?php echo $lang['mailbox']; ?></a><a title="<?php echo $lang['new pms 1']; ?><?php echo $PMNumber; ?><?php echo $lang['new pms 2']; ?>">(<?php echo $PMNumber; ?>)</a>	<span class="style1">/ </span><?php } if ($Groups['Has_mod_cp']=="yes"&&$Groups['Has_admin_cp']=="no") {?><a href="Mod/Login.php?act=Login" title="<?php echo $lang['goto mod tools']; ?>"><?php echo $lang['mod cp']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Has_admin_cp']=="yes") {?><a href="Admin/Login.php?act=Login" title="<?php echo $lang['goto admin cp']; ?>"><?php echo $lang['admin cp']; ?></a>	<span class="style1">/ </span><?php } if ($_SESSION['MemberName']==null) { ?><a href="Members.php?act=Login" title="<?php echo $lang['login']; ?>"><?php echo $lang['login']; ?></a>	<span class="style1">/ </span><a href="Members.php?act=Signup" title="<?php echo $lang['register']; ?>"><?php echo $lang['register']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_add_events']=="yes") { ?><a href="Event.php?act=Create" title="<?php echo $lang['create new event']; ?>"><?php echo $lang['new event']; ?></a>	<span class="style1">/ </span><?php } if ($Groups['Can_add_events']=="no") { ?><!--<a href="Event.php?act=Create" title="<?php echo $lang['create new event']; ?>">--><span title="<?php echo $lang['not member event error']; ?>"><?php echo $lang['new event']; ?></span><!--</a>-->	<span class="style1">/ </span><?php } ?><a href="Help.php?act=View" title="<?php echo $lang['help files']; ?>"><?php echo $lang['help']; ?></a>	<span class="style1">/ </span><a href="Calendar.php?act=View" title="<?php echo $lang['view calendar']; ?>"><?php echo $lang['calendar']; ?></a>	<span class="style1">/ </span><a href="TagBoard.php?act=View" title="<?php echo $lang['goto tag boards']; ?>"><?php echo $lang['tag board']; ?></a></TD>
		<TD COLSPAN="2" style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_06.png);"></TD>
	</TR>
	<TR>
		<TD COLSPAN=7>
		<IMG SRC="Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_07.png" WIDTH="720" HEIGHT="24" ALT=""></TD>
	</TR>
<?php
// Count the Days in this month
$CountDays = GMTimeGet("t",$YourOffSet);
$MyDay = GMTimeGet("d",$YourOffSet);
$MyDay2 = GMTimeGet("dS",$YourOffSet);
$MyDayName = GMTimeGet("l",$YourOffSet);
$MyYear = GMTimeGet("Y",$YourOffSet);
$MyMonth = GMTimeGet("m",$YourOffSet);
$MyMonthName = GMTimeGet("F",$YourOffSet);
$FirstDayThisMouth = date("w", mktime(0, 0, 0, $MyMonth, 1, $MyYear));
$query="SELECT * FROM ".$TablePreFix."Events WHERE (EventMouth<=".$MyMonth." and EventMouthEnd>=".$MyMonth." and EventYear<=".$MyYear." and EventYearEnd>=".$MyYear.") ORDER BY ID";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$is=0;
while ($is < $num) {
$EventID=mysql_result($result,$is,"ID");
$EventUser=mysql_result($result,$is,"UserID");
$EventName=mysql_result($result,$is,"EventName");
$EventText=mysql_result($result,$is,"EventText");
$EventMouth=mysql_result($result,$is,"EventMouth");
$EventMouthEnd=mysql_result($result,$is,"EventMouthEnd");
$EventDay=mysql_result($result,$is,"EventDay");
$EventDayEnd=mysql_result($result,$is,"EventDayEnd");
$EventYear=mysql_result($result,$is,"EventYear");
$EventYearEnd=mysql_result($result,$is,"EventYearEnd");
if ($EventsName[$EventDay] != null) {
	$EventsName[$EventDay] .= ",\n\r<a href=\"Event.php?act=Event&amp;id=".$EventID."\" style=\"font-size: 9px;\" title=\"View Event ".$EventName.".\">".$EventName."</a>";	 }
if ($EventsName[$EventDay] == null) {
	$EventsName[$EventDay] = "<a href=\"Event.php?act=Event&amp;id=".$EventID."\" style=\"font-size: 9px;\" title=\"View Event ".$EventName.".\">".$EventName."</a>"; }
if ($EventDay<$EventDayEnd) {
$NextDay = $EventDay+1;
$EventDayEnd = $EventDayEnd+1;
while ($NextDay < $EventDayEnd) {
if ($EventsName[$NextDay] != null) {
	$EventsName[$NextDay] .= ",\n\r<a href=\"Event.php?act=Event&amp;id=".$EventID."\" style=\"font-size: 9px;\" title=\"View Event ".$EventName.".\">".$EventName."</a>";	 }
if ($EventsName[$NextDay] == null) {
	$EventsName[$NextDay] = "<a href=\"Event.php?act=Event&amp;id=".$EventID."\" style=\"font-size: 9px;\" title=\"View Event ".$EventName.".\">".$EventName."</a>"; }
$NextDay++; } }
$EventsID[$EventDay] = $EventID;
$is++;
}
$MyDays = array();
$MyDays[] = $lang2['sunday'];
$MyDays[] = $lang2['monday'];
$MyDays[] = $lang2['tuesday'];
$MyDays[] = $lang2['wednesday'];
$MyDays[] = $lang2['thursday'];
$MyDays[] = $lang2['friday'];
$MyDays[] = $lang2['saturday'];
$DayNames = "";
foreach ($MyDays as $x => $y) {
    $DayNames .= '<th width="12%" title="' . $y . '">' . $y . '</th>'."\r\n";
}
$WeekDays = "";
$i = $FirstDayThisMouth + 1;
if ($FirstDayThisMouth != "0") {
    $WeekDays .= '<td align="center" colspan="' . $FirstDayThisMouth . '">&nbsp;</td>'."\r\n";
}
$Day_i = "1";
$ii = $i;
for ($i; $i <= ($CountDays + $FirstDayThisMouth) ;$i++) {
if ($ii == 8) {
$WeekDays .= "</tr><tr>"."\r\n";
$ii = 1; }
 if ($MyDay == $Day_i) {
$Extra = 'class="MenuTable3"'; }
else {
$Extra = 'class="MenuTable2"'; }
if ($Day_i != $_GET['HighligtDay']) {
if ($Day_i != $MyDay) {
$WeekDays .= '<td height="65" class="NonHighlight" width="12%" title="'.$lang2['mouse over day'].' ' . $Day_i . '" valign="top"><a href="Calendar.php?act=View&amp;HighligtDay=' . $Day_i . '" title="'.$lang2['highligt day'].' ' . $Day_i . '">' . $Day_i . '</a><div align="left">' . $EventsName[$Day_i] . '</div></td>'."\r\n";	 }	}
if ($Day_i == $MyDay) {
	if ($Day_i != $_GET['HighligtDay']) {
$WeekDays .= '<td height="65" bgcolor="#606060" class="TodayHighlight" width="12%" title="'.$lang2['today is'].' ' . date('dS') . '" valign="top"><a href="Calendar.php?act=View&amp;HighligtDay=' . $Day_i . '" title="'.$lang2['highligt day'].' ' . $Day_i . '">' . $Day_i . '</a><div align="left">' . $EventsName[$Day_i] . '</div></td>'."\r\n";	 }	 }
if ($Day_i == $_GET['HighligtDay']) {
$WeekDays .= '<td height="65" bgcolor="#404040" class="ClickHighlight" width="12%" title="'.$lang2['day'].' ' . $Day_i . ' '.$lang2['is highligted'].'" valign="top">' . $Day_i . '<div align="left">' . $EventsName[$Day_i] . '</div></td>'."\r\n";	 }
$Day_i++;
$ii++;
}
if ((8 - $ii) >= "1") {
$WeekDays .= '<td align="center" colspan="' . (8 - $ii) . '">&nbsp;</td>'."\r\n"; } ?>
	<TR>
		<TD style="background-image: url(Skin/Skin<?php echo $_SESSION["Skin"] ?>/index_08.png);">&nbsp;</TD>
		<TD COLSPAN=5>
<?php if ($Google['ads']==true) {
	if ($Google['adsTop']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<script type="text/javascript" src="misc/show_ads.js"></script>
</td></tr></table>
<?php echo "\n\r"; } } ?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr>
<th width="60%" title="<?php echo "Today is ".$MyDayName." the ".$MyDay2." of ".$MyMonthName.", ".$MyYear; ?>" colspan="7"><?php echo "Today is ".$MyDayName." the ".$MyDay2." of ".$MyMonthName.", ".$MyYear; ?></th>
<th width="40%" title="<?php echo "The time is ".GMTimeGet('g:i a',$YourOffSet); ?>" colspan="7"><?php echo "The time is ".GMTimeGet('g:i a',$YourOffSet); ?></th>
</tr></table>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr>
<?php echo $DayNames; ?>
</tr><tr>
<?php echo $WeekDays; ?>
</tr></table>
<?php if ($Google['ads']==true) {
	if ($Google['adsBottom']==true) {?>
<table align="center" border="1" cellpadding="2" cellspacing="3" width="100%"><tr><td>
<div style="text-align: center;"><script type="text/javascript" src="misc/show_ads.js"></script></div>
</td></tr></table>
<?php echo "\n\r"; } } ?>
</TD>
		<?php echo $TableEnd; ?>
<?php
$status = explode('  ', mysql_stat($StatSQL));
require( './misc/Footer.php');
mysql_close(); ?><center><!--<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img border="0" src="Pics/valid-html401.png" alt="Valid HTML 4.01!" title="Valid HTML 4.01!" style="border:0;width:88px;height:31px" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank"><img border="0" src="Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="border:0;width:88px;height:31px" /></a>--></center>
</body></html>