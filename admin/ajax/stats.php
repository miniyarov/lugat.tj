<?php
require_once "../../system/connection.php";
require_once "../functions.php";
$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

	$l1 = array("english","tajik","russian","tajik");
	$l2 = array("tajik","english","tajik","russian");
	
	for ($i=0;$i<=3;$i++) {
		$ln1 = mb_convert_case($l1[$i], MB_CASE_TITLE, "UTF-8");
		$ln2 = mb_convert_case($l2[$i], MB_CASE_TITLE, "UTF-8");
		$query = "SELECT id FROM $l1[$i]_$l2[$i]";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= "<error>MySQL Error at $ln1 - $ln2: ".mysql_error()."</error>";
		}
		$xml .= "<message>$ln1 - $ln2: ".mysql_affected_rows()." words</message>";
		mysql_free_result($result);
	}
	
header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>