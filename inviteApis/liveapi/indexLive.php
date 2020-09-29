<?php
include_once "contacts_fn.php";
$ret_array = get_people_array();
require_once "../../system/connection.php";
require_once "../../admin/functions.php";
if(@$_GET['ln']) {
		switch(@$_GET['ln']) {
			case 'ru': $ln='ru';break;
			case 'tj': $ln='tj';break;
			case 'en': $ln='en';break;
			default: $ln = 'ru'; 		
		} 
	} else  $ln = 'ru';
$lang = get_lang($ln);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tg" xml:lang="tg">
<head>
<meta name="author" content="Ulugbek MINIYAROV">
<link rel="icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/global.css" />
<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="../../iehack.css" />
<![endif]-->
<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="../../ie6hack.css" />
<![endif]-->
<!--[if lt IE 7.]>
	<script defer type="text/javascript" src="../../pngfix.js"></script>
<![endif]-->
<title>Live Hotmail Invitaion | <?php
		echo $lang['site_title'];
	?>
</title>
<meta name="DESCRIPTION" content="Live Hotmail Invitation @ <?php 
						echo $lang['site_description']; ?>">
<meta name="KEYWORDS" content="online,dictionary,tajik russian,russian tajik,tajik english,english tajik,slovar,lugat,tajik,dushanbe,tajikistan,tojiki,rusi,anglisi,inglisi,tacikce,sozluk,tacikistan,dusanbe,то?икистон,точикистон,то?ик?,точикй,точики,лу?ат,лугат,словарь,словар,таджикский,русский,разговорник,таджик,таджикистан,душанбе">
<script type="text/javascript" src="../../javascript/script.js" language="Javascript">
</script>
<script type="text/javascript" src="../../javascript/dialogBox.js" language="Javascript">
</script>
<script type="text/javascript" src="../../javascript/ajax.js" language="Javascript">
</script>
<script type="text/javascript" src="../../javascript/keyboard.js" language="Javascript">
</script>
</head>
<body>

<div id="top_menu">
<div id="topLeft">
</div>
<div id="topMid">
</div>
<div id="topRight">
</div>
<ul id="left_ul">
	<li>
	<a href="../../index.php?ln=<?php echo $ln;?>"><img src="../../images/lugat.png" width="100" height="25" style="margin-left: 40px;" title="<?php echo $lang['logo_alt']?>"></a>
	</li>
	<li>
		<div id="searchLittle">
		<form action="../../index.php?ln=<?php echo $ln;?>" method="get" id="searchFormID">
		<input type="text" name="word" id="searchFormText" autocomplete="off">
		<input type="submit" title="<?php echo $lang['translate_button_text'] ?>" value="<?php echo $lang['translate_button_text'] ?>" name="submit" id="submitLittle">
		</form>
		</div>
	</li>
	
	
	<input type="hidden" id="ln" name="ln" value="<?php echo $ln;?>">
</ul>
<ul id="right_ul">
	<li>
	<a href="../../statistics.php?ln=<?php echo $ln;?>" title="<?php echo $lang['topmenu_right_stats'] ?>"><?php echo $lang['topmenu_right_stats'] ?></a>
	</li>
	<li>
	<a href="../../news.php?ln=<?php echo $ln;?>" title="<?php echo $lang['topmenu_right_news'] ?>"><?php echo $lang['topmenu_right_news'] ?></a>
	</li>
	<li>
	<a href="#" title="<?php echo $lang['topmenu_right_submit_word'] ?>" onclick="javascript:DialogBox('<strong><?php echo $lang['topmenu_right_submit_word_title'] ?></strong>', '<?php echo addslashes($lang['topmenu_right_submit_word_text']) ?>');return false;"><strong><span style='color:yellow;'><?php echo $lang['topmenu_right_submit_word'] ?></span></strong></a>
	</li>
</ul>
</div>
<div id="bodyID">

<div style="clear:both;"></div>
<center style="color:#369;">
<h3>Select your friend's email to send invitation</h3>
<?php	
	echo '
	  <form method="post" action="../../invite.php" id="formID">
	  <a href="#" onclick="selectAllMailList();" class="linkText">
	  <span id="selectalllink">Select All</span></a><br>
	  <div id="mailList">';
	$i=0;
	foreach($ret_array as $arr){
		if (!empty($arr->email_address)) {
			echo "
		<span class='emailSpan' id='eS{$i}'>
		<input class='checkbox' type='checkbox' name='emails[]' id='email{$i}' value='{$arr->email_address}' onclick='checkmail(document.getElementById(\"email{$i}\"),document.getElementById(\"eS{$i}\"),document.getElementById(\"e{$i}\"));'>
		<span id='e{$i}' class='email' onclick='selectEmail(document.getElementById(\"email{$i}\"),document.getElementById(\"eS{$i}\"),this);'>".$arr->email_address."</span></span><br>";
		$i++;
		} else { continue; }		
	}
	echo "
	  <input type='hidden' value='{$i}' id='mailAmount'></div>
	  <input type='submit' value='Invite' id='submit' class='button'>
	  <input type='button' value='Cancel' class='button'>
	  </form>";
