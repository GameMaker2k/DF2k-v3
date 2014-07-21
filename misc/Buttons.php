<?php
$File1Name = dirname($_SERVER['PHP_SELF'])."/";
$File2Name = $_SERVER['PHP_SELF'];
$File3Name=str_replace($File1Name, null, $File2Name);
if ($File3Name=="Buttons.php"||$File3Name=="/Buttons.php") {
	echo "<title>".$File3Name." (PHP File)</title>\n\r<b>Warning</b>: Failed to open stream: Permission denied in <b>".$File3Name."</b> on line <b>1</b>!<br />";
	exit(); }?><br /><hr />
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert Bold Text (alt + b)';" accesskey="B" onClick="addsmiley('[B]&nbsp;[/B]\r\n')" title="Bold Tag"><b>B</b></button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert Italic Text (alt + i)';" accesskey="I" onClick="addsmiley('[I]&nbsp;[/I]\r\n')" title="Italic Tag"><i>I</i></button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert Underlined Text (alt + u)';" accesskey="U" onClick="addsmiley('[U]&nbsp;[/U]\r\n')" title="Underline Tag"><u>U</u></button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert Striked Text (alt + s)';" accesskey="S" onClick="addsmiley('[S]&nbsp;[/S]\r\n')" title="Strike Tag"><s>S</s></button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert a Line Break (alt + l)';" accesskey="L" onClick="addsmiley('[BR]\r\n')"  title="Line Break Tag">BR</button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert a Horizontal Ruler (alt + h)';" accesskey="H" onClick="addsmiley('[HR]\r\n')"  title="HR Line Tag">HR</button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert a Paragraph (alt + p)';" accesskey="P" onClick="addsmiley('[P]&nbsp;[/P]\r\n')" title="Paragraph Tag">P</button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert a Marquee Text (alt + m)';" accesskey="M" onClick="addsmiley('[MARQUEE]&nbsp;[/MARQUEE]\r\n')" title="MARQUEE Tag"><!--<marquee>-->M<!--</marquee>--></button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert Table (alt + t)';" accesskey="T" onClick="addsmiley('[Table]\r\n[tr]\r\n[td]Test[/td]\r\n[/tr]\r\n[/Table]\r\n')" title="CODE Tag"><!--[Table][TR]-->Table<!--[/TR][/Table]--></button><br />
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert Hyperlink (alt+ u)';" accesskey="U" onClick="var url_one = prompt('Please enter a url.', 'http://');var url_two = prompt('Please enter the name of the website.', 'Website Name');addsmiley('[URL=' + url_one + ']' + url_two + '[/URL]\r\n')" title="URL Tag"><!--<a href="http://www.gamefaqs.com/">-->URL<!--</a>--></button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert Email Address (alt + e)';" accesskey="E" onClick="var email_one = prompt('Please enter your Email Address.', '');var email_two = prompt('Please enter your name.', 'Your Name');addsmiley('[EMAIL=' + email_one + ']' + email_two + '[/EMAIL]\r\n')" title="EMAIL Tag"><!--<a href="mailto:???.???.com">-->EMAIL<!--</a>--></button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert Code Box (alt + p)';" accesskey="P" onClick="addsmiley('[CODEBOX]Your Code Here[/CODEBOX]\r\n')" title="CODEBOX Tag"><!--[CODEBOX]-->CODEBOX<!--[/CODEBOX]--></button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert Code Box Small (alt + c)';" accesskey="C" onClick="var code_type = prompt('Please the type of code your entering.', 'HTML');var code_code = prompt('Please enter the code.', 'Put code here.');addsmiley('[CODE=' + code_type + ']' + code_code + '[/CODE]\r\n')" title="CODE Tag"><!--[CODE]-->CODE<!--[/CODE]--></button>
<button class="Button" OnMouseOver="document.Font.BBTagHelp.value='Insert List (alt + l)';" accesskey="L" onClick="addsmiley('[List]\r\n[*]Test\r\n[*]Test\r\n[/List]\r\n')" title="CODE Tag"><!--[List][*]-->List<!--[/List]--></button>
<br />
<form method="POST" name="Font" action="?">
<select class="Menu" size="1" OnMouseOver="document.Font.BBTagHelp.value='Change Font Face (alt+ ?)';" name="Font"
onchange="document.<?php echo $Type ?>.YourPost.value=''+document.<?php echo $Type ?>.YourPost.value+'[Font='+document.Font.Font.value+']&nbsp;[/Font]\r\n';">
<option style="font-family: Arial;" selected value="Arial">Font</option>
<option style="font-family: Arial;" value="Arial">Arial</option>
<option style="font-family: Times;" value="Times">Times</option>
<option style="font-family: Courier;" value="Courier">Courier</option>
<option style="font-family: Impact;" value="Impact">Impact</option>
<option style="font-family: Geneva;" value="Geneva">Geneva</option>
<option style="font-family: Optima;" value="Optima">Optima</option>
<option style="font-family: Wingdings;" value="Wingdings">Wingdings</option>
</select>
<select class="Menu" size="1" OnMouseOver="document.Font.BBTagHelp.value='Change Font Size (alt+ ?)';" name="Size"
onchange="document.<?php echo $Type ?>.YourPost.value=''+document.<?php echo $Type ?>.YourPost.value+'[Size='+document.Font.Size.value+']&nbsp;[/Size]\r\n';">
<option selected value="1">Size</option>
<option value="1">Small</option>
<option value="3">Big</option>
<option value="7">Large</option>
<option value="14">Largest</option>
</select>
<select class="Menu" size="1" OnMouseOver="document.Font.BBTagHelp.value='Change Font Color (alt+ ?)';"name="Color"
onchange="document.<?php echo $Type ?>.YourPost.value=''+document.<?php echo $Type ?>.YourPost.value+'[Color='+document.Font.Color.value+']&nbsp;[/Color]\r\n';">
<option selected style="color: white;" value="White">Color</option>
<option style="color: Blue;" value="Blue">Blue</option>
<option style="color: Red;" value="Red">Red</option>
<option style="color: Purple;" value="Purple">Purple</option>
<option style="color: Orange;" value="Orange">Orange</option>
<option style="color: Yellow;" value="Yellow">Yellow</option>
<option style="color: Gray;" value="Gray">Gray</option>
<option style="color: Green;" value="Green">Green</option>
<option style="color: Black;" value="Black">Black</option>
<option style="color: White;" value="White">White</option>
</select><hr />
<input type="text" size="40" name="BBTagHelp" id="BBTagHelp"  value="Put Mouse Over Button for More Help." class="TextBox" onmouseover="document.Font.BBTagHelp.title='Test';" readonly></form>
<hr /><script type="text/javascript">
<!--
function addsmiley(code)
{
var pretext = document.<?php echo $Type ?>.YourPost.value;
this.code = code;
         document.<?php echo $Type ?>.YourPost.value = pretext + code;
}
//-->
</script>