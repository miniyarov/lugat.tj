<?php


	$connection = mysql_connect("localhost","[DB_USER]","[DB_PASSWORD]");
	if (!$connection) {
		die("Database connection error: " . mysql_error());
	}
	@mysql_query("SET NAMES 'utf8'", $connection);
	
	$db_select = mysql_select_db("lugattj_db",$connection);
	if (!$db_select) {
	die("Database selection error: " . mysql_error()); 
	}


?>
