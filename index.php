<?php 
	require_once "header_index.php";
?>
<div style="clear:both;"></div>	
<center id="centerer">
<a href="?ln=<?php echo $ln;?>"><img align="center" title="<?php echo $lang['logo_alt'] ?>" src="<?php echo $lang['logo_link'] ?>" alt="<?php echo $lang['logo_alt'] ?>"></a>
<div id="tj_keyboard" align="center"></div>
<div style="clear:both;"></div>	
<form name="searchForm" action="<?php $_SERVER['SCRIPT_NAME'];?>" method="post" id="searchForm">
<div id="formLeftTop"></div>
<div id="formLeftMid"></div>
<div id="formMidTop"></div>
<div id="formMidMid"></div>
<div id="formRightTop"></div>
<div id="formRightMid"></div>
<a href="javascript:tj_keyboard_on_off();" style="font-size: 10pt; text-decoration: none;" title="<?php echo $lang['toggle_keyboard']?>"><?php echo $lang['keyboard_toggle_link_text'] ?></a>
<br>
<input onblur=resetctrls() id="searchField" name="searchField1" autocomplete="off" type="text" maxlength="32" size="42" style="font: normal normal normal 18px/normal arial, sans-serif;" onkeydown=checkControlAlt(event) onmouseup=updateStartEnd() onkeypress="return translateKeyCode(event);" onkeyup="javascript:keyUp(event);ajaxsearch();" value="<?php if(@$_POST['searchField1']) {echo @$_POST['searchField1'];} else echo @$_GET['word'];?>">
<input type="submit" name="submit" title="<?php echo $lang['translate_button_text'] ?>" id="submit" value="<?php echo $lang['translate_button_text'] ?>">
<div id="popups">
<div id="trans_div">
<?php  
	if ((@isset($_POST['searchField1']) && @$_POST['searchField1']!='') || (isset($_GET['word']) && @$_GET['word']!='')) {  
	if (isset($_POST['searchField1']) && $_POST['searchField1']!='') {$word = mysql_prep($_POST['searchField1']);} else { $word = mysql_prep($_GET['word']); }
	write_last_word($word);
	$dirs = array("english_tajik","tajik_english","russian_tajik","tajik_russian");
	$langs1 = array("english","tajik","russian","tajik");
	$langs2 = array("tajik","english","tajik","russian");
	$l = 0;
	$found = array('','','','');
	$related = array(false,false,false,false);
	$dirsdef = array("entj","tjen","rutj","tjru");
	$direction = array("{$lang['en_tj_direction']}","{$lang['tj_en_direction']}","{$lang['ru_tj_direction']}","{$lang['tj_ru_direction']}");
	$dirimage = array("<span id='dirimages' title='{$lang['en_tj_direction']}'><img src='images/flags/usa.png' height='35' width='40'>  <img src='images/flags/tjk.png' height='35' width='40'></span>","<span id='dirimages' title='{$lang['tj_en_direction']}'><img src='images/flags/tjk.png' height='35' width='40'>  <img src='images/flags/usa.png' height='35' width='40'></span>","<span id='dirimages' title='{$lang['ru_tj_direction']}'><img src='images/flags/rus.png' height='35' width='40'>  <img src='images/flags/tjk.png' height='35' width='40'></span>","<span title='{$lang['tj_ru_direction']}' id='dirimages'><img src='images/flags/tjk.png' height='35' width='40'>  <img src='images/flags/rus.png' height='35' width='40'></span>");
	$first = 1;
	foreach ($dirs as $i) {
		$f = false;
		$query = "SELECT * FROM {$i} WHERE {$langs1[$l]}='{$word}' LIMIT 1";
		$result = mysql_query($query,$connection);
		if (!$result) {
			die ("Database query error: ".mysql_error());
		}
		$row=mysql_fetch_array($result);
		$found[$l] = $row[$langs2[$l]];
			if (($found[$l]!='')) { $f = true;
			echo "<div id='direction'><a title='{$lang['toggle_words']}' href='javascript:toggle_words(\"{$dirsdef[$l]}\")'><span id='toggleImages'><img src='images/down.png' id='rollimage{$dirsdef[$l]}'></span>{$dirimage[$l]}<div id='directionText'>{$direction[$l]}</div></a></div><div id='wordlist{$dirsdef[$l]}'>";
			if ($first == 1) { echo "<div id='wordlist'><strong>".$row[$langs1[$l]].":</strong><br>"; $first = 0; }
				else { echo "<div id='wordlist1'><strong>".$row[$langs1[$l]].":</strong><br>";$first = 1; }
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;".$found[$l]."</div>"; 
			}
		mysql_free_result($result);
		
		$query = "SELECT * FROM {$i} WHERE {$langs1[$l]} LIKE '{$word}%' LIMIT 10";
		$result = mysql_query($query,$connection);
		if (!$result) {
			die ("Database query error: ".mysql_error());
		}		 
		while($row = mysql_fetch_array($result)) {
				if ($found[$l]!=$row[$langs2[$l]]) 
			 		{ 
			 			if($found[$l]=='' && $f == false) {  $f = true;
							echo "<div id='direction'><a title='{$lang['toggle_words']}' href='javascript:toggle_words(\"{$dirsdef[$l]}\")'><span id='toggleImages'><img src='images/down.png' id='rollimage{$dirsdef[$l]}'></span>{$dirimage[$l]}<div id='directionText'>{$direction[$l]}</div></a></div><div id='wordlist{$dirsdef[$l]}'>";
						} 
			 	if ($first == 1) { echo "<div id='wordlist'><strong>".$row[$langs1[$l]].":</strong><br>"; $first = 0; }
					else { echo "<div id='wordlist1'><strong>".$row[$langs1[$l]].":</strong><br>";$first = 1; }	
				echo "&nbsp;&nbsp;&nbsp;&nbsp;".$row[$langs2[$l]]."</div>";
				$related[$l] = true;
			  		} 
			} 
		mysql_free_result($result);
		if ($found[$l]!='' || $f == true) {
				echo "</div>";
			}
		$l++;
	}
		if (isset($_POST['searchField1'])) { $out = htmlspecialchars($_POST['searchField1']); } else { $out = htmlspecialchars($_GET['word']); }
		if (empty($found[0]) && empty($found[1]) && empty($found[2]) && empty($found[3]) && (!$related[0]) && (!$related[1]) && (!$related[2]) && (!$related[3])) { 
			
			switch ($ln) {
				case 'tj':echo "<div id=\"wordlist\"><br>Калимаи <strong>";echo "{$out}</strong> ёфт нашуд</div>";break;
				case 'ru':echo "<div id=\"wordlist\"><br>Слово <strong>";echo "{$out}</strong> не найдено</div>";break;
				case 'en':echo "<div id=\"wordlist\"><br>The word <strong>";echo "{$out}</strong> not found</div>";break;
				default:echo "<div id=\"wordlist\"><br>Слово <strong>";echo "{$out}</strong> не найдено</div>";
			}
				}
				
				
				echo "<div id=\"wordlist\"><br><a href=\"http://www.google.com/search?q={$out}\" title=\"{$lang['google_search_text']}\">{$lang['google_search_text']}</a></div>"; 
	
	}	 // End of if (isset post searchField)	 	 
?>
</div>
<div id="formLeftBottom"></div>
<div id="formMidBottom"></div>
<div id="formRightBottom"></div>
</div>
</form>
</center>
<script type=text/javascript>setfocus();</script>
</div>
<?php 
	require_once "footer_index.php";
?>
