<?php
		$File1Name = dirname($_SERVER['PHP_SELF'])."/";
		$File2Name = $_SERVER['PHP_SELF'];
		$File3Name=str_replace($File1Name, null, $File2Name);
		if ($File3Name=="BBTags.php"||$File3Name=="/BBTags.php") {
		echo "<title>".$File3Name." (PHP File)</title>\n\r<b>Warning</b>: Failed to open stream: Permission denied in <b>".$File3Name."</b> on line <b>1</b>!<br />";
		exit(); }
		if ($Cool['id']==null) {
			$Cool['id']=1; }
		$_GET['YourPost'] = $post['Post'];
		//Change Text to Smiles
		/*$HTML01 = array("&lt;_&lt;", "&gt;_&lt;");
		$HTML02 = array("<_<", ">_<");*/
		$_GET['YourPost'] = str_replace($HTML01, $HTML02, $_GET['YourPost']);
		require('./Smiles.php');
		require_once('Functions.php');
		require_once('Encrypter2k.php');
		//BBTags 1
		//HTML Tags to BBCodes Tags
		$br1 = array("[BR]", "[br]", "[HR]", "[hr]", "&lt;_&lt;", "&gt;_&lt;");
        $br2 = array("<br />\r\n", "<br />\r\n", "<hr />\r\n", "<hr />\r\n");
        $_GET['YourPost'] = preg_replace("/\<xmp\>/isxS", "<pre>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\<\/xmp\>/isxS", "</pre>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/ona/isxS", "&#111;na", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/onb/isxS", "&#111;nb", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/onc/isxS", "&#111;nc", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/ond/isxS", "&#111;nd", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/one/isxS", "&#111;ne", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/onf/isxS", "&#111;nf", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/onh/isxS", "&#111;nh", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/onk/isxS", "&#111;nk", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/onl/isxS", "&#111;nl", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/onm/isxS", "&#111;nm", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/onp/isxS", "&#111;np", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/onr/isxS", "&#111;nr", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/ons/isxS", "&#111;ns", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/onu/isxS", "&#111;nu", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[%(.*?)%\]/isxS", "&#91;\\1&#93;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[\?(.*?)\?\]/isxS", "&#91;\\1&#93;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(%(.*?)%\)/isxS", "&#40;\\1&#41;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(\?(.*?)\?\)/isxS", "&#40;\\1&#41;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\{%(.*?)%\}/isxS", "&#123;\\1&#125;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\{\?(.*?)\?\}/isxS", "&#123;\\1&#125;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BR\]/isxS", "<br />\r\n", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[HR\]/isxS", "<hr />\r\n", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[TAB\]/isxS", "\t", $_GET['YourPost']);
		/* BBTags Under Here use Functions From Functions.php
		Thanks for the Help of czambran at http://www.phpfreaks.com/forums/index.php?showuser=15535 */
		$_GET['YourPost'] = preg_replace("/java/isxS", "&#106;ava", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/java/isxS", "&#106;ava", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/vbscript/isxS", "&#118;bscript", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/script/isxS", "&#115;cript", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/applet/isxS", "&#97;pplet", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[LineBreak\](.*?)\[\/LineBreak\]/isxS",'line_break',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[LineBreak=Auto\](.*?)\[\/LineBreak\]/isxS",'line_break',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[LineBreaks\](.*?)\[\/LineBreaks\]/isxS",'line_break',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[LineBreaks=Auto\](.*?)\[\/LineBreaks\]/isxS",'line_break',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[DoHTML\](.*?)\[\/DoHTML\]/isxS",'htmldecode',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[DoHTML\=LineBreak\](.*?)\[\/DoHTML\]/isxS",'htmldecode2',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[DoHTML\=LineBreaks\](.*?)\[\/DoHTML\]/isxS",'htmldecode2',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[ExcHTML\](.*?)\[\/ExcHTML\]/isxS",'htmldecode',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[ExcHTML\=LineBreak\](.*?)\[\/ExcHTML\]/isxS",'htmldecode2',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[ExcHTML\=LineBreak\](.*?)\[\/ExcHTML\]/isxS",'htmldecode2',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[Extra\=Decrypt\](.*?)\[\/Extra\]/isxS",'Decrypt',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[Extra\=Encrypt1\](.*?)\[\/Extra\]/isxS",'Encrypt1',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[Extra\=Encrypt2\](.*?)\[\/Extra\]/isxS",'Encrypt2',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[Extra\=Encrypt3\](.*?)\[\/Extra\]/isxS",'Encrypt3',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[RAND\=(.*?),(.*?)\]/isxS",'randnumber',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[Backwards\](.*?)\[\/Backwards\]/isxS",'backwards',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[crc32\](.*?)\[\/crc32\]/isxS",'showcrc32',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[Rot13\](.*?)\[\/Rot13\]/isxS",'rot13',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[md5\](.*?)\[\/md5\]/isxS",'showmd5',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[sha1\](.*?)\[\/sha1\]/isxS",'showsha1',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[PHP\](.*?)\[\/PHP\]/isxS",'phpcolorone',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[CODE\=PHP\](.*?)\[\/CODE\]/isxS",'phpcolortwo',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[Loop\=(.*?)\](.*?)\[\/Loop\]/isxS",'BBLoop',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[Loop\=(.*?)\]/isxS",'BBCount',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[soundex\](.*?)\[\/soundex\]/isxS",'soundextext',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[soundex\=(.*?)\]/isxS",'soundextext',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[metaphone\](.*?)\[\/metaphone\]/isxS",'metaphonetext',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[metaphone\=(.*?)\]/isxS",'metaphonetext',$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace_callback("/\[Entitie\=(.*?)\]/is",'CoolEntities',$_GET['YourPost']);
		//Me Tag Start Here
		$YourLastReply="$HTTP_COOKIE_VARS[LastReply]";
		$YourName=$_SESSION['MemberName'];
		$_GET['YourPost'] = preg_replace("/\[LASTREPLY\]/isxS", $YourLastReply, $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\{LASTREPLY\}/isxS", $YourLastReply, $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[YOU\]/isxS", "<span class=\"metag\">*$YourName</span>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\{YOU\}/isxS", "<span class=\"metag\">*$YourName</span>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[ME\](.*?)\[\/ME\]/isxS", "<span class=\"metag\">*\\1</span>", $_GET['YourPost']);
		//BBC to Special Characters Tags
		$_GET['YourPost'] = preg_replace("/\(...\)/isxS", "�", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(TM\)/isxS", "&trade;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(C\)/isxS", "&copy;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(R\)/isxS", "&reg;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Cents\)/isxS", "&cent;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Cent\)/isxS", "&cent;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Pound\)/isxS", "&pound;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Yen\)/isxS", "&yen;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Currency\)/isxS", "&curren;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Paragraph\)/isxS", "&para;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Permil\)/isxS", "&permil;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(leftanglequote\)/isxS", "&lsaquo;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(rightanglequote\)/isxS", "&rsaquo;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(rightanglequote2\)/isxS", "&raquo;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(leftanglequote2\)/isxS", "&laquo;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Spades\)/isxS", "&spades;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Clubs\)/isxS", "&clubs;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Hearts\)/isxS", "&hearts;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Diamonds\)/isxS", "&diams;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(Dagger\)/isxS", "&dagger;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(DoubleDaggers\)/isxS", "&Dagger;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\(DoubleDagger\)/isxS", "&Dagger;", $_GET['YourPost']);
		$BoardName = $Settings['board_name'];
		$_GET['YourPost'] = preg_replace("/\[BoardName\]/isxS", "$BoardName", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Search\=(.*?),(.*?)\]/isxS", "<a title=\"Search for all \\1 made by \\2\" href=\"Search.php?act=Search&amp;SerchUser=\\2&amp;Type=\\1\">Search for \\1</a>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Jcink\]/isxS", "<a href=\"http://jcinkcom.ho8.com/jcinkforums/index.php?showuser=1\" target=\"_blank\">Jcink</a>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Lone W�lf\]/isxS", "<a href=\"http://jcinkcom.ho8.com/jcinkforums/index.php?showuser=7\" target=\"_blank\">Lone W�lf</a>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Cool Dude 2k\]/isxS", "<a href=\"http://s2.invisionfree.com/Game_Maker_2k/index.php?showuser=1\" target=\"_blank\">Cool Dude 2k</a>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[CD2k\]/isxS", "<a href=\"http://s2.invisionfree.com/Game_Maker_2k/index.php?showuser=1\" target=\"_blank\">Cool Dude 2k</a>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Game Maker 2k\]/isxS", "<a href=\"http://cooldude2k.vzz.net/GameMaker2k/\" target=\"_blank\">Game Maker 2k</a>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[GM2k\]/isxS", "<a href=\"http://cooldude2k.vzz.net/GameMaker2k/\" target=\"_blank\">Game Maker 2k</a>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Discussion Forums 2k\]/isxS", "<a href=\"http://gamemaker2k.fat-host.com/index.php?Page=Home\" target=\"_blank\">Discussion Forums 2k</a>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[DF2k\]/isxS", "<a href=\"http://gamemaker2k.fat-host.com/index.php?Page=Home\" target=\"_blank\">Discussion Forums 2k</a>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[TT\](.*?)\[\/TT\]/isxS", "<tt>\\1</tt>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Blink\](.*?)\[\/Blink\]/isxS", "<blink>\\1</blink>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[ISINDEX\=(.*?)\]/isxS", "<isindex value=\"\\1\" />\r\n", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[ISINDEX\]/isxS", "<isindex />\r\n", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[DEL\](.*?)\[\/DEL\]/isxS", "<del>\\1</del>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[INS\](.*?)\[\/INS\]/isxS", "<ins>\\1</ins>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SUP\](.*?)\[\/SUP\]/isxS", "<sup>\\1</sup>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[SUB\](.*?)\[\/SUB\]/isxS", "<sub>\\1</sub>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[B\](.*?)\[\/B\]/isxS", "<b>\\1</b>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Bold\](.*?)\[\/Bold\]/isxS", "<b>\\1</b>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Strong\](.*?)\[\/Strong\]/isxS", "<strong>\\1</strong>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[I\](.*?)\[\/I\]/isxS", "<i>\\1</i>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Italic\](.*?)\[\/Italic\]/isxS", "<i>\\1</i>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[EM\](.*?)\[\/EM\]/isxS", "<em>\\1</em>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[ADDRESS\](.*?)\[\/ADDRESS\]/isxS", "<address>\\1</address>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[ACRONYM\](.*?)\[\/ACRONYM\]/isxS", "<acronym>\\1</acronym>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[ABBR\](.*?)\[\/ABBR\]/isxS", "<abbr>\\1</abbr>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[VAR\](.*?)\[\/VAR\]/isxS", "<var>\\1</var>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[CITE\](.*?)\[\/CITE\]/isxS", "<cite>\\1</cite>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[DFN\](.*?)\[\/DFN\]/isxS", "<dfn>\\1</dfn>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[U\](.*?)\[\/U\]/isxS", "<u>\\1</u>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[UnderLine\](.*?)\[\/UnderLine\]/isxS", "<u>\\1</u>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SAMP\](.*?)\[\/SAMP\]/isxS", "<samp>\\1</samp>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[KBD\](.*?)\[\/KBD\]/isxS", "<kbd>\\1</kbd>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[CODE\](.*?)\[\/CODE\]/isxS", "<code>\\1</code>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[OverLine\](.*?)\[\/OverLine\]/isxS", "<span style=\"text-decoration: overline\">\\1</span>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[CAPITALIZE\](.*?)\[\/CAPITALIZE\]/isxS", "<span style=\"text-transform: capitalize\">\\1</span>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[UPPERCASE\](.*?)\[\/UPPERCASE\]/isxS", "<span style=\"text-transform: uppercase\">\\1</span>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SMALL-CAPS\](.*?)\[\/SMALL-CAPS\]/isxS", "<span style=\"font-variant: small-caps\">\\1</span>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[LETTER-SPACING\=(.*?)\](.*?)\[\/LETTER-SPACING\]/isxS", "<span style=\"letter-spacing: \\1;\">\\2</span>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[OL\](.*?)\[\/OL\]/isxS", "<span style=\"text-decoration: overline\">\\1</span>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[S\](.*?)\[\/S\]/isxS", "<s>\\1</s>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Strike\](.*?)\[\/Strike\]/isxS", "<s>\\1</s>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[P\](.*?)\[\/P\]/isxS", "<p>\\1</p>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BUTTON\](.*?)\[\/BUTTON\]/isxS", "<button>\\1</button>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[ALIGN=(.*?)\](.*?)\[\/ALIGN\]/isxS", "<p align=\"\\1\">\\2</p>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[CENTER\](.*?)\[\/CENTER\]/isxS", "<center>\\1</center>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[MARQUEE\=(.*?),(.*?)\](.*?)\[\/MARQUEE\]/isxS", "<marquee direction=\"\\1\" OnMouseOver=\"direction='\\2';\" OnMouseOut=\"direction='\\1';\">\\3</marquee>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[MARQUEE\](.*?)\[\/MARQUEE\]/isxS", "<marquee>\\1</marquee>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[MARQUEE\=(.*?)\](.*?)\[\/MARQUEE\]/isxS", "<marquee direction=\"\\1\">\\2</marquee>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[WINGDINGS\](.*?)\[\/WINGDINGS\]/isxS", "<font face=\"Wingdings\">\\1</font>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[PRE\](.*?)\[\/PRE\]/isxS", "<pre>\\1</pre>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BLOCKQUOTE\](.*?)\[\/BLOCKQUOTE\]/isxS", "<blockquote>\\1</blockquote>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BIG\](.*?)\[\/BIG\]/isxS", "<big>\\1</big>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[SMALL\](.*?)\[\/SMALL\]/isxS", "<small>\\1</small>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BDO\=(.*?)\](.*?)\[\/BDO\]/isxS", "<bdo dir=\"\\1\">\\2</bdo>", $_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[BDO\](.*?)\[\/BDO\]/isxS", "<bdo>\\1</bdo>", $_GET['YourPost']);
		$_GET['YourPost'] = str_replace($MeTag1, $MeTag2, $_GET['YourPost']);
		$_GET['YourPost'] = str_replace($LineBreak1, $LineBreak2, $_GET['YourPost']);	
		/*Headings Start*/
		$_GET['YourPost'] = preg_replace("/\[H1\](.*?)\[\/H1\]/isxS", "<h1>1</h1>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[H2\](.*?)\[\/H2\]/isxS", "<h2>2</h2>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[H3\](.*?)\[\/H3\]/isxS", "<h3>3</h3>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[H4\](.*?)\[\/H4\]/isxS", "<h4>4</h4>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[H5\](.*?)\[\/H5\]/isxS", "<h5>5</h5>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[H6\](.*?)\[\/H6\]/isxS", "<h6>6</h6>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[CODEBOX\](.*?)\[\/CODEBOX\]/isxS", "<span class=CodeBox>\\1</span>\r\n", $_GET['YourPost']);
		/* BBTags Functions End */
		$_GET['YourPost'] = preg_replace("/\[PIC\=(.*?),(.*?)\](.*?)\[\/PIC\]/isxS","<img src=\"\\1\" title=\"user posted image\" alt=\"user posted Pic\" style=\"vertical-align:middle; width: \\1; height: \\2;\" border=\"0\" />",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[PIC\](.*?)\[\/PIC\]/isxS", "<img src=\"\\1\" title=\"user posted image\" alt=\"user posted Pic\" style=\"vertical-align:middle\" border=\"0\" />", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[IMG\=(.*?),(.*?)\](.*?)\[\/IMG\]/isxS","<img src=\"\\3\" title=\"user posted image\" alt=\"user posted image\" style=\"vertical-align:middle; width: \\1; height: \\2;\" border=\"0\" />",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[IMG\=(.*?)\](.*?)\[\/IMG\]/isxS","[IMG]\\1[/IMG]",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BUTTON\](.*?)\[\/BUTTON\]/isxS","<button>\\1</button>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BUTTON\=(.*?)\](.*?)\[\/BUTTON\]/isxS","<input type=\"\\1\" value=\"\\2\" />",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[IMG\](.*?)\[\/IMG\]/isxS","<img src=\"\\1\" title=\"user posted image\" alt=\"user posted image\" style=\"vertical-align:middle\" border=\"0\" />",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[RS\]/isxS", "<!--<a href='mailto:RSABONIS081@maine207west.org'>-->Renee Sabonis<!--</a>-->", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[URL\](.*?)\[\/URL\]/isxS","<a href=\"\\1\" title=\"user posted link\" target=\"_blank\">\\1</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[URL\=(.*?)\](.*?)\[\/URL\]/isxS","<a href=\"\\1\" title=\"user posted link\"  target=\"_blank\">\\2</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[EMAIL\=(.*?)\](.*?)\[\/EMAIL\]/isxS","<a href=\"mailto:\\1\" target=\"_blank\" title=\"user posted email\">\\2</a>",$_GET['YourPost']);
		//$_GET['YourPost'] = preg_replace("/\[IMG\=(.*?)\](.*?)\[\/IMG\]/isxS","<img src=\"\\1\" alt=\"\\2\" style=\"vertical-align:middle\" border=\"0\" />",$_GET['YourPost']);/*Renee Sabonis*/
        $_GET['YourPost'] = preg_replace("/\[SWF\=(.*?),(.*?),(.*?)\](.*?)\[\/SWF\]/isxS","<div align=\"\\3\"><object type=\"application/x-shockwave-flash\" data=\"\\4\" width=\"\\1\" height=\"\\2\">\r\n<param name=\"movie\" value=\"\\4\" />\r\n</object></div>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Flash\=(.*?),(.*?),(.*?)\](.*?)\[\/Flash\]/isxS","<div align=\"\\3\"><object type=\"application/x-shockwave-flash\" data=\"\\4\" width=\"\\1\" height=\"\\2\">\r\n<param name=\"movie\" value=\"\\4\" />\r\n</object></div>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SWF\=(.*?),(.*?)\](.*?)\[\/SWF\]/isxS","<object type=\"application/x-shockwave-flash\" data=\"\\3\" width=\"\\1\" height=\"\\2\">\r\n<param name=\"movie\" value=\"\\3\" />\r\n</object>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Flash\=(.*?),(.*?)\](.*?)\[\/Flash\]/isxS","<object type=\"application/x-shockwave-flash\" data=\"\\3\" width=\"\\1\" height=\"\\2\">\r\n<param name=\"movie\" value=\"\\3\" />\r\n</object>",$_GET['YourPost']);
		 $_GET['YourPost'] = preg_replace("/\[LINK\=(.*?),(.*?),(.*?)\](.*?)\[\/LINK\]/isxS","<link type=\"\\1\" rel=\"\\2\" href=\"\\3\" href=\"\\4\" />",$_GET['YourPost']);
		 $_GET['YourPost'] = preg_replace("/\[LINK\=(.*?),(.*?)\](.*?)\[\/LINK\]/isxS","<link type=\"\\1\" rel=\"\\2\" href=\"\\3\" />",$_GET['YourPost']);
        /* Javascript things With Math and Variable Making Here */
		$_GET['YourPost'] = preg_replace("/\[Math\=(.*?)\]/isxS", "<script type=\"text/javascript\"><!--\r\nvar Math = \\1;\r\ndocument.writeln(''+Math+'');\r\n// --></script>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Add\=(.*?),(.*?)\]/isxS", "<script type=\"text/javascript\"><!--\r\nvar Add = \\1+\\2;\r\ndocument.writeln(''+Add+'');\r\n// --></script>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Subtract\=(.*?),(.*?)\]/isxS", "<script type=\"text/javascript\"><!--\r\nvar Subtract = \\1-\\2;\r\ndocument.writeln(''+Subtract+'');\r\n// --></script>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Multiply\=(.*?),(.*?)\]/isxS", "<script type=\"text/javascript\"><!--\r\nvar Multiply = \\1*\\2;\r\ndocument.writeln(''+Multiply+'');\r\n// --></script>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Divide\=(.*?),(.*?)\]/isxS", "<script type=\"text/javascript\"><!--\r\nvar Divide = \\1/\\2;\r\ndocument.writeln(''+Divide+'');\r\n// --></script>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[VAR\=(.*?),Text,(.*?)\]/isxS", "<script type=\"text/javascript\">\r\n<!--\r\nvar \\1 = '\\2';\r\n// -->\r\n</script>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[VAR\=(.*?),String,(.*?)\]/isxS", "<script type=\"text/javascript\">\r\n<!--\r\nvar \\1 = '\\2';\r\n// -->\r\n</script>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[VAR\=(.*?),Number,(.*?)\]/isxS", "<script type=\"text/javascript\">\r\n<!--\r\nvar \\1 = \\2;\r\n// -->\r\n</script>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[VAR\=(.*?),(.*?)\]/isxS", "<script type=\"text/javascript\">\r\n<!--\r\nvar \\1 = '\\2';\r\n// -->\r\n</script>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[ShowVar\=(.*?)\]/isxS", "<script type=\"text/javascript\">\r\n<!--\r\ndocument.writeln(''+\\1+'');\r\n// -->\r\n</script>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Alert\](.*?)\[\/Alert\]/isxS","<a href=\"Javascript: alert('\\1');\">\\1</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Alert\=(.*?)\](.*?)\[\/Alert\]/isxS","<a href=\"Javascript: alert('\\1');\">\\2</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Scroll\=By,(.*?),(.*?)\]/isxS","<a href=\"Javascript: scrollBy(\\1,\\2);\">Scroll Page</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Scroll\=To,(.*?),(.*?)\]/isxS","<a href=\"Javascript: scrollTo(\\1,\\2);\">Scroll Page</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Scroll\=(.*?),(.*?)\]/isxS","<a href=\"Javascript: scrollBy(\\1,\\2);\">Scroll Page</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[MoveWindow\=By,(.*?),(.*?)\]/isxS","<a href=\"Javascript: moveBy(\\1,\\2);\">Move Window</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[MoveWindow\=To,(.*?),(.*?)\]/isxS","<a href=\"Javascript: moveTo(\\1,\\2);\">Move Window</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[MoveWindow\=(.*?),(.*?)\]/isxS","<a href=\"Javascript: moveBy(\\1,\\2);\">Move Window</a>",$_GET['YourPost']);
		/* End of the Javascript Here */
		$_GET['YourPost'] = preg_replace("/\[LINK\=(.*?)\](.*?)\[\/LINK\]/isxS","<link type=\"\\1\" href=\"\\2\" />",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[COLOR\=(.*?),(.*?),(.*?)\](.*?)\[\/COLOR\]/isxS","<font color=\"\\1\" onmouseover=\"color='\\2';\" onmouseout=\"color='\\3';\">\\4</font>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[COLOR\=(.*?),(.*?)\](.*?)\[\/COLOR\]/isxS","<font color=\"\\1\" onmouseover=\"color='\\2';\" onmouseout=\"color='\\1';\">\\3</font>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BASE COLOR\=(.*?)\]/isxS","<basefont color=\"\\1\">",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[COLOR\=(.*?)\](.*?)\[\/COLOR\]/isxS","<font color=\"\\1\">\\2</font>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[COLOUR\=(.*?),(.*?),(.*?)\](.*?)\[\/COLOUR\]/isxS","<font color=\"\\1\" onmouseover=\"color='\\2';\" onmouseout=\"color='\\3';\">\\4</font>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[COLOUR\=(.*?),(.*?)\](.*?)\[\/COLOUR\]/isxS","<font color=\"\\1\" onmouseover=\"color='\\2';\" onmouseout=\"color='\\1';\">\\3</font>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BASE COLOUR\=(.*?)\]/isxS","<basefont color=\"\\1\">",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[COLOUR\=(.*?)\](.*?)\[\/COLOUR\]/isxS","<font color=\"\\1\">\\2</font>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[FONT\=(.*?),(.*?)\](.*?)\[\/FONT\]/isxS","<font face=\"\\1\" onmouseover=\"face='\\2';\" onmouseout=\"face='\\1';\">\\3</font>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[FONT\=(.*?),(.*?),(.*?)\](.*?)\[\/FONT\]/isxS","<font color=\"\\1\" face=\"\\2\" size=\"\\3\">\\4</font>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[FONT\=(.*?)\](.*?)\[\/FONT\]/isxS","<font face=\"\\1\">\\2</font>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BASE FONT\=(.*?)\]/isxS","<basefont face=\"\\1\">",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[SIZE\=(.*?),(.*?)\](.*?)\[\/SIZE\]/isxS","<font size=\"\\1\" onmouseover=\"size='\\2';\" onmouseout=\"size='\\1';\">\\3</font>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SIZE\=(.*?)\](.*?)\[\/SIZE\]/isxS","<font size=\"\\1\">\\2</font>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[BASE SIZE\=(.*?)\]/isxS","<basefont size=\"\\1\">",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SPANSTYLE\=(.*?)\](.*?)\[\/SPAN\]/isxS","<span style=\"\\1\">\\2</span>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SPAN STYLE\=(.*?)\](.*?)\[\/SPAN\]/isxS","<span style=\"\\1\">\\2</span>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SPANCLASS\=(.*?)\](.*?)\[\/SPAN\]/isxS","<span class=\"\\1\">\\2</span>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SPAN CLASS\=(.*?)\](.*?)\[\/SPAN\]/isxS","<span class=\"\\1\">\\2</span>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[DIVSTYLE\=(.*?)\](.*?)\[\/DIV\]/isxS","<div style=\"\\1\">\\2</div>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[DIV STYLE\=(.*?)\](.*?)\[\/DIV\]/isxS","<div style=\"\\1\">\\2</div>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[DIVCLASS\=(.*?)\](.*?)\[\/DIV\]/isxS","<div class=\"\\1\">\\2</div>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[DIV CLASS\=(.*?)\](.*?)\[\/DIV\]/isxS","<div class=\"\\1\">\\2</div>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[ALIGN=(.*?)\](.*?)\[\/ALIGN\]/isxS","<div align=\"\\1\">\\2</div>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[LIST\](.*?)\[\/LIST\]/isxS","<ul>\\1</ul>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[LIST\=Compact\](.*?)\[\/LIST\]/isxS","<ul compact>\\1</ul>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[LIST\=(.*?),Compact\](.*?)\[\/LIST\]/isxS","<ol type=\"\\1\" compact>\\2</ol>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[LIST\=(.*?),(.*?)\](.*?)\[\/LIST\]/isxS","<ol type=\"\\1\" START=\"\\2\">\\3</ol>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[LIST\=(.*?)\](.*?)\[\/LIST\]/isxS","<ol type=\"\\1\">\\2</ol>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[\*\=(.*?)\](.*?)/isxS","<li value=\"\\1\">\\2",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[\*\](.*?)/isxS","<li>\\1",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[&#x(.*?)\]/isxS", "&#x\\1;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[&#(.*?)\]/isxS", "&#\\1;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[&(.*?)\]/isxS", "&\\1;", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[TABLE\](.*?)\[\/TABLE\]/isxS","<table>\\1</table>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[TABLE\=(.*?)\](.*?)\[\/TABLE\]/isxS","<table \\1>\\2</table>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[TR\](.*?)\[\/TR\]/isxS","<tr>\\1</tr>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[TR\=(.*?)\](.*?)\[\/TR\]/isxS","<tr \\1>\\2</tr>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[TD\](.*?)\[\/TD\]/isxS","<td>\\1</td>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[TD\=(.*?)\](.*?)\[\/TD\]/isxS","<td \\1>\\2</td>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[TH\](.*?)\[\/TH\]/isxS","<th>\\1</th>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[TH\=(.*?)\](.*?)\[\/TH\]/isxS","<th \\1>\\2</th>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[THEAD\](.*?)\[\/THEAD\]/isxS","<thead>\\1</thead>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[THEAD\=(.*?)\](.*?)\[\/THEAD\]/isxS","<thead \\1>\\2</thead>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[TBODY\](.*?)\[\/TBODY\]/isxS","<tbody>\\1</tbody>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[TBODY\=(.*?)\](.*?)\[\/TBODY\]/isxS","<tbody \\1>\\2</tbody>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[TFOOT\](.*?)\[\/TFOOT\]/isxS","<tfoot>\\1</tfoot>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[TFOOT\=(.*?)\](.*?)\[\/TFOOT\]/isxS","<tfoot \\1>\\2</tfoot>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[MENU\](.*?)\[\/MENU\]/isxS","<select class=\"Menu\" size=\"1\" name=\"MENU\">\\1</select>",$_GET['YourPost']);	    
        $_GET['YourPost'] = preg_replace("/\[MENU\=(.*?)\](.*?)\[\/MENU\]/isxS","<select class=\"Menu\" size=\"1\" name=\"\\1\">\\2</select>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[OPTION\](.*?)\[\/OPTION\]/isxS","<option>\\1</option>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[OPTION\=(.*?)\](.*?)\[\/OPTION\]/isxS","<option value=\"\\1\">\\2</option>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[OPTGROUP\](.*?)\[\/OPTGROUP\]/isxS","<optgroup>\\1</optgroup>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[OPTGROUP\=(.*?)\](.*?)\[\/OPTGROUP\]/isxS","<optgroup value=\"\\1\">\\2</optgroup>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[\FORUM\=(.*?)\]/isxS","<a href=\"Forum.php?id=\\1\" title=\"Goto Form #\\1\">Goto Form #\\1</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[\TOPIC\=(.*?),(.*?)\]/isxS","<a href=\"Topic.php?id=\\2&amp;ForumID=\\1\" title=\"Goto Form #\\1 Topic #\\2\">Goto Form #\\1 Topic #\\2</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[FrameSet\=(.*?),(.*?),(.*?),(.*?)\](.*?)\[\/FrameSet\]/isxS","<frameset rows=\"\\1,\\2\" cols=\"\\3,\\4\">\\5</frameset>",$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\[Frame\=(.*?)\](.*?)\[\/Frame\]/isxS","<frame src=\"\\1\" name=\"\\2\" />",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[User\=(.*?)\]/isxS","<a href=\"Members.php?act=Profile&id=\\1\" title=\"See User #\\1's Profile\">Show User #\\1</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[ShowUser\=(.*?)\]/isxS","<a href=\"Members.php?act=Profile&id=\\1\" title=\"See User #\\1's Profile\">Show User #\\1</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[Help\=(.*?)\](.*?)\[\/Help\]/isxS","<a href=\"Help.php?act=Help&amp;id=\\1\">\\2</a>",$_GET['YourPost']);
		//BBTags 2
		$_GET['YourPost'] = preg_replace("/\{\FORUM\=(.*?)\}/isxS","<a href=\"Forum.php?id=\\1\" title=\"Goto Form #\\1\">Goto Form #\\1</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\{\TOPIC\=(.*?),(.*?)\}/isxS","<a href=\"Topic.php?id=\\2&amp;ForumID=\\1\" title=\"Goto Form #\\1 Topic #\\2\">Goto Form #\\1 Topic #\\2</a>",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\{DATE\}/isxS",date("F j, Y"),$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\{TIME\}/isxS",date("g:i:s a"),$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\{IP\}/isxS",$_SERVER['REMOTE_ADDR'],$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\{LASTREPLY\}/isxS",$YourLastReply,$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\{SESSION\=ID\}/isxS",session_id(),$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\{USERAGENT\}/isxS",$_SERVER['HTTP_USER_AGENT'],$_GET['YourPost']);
        $_GET['YourPost'] = preg_replace("/\{PORT\}/isxS",$_SERVER['REMOTE_PORT'],$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\{SPACE\}/isxS","&nbsp;",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SPACE\]/isxS","&nbsp;",$_GET['YourPost']);
		$doHTML1 = array("<(", ")>");
        $doHTML2 = array("<", ">");
		$_GET['YourPost'] = str_replace($doHTML1, $doHTML2, $_GET['YourPost']);
		/* Form Things */
		$_GET['YourPost'] = preg_replace("/\[Text\=(.*?),(.*?)\](.*?)\[\/Text\]/isxS","<input type=\"\\1\" name=\"\\2\" value=\"\\3\" />",$_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[TextArea\=(.*?),(.*?),(.*?)\](.*?)\[\/TextArea\]/isxS","<textarea name=\"\\1\" rows=\"\\2\" cols=\"\\3\">\\4</textarea>",$_GET['YourPost']);
		/*Code, HTML, PHP, SQL, ASP, Quote Tags*/
		$_GET['YourPost'] = preg_replace("/\[FieldSet\=(.*?)\](.*?)\[\/FieldSet\]/isxS", "<fieldset class=\"CodeBottom\"><legend class=\"CodeTop\"><font color=\"white\"><b>\\1</b></font></legend>\\2</fieldset>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[FieldSet\](.*?)\[\/FieldSet\]/isxS", "<fieldset class=\"CodeBottom\"><legend class=\"CodeTop\"><font color=\"white\"><b>CODE</b></font></legend>\\1</fieldset>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[CODE\=(.*?)\](.*?)\[\/CODE\]/isxS", "<!--CTS--><table border=\"0\" align=\"center\" width=\"95%\" cellpadding=\"3\" cellspacing=\"1\"><tr><td class=\"CodeTop\"><b>\\1</b></td><!--CTE--></tr><tr><!--CBS--><td class=\"CodeBottom\" style=\"height:50px;overflow:auto\">\\2</td><!--CBE--></tr></table>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[CODE\](.*?)\[\/CODE\]/isxS", "<!--CTS--><table border=\"0\" align=\"center\" width=\"95%\" cellpadding=\"3\" cellspacing=\"1\"><tr><td class=\"CodeTop\"><b>Code</b></td><!--CTE--></tr><tr><!--CBS--><td style=\"height:50px;overflow:auto\">\\1</td><!--CBE--></tr></table>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[HTML\](.*?)\[\/HTML\]/isxS", "<!--CTS--><table border=\"0\" align=\"center\" width=\"95%\" cellpadding=\"3\" cellspacing=\"1\"><tr><td class=\"CodeTop\"><b>HTML</b></td><!--CTE--></tr><tr><!--CBS--><td class=\"CodeBottom\" style=\"height:50px;overflow:auto\">highlight_string('\\1')</td><!--CBE--></tr></table>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[PHP\](.*?)\[\/PHP\]/isxS", "<!--CTS--><table border=\"0\" align=\"center\" width=\"95%\" cellpadding=\"3\" cellspacing=\"1\"><tr><td class=\"CodeTop\"><b>PHP</b></td><!--CTE--></tr><tr><!--CBS--><td class=\"CodeBottom\" style=\"height:50px;overflow:auto\">\\1</td><!--CBE--></tr></table>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[ASP\](.*?)\[\/ASP\]/isxS", "<!--CTS--><table border=\"0\" align=\"center\" width=\"95%\" cellpadding=\"3\" cellspacing=\"1\"><tr><td class=\"CodeTop\"><b>ASP</b></td><!--CTE--></tr><tr><!--CBS--><td class=\"CodeBottom\" style=\"height:50px;overflow:auto\">\\1</td><!--CBE--></tr></table>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[SQL\](.*?)\[\/SQL\]/isxS", "<!--CTS--><table border=\"0\" align=\"center\" width=\"95%\" cellpadding=\"3\" cellspacing=\"1\"><tr><td class=\"CodeTop\"><b>SQL</b></td><!--CTE--></tr><tr><!--CBS--><td class=\"CodeBottom\" style=\"height:50px;overflow:auto\">\\1</td><!--CBE--></tr></table>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[C++\](.*?)\[\/C++\]/isxS", "<!--CTS--><table border=\"0\" align=\"center\" width=\"95%\" cellpadding=\"3\" cellspacing=\"1\"><tr><td class=\"CodeTop\"><b>C\C++</b></td><!--CTE--></tr><tr><!--CBS--><td class=\"CodeBottom\" style=\"height:50px;overflow:auto\">\\1</td><!--CBE--></tr></table>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[QUOTE\](.*?)\[\/QUOTE\]/isxS", "<!--QTS--><table border=\"0\" align=\"center\" width=\"95%\" cellpadding=\"3\" cellspacing=\"1\"><tr><td class=\"QuoteTop\"><b>QUOTE</b></td><!--QTE--></tr><tr><!--QBS--><td class=\"QuoteBottom\" style=\"height:50px;overflow:auto\">\\1</td><!--QBE--></tr></table>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[QUOTE\=(.*?)\](.*?)\[\/QUOTE\]/isxS", "<!--QTS--><table border=\"0\" align=\"center\" width=\"95%\" cellpadding=\"3\" cellspacing=\"1\"><tr><td class=\"QuoteTop\"><b>QUOTE</b> (\\1)</td><!--QTE--></tr><tr><!--QBS--><td class=\"QuoteBottom\" style=\"height:50px;overflow:auto\">\\2</td><!--QBE--></tr></table>", $_GET['YourPost']);
		$_GET['YourPost'] = preg_replace("/\[QUOTE\=(.*?),(.*?)\](.*?)\[\/QUOTE\]/isxS", "<!--QTS--><table border=\"0\" align=\"center\" width=\"95%\" cellpadding=\"3\" cellspacing=\"1\"><tr><td class=\"QuoteTop\"><b>QUOTE</b> (\\1 &#064; \\2)</td><!--QTE--></tr><tr><!--QBS--><td class=\"QuoteBottom\" style=\"height:50px;overflow:auto\">\\3</td><!--QBE--></tr></table>", $_GET['YourPost']);
		/*Headings End*/
		$_GET['YourPost'] = str_replace($br1, $br2, $_GET['YourPost']);
		$Post = $_GET['YourPost'];
		$post['Post'] = $_GET['YourPost'];
		++$Cool['id'];
		?>