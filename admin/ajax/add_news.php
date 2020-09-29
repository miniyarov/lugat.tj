<?php

require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
login_confirm();

$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

$ru_title=mysql_prep($_GET['ru_title']);
$ru_text=mysql_prep($_GET['ru_text']);
$en_title=mysql_prep($_GET['en_title']);
$en_text=mysql_prep($_GET['en_text']);
$tj_title=mysql_prep($_GET['tj_title']);
$tj_text=mysql_prep($_GET['tj_text']);

if (empty($ru_title)) {
	$xml .= '<error>Enter Russian Title</error>';
} else if (empty($ru_text)) {
	$xml .= '<error>Enter Russian Text</error>';
}if (empty($en_title)) {
	$xml .= '<error>Enter English Title</error>';
} else if (empty($en_text)) {
	$xml .= '<error>Enter English Text</error>';
}if (empty($tj_title)) {
	$xml .= '<error>Enter Tajik Title</error>';
} else if (empty($tj_text)) {
	$xml .= '<error>Enter Tajik Text</error>';
} else {
		$query = "INSERT INTO news (ru_title,ru_text,en_title,en_text,tj_title,tj_text) VALUES ('{$ru_title}','{$ru_text}','{$en_title}','{$en_text}','{$tj_title}','{$tj_text}')";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= '<error>MySQL Error: '.mysql_error().'</error>';
		} else {
			$xml .= '<success>You have successfully added News</success>';
		}
	}


header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>