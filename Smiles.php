<?php
require( './Settings.php');
$username=$Settings['sql_username'];
$password=$Settings['sql_password'];
$database=$Settings['sql_database'];
$TablePreFix=$Settings['sql_tableprefix'];//Is the PreFix Name of the Table
$mysqlhost=$Settings['sql_host'];//Might be localhost
$File1Name = dirname($_SERVER['PHP_SELF'])."/";
$File2Name = $_SERVER['PHP_SELF'];
$File3Name=str_replace($File1Name, null, $File2Name);
if ($File3Name=="Smiles.php") {
	echo "<title>".$File3Name." (PHP File)</title>\n\r<b>Warning</b>: Failed to open stream: Permission denied in <b>".$File3Name."</b> on line <b>1</b>!<br />";
	exit(); }
mysql_connect($mysqlhost,$username,$password)or die(mysql_error());
@mysql_select_db($database)or die(mysql_error());
$queryTest="SELECT * FROM ".$TablePreFix."Smiles";
$resultTest=mysql_query($queryTest);
$numTest=mysql_num_rows($resultTest);
$iTest=0;
while ($iTest < $numTest) {
$FileName=mysql_result($resultTest,$iTest,"FileName");
$SmileName=mysql_result($resultTest,$iTest,"SmileName");
$SmileText=mysql_result($resultTest,$iTest,"SmileText");
$SmileDirectory=mysql_result($resultTest,$iTest,"Directory");
$ShowSmile=mysql_result($resultTest,$iTest,"Show");
$Smile1 = array($SmileText);
$Smile2 = array('<img src="'.$SmileDirectory.''.$FileName.'" style="vertical-align:middle" border="0" title="'.$SmileName.'" alt="'.$SmileName.'" />');
$_GET['YourPost']=str_replace($Smile1, $Smile2, $_GET['YourPost']);
++$iTest; }
?>