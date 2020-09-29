<?php
require "session.php";
require "../system/connection.php";
require "functions.php";
if (logged_in()) { redirect_to("admin.php");}
?>
<html>
<head>
<title>Lugat Backend Login</title>
<style type="text/css">
body {
	font-family: "lucida grande",arial,Georgia,Times New Roman;
	margin:0;
	padding:0;
}
a {
	color: #369;
	text-decoration: none;
}
a:visited {
	color: #369;
	text-decoration: none;
}
h1 {
	color: white;
	padding: 20px;
	margin-bottom:0;
    background-color: #369;
}
#button {
	font-size: 24pt;
	font-weight: bold;
	padding: 5px;
	color: #369;
	margin: 10px;
	width: 100px;
	margin-right: 230px;
}
.wide {
	margin-right:230px;
	padding: 10px;
}

.text {
	width: 80%; border: 1px solid #BFBFBF; font-size: 13px; color: #222; padding: 5px; vertical-align: middle; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; margin-top: 5px; margin-right: 0px; margin-bottom: 8px; margin-left: 0px;
}
#formID {
	color: #369;
	border: 10px solid #369;
	width: 400px;
	padding: 20px;
	margin: 0;
	margin-top:-10px;
}
#footer {
	position: relative;
	width:440px;
	background: #369;
	color:white;
	padding:10px;
	height: 30px;
}
</style>

</head>
<body><center>
<h1>Lugat Backend</h1>
<?php if (@$_POST['username']) {
	$username = mysql_prep($_POST['username']);
	$password = $_POST['password'];
	$query = "SELECT username,password FROM users WHERE username='{$username}'";
		$result = mysql_query($query,$connection);
		if (!$result) {
			die ("Database query error: ".mysql_error());
		}
		$row = mysql_fetch_array($result);
	if (($row['username']==$username) && ($row['password']==$password)) {
		
		$_SESSION['username'] = $row['username'];
		
		redirect_to("admin.php");
	} else {redirect_to("index.php");}
	mysql_free_result($result);	

}; ?>
<form method="post" id="formID">
<div class="wide">Username</div><div><input class="text" type="text" name="username"></div>
<div class="wide">Password</div><div><input class="text" type="password" name="password"></div>
<div><input type="submit" id="button" value="Login"></div>
<div class="wide"><a href="../index.php">Lugat Main</a></div>
</form>
<div id="footer"><span style="float:left;">Ulugbek MINIYAROV &copy 2010</span><img style="float:right;" src="../images/lugat.png" height="30px" /></div>
</center>
</body>
</html>
<?php mysql_close($connection); ?>
