<?php

require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
	login_confirm();
$id = @$_GET['id'];
$action = @$_GET['action'];
if ($action=='confirm') {
	$query = "UPDATE comments SET confirmed = '1' WHERE id = '{$id}'";
$result = mysql_query($query,$connection);
if (!$result) {
	die("Error confirming".mysql_error());
}	
redirect_to("../admin.php");
} else {
	if ($action=='delete') {
	$query = "DELETE FROM comments WHERE id = '{$id}'";
$result = mysql_query($query,$connection);
if (!$result) {
	die("Error confirming".mysql_error());
}	
redirect_to("../admin.php");
	}
}
?>