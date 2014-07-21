<?php
ob_start('ob_gzhandler');
$var_array = explode("/",$PATH_INFO);
$size = (int) $_GET['size'];
$message = $_GET['text'];
$message = stripslashes($message);
$width = ImageFontWidth($size) * strlen($message) + 10;
$height = ImageFontHeight($size) + 10;
$image = ImageCreate($width,$height);
$background = ImageColorAllocate($image,255,255,255);
$text_color = ImageColorAllocate($image,0,0,0);
ImageColorTransparent($image,$background_color);
imageinterlace($image,1);
ImageString($image,$size,5,5,$message,$text_color);
//imagettftext($im, 20, 0, 10, 20, $black, "Arial.ttf",$message);
header('Content-type: image/png');
Imagepng($image);
Imagedestroy($image);
?><?php 
echo	"\r\nMade With PHP.\r\nCoded by Cool Dude 2k of Game Maker 2k\r\nSize=$size\r\nMessage=$message";
?>