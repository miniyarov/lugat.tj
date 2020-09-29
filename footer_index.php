<center>
<div style="clear:both;"></div>
<div id="sharer">
	<div style="float:left;">
	<img src="images/facebook_logo.png" title="<?php echo $lang['facebook_title']?>">
	</div>
	<div style="float:left;padding-left:4px;padding-top: 7px;">
	<a title="<?php echo $lang['facebook_title']?>" target="_blank" href="http://www.facebook.com/group.php?gid=270352600773"><?php echo $lang['facebook_group']?></a>
	</div>
	<div style="float:left;padding-left:6px;">
	<img src="images/vkontakte_logo.png" title="<?php echo $lang['vk_title']?>">
	</div>
	<div style="float:left;padding-left:4px;padding-top: 7px;">
	<a title="<?php echo $lang['vk_title']?>" target="_blank" href="http://vkontakte.ru/club14873397"><?php echo $lang['vkontakte_link_text']?></a>
	</div>
	<div style="float:left;padding-left:6px;">
	<img src="images/mail.ru_logo.png" title="<?php echo $lang['mailru_title']?>">
	</div>
	<div style="float:left;padding-left:4px;padding-top: 7px;">
	<a title="<?php echo $lang['mailru_title']?>" target="_blank" href="http://my.mail.ru/community/lugat/">Мой Мир</a>
	</div>
</div>
<div style="clear:both;"></div>
<div style="margin-top: 20px;">
<script type="text/javascript"><!--
google_ad_client = "pub-7774239533442623";
/* 728x90, created 1/21/10 */
google_ad_slot = "5217962983";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
</center>
<div id="footer">
<span id="footer_links">
<a title="<?php echo $lang['about']; ?>" href="news.php?tid=1&ln=<?php echo $ln;?>">
<?php echo $lang['about']; ?>
</a> | 
<a title="<?php echo $lang['feedback_link_text']; ?>" href="#" onclick="javascript:DialogBox('<strong><?php echo mysql_prep($lang['feedback_link_text']); ?></strong>', '<?php echo mysql_prep($lang['feedback_text']); ?>');return false;">
<?php echo $lang['feedback_link_text']; ?>
</a> | 
<a title="<?php echo $lang['ad_link_text']; ?>"  href="#" onclick="javascript:DialogBox('<strong><?php echo mysql_prep($lang['ad_link_text']); ?></strong>', '<?php echo mysql_prep($lang['ad_text']);?>');return false;">
<?php echo $lang['ad_link_text']; ?>
</a> | 
<a title="<?php echo $lang['translit_link_text']; ?>" href="transliteration.php?ln=<?php echo $ln;?>"><?php echo $lang['translit_link_text']; ?></a>
</span>
 <span id="footer_cp"><?php echo $lang['copyright'] ?></span>&nbsp;&nbsp;<a title="English Interface" href="index.php?ln=en"><img title="English Interface" src="images/usa.png">&nbsp;English</a>&nbsp;&nbsp;<a title="Русский Интерфейс" href="index.php?ln=ru"><img title="Русский Интерфейс" src="images/rus.png">&nbsp;Русский</a>&nbsp;&nbsp;<a title="Интерфейси Тоҷикӣ" href="index.php?ln=tj"><img title="Интерфейси Тоҷикӣ" src="images/tjk.png">&nbsp;Тоҷикӣ</a><br>
 <br>
 <div id="ie7div">
 
 <!--[if lte IE 6]>
	<div id="ie7">
	<span id="closeX"><a href="javascript:ie7_remove();"><?php echo $lang['ie7_x_text'] ?> (X)</a></span>
	<br><?php echo $lang['ie7_warning_text'] ?>
	</div>
	<br>
<![endif]-->
 </div>
</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-12109833-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
<?php
mysql_close($connection);
?>