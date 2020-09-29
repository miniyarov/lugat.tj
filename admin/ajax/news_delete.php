<?php
require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
	login_confirm();

$id = @$_GET['id'];

if ($_SESSION['username']=='admin') {
	$query = "DELETE FROM news WHERE id = '{$id}'";
	$result = mysql_query($query,$connection);
	if (!result) {
		 die("Error deleting news ".mysql_error());
		}
		}
	redirect_to("../admin.php");
	
?>