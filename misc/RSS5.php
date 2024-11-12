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
if ($_GET['id']==null) {
	$_GET['id']=0; }
if ($_GET['SubID']==null) {
	$_GET['SubID']=0; }
echo '<?xml version="1.0" encoding="iso-8859-15"?>'."\n\r";
$query="SELECT * FROM ".$Settings['sql_tableprefix']."Categorys WHERE (ShowCategory='Yes' and InSubForum=".$_GET['SubID'].") ORDER BY ID";
$preresult1=mysql_query($query);
$num=mysql_num_rows($preresult1);
$prei1=0;
while ($prei1 < $num) {
$CategoryID=mysql_result($preresult1,$prei1,"ID");
$CategoryName=mysql_result($preresult1,$prei1,"Name");
$CategoryShow=mysql_result($preresult1,$prei1,"ShowCategory");
$CategoryDescription=mysql_result($preresult1,$prei1,"Description");
$One = $One.'<rdf:li rdf:resource="'.$BoardURL.'Category.php?id='.$CategoryID.'&amp;SubID='.$_GET['SubID'].'"/>'."\n\r";
$Two = $Two.'<item>'."\n\r".'<title>'.$CategoryName.'</title>'."\n\r".'<description>'.$CategoryDescription.'</description>'."\n\r".'<link>'.$BoardURL.'Category.php?id='.$CategoryID.'&amp;SubID='.$_GET['SubID'].'</link>'."\n\r".'</item>'."\n\r";
++$prei1; } ?>
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">
  <channel>
   <title><?php echo $Settings['board_name']; ?></title>
   <description>RSS Feed of the Categorys on Board <?php echo $Settings['board_name']; ?></description>
   <link><?php echo $BoardURL; ?></link>
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