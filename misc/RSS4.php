<?php
require( '../Settings.php');
if ($Settings['use_gzip']==true) {
if($Settings['preinset']=="on") {
ini_set("zlib.output_compression","On");
ini_set("zlib.output_compression_level","2"); }
ob_start( 'ob_gzhandler' );	}
require( './banned.php');
$Stat2SQL = mysql_connect($Settings['sql_host'],$Settings['sql_username'],$Settings['sql_password'],null,'MYSQL_CLIENT_COMPRESS')or die(mysql_error());
@mysql_select_db($Settings['sql_database']) or die( "Unable to select database");
$BoardURL = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."";
$BoardURL = preg_replace("/misc/isxS", "", $BoardURL);
$Rand_Num = rand(1,20);
if ($Rand_Num<11) { header("Content-type: text/xml"); }
if ($Rand_Num>10) { header("Content-type: application/xml"); }
if ($act=="Download") {
header('Content-Disposition: attachment; filename="'.$Settings['board_name'].'.xml"'); }
function GMTimeChange($format,$timestamp,$offset)
{
$Time[Hour] = date("G",$timestamp);
$Time[Minute] = date("i",$timestamp);
$Time[Second] = date("s",$timestamp);
$Time[Month] = date("n",$timestamp);
$Time[Day] = date("j",$timestamp);
$Time[Year] = date("Y",$timestamp);
return gmdate($format,mktime($Time[Hour]+$offset,$Time[Minute]-1,$Time[Second],$Time[Month],$Time[Day],$Time[Year]));
}
function GMTimeSend($none)
{
return gmdate(mktime(date('H'),date('i'),date('s'),date('n'),date('j'),date('Y')));
}
function GMTimeGet($format,$offset)
{
$TimeFix	 = $FixMinute;
return gmdate($format,mktime(date('H')+$offset,date('i')-1,date('s'),date('n'),date('j'),date('Y')));
}
echo '<?xml version="1.0" encoding="iso-8859-15"?>'."\n\r";
$YourOffSet=$_GET['offset'];
$CountDays = GMTimeGet("t",$YourOffSet);
$MyDay = GMTimeGet("d",$YourOffSet);
$MyDay2 = GMTimeGet("dS",$YourOffSet);
$MyDayName = GMTimeGet("l",$YourOffSet);
$MyYear = GMTimeGet("Y",$YourOffSet);
$MyMonth = GMTimeGet("m",$YourOffSet);
$MyMonthName = GMTimeGet("F",$YourOffSet);
$FirstDayThisMouth = date("w", mktime(0, 0, 0, $MyMonth, 1, $MyYear));
$query="SELECT * FROM ".$Settings['sql_tableprefix']."Events WHERE (EventMouth<=".$MyMonth." and EventMouthEnd>=".$MyMonth." and EventYear<=".$MyYear." and EventYearEnd>=".$MyYear.") ORDER BY ID";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$EventID=mysql_result($result,$i,"ID");
$EventUser=mysql_result($result,$i,"UserID");
$EventName=mysql_result($result,$i,"EventName");
$EventText=mysql_result($result,$i,"EventText");
$EventMouth=mysql_result($result,$i,"EventMouth");
$EventMouthEnd=mysql_result($result,$i,"EventMouthEnd");
$EventDay=mysql_result($result,$i,"EventDay");
$EventDayEnd=mysql_result($result,$i,"EventDayEnd");
$EventYear=mysql_result($result,$i,"EventYear");
$EventYearEnd=mysql_result($result,$i,"EventYearEnd");
$One = $One.'<rdf:li rdf:resource="'.$BoardURL.'Event.php?id='.$EventID.'"/>'."\n\r";
$Two = $Two.'<item>'."\n\r".'<title>'.$EventName.'</title>'."\n\r".'<description>Event Starts at '.$EventMouth.'/'.$EventDay.'/'.$EventYear.' and ends at '.$EventMouthEnd.'/'.$EventDayEnd.'/'.$EventYearEnd.'</description>'."\n\r".'<link>'.$BoardURL.'Event.php?id='.$EventID.'</link>'."\n\r".'</item>'."\n\r";
++$i; } ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
  <channel>
   <title><?php echo $Settings['board_name']; ?></title>
   <link><?php echo $BoardURL; ?></link>
   <description>RSS Feed of the Events on Board <?php echo $Settings['board_name']; ?></description>
   <language>en-us</language>
   <generator>Edit Plus v2.12</generator>
   <copyright>Game Maker 2k© 2004</copyright>
   <ttl>120</ttl>  
   <doc>http://backend.userland.com/rss</doc>
   <image>
	<url><?php echo $BoardURL; ?>Pics/xml.gif</url>
	<title><?php echo $Settings['board_name']; ?></title>
	<link><?php echo $BoardURL; ?></link>
   </image>
 <?php echo "\n\r".$Two."\n\r"; ?></channel>
</rss>
<?php mysql_close(); ?>