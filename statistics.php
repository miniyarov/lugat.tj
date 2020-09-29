<?php
require_once "header.php";
?>	
<div style="clear:both;"></div>
<div id="top">
<center>
<div id="google_adsense">
<script type="text/javascript"><!--
google_ad_client = "pub-7774239533442623";
/* top leader board728x90, created 3/4/10 */
google_ad_slot = "9273412410";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
</center>
</div>

<div style="clear:both;"></div>
<div id="bodyN">
<div style="clear:both;"></div>
<div id="topbar">
<script type="text/javascript"><!--
google_ad_client = "pub-7774239533442623";
/* 468x15, created 12/22/09 */
google_ad_slot = "2957363533";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

<div id="colOne">
<div id="wordCounter">
<div class="headline"><?php echo $lang['word_counter_headline_text'];?></div>
<div class="innerHTML">
	<?php
	$d = array("english_tajik","tajik_english","russian_tajik","tajik_russian");
	$dirnames = array($lang['en_tj_direction'],$lang['tj_en_direction'],$lang['ru_tj_direction'],$lang['tj_ru_direction']);
	foreach ($d as $k=>$dir) {
	$q = "SELECT id FROM {$dir}";
	$r = mysql_query($q,$connection);
	if (!$r) {
		die("SQL Error: ".mysql_error());
	} 
	echo $dirnames[$k].": ".mysql_affected_rows()."<br>";
	}
	?>


</div>


</div>
<div style="clear:both;"></div>
<div id="lastWord">
<div class="headline"><?php echo $lang['last_searched_word_headline_text'];?></div>
<div class="innerHTML">
<?php
	$q = "SELECT word FROM last_searched_word ORDER BY time DESC LIMIT 20";
	$r = mysql_query($q,$connection);
	if (!$r) {
		die("SQL Error: ".mysql_error());
	}
	while($row = mysql_fetch_array($r)){
		echo "<a href='index.php?ln={$ln}&word=".htmlspecialchars($row['word'])."'>".htmlspecialchars($row['word'])."</a><br>";
	}
	mysql_free_result($r);
?>

</div>
</div>

<div style="clear:both;"></div>
<div id="topWord">
<div class="headline"><?php echo $lang['top_searched_word_headline_text'];?></div>
<div class="innerHTML">
<?php
	$q = "SELECT word,counter FROM last_searched_word ORDER BY counter DESC LIMIT 20";
	$r = mysql_query($q,$connection);
	if (!$r) {
		die("SQL Error: ".mysql_error());
	}
	while($row = mysql_fetch_array($r)){
		echo "<a href='index.php?ln={$ln}&word=".htmlspecialchars($row['word'])."'>".htmlspecialchars($row['word'])."</a><br>";
	}
	mysql_free_result($r);
?>
</div>

</div>

</div>

<div id="colTwo">
<div id="lastAdded">
<div class="headline"><?php echo $lang['last_added_word_headline_text'];?></div>

<div class="innerHTML">
<?php
	$d = array("english_tajik","tajik_english","russian_tajik","tajik_russian");
	$dirnames = array($lang['en_tj_direction'],$lang['tj_en_direction'],$lang['ru_tj_direction'],$lang['tj_ru_direction']);
	$col = array("english","tajik","russian","tajik");
	$col2 = array("tajik","english","tajik","russian");
	foreach ($d as $k=>$dir) {
	$q = "SELECT * FROM {$dir} ORDER BY id DESC LIMIT 5";
	$r = mysql_query($q,$connection);
	if (!$r) {
		die("SQL Error: ".mysql_error());
	}
	echo $dirnames[$k].": <br>";
	while($row = mysql_fetch_array($r)) {
		echo "<a href='index.php?ln={$ln}&word={$row[$col[$k]]}'>{$row[$col[$k]]}</a><br>";	
	} 
	
	}
	?>
</div>
</div>
<div style="clear:both;"></div>
<div id="lastVisitor">
<div class="headline"><?php echo $lang['last_visitor_headline_text'];?></div>
<div class="innerHTML">
<img src="images/uc.png" width=100 height=83 alt="Under Construction" title="Under Construction">
</div>
</div>

<div style="clear:both;"></div>
<div id="topVisitor">
<div class="headline"><?php echo $lang['top_visitor_headline_text'];?></div>
<div class="innerHTML">
<img src="images/uc.png" width=100 height=83 alt="Under Construction" title="Under Construction">
</div>
</div>


</div>


</div>
<div style="clear:both;"></div>
<?php		
require_once "footer.php";
?>
