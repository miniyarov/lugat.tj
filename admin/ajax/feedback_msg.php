<?php
require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
login_confirm();

$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

		$query = "SELECT * FROM feedback_msg ORDER BY id DESC LIMIT 10";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= "<error>MySQL Error: ".mysql_error()."</error>";
		}
		while($row = mysql_fetch_array($result)) {
			$xml .= "<id>{$row['id']}</id>";
			$xml .= "<name>{$row['name']}</name>";
			$xml .= "<email>{$row['email']}</email>";
			$xml .= "<message>{$row['message']}</message>";
			$xml .= "<ip>{$row['ip_address']}</ip>";
			$xml .= "<time>{$row['time']}</time>";
		}
		mysql_free_result($result);
	
header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>