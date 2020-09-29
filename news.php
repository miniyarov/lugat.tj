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
<div id="rightbar">
<ul id="rightbar_ul">
<?php 
	$news_titles = get_news_titles($ln);
	if ($news_titles > 0) {
	foreach($news_titles as $title) {
		echo "<li><a href='?tid={$title['id']}&ln={$ln}'><strong>".$title['title']."</strong></a></li>";
	}
	} else echo "<li><a href='#'><strong>No News Available</strong></a></li>";
?>
</ul>
<div id="adsense_2">
<script type="text/javascript"><!--
google_ad_client = "pub-7774239533442623";
/* 160x600, created 1/21/10 */
google_ad_slot = "0504466754";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
</div>
<div id="centerbar">
<div id="title_text">
<?php
	$no = "";
	if (@!$_GET['tid']) { $tid=get_last_news_id();} else { $tid = (int) $_GET['tid']; }
	$news_texts = get_news_texts($tid,$ln);
	if(!$news_texts) { $tid=get_last_news_id(); $news_texts = get_news_texts($tid,$ln);}
	echo "<h2>".$news_texts[$ln.'_title']."<span style='float:right;'>{$news_texts['time']}</span></h2>";
	echo "<p>".nl2br($news_texts[$ln.'_text'])."</p>";
	echo("<div style='border-bottom:1px solid gray;'><strong>".$lang['comment_text'].":</strong></div>");
	$news_comments = get_news_comments($tid);
	if ($news_comments > 0) {
		foreach($news_comments as $commentrow) {
				echo "<div id='commentauthor{$commentrow['id']}' style=\"background-color: #fff;font-weight:normal;text-align: left;\">".$lang['comment_author_text'].": ". nl2br($commentrow['poster'])." | ";
				echo "{$commentrow['time']}</div>";
				echo "<div id='commentlist{$commentrow['id']}' style=\"background-color: #fff;overflow:hidden;border-bottom: 1px solid gray;padding: 0px 30px 0px 30px;\" onmouseout='document.getElementById(\"commentauthor{$commentrow['id']}\").style.fontWeight = \"normal\"' onmouseover='document.getElementById(\"commentauthor{$commentrow['id']}\").style.fontWeight = \"bold\"'>".nl2br($commentrow['comment'])."</div>";
			}
		} else {
		$no .= $lang['no_comment_available'];
	}
?>
<div id="comment_result"><?php echo $no;?></div>
<form id="commentForm" method="post">
<?php echo $lang['comment_form_name'];?>:<br><input type="text" maxlength="32" size="32" id="comment_name"><br>
<?php echo $lang['comment_form_email'];?><br><input type="text" maxlength="32" size="32" id="comment_email"><br>
<?php echo $lang['comment_form_comment'];?>:<br><textarea cols="50" rows="4" id="comment"></textarea><br>
<input type="hidden" value="<?php echo $tid?>" id="news_id">
<input type="submit" value="<?php echo $lang['comment_form_submit'];?>" onclick="send_comment();return false;">
</form>
</div>
</div>

</div>
<div style="clear:both;"></div>
<?php		
require_once "footer.php";
?>
