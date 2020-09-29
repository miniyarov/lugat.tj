function add_word_load() {
	document.getElementById('load_menu_result').innerHTML = '<div id="add_word"><a href="#" onclick="close_menu();return false;">close</a><h3>Add Word</h3><form method="post" id="add_word_form"><div id="add_word_result"></div>Word:<br><input type="text" id="submit_word" maxlength="32" size="52"><br>Translation:<a href="javascript:tj_keyboard_on_off();" style="font-size: 8pt;">tajik keyboard and transliteration</a><br><br><br><div id="tj_keyboard" align="center"></div><textarea name="submit_translation" cols="40" rows="7" onblurresetctrls() id="searchField" autocomplete="off" onkeydown=checkControlAlt(event) onmouseup="updateStartEnd();" onkeypress="return translateKeyCode(event);" onkeyup="javascript:keyUp(event);"></textarea><br>From: <select name=lang1" id="id_lang1"><option value="english">English</option><option value="tajik">Tajik</option><option value="russian">Russian</option></select>To: <select name="lang2" id="id_lang2"><option value="tajik">Tajik</option><option value="english">English</option><option value="russian">Russian</option></select><br><input type="submit" value="Add Word" onclick="add_word();return false;"></form></div>';
}
function close_menu() {
		document.getElementById('load_menu_result').innerHTML = '<h3>Welcome to Admin Page</h3><h3>Select Menu You Want To Perform</h3>';
}
function add_user_load() {
	document.getElementById('load_menu_result').innerHTML = '<div id="add_user"><a href="#" onclick="close_menu();return false;">close</a><h3>Add User</h3><form method="post" id="add_user_form"><div id="add_user_result"></div><br>Username:<br><input type="text" id="username" maxlength=32 size=32><br>Password:<br><input type="password" id="password" maxlength=32 size=32><br><input type="submit" value="Add User" onclick="add_user();registered_users();return false;"></form><br>Registered Users:<br><div id="registered_users_list"></div>';
	registered_users();
}
function statistics() {
	document.getElementById('load_menu_result').innerHTML = '<div id="stats"><a href="#" onclick="close_menu();return false;">close</a><h3>Statistics</h3><br><div id="stats_results"></div></div>';
	reload_stats();
}
function submitted_words() {
	document.getElementById('load_menu_result').innerHTML = '<div id="submitted_words"><a href="#" onclick="close_menu();return false;">close</a><h3>Submitted words</h3>Russian - Tajik<div id="tmp_rutj"></div><br>Tajik - Russian<div id="tmp_tjru"></div><br>English - Tajik<div id="tmp_entj"></div><br>Tajik - English<div id="tmp_tjen"></div><br></div>';
	var dir = new Array('rutj','tjru','entj','tjen');
	for (var i=0;i<=3;i++) {
		load_tmp_words(i,dir[i]);
	}
}
function feedback() {
	document.getElementById('load_menu_result').innerHTML = '<div id="feedback_msg"><a href="#" onclick="close_menu();return false;">close</a><h3>Feedback Messages <small>(max 10 messages ordered by date is shown)</small></h3><strong><div style=\"width:20%;float:left;\">Name</div> <div style=\"width:20%;float:left;\">Email</div> <div style=\"width:33%;float:left;\">Message</div> <div style=\"width:15%;float:left;\">Ip Address</div> <div style=\"width:12%;float:left;\">Time</div></strong><br><div id="feedback_msg_results"></div>';
	load_feedback();
}
function news_manager() {
	document.getElementById('load_menu_result').innerHTML = '<div id="news"><a href="#" onclick="close_menu();return false;">close</a><h3>News Manager</h3><a href="#" onclick="add_news_form();return false;">add news</a> | <a href="#" onclick="edit_news_form();return false;">edit news</a><br><div id="add_news_form"></div><div id="edit_form"></div></div>';
}
function see_comments() {
	document.getElementById('load_menu_result').innerHTML = '<div id="comments"><a href="#" onclick="close_menu();return false;">close</a><h3>Comments Manager</h3></div><br><br><div id="comments_div"></div>';
	show_comments();
}
