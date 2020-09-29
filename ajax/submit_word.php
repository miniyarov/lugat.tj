<?php
require_once "../system/connection.php";
require_once "../admin/functions.php";
$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';
 
$trans = mysql_prep(@$_GET['trans']);
$sub_word = mysql_prep(@$_GET['sub_word']);
$lang1 = mysql_prep(@$_GET['lang1']);
$lang2 = mysql_prep(@$_GET['lang2']);
if(@$_GET['ln']) {$lang = get_lang(@$_GET['ln']); } else {$lang = get_lang('ru');};
	
if (empty($sub_word)) {
	$xml .= '<error>'.$lang['submit_word_error1'].'</error>';
} else if (empty($trans)) {
	$xml .= '<error>'.$lang['submit_word_error2'].'</error>';
} else if (empty($lang1)) {
	$xml .= '<error>'.$lang['submit_word_error3'].'</error>';
} else if (empty($lang2)) {
	$xml .= '<error>'.$lang['submit_word_error3'].'</error>';
} else {
		$query = "INSERT INTO tmp_{$lang1}_{$lang2} 
			 ({$lang1},{$lang2},ip_address) VALUES ('{$sub_word}', 
			 '{$trans}','{$_SERVER['REMOTE_ADDR']}')";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= '<error>'.$lang['submit_word_error4'].'</error>';
		} else {
			$xml .= '<success>'.$lang['submit_word_success_message'].'</success>';
		}
	}	
@header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>