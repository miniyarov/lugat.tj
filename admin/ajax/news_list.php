<?php
require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
login_confirm();

$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

		$query = "SELECT * FROM news";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= "<error>MySQL Error: ".mysql_error()."</error>";
		}
		while($row = mysql_fetch_array($result)) {
			
			$xml .= "<id>{$row['id']}</id>";
			$r = replacer(mysql_prep($row['ru_title']));
			$xml .= "<ru_title>{$r}</ru_title>";
			$r = replacer(mysql_prep($row['tj_title']));
			$xml .= "<tj_title>{$r}</tj_title>";
			$r = replacer(mysql_prep($row['en_title']));
			$xml .= "<en_title>{$r}</en_title>";
			$r = replacer(mysql_prep($row['ru_text']));
			$xml .= "<ru_text>{$r}</ru_text>";
			$r = replacer(mysql_prep($row['tj_text']));
			$xml .= "<tj_text>{$r}</tj_text>";
			$r = replacer(mysql_prep($row['en_text']));
			$xml .= "<en_text>{$r}</en_text>";
			$xml .= "<last>{$row['time']}</last>";
		}
		mysql_free_result($result);
	
header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>
