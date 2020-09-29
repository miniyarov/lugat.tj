<?php
require_once "system/connection.php";
require_once "admin/functions.php";
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
<link rel="stylesheet" type="text/css" href="css/global.css" />
<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="css/iehack.css" />
<![endif]-->
<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="css/ie6hack.css" />
<![endif]-->
<!--[if lt IE 7.]>
	<script defer type="text/javascript" src="javascript/pngfix.js"></script>
<![endif]-->
<title>
	<?php 
		$uri = $_SERVER['SCRIPT_NAME'];
		$uri = explode('/',$uri);
		foreach($uri as $u) {
			$u = explode('?',$u);
			foreach($u as $uu) {
				switch($uu) {
					case 'transliteration.php':
						echo $lang['translit_link_text']." | ";break;
					case 'statistics.php':
						echo $lang['topmenu_right_stats']." | ";break;
					case 'news.php':
						if(@$_GET['tid']) {
							echo get_news_title_by_id(@$_GET['tid'],$ln)." | ";
						}
						echo $lang['topmenu_right_news']." | ";break;
					default:break;
				}
			}
		}
		echo $lang['site_title'];
	?>
</title>
<meta name="DESCRIPTION" content="<?php 
		$uri = $_SERVER['SCRIPT_NAME'];
		$uri = explode('/',$uri);
		foreach($uri as $u) {
			$u = explode('?',$u);
			foreach($u as $uu) {
				switch($uu) {
					case 'statistics.php':
						echo $lang['topmenu_right_stats']." @ ";break;
					case 'news.php':
						if(@$_GET['tid']) {
							echo get_news_title_by_id(@$_GET['tid'],$ln)." @ ";
						}
						echo $lang['topmenu_right_news']." @ ";break;
					default:break;
				}
			}
		}
				echo $lang['site_description']; ?>">
<meta name="KEYWORDS" content="online,dictionary,tajik russian,russian tajik,tajik english,english tajik,slovar,lugat,tajik,dushanbe,tajikistan,tojiki,rusi,anglisi,inglisi,tacikçe,sözlük,tacikistan,duşanbe,тоҷикистон,точикистон,тоҷикӣ,точикй,точики,луғат,лугат,словарь,словар,таджикский,русский,разговорник,таджик,таджикистан,душанбе">
<script type="text/javascript" src="javascript/script.js" language="Javascript">
</script>
<script type="text/javascript" src="javascript/dialogBox.js" language="Javascript">
</script>
<script type="text/javascript" src="javascript/ajax.js" language="Javascript">
</script>
<script type="text/javascript" src="javascript/keyboard.js" language="Javascript">
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
	<a href="index.php?ln=<?php echo $ln;?>"><img src="images/lugat.png" width="100" height="25" style="margin-left: 40px;" title="<?php echo $lang['logo_alt']?>"></a>
	</li>
	<li>
		<div id="searchLittle">
		<form action="index.php?ln=<?php echo $ln;?>" method="get" id="searchFormID">
		<input type="text" name="word" id="searchFormText" autocomplete="off">
		<input type="submit" title="<?php echo $lang['translate_button_text'] ?>" value="<?php echo $lang['translate_button_text'] ?>" name="submit" id="submitLittle">
		</form>
		</div>
	</li>
	
	
	<input type="hidden" id="ln" name="ln" value="<?php echo $ln;?>">
</ul>
<ul id="right_ul">
	<li>
	<a href="statistics.php?ln=<?php echo $ln;?>" title="<?php echo $lang['topmenu_right_stats'] ?>"><?php echo $lang['topmenu_right_stats'] ?></a>
	</li>
	<li>
	<a href="news.php?ln=<?php echo $ln;?>" title="<?php echo $lang['topmenu_right_news'] ?>"><?php echo $lang['topmenu_right_news'] ?></a>
	</li>
	<li>
	<a href="#" title="<?php echo $lang['topmenu_right_submit_word'] ?>" onclick="javascript:DialogBox('<strong><?php echo $lang['topmenu_right_submit_word_title'] ?></strong>', '<?php echo addslashes($lang['topmenu_right_submit_word_text']) ?>');return false;"><strong><span style='color:yellow;'><?php echo $lang['topmenu_right_submit_word'] ?></span></strong></a>
	</li>
</ul>
</div>
<div id="bodyID">