?>   
</center>
<div style="clear:both;"></div>

<?php
	/**
 *    FOOTER
 */
?>

<center>
<div style="clear:both;"></div>
<div id="sharer">
	<div style="float:left;">
	<img src="../../images/facebook_logo.png" title="<?php echo $lang['facebook_title']?>">
	</div>
	<div style="float:left;padding-left:4px;padding-top: 7px;">
	<a title="<?php echo $lang['facebook_title']?>" target="_blank" href="http://www.facebook.com/group.php?gid=270352600773"><?php echo $lang['facebook_group']?></a>
	</div>
	<div style="float:left;padding-left:6px;">
	<img src="../../images/vkontakte_logo.png" title="<?php echo $lang['vk_title']?>">
	</div>
	<div style="float:left;padding-left:4px;padding-top: 7px;">
	<a title="<?php echo $lang['vk_title']?>" target="_blank" href="http://vkontakte.ru/club14873397"><?php echo $lang['vkontakte_link_text']?></a>
	</div>
	<div style="float:left;padding-left:6px;">
	<img src="../../images/mail.ru_logo.png" title="<?php echo $lang['mailru_title']?>">
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
<a title="<?php echo $lang['about']; ?>" href="../../news.php?tid=1&ln=<?php echo $ln;?>">
<?php echo $lang['about']; ?>
</a> | 
<a title="<?php echo $lang['feedback_link_text']; ?>" href="#" onclick="javascript:DialogBox('<strong><?php echo mysql_prep($lang['feedback_link_text']); ?></strong>', '<?php echo mysql_prep($lang['feedback_text']); ?>');return false;">
<?php echo $lang['feedback_link_text']; ?>
</a> | 
<a title="<?php echo $lang['ad_link_text']; ?>"  href="#" onclick="javascript:DialogBox('<strong><?php echo mysql_prep($lang['ad_link_text']); ?></strong>', '<?php echo mysql_prep($lang['ad_text']);?>');return false;">
<?php echo $lang['ad_link_text']; ?>
</a> | 
<a title="<?php echo $lang['translit_link_text']; ?>" href="../../transliteration.php?ln=<?php echo $ln;?>"><?php echo $lang['translit_link_text']; ?></a>
</span>
 <span id="footer_cp"><?php echo $lang['copyright'] ?></span>&nbsp;&nbsp;<a title="<?php echo $lang['select_language'] ?>" href="#" onclick="javascript:DialogBox('<strong><?php echo $lang['select_language'] ?></strong>','<?php 
 	switch($ln) {
		case 'ru':$a='<div id=\'languages\'><a href=\'?ln=tj\'><img src=\'../../images/flags/tjk.png\' alt=\'Тоҷикӣ\' title=\'Тоҷикӣ\'></a>   <a href=\'?ln=en\'><img src=\'../../images/flags/usa.png\' alt=\'English\' title=\'English\'></a></div>';echo mysql_prep($a);break;
		case 'en':$a='<div id=\'languages\'><a href=\'?ln=tj\'><img title=\'Тоҷикӣ\' src=\'../../images/flags/tjk.png\' alt=\'Тоҷикӣ\'></a>   <a href=\'?ln=ru\'><img src=\'../../images/flags/rus.png\' title=\'Русский\' alt=\'Русский\'></a></div>';echo mysql_prep($a);break;
		case 'tj':$a='<div id=\'languages\'><a href=\'?ln=ru\'><img title=\'Русский\' src=\'../../images/flags/rus.png\' alt=\'Русский\'></a>   <a href=\'?ln=en\'><img src=\'../../images/flags/usa.png\' alt=\'English\' title=\'English\'></a></div>';echo mysql_prep($a);break;
		default:$a='<div id=\'languages\'><a href=\'?ln=tj\'><img src=\'../../images/flags/tjk.png\' alt=\'Тоҷикӣ\' title=\'Тоҷикӣ\'></a>   <a href=\'?ln=en\'><img src=\'../../images/flags/usa.png\' alt=\'English\' title=\'English\'></a></div>';echo mysql_prep($a);break;
	}
  ?>');return false;"><?php 
  switch($ln) {
		case 'ru':echo '<img src=\'../../images/rus.png\' alt=\'Русский\'> Русский';break;
		case 'en':echo '<img src=\'../../images/usa.png\' alt=\'English\'> English';break;
		case 'tj':echo '<img src=\'../../images/tjk.png\' alt=\'Тоҷикӣ\'> Тоҷикӣ';break;
		default:echo '<img src=\'../../images/rus.png\' alt=\'Русский\'> Русский';break;
	} ?>
	</a><br>
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