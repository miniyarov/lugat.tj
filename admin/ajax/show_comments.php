<?php
require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
login_confirm();

$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

		$query = "SELECT * FROM comments ORDER By time DESC";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= "<error>MySQL Error: ".mysql_error()."</error>";
		}
		while($row = mysql_fetch_array($result)) {
			$xml .= "<id>{$row['id']}</id>";
			$r = htmlspecialchars($row['news_id']);
			$xml .= "<news_id>{$r}</news_id>";
			$r = htmlspecialchars($row['poster']);
			$xml .= "<poster>{$r}</poster>";
			$r = htmlspecialchars($row['email']);
			if(empty($r)) {
				$xml .= "<email>No Email</email>";
			} else {
				$xml .= "<email>{$r}</email>";
			}
			$r = htmlspecialchars($row['comment']);
			$xml .= "<comment>{$r}</comment>";
			$r = htmlspecialchars($row['confirmed']);
			if($r=='1') {
				$xml .= "<confirmed>CONFIRMED</confirmed>";
			} else {
				$xml .= "<confirmed>&lt;b&gt;NOT CONFIRMED&lt;/b&gt;</confirmed>";
			}
			$r = htmlspecialchars($row['ip_address']);
			$xml .= "<ip>{$r}</ip>";
			$xml .= "<time>{$row['time']}</time>";
		}
		mysql_free_result($result);
	
header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>
