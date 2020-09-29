<?php 
require_once "system/connection.php";
require_once "admin/functions.php";
$cip = $_SERVER['REMOTE_ADDR'];
$dip = explode(".",$cip);
$w = (int)$dip[0];
$x = (int)$dip[1];
$y = (int)$dip[2];
$z = (int)$dip[3];
$ipnum = 16777216*$w + 65536*$x + 256*$y + $z;

$q1 = "SELECT * FROM geoip1 WHERE ip_num1 <= {$ipnum} AND ip_num2 >= {$ipnum} LIMIT 1";
$s1 = mysql_query($q1);
if(!$s1) { die("q1"); }
if(mysql_num_rows($s1) > 0) {
	$r = mysql_fetch_array($s1);
	echo $r['country_code']." ".$r['country_name'];
} else {
	$q2 = "SELECT * FROM geoip2 WHERE ip_num1 <= {$ipnum} AND ip_num2 >= {$ipnum} LIMIT 1";
	$s2 = mysql_query($q2);
	if(!$s2) { die("q2"); }
	if(mysql_num_rows($s2) > 0) {
		$r = mysql_fetch_array($s2);
		echo $r['country_code']." ".$r['country_name'];
	} else {
		echo "Not Set";
	}
}
?>