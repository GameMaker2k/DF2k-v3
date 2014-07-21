<!--
/* lycos.co.uk Fix	 */
if (window != window.top)
top.location.href = location.href;
if (self != top) top.location = self.location;
// Copyright 1999 InsideDHTML.com, LLC.  

function stoperror(){
return true
}
window.onerror=stoperror

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
// Script courtesy of http://www.web-source.net - Your Guide to Professional Web Site Design and Development
var preload=new Image();
preload.src="http://<?php echo $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']) ?>Skin/Skin<?php echo $_SESSION["Skin"]; ?>/Logo.png";
function echo(Text) {
document.writeln(Text);
}
function title(Text) {
document.title=Text;
}
function BGColor(Text) {
document.bgColor=Text;
}
function	message(Text) {
alert(Text);
}
function ask(Text) {
confirm(Text);
}
function ask2(Text1,Text2) {
prompt(Text1, Text2);
}
function NewWindow(Text1,Text2) {
window.open(Text1,Text2);
}
function NewWindow2(Text1,Text2,Text3) {
window.open(Text1,Text2,Text3);
}
function BrowserInfo() {
document.writeln(navigator.appName);
}
function CPUInfo() {
document.writeln(navigator.platform);
}
function DisplaySize() {
document.writeln(screen.width+"x"+screen.height);
}
window.onload = startBlink;
<?php if ($Google['ads']==true) {?>
google_ad_client = "pub-1";
google_ad_width = 728;
google_ad_height = 90;
google_ad_format = "728x90_as";
google_ad_type = "text_image";
google_ad_channel ="";
<?php if ($_GET["Skin"]==1) {?>
google_color_border = "494848";
google_color_bg = "494848";
google_color_link = "CC9900";
google_color_url = "CC9900";
google_color_text = "e1e1e1";
<?php } if ($_GET["Skin"]==2) {?>
google_color_border = "3D5348";
google_color_bg = "3D5348";
google_color_link = "CC9900";
google_color_url = "CC9900";
google_color_text = "e1e1e1";
<?php } } ?>
//-->