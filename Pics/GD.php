<?php
/*
GD Image
File Made by Matt of IPB
*/
$RandType=rand(1,3);
if ($RandType==1) {
	$UseType="png";	  }
if ($RandType==2) {
	$UseType="jpeg";	  }
if ($RandType==3) {
	$UseType="gif";	  }
@header("Content-Type: image/".$UseType."");
$GDNumbers = urldecode(base64_decode($_GET['GDNumbers']));
$size1_x = 140;
$size1_y = 20;
$size2_x = 210;
$size2_y = 65;
//$tmp = imagecreate($size1_x, $size1_y);
//$im  = imagecreate($size2_x, $size2_y);
$tmp = imagecreatetruecolor($size1_x, $size1_y);
$im  = imagecreatetruecolor($size2_x, $size2_y);
$white  = ImageColorAllocate($tmp, 255, 255, 255);
$black  = ImageColorAllocate($tmp, 0, 0, 0);
$grey   = ImageColorAllocate($tmp, 210, 210, 210 );
imagefill($tmp, 0, 0, $white);
imagestring($tmp, 5, 0, 2, '  '.$GDNumbers.'', $black);
imagecopyresized($im, $tmp, 0, 0, 0, 0, $size2_x, $size2_y, $size1_x, $size1_y);
imagedestroy($tmp);
$white   = ImageColorAllocate($im, 255, 255, 255);
$black   = ImageColorAllocate($im, 0, 0, 0);
$grey    = ImageColorAllocate($im, 100, 100, 100 );
$random_pixels = $size2_x * $size2_y / 10;
for ($i = 0; $i < $random_pixels; $i++)
{
ImageSetPixel($im, rand(0, $size2_x), rand(0, $size2_y), $black);
}
$no_x_lines = ($size2_x - 1) / 5;
for ( $i = 0; $i <= $no_x_lines; $i++ )
{
// X lines
ImageLine( $im, $i * $no_x_lines, 0, $i * $no_x_lines, $size2_y, $grey );
// Diag lines
ImageLine( $im, $i * $no_x_lines, 0, ($i * $no_x_lines)+$no_x_lines, $size2_y, $grey );
}
$no_y_lines = ($size2_y - 1) / 5;
for ( $i = 0; $i <= $no_y_lines; $i++ )
{
ImageLine( $im, 0, $i * $no_y_lines, $size2_x, $i * $no_y_lines, $grey );
}
if ($UseType=="png") {
	Imagepng($im);	  }
if ($UseType=="jpeg") {
	Imagejpeg($im);	  }
if ($UseType=="gif") {
	Imagegif($im);	  }
ImageDestroy($im);
exit();
?>