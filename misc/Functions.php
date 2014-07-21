<?php
$File1Name = dirname($_SERVER['PHP_SELF'])."/";
		$File2Name = $_SERVER['PHP_SELF'];
		$File3Name=str_replace($File1Name, null, $File2Name);
		if ($File3Name=="Functions.php"||$File3Name=="/Functions.php") {
		echo "<title>".$File3Name." (PHP File)</title>\n\r<b>Warning</b>: Failed to open stream: Permission denied in <b>".$File3Name."</b> on line <b>1</b>!<br />";
		exit(); }
/*This File has all the Functions for BBTags
Thanks for the Help of czambran at http://www.phpfreaks.com/forums/index.php?showuser=15535 */ 
function htmldecode($matches)
{
return html_entity_decode($matches[1]);
}
function htmldecode2($matches)
{
$matches[1]=nl2br($matches[1]);
return html_entity_decode($matches[1]);
}
function line_break($matches)
{
return nl2br($matches[1]);
}
function showmd5($matches)
{
return md5($matches[1]);
}
function showsha1($matches)
{
return sha1($matches[1]);
}
function showcrc32($matches)
{
return crc32($matches[1]);
}
function randnumber($matches)
{
return rand($matches[1], $matches[2]);
}
function backwards($matches)
{
return strrev($matches[1]);
}
function mixtext($matches)
{
return str_shuffle($matches[1]);
}
function rot13($matches)
{
return str_rot13($matches[1]);
}
function soundextext($matches)
{
return soundex($matches[1]);
}
function metaphonetext($matches)
{
return metaphone($matches[1]);
}
function BBLoop($matches)
{
$i=1;
$matches[1] = (int) $matches[1];
while ($i <= $matches[1]) {
		$text .= $matches[2];
		++$i;
}
	return $text;
}
function BBCount($matches)
{
$i=1;
$matches[1] = (int) $matches[1];
while ($i <= $matches[1]) {
		$text .= $i." ";
		++$i;
}
	return $text;
}
function BBTags($pattern,$replacement,$string)
{
   $newstring = preg_replace("/[$pattern]…[/$pattern]/is", "<$replacement>$1</$replacement>", $string);
   return $newstring;
}
function phpcolorone($matches)
{
$HTMLFrom = array("<", ">", '"', "");
$HTMLBack = array("&lt;", "&gt;", '&quot;', "<br />");
$matches[1] = str_replace($HTMLBack, $HTMLFrom, $matches[1]);
$matches[1] = highlight_string($matches[1],True);
$matches[1] = "[PHP]".$matches[1]."[/PHP]";
return $matches[1];
}
function phpcolortwo($matches)
{
$HTMLFrom = array("<", ">", '"', "");
$HTMLBack = array("&lt;", "&gt;", '&quot;', "<br />");
$matches[1] = str_replace($HTMLBack, $HTMLFrom, $matches[1]);
$matches[1] = highlight_string($matches[1],True);
$matches[1] = "[CODE=PHP]".$matches[1]."[/CODE]";
return $matches[1];
}
function CoolEntities($matches)
{
$Testing1 = array("`a", "`e", "`i", "`o", "`u", "`A", "`E", "`I", "`O", "`U", "'a", "'e", "'i", "'o", "'u", "'y", "'A", "'E", "'I", "'O", "'U", "'Y", "^a", "^e", "^i", "^o", "^u", "^A", "^E", "^I", "^O", "^U", "~a", "~n", "~o", "~A", "~N", "~O", ":a", ":e", ":i", ":o", ":u", ":y", ":A", ":E", ":I", ":O", ":U", ":Y", "/o", "/O", ",c", ",C");
$Testing2 = array("&agrave;", "&egrave;", "&igrave;", "&ograve;", "&ugrave;", "&Agrave;", "&Egrave;", "&Igrave;", "&Ograve;", "&Ugrave;", "&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&yacute;", "&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "&Yacute;", "&acirc;", "&ecirc;", "&icirc;", "&ocirc;", "&ucirc;", "&Acirc;", "&Ecirc;", "&Icirc;", "&Ocirc;", "&Ucirc;", "&atilde;", "&ntilde;", "&otilde;", "&Atilde;", "&Ntilde;", "&Otilde;", "&auml;", "&euml;", "&iuml;", "&ouml;", "&uuml;", "&yuml;", "&Auml;", "&Euml;", "&Iuml;", "&Ouml;", "&Uuml;", "&Yuml;", "&oslash;", "&Oslash;", "&ccedil;", "&Ccedil;");
$Testing3 = array("´a", "´e", "´i", "´o", "´u", "´y", "´A", "´E", "´I", "´O", "´U", "´Y", "ˆa", "ˆe", "ˆi", "ˆo", "ˆu", "ˆA", "ˆE", "ˆI", "ˆO", "ˆU", "˜a", "˜n", "˜o", "˜A", "˜N", "˜O", "¸c", "¸C", "'", "~", "^", ",");
$Testing4 = array("&aacute;", "&eacute;", "&iacute;", "&oacute;", "&uacute;", "&yacute;", "&Aacute;", "&Eacute;", "&Iacute;", "&Oacute;", "&Uacute;", "&Yacute;", "&acirc;", "&ecirc;", "&icirc;", "&ocirc;", "&ucirc;", "&Acirc;", "&Ecirc;", "&Icirc;", "&Ocirc;", "&Ucirc;", "&atilde;", "&ntilde;", "&otilde;", "&Atilde;", "&Ntilde;", "&Otilde;", "&ccedil;", "&Ccedil;", "&acute;", "&tilde;", "&circ;", "&cedil;");
$matches[1] = str_replace($Testing1, $Testing2, $matches[1]);
$matches[1] = str_replace($Testing3, $Testing4, $matches[1]);
return $matches[1];
}
?>