<?php
require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
login_confirm();


$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

		$query = "SELECT username FROM users";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= "<error>MySQL Error: ".mysql_error()."</error>";
		}
		if ($_SESSION['username']=='admin') {
			while($row = mysql_fetch_array($result)) {
				$xml .= "<message1>{$row['username']}</message1>";
				}
		} else {
				while($row = mysql_fetch_array($result)) {
				$xml .= "<message>{$row['username']}</message>";
				}	
			}
		mysql_free_result($result);
	
header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>