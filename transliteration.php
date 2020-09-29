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
<div style="margin-bottom:20px;"></div>	
<center>
<div id="tj_keyboard" align="center"></div>
<a href="javascript:tj_keyboard_on_off();" style="font-size: 10pt; text-decoration: none;"><?php echo $lang['keyboard_toggle_link_text'] ?></a>
<div style="clear:both;"></div>
<textarea cols="80" rows="10"  onblur=resetctrls() id="searchField" name="searchField1" style="font: normal normal normal 16px/normal arial, sans-serif;" onkeydown=checkControlAlt(event) onmouseup=updateStartEnd() onkeypress="return translateKeyCode(event);" onkeyup="javascript:counter();keyUp(event);"></textarea>
</center>
<div id="translitButtons" style="margin-left:20%;width:70%;">
<input type="button" value="<?php echo $lang['translit_button_selectall'];?>" onclick="javascript:selectall();setfoc();"> <input type="button" value="<?php echo $lang['translit_button_clearall'];?>" onclick="javascript:clearall();setfoc();counter();"> <?php echo $lang['translit_counter_text'];?> <input type="text" id="counter" maxlength="4" value="0" readonly style="border:none;">
</div>

</div>
<div style="clear:both;"></div>
<?php		
require_once "footer.php";
?>
