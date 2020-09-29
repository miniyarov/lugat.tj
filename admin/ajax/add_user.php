<?php

require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
login_confirm();

$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

$a = mysql_prep(@$_GET['username']);
$b = mysql_prep(@$_GET['password']);
$e = check_username($a);

if ($_SESSION['username']!='admin') {
	$xml .= '<error>You Must Be Admin To Add Users. Please Contact miniyarov@gmail.com</error>';
} else if (empty($a)) {
	$xml .= '<error>Enter Username</error>';
}else if ($e) {
	$xml .= '<error>Username Already Exists</error>';
} else if (empty($b)) {
	$xml .= '<error>Enter Password</error>';
} else if (strlen($b) < 6) {
	$xml .= '<error>Password Should Be Longer Than 6 Characters</error>';
} else {
		$query = "INSERT INTO users  (username,password) VALUES ('{$a}','{$b}')";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= '<error>MySQL Error: '.mysql_error().'</error>';
		} else {
			$xml .= '<success>User Successfully Added</success>';
		}
	}


header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>