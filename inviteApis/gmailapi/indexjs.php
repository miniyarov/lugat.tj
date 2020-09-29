<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css.css" />

<script type="text/javascript" src="http://www.google.com/jsapi">
</script>
<script>
google.load("gdata", "1.x");
var mailAmount;
var scope = 'http://www.google.com/m8/feeds';
google.setOnLoadCallback(initFunc);
function setupContactsService() {
  contactsService = new google.gdata.contacts.ContactsService('Lugattj.Com-1.0');
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
	  document.getElementById('mailList').innerHTML += '<span class="emailSpan"><input name="emails[]" type="checkbox" id="email'+i+'"  value="' + emailAddress +'"><span class="email" onclick="selectEmail(document.getElementById(\'email'+i+'\'));">' + emailAddress +'</span><span><br>';
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
function selectEmail(id) {
	if (id) {
		if (id.checked == true) {
			id.checked = false;
		} else {id.checked = true;}
	}
}
var allselected = false;
function selectAllMailList() {
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
<center>
<img src="lugatru.png" style="display:none;">
<div id="loading" style="display:none;">Loading</div>
<a href="#" onclick="selectAllMailList();"><span id="selectalllink">Select All</span></a><br>
<form method="post" action="inviteGmail.php">
<div id='mailList'></div>
<input type="submit" value="Invite" onclick="logMeOut();return true;">
</form>
</center>
</body>
</html>