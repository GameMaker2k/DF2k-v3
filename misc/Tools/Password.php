<?php require( '../../Settings.php');
if ($Settings['use_gzip']==true) {
ini_set("zlib.output_compression","On");
ini_set("zlib.output_compression_level","2");
ob_start( 'ob_gzhandler' );	} ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title> <?php echo $Settings['board_name']; ?> - Password Tool (Made by Cool Dude 2k) </title>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-15">
    <meta name="Generator" content="EditPlus">
    <meta name="Author" content="Cool Dude 2k">
    <meta name="Keywords" content="Game Maker 2k">
    <meta name="Description" content="">
  </head>

  <body>
<form method=post action="?">
Change Password to a Password Useable in Discussion Forums 2k:<br /> 
<input type="text" name="Password" value="<?php echo $Password; ?>"><br />
Your Password For Discussion Forums 2k:<br /> 
<input type="text" name="NewPassword" value="<?php echo sha1(md5($Password)); ?>"><br />
<input type="submit"><input type="reset">
</form><br />
  </body>
</html>
