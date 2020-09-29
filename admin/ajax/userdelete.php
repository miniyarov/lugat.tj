<?php
require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
	login_confirm();
	
$id = @$_GET['user'];

if ($_SESSION['username']=='admin') {
	$query = "DELETE FROM users WHERE username = '{$id}'";
	$result = mysql_query($query,$connection);
	if (!result) {
		 die("Error deleting user ".mysql_error());
		}
	}
	redirect_to("../admin.php");
	
?>