<?php
		$File1Name = dirname($_SERVER['PHP_SELF'])."/";
		$File2Name = $_SERVER['PHP_SELF'];
		$File3Name=str_replace($File1Name, null, $File2Name);
		if ($File3Name=="HTMLTags.php"||$File3Name=="/HTMLTags.php") {
		echo "<title>".$File3Name." (PHP File)</title>\n\r<b>Warning</b>: Failed to open stream: Permission denied in <b>".$File3Name."</b> on line <b>1</b>!<br />";
		exit(); }
		/*$_GET['YourPost'] = preg_replace("/\<xmp\>/isxS", "<pre>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\<\/xmp\>/isxS", "</pre>", $_GET['YourPost']);*/
		$_POST['YourPost'] = preg_replace("/\<xmp\>/isxS", "<pre>", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\<\/xmp\>/isxS", "</pre>", $_POST['YourPost']);
		if ($DOHTML!="No") {
		$_POST['YourPost'] = preg_replace("/\<b\>(.*?)\<\/b\>/is", "[B]$1[/B]", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\<i\>(.*?)\<\/i\>/is", "[I]$1[/I]", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\<u\>(.*?)\<\/u\>/is", "[U]$1[/U]", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\<s\>(.*?)\<\/s\>/is", "[S]$1[/S]", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\<p\>(.*?)\<\/p\>/is", "[P]$1[/P]", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\<center\>(.*?)\<\/center\>/is", "[CENTER]$1[/CENTER]", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\<h(.*?)\>(.*?)\<\/h(.*?)\>/is", "[H$1]$2[/H$1]\n", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\<marquee\>(.*?)\<\/marquee\>/is", "[MARQUEE]$1[/MARQUEE]", $_POST['YourPost']);
		$_POST['YourPost'] = preg_replace("/\<marquee direction\=\"(.*?)\"\>(.*?)\<\/marquee\>/is", "[MARQUEE=$1]$2[/MARQUEE]", $_POST['YourPost']);
		$_POST['YourPost']= eregi_replace("<br>","[BR]",$_POST['YourPost']);
        $_POST['YourPost']= eregi_replace("<br />","[BR]",$_POST['YourPost']);
		$_POST['YourPost']= eregi_replace("<hr>","[HR]",$_POST['YourPost']);
        $_POST['YourPost']= eregi_replace("<hr />","[HR]",$_POST['YourPost']); }
		$HTML1 = array("<(", ")>", '|"|', "<", ">", "©", "®", "™", '"');
        $HTML2 = array("^(", ")^", "|*|", "&lt;", "&gt;", "&copy;", "&reg;", "&trade;", '&quot;');
		$_POST['YourName'] = str_replace($HTML1, $HTML2, $_POST['YourName']);
		$_POST['YourEmail'] = str_replace($HTML1, $HTML2, $_POST['YourEmail']);
		if ($Smiles=="off") {
		$NoHTML1 = array(":", ";", "^_^", ")", "(");
        $NoHTML2 = array("&#58;", "&#59;", "^-^", "}", "{");	
		$_POST['YourPost'] = str_replace($NoHTML1, $NoHTML2, $_POST['YourPost']); }
		if ($DOHTML!="Yes") {
		$_POST['YourPost'] = str_replace($HTML1, $HTML2, $_POST['YourPost']); }
		$_POST['TopicName'] = str_replace($HTML1, $HTML2, $_POST['TopicName']);
		if ($_POST['LineBreaks']=="Auto") {
		$_POST['YourPost'] = nl2br($_POST['YourPost']); }
		$predoHTML1 = array("^(", ")^", "|*|");
        $predoHTML2 = array("<(", ")>", '"');
		$_POST['YourPost'] = str_replace($predoHTML1, $predoHTML2, $_POST['YourPost']);
		$MeTag1 = array(":me:", ":ME:", ":Me:", ":mE:", "{me}", "{ME}", "{Me}", "{mE}");
		$MeTag2 = array("[ME]".$_SESSION['MemberName']."[/ME]", "[ME]".$_SESSION['MemberName']."[/ME]", "[ME]".$_SESSION['MemberName']."[/ME]", "[ME]".$_SESSION['MemberName']."[/ME]", "[ME]".$_SESSION['MemberName']."[/ME]", "[ME]".$_SESSION['MemberName']."[/ME]", "[ME]".$_SESSION['MemberName']."[/ME]", "[ME]".$_SESSION['MemberName']."[/ME]");
		$_POST['YourPost'] = str_replace($MeTag1, $MeTag2, $_POST['YourPost']);
?>