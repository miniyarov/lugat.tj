<?php
require_once "../system/connection.php";
require_once "../admin/functions.php";

$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

$name = mysql_prep(@$_GET['name']);
$email = mysql_prep(@$_GET['email']);
$message = mysql_prep(@$_GET['message']);
if(@$_GET['ln']) {$lang = get_lang(@$_GET['ln']); } else {$lang = get_lang('ru');};

if (empty($name)) {
	$xml .= '<error>'.$lang['feedback_msg_error1'].'</error>';
} else if (empty($email)) {
	$xml .= '<error>'.$lang['feedback_msg_error2'].'</error>';
} else if (empty($message)) {
	$xml .= '<error>'.$lang['feedback_msg_error3'].'</error>';
} else {
		$query = "INSERT INTO feedback_msg (name,email,message,ip_address) 
			VALUES ('{$name}','{$email}','{$message}','{$_SERVER['REMOTE_ADDR']}')";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= '<error>'.$lang['feedback_msg_error4'].'</error>';
		} else {
			$xml .= '<success>'.$lang['feedback_msg_success'].'</success>';
		}
	}


header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>