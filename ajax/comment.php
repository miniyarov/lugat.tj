<?php
require_once "../system/connection.php";
require_once "../admin/functions.php";

$xml  = '<?xml version="1.0" encoding="utf-8"?>';
$xml .= '<root>';

$name = mysql_prep(@$_GET['name']);
$email = mysql_prep(@$_GET['email']);
$message = mysql_prep(@$_GET['message']);
$news_id = mysql_prep(@$_GET['news_id']);
$time = date('Y-m-d H:i:s');
if(@$_GET['ln']) {$lang = get_lang(@$_GET['ln']); } else {$lang = get_lang('ru');};

if (empty($name)) {
	$xml .= '<error>'.$lang['comment_error1'].'</error>';
} else if (empty($message)) {
	$xml .= '<error>'.$lang['comment_error2'].'</error>';
} else {
		$query = "INSERT INTO comments (news_id,poster,email,comment,ip_address,time) 
			VALUES ('{$news_id}','{$name}','{$email}','{$message}','{$_SERVER['REMOTE_ADDR']}','{$time}')";
		$result = mysql_query($query,$connection);
		if (!$result) {
			$xml .= '<error>'.$lang['comment_error3'].'</error>';
		} else {
			$xml .= '<success>'.$lang['comment_success'].'</success>';
		}
	}


header("Content-type:application/xml; charset=utf-8");	
$xml .= '</root>';	
echo $xml;
mysql_close($connection);
?>