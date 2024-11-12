<?php
$Skip="Yes";
$Add = ".";
require( '../misc/banned.php');
require( '../Settings.php');
$TitleLine="-";
$BoardName = $Settings['board_name'];
$URLPart	 = $_SERVER['PHP_SELF'];
$URLPart	 = preg_replace("/\/\//isxS", "/", $URLPart);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN"<?php/* "http://www.w3.org/TR/html4/loose.dtd" */?>>
<html>
<head>
<base href="<?php echo "http://".$_SERVER['HTTP_HOST'].$URLPart; ?>">
<meta http-equiv="content-language" content="en-us">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta  http-equiv="expires"  content="<?php echo date("D, j M Y H:i:s T"); ?>">  
<meta name="robots" content="noindex,follow"> 
<meta http-equiv="IMAGETOOLBAR" content="false">
<link rel="stylesheet" type="text/css" href="../Skin/Skin1/CSS.php" media="all">
<link rel="icon" href="../misc/FavIcon.png" type="image/png">
<script type="text/javascript" src="misc/Toggle.js"></script>
<script type="text/javascript" language="Javascript">
<!--
/* lycos.co.uk Fix	 */
if (window != window.top)
top.location.href = location.href;
// Copyright 1999 InsideDHTML.com, LLC.  

function doBlink() {
  // Blink, Blink, Blink...
  var blink = document.all.tags("BLINK")
  for (var i=0; i < blink.length; i++)
    blink[i].style.visibility = blink[i].style.visibility == "" ? "hidden" : "" 
}

function startBlink() {
  // Make sure it is IE4
  if (document.all)
    setInterval("doBlink()",1000)
}
window.onload = startBlink;
//-->
</script>
<?php
if ($Skip=="Yes") {
echo "<style type='text/css'>\r\n";
echo "@import url(../Skin/Skin1/CSS.php);\r\n";
//require( '../CSS'.$_SESSION["Skin"].'.php');echo"\r\n";
echo "</style>\n\r<title>".$BoardName." ".$TitleLine." 403: Forbidden</title>\n\r</head>"; }
if ($_GET['Backwards']=="Yes") {
	echo "\n\r<body dir=\"rtl\">\n\r"; }
if ($_GET['Backwards']=="yes") {
	echo "\n\r<body dir=\"rtl\">\n\r"; }
if ($_GET['Backwards']=="on") {
	echo "\n\r<body dir=\"rtl\">\n\r"; }
if ($_GET['Backwards']!="on") {
    echo "\n\r<body>\n\r"; }
?>
<h2>403: Forbidden</h2>
<p><a href="../index.php?act=View">You Have to Go Back.</a></p>
</body>
</html>