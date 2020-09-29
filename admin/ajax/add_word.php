<?php

require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
login_confirm();

$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

$a = mysql_prep(@$_GET['w']);
$b = mysql_prep(@$_GET['t']);
$c = mysql_prep(@$_GET['l1']);
$d = mysql_prep(@$_GET['l2']);

if (empty($a)) {
	$xml .= '<error>Enter Word</error>';
} else if (empty($b)) {
	$xml .= '<error>Enter Translation</error>';
} else {
		$query = "INSERT INTO {$c}_{$d}  ({$c},{$d}) VALUES ('{$a}','{$b}')";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= '<error>MySQL Error: '.mysql_error().'</error>';
		} else {
			$xml .= '<success>You have successfully added '.$a.' as '.$b.' to '.$c.' - '.$d.' dictionary</success>';
		}
	}


header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>