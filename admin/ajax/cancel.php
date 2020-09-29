<?php
require_once("../session.php");
require_once "../../system/connection.php";
require_once "../functions.php";
	login_confirm();
$l1 = array("russian","tajik","english","tajik");
$l2 = array("tajik","russian","tajik","english");
$id = @$_GET['id'];
$i = @$_GET['i'];

	$query = "DELETE FROM tmp_{$l1[$i]}_{$l2[$i]} WHERE id = '{$id}'";
	$result = mysql_query($query,$connection);
	if (!result) {
		 die("Error deleting temporary word".mysql_error());
		}
	redirect_to("../admin.php");
	
?>