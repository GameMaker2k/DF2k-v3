<?php require( '../../Settings.php');
if ($Settings['use_gzip']==true) {
ini_set("zlib.output_compression","On");
ini_set("zlib.output_compression_level","2");
ob_start( 'ob_gzhandler' );	} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<?php
$Text_Title="&#055;&#045;&#066;&#073;&#084;&#032;&#065;&#083;&#067;&#073;&#073;&#032;&#084;&#114;&#097;&#110;&#115;&#108;&#097;&#116;&#111;&#114;";
$Text_Title_Hex="&#X037;&#X02D;&#X042;&#X049;&#X054;&#X020;&#X041;&#X053;&#X043;&#X049;&#X049;&#X020;&#X054;&#X072;&#X061;&#X06E;&#X073;&#X06C;&#X061;&#X074;&#X06F;&#X072;";
$ASCII_Title="055 045 066 073 084 032 065 083 067 073 073 032 084 114 097 110 115 108 097 116 111 114";
$ASCII_Title_Hex="037 02D 042 049 054 020 041 053 043 049 049 020 054 072 061 06E 073 06C 061 074 06F 072";
$Big_ASCII_Title="048 053 053 032 048 052 053 032 048 054 054 032 048 055 051 032 048 056 052 032 048 051 050 032 048 054 053 032 048 056 051 032 048 054 055 032 048 055 051 032 048 055 051 032 048 051 050 032 048 056 052 032 049 049 052 032 048 057 055 032 049 049 048 032 049 049 053 032 049 048 056 032 048 057 055 032 049 049 054 032 049 049 049 032 049 049 052";
$Big_ASCII_Title_Hex="030 033 037 020 030 032 064 020 030 034 032 020 030 034 039 020 030 035 034 020 030 032 030 020 030 034 031 020 030 035 033 020 030 034 033 020 030 034 039 020 030 034 039 020 030 032 030 020 030 035 034 020 030 037 032 020 030 036 031 020 030 036 065 020 030 037 033 020 030 036 063 020 030 036 031 020 030 037 034 020 030 036 066 020 030 037 032";
$This_Title=$Text_Title;
if ($_POST['act']==null) {
if ($_GET['act']!=null) {
	$_POST['act']=$_GET['act']; }
if ($_GET['act']==null) {
	$_POST['act']="decode"; } }
if ($_POST['act']=="decode") {
if ($_GET['text']==$ASCII_Title) { $This_Title=$Text_Title; $Done['This']="Yes"; }
if ($_POST['text']==$ASCII_Title) { $This_Title=$Text_Title; $Done['This']="Yes"; }	}
if ($_POST['act']=="encode") {
if ($_GET['text']==$ASCII_Title) { $This_Title=$Big_ASCII_Title; $Done['This']="Yes"; }
if ($_POST['text']==$ASCII_Title) { $This_Title=$Big_ASCII_Title; $Done['This']="Yes"; }	}
if ($_POST['act']=="encode"||$_POST['act']=="decode") { 
	if ($Done['This']!="Yes") { $This_Title=$ASCII_Title; $Done['This']="Yes"; }	 }
if ($_POST['act']=="decode2") {
if ($_GET['text']==$ASCII_Title_Hex) { $This_Title=$Text_Title_Hex; $Done['This']="Yes"; }
if ($_POST['text']==$ASCII_Title_Hex) { $This_Title=$Text_Title_Hex; $Done['This']="Yes"; }	}
if ($_POST['act']=="encode2") {
if ($_GET['text']==$ASCII_Title_Hex) { $This_Title=$Big_ASCII_Title_Hex; $Done['This']="Yes"; }
if ($_POST['text']==$ASCII_Title_Hex) { $This_Title=$Big_ASCII_Title_Hex; $Done['This']="Yes"; }	}
if ($_POST['act']=="encode2"||$_POST['act']=="decode2") { 
	if ($Done['This']!="Yes") { $This_Title=$ASCII_Title_Hex; $Done['This']="Yes"; }	 }
?>
<title> <?php echo $Settings['board_name']; ?> - <?php echo $This_Title; ?> </title>
<meta http-equiv="content-language" content="en-us">
<meta http-equiv="content-type" content="text/html; charset=iso-8859-15">
<meta name="generator" content="editplus">
<meta name="author" content="">
<meta name="keywords" content="">
<meta name="description" content="">
</head>

<body>
<?php
$_POST['text']=stripcslashes($_POST['text']);
if ($_POST['text']==null) {
if ($_GET['text']!=null) {
	$_POST['text']=stripcslashes($_GET['text']); } }
if ($_POST['act']=="encode") { $Start1=" selected"; $Start2=null; $Start3=null; $Start4=null; }
if ($_POST['act']=="encode2") { $Start1=null; $Start2=" selected"; $Start3=null; $Start4=null;  }
if ($_POST['act']=="decode") { $Start1=null; $Start2=null; $Start3=" selected"; $Start4=null;  }
if ($_POST['act']=="decode2") { $Start1=null; $Start2=null; $Start3=null; $Start4=" selected";  }
?>
<form method=post action="">
<textarea rows="6" name="text" cols="30"><?php echo $_POST['text']; ?></textarea><br />
<select size="1" name="act">
<option value="encode"<?php echo $Start1; ?>>Encode Text</option>
<option value="encode2"<?php echo $Start2; ?>>Encode Text Hex</option>
<option value="decode"<?php echo $Start3; ?>>Decode Text</option>
<option value="decode2"<?php echo $Start4; ?>>Decode Text Hex</option>
</select><br />
<input type="submit" name="Send" value="Send">
<input type="reset" name="Reset" value="Reset">
</form>
<?php
if ($_POST['text']!=null) {

if ($_POST['act']=="encode"||$_POST['act']=="encode2") {
$num=strlen($_POST['text']);
$Il=0;
while ($Il < $num) {
	if ($_POST['act']=="encode") { $ascii=ord($_POST['text'][$Il])." ";	}
	if ($_POST['act']=="encode2") { $ascii=ord($_POST['text'][$Il]); $ascii=dechex($ascii)." ";	}
	if (strlen($ascii)==3) { $ascii="0".$ascii; }
	if (strlen($ascii)==2) { $ascii="00".$ascii; }
	$ascii = strtoupper($ascii);
	echo $ascii;
	++$Il; }	}

if ($_POST['act']=="decode"||$_POST['act']=="decode2") {
$test=explode("\n", $_POST['text']);
$num=count($test);
$l=0;
while ($l < $num) {
	$test[$l]=str_replace("\r", " ", $test[$l]);
	++$l;	}
$_POST['text'] = implode("", $test);
$test=explode(" ", $_POST['text']);
if ($_POST['act']=="decode") { 
	$LineNew1="010";
	$LineNew2="012";
	$LineNew3="013";
		$add['text']=null; }
if ($_POST['act']=="decode2") { 
	$LineNew1="00A";
	$LineNew2="00C";
	$LineNew3="00D";
		$add['text']="x"; }
$i=0;
$num=count($test);
while ($i < $num) {
	$test[$i] = strtoupper($test[$i]);
	if (strlen($test[$i])==2) { $test[$i]="0".$test[$i]; }
	if (strlen($test[$i])==1) { $test[$i]="00".$test[$i]; }
	if ($test[$i]==$LineNew3) {
	$FullText=$FullText."&#".$add['text'].$test[$i].";<br />"; }
	if ($test[$i]!=$LineNew3) {
	$FullText=$FullText."&#".$add['text'].$test[$i].";";	}
	++$i;	}
echo $FullText; } }

?>
</body>
</html>