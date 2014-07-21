<?php require( '../../Settings.php'); 
if ($Settings['use_gzip']==true) {
ini_set("zlib.output_compression","On");
ini_set("zlib.output_compression_level","2");
ob_start( 'ob_gzhandler' );	} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title> <?php echo $Settings['board_name']; ?> - Encrypter 2k (Made by Cool Dude 2k) </title>
<meta http-equiv="content-language" content="en-us">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-15">
<meta name="generator" content="editplus">
<meta name="author" content="">
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<?php
if ($_POST['Text']==null) {
	if ($_GET['Text']!=null) {
		$_POST['Text']=$_GET['Text'];
		if ($_POST['Encrypter']==null) {
		$_POST['Encrypter']="100"; } }
	if ($_GET['Text']==null) {
		$_POST['Text']="Cool Dude 2k"; } }
?>
<body>
<form method="post" action="?">
<select size="1" name="Encrypter">
 <option selected value="100">Encrypt Text 1 Time (Small)</option>
 <option value="150">Encrypt Text 1 Time (Big)</option>
 <option value="200">Encrypt Text 2 Times (Small)</option>
 <option value="250">Encrypt Text 2 Times (Big)</option>
 <option value="300">Encrypt Text 3 Times (Small)</option>
 <option value="400">Encrypt Text 3 Times (Big)</option>
 <option value="500">Decrypt Text</option>
</select><br />
<textarea rows="4" name="Text" cols="20"><?php echo $_POST['Text']; ?></textarea><br />
<input type="submit" name="Send" value="Send Text">
<input type="reset" name="Reset" value="Reset Text"><br />
</form>
<?php
if ($_POST['Text']!=null) {
require_once('../Encrypter2k.php');
if ($_POST['Encrypter']=="100") {
$_POST['Text'] = Encrypt1($_POST['Text']);	}
if ($_POST['Encrypter']=="150") {
$_POST['Text'] = Encrypt1Old($_POST['Text']);	}
if ($_POST['Encrypter']=="200") {
$_POST['Text'] = Encrypt2($_POST['Text']);	}
if ($_POST['Encrypter']=="250") {
$_POST['Text'] = Encrypt2Old($_POST['Text']);	}
if ($_POST['Encrypter']=="300") {
$_POST['Text'] = Encrypt1(Encrypt2($_POST['Text']));	}
if ($_POST['Encrypter']=="400") {
$_POST['Text'] = Encrypt3($_POST['Text']);	}
if ($_POST['Encrypter']=="500") {
$_POST['Text'] = Decrypt($_POST['Text']);	}
$HTML1 = array("<", ">");
$HTML2 = array("&lt;", "&gt;");
$_POST['Text'] = str_replace($HTML1, $HTML2, $_POST['Text']);
$_POST['Text'] = nl2br($_POST['Text']);
Echo $_POST['Text']; }
?>
</body>
</html>
