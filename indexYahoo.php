<?php include_once("inviteApis/yahooapi/yosdk/lib/Yahoo.inc");
// Define constants to store your API Key (Consumer Key) and
// Shared Secret (Consumer Secret).
define("API_KEY","[API_KEY]");
define("SHARED_SECRET","[SECRET_KEY]");

// The YahooApplication class is used for two-legged authorization, 
// which doesn't need permission from the end user.
$two_legged_app = new YahooApplication(API_KEY,SHARED_SECRET);
if ($two_legged_app == NULL) {
   // Print error message and and then exit the script.
   print ("<br />");
   print ("Error: Cannot get two_legged_app (YahooApplication object)."); 
   exit;
}
// The YahooSession class is used for three-legged authorization,
// which does require permission from the end user.

$session=YahooSession::requireSession(API_KEY, SHARED_SECRET);
if ($session == NULL) {
   // Print error message and and then exit the script.
   print ("<p>");
   print ("Error: Cannot get session object."); 
   print (" Check your API Key (Consumer Key) and Shared Secret (Consumer Secret)");
   print ("</p>");
   exit;
}

// Define YQL queries for the Social Directory APIs
$contacts = "select * from social.contacts where guid=me";


$api_queries = array("Contacts"=>$contacts);

require_once "header.php";
echo '<div style="clear:both;"></div>
	<center style="color:#369;">';


// Make the calls to YQL and dump the responses.
foreach($api_queries as $api=>$query) {
   echo "<h3>Select your friend's email to send invitation</h3>";
   //$queryResponse = $session->query($query);
   $user = $session->getSessionedUser();
   $start = 0; $count = 1000; $total = 1000;
   $contacts = $user->getContacts($start,$count,$total);
   if ($contacts == NULL) {
      echo "<p>";
      echo "Error: No query response for $api.";
      echo " Check your permissions. Also, check the syntax of the YQL query.";
      echo "</p>";
   }
   else {
      echo '
	  <form method="post" action="invite.php" id="formID">
	  <a href="#" onclick="selectAllMailList();" class="linkText">
	  <span id="selectalllink">Select All</span></a><br>
	  <div id="mailList">';
	  $i=0;
	  foreach($contacts as $contact){
		foreach($contact->contact as $con) {
			foreach($con->fields as $field){
				if($field->type=='yahooid' && !empty($field->value)) {
					echo "
					<span class='emailSpan' id='eS{$i}'>
					<input class='checkbox' type='checkbox' name='emails[]' id='email{$i}' value='{$field->value}@yahoo.com' onclick='checkmail(document.getElementById(\"email{$i}\"),document.getElementById(\"eS{$i}\"),document.getElementById(\"e{$i}\"));'>
					<span id='e{$i}' class='email' onclick='selectEmail(document.getElementById(\"email{$i}\"),document.getElementById(\"eS{$i}\"),this);'>".$field->value."@yahoo.com</span></span><br>";
				}
				if($field->type=='email' && !empty($field->value)) {
					echo "
					<span class='emailSpan' id='eS{$i}'>
					<input class='checkbox' type='checkbox' name='emails[]' id='email{$i}' value='{$field->value}' onclick='checkmail(document.getElementById(\"email{$i}\"),document.getElementById(\"eS{$i}\"),document.getElementById(\"e{$i}\"));'>
					<span  id='e{$i}' class='email' onclick='selectEmail(document.getElementById(\"email{$i}\"),document.getElementById(\"eS{$i}\"),this);'>".$field->value."</span></span><br>";
				}
				if($field->type=='otherid' && !empty($field->value)) { 
				    echo "
					<span class='emailSpan' id='eS{$i}'>
					<input class='checkbox' type='checkbox' name='emails[]' id='email{$i}' value='{$field->value}' onclick='checkmail(document.getElementById(\"email{$i}\"),document.getElementById(\"eS{$i}\"),document.getElementById(\"e{$i}\"));'>
					<span  id='e{$i}' class='email' onclick='selectEmail(document.getElementById(\"email{$i}\"),document.getElementById(\"eS{$i}\"),this);'>".$field->value."</span></span><br>"; }
			$i++;
			}
		}
	  }
	  
      echo "
	  <input type='hidden' value='{$i}' id='mailAmount'></div>
	  <input type='submit' value='Invite' id='submit' class='button'>
	  <input type='button' value='Cancel' class='button'>
	  </form>";
   }
}
echo '</center><div style="clear:both;"></div>';
include_once("footer.php");
?>