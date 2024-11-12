<?php
$File1Name = dirname($_SERVER['PHP_SELF'])."/";
$File2Name = $_SERVER['PHP_SELF'];
$File3Name=str_replace($File1Name, null, $File2Name);
if ($File3Name=="SmileTable.php"||$File3Name=="/SmileTable.php") {
	echo "<title>".$File3Name." (PHP File)</title>\n\r<b>Warning</b>: Failed to open stream: Permission denied in <b>".$File3Name."</b> on line <b>1</b>!<br />";
	exit(); }?><td width="28%">
<div align="center">
 <center>
<?php
require( './Settings.php');
$username=$Settings['sql_username'];
$password=$Settings['sql_password'];
$database=$Settings['sql_database'];
$TablePreFix=$Settings['sql_tableprefix'];//Is the PreFix Name of the Table
$mysqlhost=$Settings['sql_host'];//Might be localhost
mysql_connect($mysqlhost,$username,$password)or die(mysql_error());
@mysql_select_db($database)or die(mysql_error());
$queryTest="SELECT * FROM ".$TablePreFix."Smiles WHERE `Show`='Yes'";
$resultTest=mysql_query($queryTest);
$numTest=mysql_numrows($resultTest);
$iTest=0;
$SmileRow=0;
while ($iTest < $numTest) {
$SmileID=mysql_result($resultTest,$iTest,"ID");
$FileName=mysql_result($resultTest,$iTest,"FileName");
$SmileName=mysql_result($resultTest,$iTest,"SmileName");
$SmileText=mysql_result($resultTest,$iTest,"SmileText");
$SmileDirectory=mysql_result($resultTest,$iTest,"Directory");
$ShowSmile=mysql_result($resultTest,$iTest,"Show");
$iTest2=$iTest+1;
$SmileRow=$SmileRow+1;
if ($iTest2==$numTest) {?>
<img src="<?php echo $SmileDirectory."".$FileName; ?>" alt="<?php echo $SmileName; ?>" title="<?php echo $SmileName; ?>" border="0" onClick="addsmiley('&nbsp;<?php echo $SmileText; ?>&nbsp;')" style="cursor: pointer; vertical-align:middle;" />
<?php }
if ($SmileRow<=5) {
	if ($iTest2!=$numTest) {?>
	<img src="<?php echo $SmileDirectory."".$FileName; ?>" alt="<?php echo $SmileName; ?>" title="<?php echo $SmileName; ?>" border="0" onClick="addsmiley('&nbsp;<?php echo $SmileText; ?>&nbsp;')" style="cursor: pointer; vertical-align:middle;" />&nbsp;&nbsp;
	<?php } }
if ($SmileRow==6) {
	if ($iTest2!=$numTest) {?>
	<img src="<?php echo $SmileDirectory."".$FileName; ?>" alt="<?php echo $SmileName; ?>" title="<?php echo $SmileName; ?>" border="0" onClick="addsmiley('&nbsp;<?php echo $SmileText; ?>&nbsp;')" style="cursor: pointer; vertical-align:middle;" /><br />
	<?php $SmileRow=1; } }
++$iTest; } ?>
 </center>
</div>
</td>