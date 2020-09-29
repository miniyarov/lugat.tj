<?php require "session.php";
require "../system/connection.php";
require "functions.php";
login_confirm();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tg" xml:lang="tg">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/admin.css" />
<script type="text/javascript" src="javascript/menu.js" language="Javascript">
</script>
<script type="text/javascript" src="javascript/jscript.js" language="Javascript">
</script>
<script type="text/javascript" src="javascript/keyboard.js" language="Javascript">
</script>
<title>Lugat Admin Page</title>
</head>
<input type="hidden" id="ln" value="en">
<body>
<div id="topmenu">
<h3>Hello, <a href="admin.php" id="logged_user"><?php echo $_SESSION['username']; ?></a></h3>
	<div id="links">
	<a href="logout.php">Logout</a>&nbsp;|&nbsp;<a href="../index.php">Back To Lugat</a>
	</div>

</div>

<div id="bodyID">
<ul id="menu">
<li><a onclick="add_word_load();return false;">add word</a></li>
<li><a onclick="add_user_load();return false;">add user</a></li>
<li><a onclick="submitted_words();return false;">submitted words (<?php echo submitted_word_amount();?>)</a></li> 
<li><a onclick="statistics();return false;">statistics</a></li>
<li><a onclick="feedback();return false;">feedback (<?php echo feedback_amount();?>)</a></li>
<li><a onclick="news_manager();return false;">news</a></li>
<li><a onclick="see_comments();return false;">comments (<?php echo comment_amout();?>)</a></li>
</ul>

<div id="load_menu_result">
<h3>Welcome to Admin Page</h3>
<h3>Select Menu You Want To Perform</h3>
</div>

<div id="clearer"></div>
</div>
<div id="footer">
<span>Lugat &copy; 2009 - 2010. Coder: Ulugbek MINIYAROV</span>
</div>
</body>
</html>
<?php 
	mysql_close($connection);
?>
