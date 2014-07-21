<?php
$File1Name = dirname($_SERVER['PHP_SELF'])."/";
		$File2Name = $_SERVER['PHP_SELF'];
		$File3Name=str_replace($File1Name, null, $File2Name);
		if ($File3Name=="Footer.php"||$File3Name=="/Footer.php") {
		echo "<title>".$File3Name." (PHP File)</title>\n\r<b>Warning</b>: Failed to open stream: Permission denied in <b>".$File3Name."</b> on line <b>1</b>!<br />";
		exit(); }
//Count the number of MySQL Queries	Part 2
$sql= "SELECT 8+9";
cnt_mysql_query($sql);
$result = cnt_mysql_query('SELECT 4*12');
cnt_mysql_query('SELECT 78+5');
$QueriesUsed = ' ' . cnt_mysql_query() . ' Queries Used'; 
//End Time Code
$endtime = microtime();
$endarray = explode(" ", $endtime);
$endtime = $endarray[1] + $endarray[0];
$totaltime = $endtime - $starttime; 
$totaltime = round($totaltime,5);
$Random404 = rand(0, 7);
echo '<center><span class="copyright"><a href="'.$_SERVER['PHP_SELF'].'?act=GM2kBoard" title="Discussion Forums 2k">Discussion Forums 2k</a> '.$_SESSION['DF2kVer'].''.$_SESSION['DF2kPreVer'].' &copy; is Copyright of <a href="'.$_SERVER['PHP_SELF'].'?act=GM2kSite" title="Game Maker 2k">Game Maker 2k&copy;</a><br />The page loaded in '.$totaltime.' seconds. '.$status[$Random404].' <br /><a href="'.$_SERVER['PHP_SELF'].'?act=PHP" title="Powered by PHP" target="_blank"><img src="'.$_SERVER['PHP_SELF'].'?act=PHPLogo" width="80" height="15" border="0" alt="Powered by PHP" /></a></span></center>';
?>
