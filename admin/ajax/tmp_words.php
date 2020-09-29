<?php
require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
login_confirm();

$i = @$_GET['dir'];
$l1 = array("russian","tajik","english","tajik");
$l2 = array("tajik","russian","tajik","english");

$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

		$query = "SELECT * FROM tmp_{$l1[$i]}_{$l2[$i]} LIMIT 5";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= "<error>MySQL Error: ".mysql_error()."</error>";
		}
		while($row = mysql_fetch_array($result)) {
			$xml .= "<id>{$row['id']}</id>";
			$xml .= "<w>{$row[$l1[$i]]}</w>";
			$xml .= "<t>{$row[$l2[$i]]}</t>";
			$xml .= "<ip>{$row['ip_address']}</ip>";
			$xml .= "<time>{$row['time']}</time>";
		}
		mysql_free_result($result);
	
header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>