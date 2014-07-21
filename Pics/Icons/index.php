<?php
$Skip="Yes";
$Add = ".";
require( '../MySQL.php');
require( '../misc/Act.php');
if ($Skip=="Yes") {
echo "<style type='text/css'>\n";
require( '../CSS'.$_SESSION["Skin"].'.php');
echo "\n</style>"; }
mysql_connect($mysqlhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
?>
<title><?php echo $BoardName ?> - 403: Forbidden</title>
<h2>403: Forbidden</h2>
<p><a href="../index.php?act=View">You Have to Go Back.</a></p>
<br />
<?php require( '../misc/Footer.php'); ?>