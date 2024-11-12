<?php
require( '../../Settings.php');
if ($Settings['use_gzip']==true) {
if($Settings['preinset']=="on") {
ini_set("zlib.output_compression","On");
ini_set("zlib.output_compression_level","2"); }
ob_start( 'ob_gzhandler' );	}
header('Content-type: text/css');
?>
a {
	font-size: 10px;
	color: #CC9900;
}
.copyright a:link, a:link {
	text-decoration: none;
	color: #3399FF;
}
.copyright a:visited, a:visited {
	text-decoration: none;
	color: #CC9900;
}
.copyright a:hover, a:hover {
	text-decoration: none;
	color: #FFCC66;
}
.copyright a:active, a:active {
	text-decoration: none;
	color: #CC9900;
}
.navbar a {
	font-size: 9px;
	color: #CC9900;
}
body,td,th {
	color: #e1e1e1;
	font-family: Verdana, Arial, Tahoma, Helvetica, sans-serif;
	font-size: 10px;
}
td,th,table {
	border-color: #000000;
}
.ReplyText {
	color: #e1e1e1;
	font-family: Verdana, Arial, Tahoma, Helvetica, sans-serif;
	font-size: 10px;
}
.EditReply {
	color: #A0A0A0;
    font-family: Verdana, Tahoma, Arial, sans-serif;
    font-size: 9px; 
}
.TopicText {
	color: #e1e1e1;
	font-family: Verdana, Arial, Tahoma, Helvetica, sans-serif;
	font-size: 10px;
}
.AdminTableText {
	color: #e1e1e1;
	font-family: Verdana, Arial, Tahoma, Helvetica, sans-serif;
	font-size: 10px;
}
.ForumText	{
	color: #e1e1e1;
	font-family: Verdana, Arial, Tahoma, Helvetica, sans-serif;
	font-size: 10px;
}
.TagBoardText {
	color: #e1e1e1;
	font-family: Verdana, Arial, Tahoma, Helvetica, sans-serif;
	font-size: 10px;
}
.metag { 
font-weight: bold; 
font-size: 15px; 
color: green; 
}
hr { 
color: #0000FF; 
}
.Menu { 
background-color: black; 
font-size: 15px; 
color: #C0C0C0; 
border: 2px outset black;
border-width: 2px;
border-bottom-color: #C0C0C0;
border-left-color: #C0C0C0; 
border-right-color: #C0C0C0; 
border-top-color: #C0C0C0; 
}
.TextBox { 
background-color: black; 
font-size: 15px; 
font-family: Courier, Courier New, Verdana, Arial;   
color: #C0C0C0; 
border: 2px outset black;
border-width: 2px;
border-bottom-color: #C0C0C0;
border-left-color: #C0C0C0; 
border-right-color: #C0C0C0; 
border-top-color: #C0C0C0; 
}
.HiddenTextBox {
font-family: Courier, Courier New, Verdana, Arial, serif; 
font-size: 10px; 
color: #C0C0C0; 
display: none;
border: 2px outset black;
border-width: 2px;
border-bottom-color: #C0C0C0;
border-left-color: #C0C0C0; 
border-right-color: #C0C0C0; 
border-top-color: #C0C0C0; 
}
.QuoteTop { 
font-family: Verdana, Tahoma, Arial, sans-serif;
font-size: 10px; 
color: #A0A0A0; 
}
.QuoteBottom { 
font-family: Courier, Courier New, Verdana, Arial, serif; 
font-size: 12px; 
color: #C0C0C0; 
background-color: black; 
border: 1px solid #000; 
border-color: gray;
padding-top: 2px; 
padding-right: 2px; 
padding-bottom: 2px; 
padding-left: 2px 
}
.CodeTop  { 
font-family: Verdana, Tahoma, Arial, sans-serif; 
font-size: 10px; 
color: #A0A0A0; 
}
.CodeBottom { 
font-family: Courier, Courier New, Verdana, Arial;  
font-size: 12px; 
color: #C0C0C0; 
background-color: Black; 
border: 1px solid #000; 
border-color: gray;
padding-top: 2px; 
padding-right: 2px; 
padding-bottom: 2px; 
padding-left: 2px 
}
.CodeBox { 
width:500px; 
height:100px; 
white-space:pre; 
overflow:auto; 
border:3px outset black; 
font-family: Courier, Courier New, Verdana, Arial, serif; 
font-size: 15px; 
}
.Button { 
border: 2px outset black;
border-width: 2px;
border-bottom-color: #C0C0C0;
border-left-color: #C0C0C0; 
border-right-color: #C0C0C0; 
border-top-color: #C0C0C0; 
background-color: black; 
font-size: 15px; 
font-family: Courier, Courier New, Verdana, Arial;   
color: #C0C0C0; 
}
.MenuTable1 { 
font-family: Verdana, Tahoma, Arial, sans-serif;
font-size: 15px; 
color: #000; 
background-color: #A0A0A0;
border-left-color: #989898;
border-top-color: #989898;
border-right-color: #959595;
border-bottom-color: #959595;
}
.MenuTable2 { 
font-family: Verdana, Tahoma, Arial, sans-serif;
font-size: 15px; 
color: #000; 
background-color: #C0C0C0; 
border-left-color: #989898;
border-top-color: #989898;
border-right-color: #959595;
border-bottom-color: #959595;
}
.MenuTable3 { 
font-family: Verdana, Tahoma, Arial, sans-serif;
font-size: 15px; 
color: #000; 
background-color: #D7D7D7; 
border-left-color: #989898;
border-top-color: #989898;
border-right-color: #959595;
border-bottom-color: #959595;
}
.MenuTable4 { 
font-family: Verdana, Tahoma, Arial, sans-serif;
font-size: 15px; 
color: #000; 
background-color: #D8D7D8; 
border-left-color: #989898;
border-top-color: #989898;
border-right-color: #959595;
border-bottom-color: #959595;
}
.TableNone {
display: none;
}
label {
color: #e1e1e1;
font-weight: bold; 
cursor: pointer;
}
body {
	background-color: #3D5348;
}
img {
	border: 0px;
    vertical-align: middle;
}
.style2 {
color: #333333
}
.copyright a {
	font-size: 12px;
    line-height: 11px; 
	color: #CC9900;
}
.copyright { 
text-align: center;
font-family: Sans-Serif; 
font-size: 12px; 
line-height: 11px; 
color:#FFF; 
}