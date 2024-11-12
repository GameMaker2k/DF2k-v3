<?php echo '<?xml version="1.0" encoding="iso-8859-1"?>'."\r\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!--
   The contents of this file are subject to the Netscape Public License
   Version 1.0 (the "NPL"); you may not use this file except in
   compliance with the NPL.  You may obtain a copy of the NPL at
   http://www.mozilla.org/NPL/
  
   Software distributed under the NPL is distributed on an "AS IS" basis,
   WITHOUT WARRANTY OF ANY KIND, either express or implied. See the NPL
   for the specific language governing rights and limitations under the
   NPL.
  
   The Initial Developer of this code under the NPL is Netscape
   Communications Corporation.  Portions created by Netscape are
   Copyright (C) 1998 Netscape Communications Corporation.  All Rights
   Reserved.
   
   Contributor(s):
     Neil Deakin <enndeakin@sympatico.ca>
     Henrik Gemal <mozilla@gemal.dk>
     Alexey Chernyak <alexeyc@bigfoot.com> (XHTML 1.1 conversion)
 -->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
if ($_GET['Page']==null) {
	$_GET['Page']="12:10"; }
if ($_GET['Page']=="12:10") {?>
<title>The Book of Mozilla, 12:10</title>
<?php }
if ($_GET['Page']=="3:31") {?>
<title>The Book of Mozilla, 3:31</title>
<?php }
if ($_GET['Page']=="7:15") {?>
<title>The Book of Mozilla, 7:15</title>
<?php }
if ($_GET['Page']=="GPL") {?>
<title>GNU General Public License</title>
<?php } ?>
<link rel="icon" href="./misc/Mozilla.png" type="image/png" />
<style type="text/css">
html {
  background: maroon;
  color: white;
  font-style: italic;
}

.moztext {
  margin-top: 15%;
  font-size: 1.1em;
  font-family: serif;
  text-align: center;
  line-height: 1.5;
}

.from {
  font-size: 1.95em;
  font-family: serif;
  text-align: right;
}

em {
  font-size: 1.3em;
  line-height: 0;
}

.Renee img {
	border:0;
	vertical-align: middle;
	width:319px;
	height:385px;
}

.f {
  padding-left: .2ex;
}

</style>
</head>
<body>
<?php
if ($_GET['Page']=="12:10") {?>
<!-- 10th December 1994: Netscape Navigator 1.0 was released -->
<!-- This verse announces the birth of the beast (Netscape) and warns bad coders (up to Netscape 3, when you watched the HTML source code with the internal viewer, bad tags blinked). -->

<p class="moztext">

And the beast shall come forth surrounded by a roiling <em>cloud</em> of 
<em>vengeance</em>. The house of the unbelievers shall be <em>razed</em> 
and they shall be <em>scorched</em> to the earth. Their tags shall <em>blink</em> 
until the end of <em>days.</em>

</p>

<p class="from">
from <strong>The Book of Mozilla,</strong> 12:10
<?php }
if ($_GET['Page']=="3:31") {?>
<!-- 31st March 1998: the Netscape Navigator source code was released -->
<!-- The source code is made available to the legion of thousands of coders of the open source community, that will fight against the followers of Mammon (Microsoft Internet Explorer). -->

<p class="moztext">
And the beast shall be made <em>legion</em>. 
Its numbers shall be increased a <em>thousand thousand</em> fold. 
The din of a million keyboards like unto a great <em>storm</em> 

shall cover the earth, and the followers of Mammon shall <em>tremble</em>.
</p>

<p class="from"> 
 from <strong>The Book of Mozilla,</strong> 3:31<br/>
 (Red Letter Edition)
<?php }
if ($_GET['Page']=="7:15") {?>
<!-- 15th July 2003: AOL closed its Netscape division and the Mozilla foundation was created -->

<!-- The beast died (AOL closed its Netscape division) but immediately rose from its ashes (the creation of the Mozilla foundation and the Firebird browser, although the name was later changed to Firefox). -->

<p class="moztext">
And so at last the beast <em class="f">fell</em> and the unbelievers rejoiced.
But all was not lost, for from the ash rose a <em>great bird</em>.
The bird gazed down upon the unbelievers and cast <em class="f">fire</em>
and <em>thunder</em> upon them. For the beast had been
<em>reborn</em> with its strength <em>renewed</em>, and the
followers of <em>Mammon</em> cowered in horror.

</p>

<p class="from">
from <strong>The Book of Mozilla,</strong> 7:15
<?php }
if ($_GET['Page']=="GPL") {?>

<!--<span class="moztext">-->
<pre>
<?php require( './gpl.txt'); ?>
</pre>
<!--</span>-->

<p class="from"> 
from <strong>The GNU General Public License</strong>
<?php } ?>
<br />
<a href="http://validator.w3.org/check?uri=referer"><img src="./Pics/valid-html401.png" alt="Valid XHTML 1.1!" title="Valid XHTML 1.1!" style="width:88px; height:31px; border:0px;" /></a>
<a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="./Pics/valid-css.png" alt="Valid CSS!" title="Valid CSS!" style="width:88px; height:31px; border:0px;" /></a>
</p>
</body>
</html>
