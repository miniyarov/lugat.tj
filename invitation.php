<?php
require_once "header.php";
?>	
<div style="clear:both;"></div>
<div id="top">
<center>
<div id="google_adsense">
<script type="text/javascript"><!--
google_ad_client = "pub-7774239533442623";
/* top leader board728x90, created 3/4/10 */
google_ad_slot = "9273412410";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
</center>
</div>

<div style="clear:both;"></div>
<div id="bodyN">
<div style="clear:both;"></div>
<div id="topbar">
<script type="text/javascript"><!--
google_ad_client = "pub-7774239533442623";
/* 468x15, created 12/22/09 */
google_ad_slot = "2957363533";
google_ad_width = 468;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

<script type="text/javascript">
function checkEmail(email) {
      if (email.length > 0) {
               var tmp = new Array();
			   var tmp1 = new Array();
               tmp = email.split('@');
			   if (tmp[1]) {
			   	tmp1 = tmp[1].split('.');
				   switch (tmp1[0]) {
					case 'gmail':document.getElementById('invitationFormSubmit').value = 'Gmail';break;
					case 'googlemail':document.getElementById('invitationFormSubmit').value = 'Gmail';break;
					case 'hotmail':document.getElementById('invitationFormSubmit').value = 'Live Hotmail';break;
					case 'live':document.getElementById('invitationFormSubmit').value = 'Live Hotmail';break;
					case 'yahoo':document.getElementById('invitationFormSubmit').value = 'Yahoo!';break;
					case 'yahoomail':document.getElementById('invitationFormSubmit').value = 'Yahoo!';break;
					default:document.getElementById('invitationFormSubmit').value = 'Continue';break;
					} 
           		} else { document.getElementById('invitationFormSubmit').value = 'Continue'; }
		} else { document.getElementById('invitationFormSubmit').value = 'Continue'; }	
}

function onSubmitForm() {
	mail = document.getElementById('email').value;
	var tmp3 = new Array();
	var tmp4 = new Array();
    tmp3 = mail.split('@');
	if (tmp3[1]) {
			   	tmp4 = tmp3[1].split('.');
			   	switch (tmp4[0]) {
					case 'gmail':
					document.invitationForm.action = 'indexGmail.php';
					document.invitationForm.method = 'post';
					return true;
					case 'googlemail':
					document.invitationForm.action = 'indexGmail.php';
					document.invitationForm.method = 'post';
					return true;
					case 'hotmail':
					document.invitationForm.action = 'inviteApis/liveapi/indexLive.php';
					document.invitationForm.method = 'post';
					return true;
					case 'live':
					document.invitationForm.action = 'inviteApis/liveapi/indexLive.php';
					document.invitationForm.method = 'post';
					return true;
					case 'yahoo':
					document.invitationForm.action = 'indexYahoo.php';
					document.invitationForm.method = 'post';
					return true;
					case 'yahoomail':
					document.invitationForm.action = 'indexYahoo.php';
					document.invitationForm.method = 'post';
					return true;
					default:alert('Provided Email is not supported for contact importing. Please type emails manually.');break;
				}
		}
	return false;
}
</script>
</div>
<div style="margin-bottom:20px;"></div>	
<center>
<div>
Invite Your Friends to use Tajik Dictionary
<form name="invitationForm" onsubmit="return onSubmitForm();" method="post">
Your Email:<input type="text" name="email" id="email" onkeyup="checkEmail(this.value);">
<input type="submit" value="Continue" id="invitationFormSubmit">
</form>
<a href="indexGmail.php"><img src="images/gmail_logo.png"></a>
<a href="inviteApis/liveapi/indexLive.php"><img src="images/live_logo.png"></a>
<a href="indexYahoo.php"><img src="images/yahoo_logo.png"></a>
<br>
OR
<br>
Enter email address of your friend(s) here.<br>
For multiple entry please separate emails with enter. Example:<br>
email@server.com<br>email2@server2.com<br>

<div style="width:420px">
<form name="invitationForm2" method="post">
<textarea rows="10" cols="40">
</textarea><br>
<input type="submit" value="Invite" style="float:left;">
</form>
</div>
</div>
</center>
</div>
<div style="clear:both;"></div>
<?php
include_once("footer.php");
?>