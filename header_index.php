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
		if ((@isset($_POST['searchField1']) && @$_POST['searchField1']!='') || (isset($_GET['word']) && @$_GET['word']!='')) { 
			if (isset($_POST['searchField1']) && $_POST['searchField1']!='') {
				echo "".$_POST['searchField1']." | ";} else { 
				echo "".($_GET['word'])." | "; }		
		}
		echo $lang['site_title'];
	?>
</title>
<meta name="DESCRIPTION" content="<?php if (isset($_POST['searchField1']) && $_POST['searchField1']!='') {
				echo "Search for ".$_POST['searchField1']." @ ";} else if(@$_GET['word']) { 
				echo "Search for ".($_GET['word'])." @ "; } 
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
	<input type="hidden" id="ln" name="ln" value="<?php echo $ln;?>">
	<input type="hidden" id="toggle_words" name="toggle_words" value="<?php echo $lang['toggle_words']?>">
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