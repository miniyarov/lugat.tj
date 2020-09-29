<?php
function logged_in() {
	return isset($_SESSION['username']);
}
function login_confirm() {
	if (!logged_in()) {
		redirect_to("index.php");
	}
}
function redirect_to($location) {
	header("Location: $location");
	exit;
}
function mysql_prep($value) {
	$magic_quotes_active = get_magic_quotes_gpc();
	$new_enough_php = function_exists("mysql_real_escape_string");
	
	if ($new_enough_php) {
		if ($magic_quotes_active) {
			$value = stripslashes($value);
		}
		$value = mysql_real_escape_string($value);
	} else {
		if (!$magic_quotes_active) { $value = addslashes($value);}
		
	}
	return $value;
}
function replacer($res) {
	$res = str_replace("<","&lt;",$res);
    $res = str_replace(">","&gt;",$res);
    return $res;
}
function _ago($tm,$rcs = 0) {
	$tm = strtotime($tm);
    $cur_tm = time(); 
	$dif = $cur_tm-$tm+10800;
    $pds = array('second','minute','hour','day','week','month','year','decade');
    $lngh = array(1,60,3600,86400,604800,2630880,31570560,315705600);
    for($v = sizeof($lngh)-1; ($v >= 0)&&(($no = $dif/$lngh[$v])<=1); $v--); if($v < 0) $v = 0; $_tm = $cur_tm-($dif%$lngh[$v]);
    
    $no = floor($no); if($no <> 1) $pds[$v] .='s'; $x=sprintf("%d %s ",$no,$pds[$v]);
    if(($rcs == 1)&&($v >= 1)&&(($cur_tm-$_tm) > 0)) $x .= _ago($_tm);
    return $x;
}
function checkAPI($api_key,$email,$domain) {
	global $connection;
	$q = "SELECT api_key,email FROM api WHERE api_key = '{$api_key}' AND email = '{$email}' AND domain = '{$domain}' LIMIT 1";
	//echo $q;
	$r = mysql_query($q,$connection);
	if (!$r) {
		die("Database Connection Error!");
	}
	if(mysql_num_rows($r) > 0) {
		return true;
	}
	return false;
}
// CAPTCHA ...
function captcha() {
 $c = substr(md5(rand(0,999999999999)),-6);
 if ($c) {
  session_start();
  $_SESSION['captcha'] = $c;
  $width  = 100;
  $height =  30;
  $r = ImageCreate($width,$height);
  $b  = ImageColorAllocate($r, 255, 255, 255);
  $rand   = ImageColorAllocate($r, rand(0,255), rand(0,255), rand(0,255));
  ImageFill($r, 0, 0, $rand);
  ImageString($r, 5, 24, 7, $_SESSION['captcha'], $b);
  ImageLine($r, 100, 19, 0, 19, $b);
  header('Content-type: image/png');
  ImagePng($r);
  ImageDestroy($r);
 }
}
// Getting Location FROM IP ADDRESS
function geoip($cip) {
	$dip = explode(".",$cip);
	$w = (int)$dip[0];
	$x = (int)$dip[1];
	$y = (int)$dip[2];
	$z = (int)$dip[3];
	$ipnum = 16777216*$w + 65536*$x + 256*$y + $z;

	$q1 = "SELECT country_code FROM geoip1 WHERE ip_num1 <= {$ipnum} AND ip_num2 >= {$ipnum} LIMIT 1";
	$s1 = mysql_query($q1);
	if(!$s1) { die("q1"); }
	if(mysql_num_rows($s1) > 0) {
		$r = mysql_fetch_array($s1);
		$code = $r['country_code'];
	} else {
		$q2 = "SELECT country_code FROM geoip2 WHERE ip_num1 <= {$ipnum} AND ip_num2 >= {$ipnum} LIMIT 1";
		$s2 = mysql_query($q2);
		if(!$s2) { die("q2"); }
		if(mysql_num_rows($s2) > 0) {
			$r = mysql_fetch_array($s2);
			$code = $r['country_code'];
		} else {
			$code = "NS";
		}
	}
	
	$q = "SELECT * FROM geo_country WHERE country_code = '{$code}' LIMIT 1";
	$s = mysql_query($q);
	if(!$s) { die("q"); }
	return mysql_fetch_array($s);
}

