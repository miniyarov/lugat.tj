<?php 
$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

require_once "../system/connection.php";
require_once "../admin/functions.php";

if(@$_GET['ln']) {$lang = get_lang(@$_GET['ln']); } else {$lang = get_lang('ru');};

$lang1 = "tajik";
$lang2 = "english";
$lang3 = "russian";

$word = mysql_prep(@$_GET['word']);
$xml .= '<direction>'.$lang['en_tj_direction'].'</direction>';
$xml .= '<direction>'.$lang['tj_en_direction'].'</direction>';
$xml .= '<direction>'.$lang['ru_tj_direction'].'</direction>';
$xml .= '<direction>'.$lang['tj_ru_direction'].'</direction>';

if ($word!='') {		
	// start of ajax search: english tajik
	$query = "SELECT * FROM {$lang2}_{$lang1} WHERE {$lang2}='{$word}' LIMIT 1";
		$result = mysql_query($query,$connection);
		if (!$result) {
			die ("Database query error: ".mysql_error());
		}
		$row = mysql_fetch_array($result);
		$found1 = $row[$lang1];
		if (!empty($found1)) {
		$xml .= '<word><entj1>'.$row[$lang2].'</entj1><tjen1>'.$row[$lang1].'</tjen1></word>';
		}
		mysql_free_result($result);
	
	// start of ajax similar search: english tajik
	$query = "SELECT * FROM {$lang2}_{$lang1} WHERE {$lang2} LIKE '$word%' LIMIT 10";	
	$result = mysql_query($query,$connection);	
	if (!$result) {			die ("Database query error: ".mysql_error());		}	
	while($row = mysql_fetch_array($result)) {
		if ($row[$lang1]!=$found1) {
		$xml .= '<word><entj1>'.$row[$lang2].'</entj1><tjen1>'.$row[$lang1].'</tjen1></word>';
		}
	}
	mysql_free_result($result);
		
	// start of ajax search: tajik english
	$query = "SELECT * FROM {$lang1}_{$lang2} WHERE {$lang1}='{$word}' LIMIT 1";
		$result = mysql_query($query,$connection);
		if (!$result) {
			die ("Database query error: ".mysql_error());
		}
		$row = mysql_fetch_array($result);
		$found2 = $row[$lang2];
		if (!empty($found2)) {
		$xml .= '<word><tjen2>'.$row[$lang1].'</tjen2><entj2>'.$row[$lang2].'</entj2></word>';
		}
		mysql_free_result($result);
	// start of ajax similar search: tajik english
	$query = "SELECT * FROM {$lang1}_{$lang2} WHERE {$lang1} LIKE '$word%' LIMIT 10";
	$result = mysql_query($query,$connection);	
	if (!$result) { die ("Database query error: ".mysql_error());		}
		while($row = mysql_fetch_array($result)) {
			if ($found2 != $row[$lang2]) {
			$xml .= '<word><tjen2>'.$row[$lang1].'</tjen2><entj2>'.$row[$lang2].'</entj2></word>';
			}
		}
		mysql_free_result($result);	
	// start of ajax search: russian tajik
	$query = "SELECT * FROM {$lang3}_{$lang1} WHERE {$lang3}='{$word}' LIMIT 1";
		$result = mysql_query($query,$connection);
		if (!$result) {
			die ("Database query error: ".mysql_error());
		}
		$row = mysql_fetch_array($result);
		$found3 = $row[$lang1];
		if (!empty($found3)) {
		$xml .= '<word><rutj1>'.$row[$lang3].'</rutj1><tjru1>'.$row[$lang1].'</tjru1></word>';
		}
		mysql_free_result($result);
		// start of ajax similar search: russian tajik
	$query = "SELECT * FROM {$lang3}_{$lang1} WHERE {$lang3} LIKE '$word%' LIMIT 10";	
	$result = mysql_query($query,$connection);	
	if (!$result) {			die ("Database query error: ".mysql_error());		}	
	while($row = mysql_fetch_array($result)) {
		if($found3 != $row[$lang1]) {
		$xml .= '<word><rutj1>'.$row[$lang3].'</rutj1><tjru1>'.$row[$lang1].'</tjru1></word>';
		}
	}
	mysql_free_result($result);
	
	// start of ajax search: tajik russian
	$query = "SELECT * FROM {$lang1}_{$lang3} WHERE {$lang1}='{$word}' LIMIT 1";
		$result = mysql_query($query,$connection);
		if (!$result) {
			die ("Database query error: ".mysql_error());
		}
		$row = mysql_fetch_array($result);
			$found4 = $row[$lang3];
			if (!empty($found4)) {
		$xml .= '<word><tjru2>'.$row[$lang1].'</tjru2><rutj2>'.$row[$lang3].'</rutj2></word>';
		}
		mysql_free_result($result);
	// start of ajax similar search: tajik russian
	$query = "SELECT * FROM {$lang1}_{$lang3} WHERE {$lang1} LIKE '$word%' LIMIT 10";
	$result = mysql_query($query,$connection);	
	if (!$result) { die ("Database query error: ".mysql_error());	}
		while($row = mysql_fetch_array($result)) {
			if($found4 != $row[$lang3]) {
			$xml .= '<word><tjru2>'.$row[$lang1].'</tjru2><rutj2>'.$row[$lang3].'</rutj2></word>';
			}
			}
		mysql_free_result($result);
}
header("Content-type:application/xml; charset=utf-8");	
$xml .= '<google_text>'.$lang['google_search_text'].'</google_text></root>';	
echo $xml;
mysql_close($connection);
?>