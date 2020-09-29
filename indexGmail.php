<?php
require_once "system/connection.php";
require_once "admin/functions.php";
if(@$_GET['ln']) {
		switch(@$_GET['ln']) {
			case 'ru': $ln='ru';break;
			case 'tj': $ln='tj';break;
			case 'en': $ln='en';break;
			default: $ln = 'ru'; 		
		} 
	} else  $ln = 'ru';
$lang = get_lang($ln);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tg" xml:lang="tg">
<head>
<meta name="author" content="Ulugbek MINIYAROV">
<link rel="icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/global.css" />
<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="iehack.css" />
<![endif]-->
<!--[if lte IE 6]>
	<link rel="stylesheet" type="text/css" href="ie6hack.css" />
<![endif]-->
<!--[if lt IE 7.]>
	<script defer type="text/javascript" src="pngfix.js"></script>
<![endif]-->
<title>
	<?php 
		echo "Gmail Invitation | ".$lang['site_title'];
	?>
</title>
<meta name="DESCRIPTION" content="<?php 
		echo "Gmail Invitation @ ".$lang['site_description']; ?>">
<meta name="KEYWORDS" content="online,dictionary,tajik russian,russian tajik,tajik english,english tajik,slovar,lugat,tajik,dushanbe,tajikistan,tojiki,rusi,anglisi,inglisi,tacikce,sozluk,tacikistan,dusanbe,то?икистон,точикистон,то?ик?,точикй,точики,лу?ат,лугат,словарь,словар,таджикский,русский,разговорник,таджик,таджикистан,душанбе">
<script type="text/javascript" src="javascript/script.js" language="Javascript">
</script>
<script type="text/javascript" src="javascript/dialogBox.js" language="Javascript">
</script>
<script type="text/javascript" src="javascript/ajax.js" language="Javascript">
</script>
<script type="text/javascript" src="javascript/keyboard.js" language="Javascript">
</script>
<script type="text/javascript" src="http://www.google.com/jsapi">
</script>
<script>
google.load("gdata", "1.x");
var mailAmount;
var scope = 'http://www.google.com/m8/feeds';
google.setOnLoadCallback(initFunc);
function setupContactsService() {
  contactsService = new google.gdata.contacts.ContactsService('Lugattj.Com-Invitation');
}
function logMeIn() {
  var token = google.accounts.user.login(scope);
}
function getMyContacts() {
  var contactsFeedUri = 'http://www.google.com/m8/feeds/contacts/default/full';
  var query = new google.gdata.contacts.ContactQuery(contactsFeedUri);
  query.setMaxResults(250);
  query.setSortOrder('descending');
  
  contactsService.getContactFeed(query, handleContactsFeed, handleError);
}

var handleContactsFeed = function(result) {
  var entries = result.feed.entry;
  var no_email = 0;
  document.getElementById('mailList').innerHTML = "";
  for (var i = 0; i < entries.length; i++) {
    var contactEntry = entries[i];
    var emailAddresses = contactEntry.getEmailAddresses();
    for (var j = 0; j < emailAddresses.length; j++) {
      var emailAddress = emailAddresses[j].getAddress();
      if (emailAddress) {
	  //document.getElementById('mailList').innerHTML += '<span class="emailSpan"><input name="emails[]" type="checkbox" id="email'+i+'"  value="' + emailAddress +'"><span class="email" onclick="selectEmail(document.getElementById(\'email'+i+'\'));">' + emailAddress +'</span><span><br>';
	  document.getElementById('mailList').innerHTML += '<span class=\'emailSpan\' id=\'eS'+i+'\'><input class=\'checkbox\' type=\'checkbox\' name=\'emails[]\' id=\'email'+i+'\' value='+emailAddress+' onclick=\'checkmail(document.getElementById("email'+i+'"),document.getElementById("eS'+i+'"),document.getElementById("e'+i+'"));\'><span id=\'e'+i+'\' class=\'email\' onclick=\'selectEmail(document.getElementById("email'+i+'"),document.getElementById("eS'+i+'"),this);\'>'+emailAddress+'</span></span><br>';
	  } else { 
			continue;
			no_email++;
		}
    }    
  }
  mailAmount = i-no_email;
  
}

function logMeOut() {
  google.accounts.user.logout();
}

var handleError = function(error) {
	//document.getElementById('mailList').innerHTML = "";
}
function initFunc() {
	if (!document.getElementById('mailList').hasChildNodes) {
		document.getElementById('loading').style.display = "";
	}
	setupContactsService();
	if (google.accounts.user.checkLogin(scope)) {
		getMyContacts();
		
		} else 
		{
			logMeIn();
		}
	
}
</script>

</head>
<body>

<div id="top_menu">
<div id="topLeft">
</div>
<div id="topMid">
</div>
<div id="topRight">
</div>
<ul id="left_ul">
	<li>
	<a href="index.php?ln=<?php echo $ln;?>"><img src="images/lugat.png" width="100" height="25" style="margin-left: 40px;" title="<?php echo $lang['logo_alt']?>"></a>
	</li>
	<li>
		<div id="searchLittle">
		<form action="index.php?ln=<?php echo $ln;?>" method="get" id="searchFormID">
		<input type="text" name="word" id="searchFormText" autocomplete="off">
		<input type="submit" title="<?php echo $lang['translate_button_text'] ?>" value="<?php echo $lang['translate_button_text'] ?>" name="submit" id="submitLittle">
		</form>
		</div>
	</li>
	
	
	<input type="hidden" id="ln" name="ln" value="<?php echo $ln;?>">
</ul>
<ul id="right_ul">
	<li>
	<a href="statistics.php?ln=<?php echo $ln;?>" title="<?php echo $lang['topmenu_right_stats'] ?>"><?php echo $lang['topmenu_right_stats'] ?></a>
	</li>
	<li>
	<a href="news.php?ln=<?php echo $ln;?>" title="<?php echo $lang['topmenu_right_news'] ?>"><?php echo $lang['topmenu_right_news'] ?></a>
	</li>
	<li>
	<a href="#" title="<?php echo $lang['topmenu_right_submit_word'] ?>" onclick="javascript:DialogBox('<strong><?php echo $lang['topmenu_right_submit_word_title'] ?></strong>', '<?php echo addslashes($lang['topmenu_right_submit_word_text']) ?>');return false;"><strong><span style='color:yellow;'><?php echo $lang['topmenu_right_submit_word'] ?></span></strong></a>
	</li>
</ul>
</div>
<div id="bodyID">
<div style="clear:both;"></div>
<center style="color:#369;">
<h3>Select your friend's email to send invitation</h3>

<form method="post" action="invite.php" id="formID">
<a href="#" onclick="selectAllMailList();" class="linkText">
<span id="selectalllink">Select All</span></a><br>
<div id='mailList'></div>
<input type="submit" value="Invite" onclick="logMeOut();return true;" class='button'>
<input type='button' value='Cancel' class='button'>
</form>
</center>
<div style="clear:both;"></div>
<?php 
include_once "footer.php";
?>