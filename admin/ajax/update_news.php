<?php

require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
login_confirm();

$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

$id = mysql_prep(@$_POST['id']);
$title = mysql_prep(@$_POST['title']);
$text = mysql_prep(@$_POST['text']);
$ln = mysql_prep(@$_POST['ln']);

if (empty($id)) {
	$xml .= '<error>No ID</error>';
} else if (empty($title)) {
	$xml .= '<error>No Title</error>';
} else if (empty($text)) {
	$xml .= '<error>No Text</error>';
} else {
		$query = "UPDATE news SET {$ln}_title = '{$title}',{$ln}_text = '{$text}' WHERE id = '{$id}'";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= '<error>MySQL Error: '.mysql_error().'</error>';
		} else {
			$xml .= '<success>News Successfully Updated</success>';
		}
	}


header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>