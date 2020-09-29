<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css.css" />
<script type="text/javascript">
function selectEmail(id) {
	if (id) {
		if (id.checked == true) {
			id.checked = false;
		} else {id.checked = true;}
	}
}
var allselected = false;
function selectAllMailList() {
	mailAmount = document.getElementById('mailAmount').value;
	for(var t=0; t<mailAmount;t++) {
		if (document.getElementById('email'+t)) {
			if (allselected) {
				document.getElementById('email'+t).checked = false;
			} else {document.getElementById('email'+t).checked = true;}
		}
	}
	if (allselected) {
		allselected = false;
		document.getElementById('selectalllink').innerHTML = "Select All";
	} else {
		allselected = true;
		document.getElementById('selectalllink').innerHTML = "Deselect All";
	}
}

</script>
</head>
<body>
<center>
<?php
	include "contacts_fn.php";
	$ret_array = get_people_array();
	echo '
	  <a href="#" onclick="selectAllMailList();">
	  <span id="selectalllink">Select All</span></a><br>
	  <form method="post" action="inviteLive.php"><div id="mailList">';
	$i=0;
	foreach($ret_array as $arr){
		if (!empty($arr->email_address)) {
			echo "		
		<span class='emailSpan'>
		<input type='checkbox' name='emails[]' id='email{$i}' value='{$arr->email_address}'>
		<span class='email' onclick='selectEmail(document.getElementById(\"email{$i}\"));'>".$arr->email_address."</span></span><br>";
		$i++;
		} else { continue; }		
	}
	echo "
	  <input type='hidden' value='{$i}' id='mailAmount'></div>
	  <input type='submit' value='Invite'>
	  </form>";
?>   
</center>
</body>
</html>