function write_last_word($w) {
	global $connection;
	$c = 1;
	$q = "SELECT word,counter FROM last_searched_word";
	$r = mysql_query($q);
	if (!$r) {
		die("Database Connection Error!");
	}
	while ($row = mysql_fetch_array($r)) {
		if ($w == $row['word']) {
			$c+=$row['counter'];
		}
	}
	if ($c > 1) { 
		$q = "UPDATE last_searched_word SET counter = {$c} WHERE word = '{$w}'";
		$r = mysql_query($q,$connection);
		if (!$r) {
			die("Database Connection Error!");
		}
	} else {
		$q = "INSERT INTO last_searched_word (word,counter,ip_address) 
							VALUES ('{$w}','{$c}','{$_SERVER['REMOTE_ADDR']}')";
		$r = mysql_query($q,$connection);
		if (!$r) {
			die("Database Connection Error!");
		}
	}
}
function submitted_word_amount() {
	global $connection;
	$q = "SELECT id FROM tmp_russian_tajik";
	$q1 = "SELECT id FROM tmp_tajik_russian";
	$q2 = "SELECT id FROM tmp_english_tajik";
	$q3 = "SELECT id FROM tmp_tajik_english";
	$r = mysql_query($q,$connection);
	$c = mysql_affected_rows();
	if (!$r) {
			die ("Database query error: ".mysql_error());
		}
	$r = mysql_query($q1,$connection);
	$c = $c+mysql_affected_rows();
	if (!$r) {
			die ("Database query error: ".mysql_error());
		}
	$r = mysql_query($q2,$connection);
	$c = $c+mysql_affected_rows();
	if (!$r) {
			die ("Database query error: ".mysql_error());
		}
	$r = mysql_query($q3,$connection);
	$c = $c+mysql_affected_rows();
	if (!$r) {
			die ("Database query error: ".mysql_error());
		}
	return $c;
}
function feedback_amount() {
	global $connection;
	$q = "SELECT id FROM feedback_msg";
	$r = mysql_query($q,$connection);
	if (!$r) {
			die ("Database query error: ".mysql_error());
		}
	return mysql_affected_rows();
}
function check_username($username) {
	global $connection;
	$query = "SELECT username FROM users";
	$result = mysql_query($query,$connection);
	if (!$result) {
			die ("Database query error: ".mysql_error());
		}
	while($row = mysql_fetch_array($result)) {
		if ($row['username']==$username) {
			return true;
		}
	}
	return false;
}
function comment_amout() {
	global $connection;
	$q = "SELECT id FROM comments WHERE confirmed = 0";
	$r = mysql_query($q,$connection);
	if (!$r) {
			die ("Database query error: ".mysql_error());
		}
	return mysql_affected_rows();
}

function get_lang($ln) {
	global $connection;
	$query = "SELECT * FROM lang_tj";
	$result = mysql_query($query,$connection);
	if (!$result) {
			die ("Database query error: ".mysql_error());
		}
	while($row = mysql_fetch_array($result)) {
		$def = stripslashes($row[$ln]);
			$lang[$row['definition']] = $def;
	}
	return $lang;
}
function get_mobile_lang($ln) {
	global $connection;
	$query = "SELECT * FROM mobile_lang";
	$result = mysql_query($query,$connection);
	if (!$result) {
			die ("Database query error: ".mysql_error());
		}
	while($row = mysql_fetch_array($result)) {
		$def = stripslashes($row[$ln]);
			$lang[$row['def']] = $def;
	}
	return $lang;
}

function get_news_titles($ln) {
	global $connection;
	$query = "SELECT id,{$ln}_title,{$ln}_text FROM news ORDER BY id DESC";
	$result = mysql_query($query,$connection);
	if(!$result) {
		die("Database Query Error: ".mysql_error());
	}
	while($row = mysql_fetch_array($result)){
		$return[$row['id']]['title'] = $row[$ln."_title"];
		$return[$row['id']]['id'] = $row['id'];
		$return[$row['id']]['text'] = $row[$ln.'_text'];
	}
	if (isset($return)) {
		return $return;
	} else { return 0; }
	mysql_free_result($result);
}
function get_last_news_id() {
	global $connection;
	$query = "SELECT id FROM news ORDER BY id DESC LIMIT 1";
	$result = mysql_query($query,$connection);
	if(!$result) {
		die("Database Query Error: ".mysql_error());
	}
	$row = mysql_fetch_array($result);
	return $row['id'];
	mysql_free_result($result);
}
function get_news_title_by_id($id,$ln) {
	global $connection;
	$id = mysql_prep($id);
	$query = "SELECT {$ln}_title FROM news WHERE id = '{$id}'";
	$result = mysql_query($query,$connection);
	if(!$result) {
		die("Database Query Error: ".mysql_error());
	}
	$row = mysql_fetch_array($result);
	if (!empty($row)) {
		return $row[$ln."_title"];
	} else { return "Page Error"; }
	mysql_free_result($result);
}
function get_news_texts($id,$ln) {
	$id = mysql_prep($id);
	global $connection;
	$query = "SELECT {$ln}_title,{$ln}_text,time FROM news WHERE id = '{$id}' LIMIT 1";
	$result = mysql_query($query,$connection);
	if(!$result) {
		die("Database Query Error: ".mysql_error());
	}
	return $row = mysql_fetch_array($result); 
	mysql_free_result($result);
}

function get_news_comments($id) {
	global $connection;
	$id = mysql_prep($id);
	$query = "SELECT * FROM comments WHERE news_id = '{$id}' AND confirmed = '1' ORDER BY id DESC";
	$result = mysql_query($query,$connection);
	if (!$result) {
		die("Database Query Error: ".mysql_error());
	}
	while($row = mysql_fetch_array($result)) {
		$r[$row['id']]['id'] = $row['id'];
		$r[$row['id']]['comment'] = htmlspecialchars($row['comment']);
		$r[$row['id']]['poster'] = htmlspecialchars($row['poster']);
		$r[$row['id']]['time'] = $row['time'];
	}
	if (isset($r)) {
		return $r;
	} else { return 0; }
	mysql_free_result($result);
}
?>
