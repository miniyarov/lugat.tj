<?php

// Specify true to log messages to Web server logs.
$DEBUG = false;

// Comma-delimited list of offers to be used.
$OFFERS = "Contacts.View";

// Application key file: store in an area that cannot be
// accessed from the Web.
$KEYFILE = 'config.xml';

// Name of cookie to use to cache the consent token. 
$COOKIE = 'delauthtoken';
$COOKIETTL = time() + (10 * 365 * 24 * 60 * 60);

// URL of Delegated Authentication index page.
$INDEX = 'indexLive.php';

// Default handler for Delegated Authentication.
$HANDLER = 'delauth-handler.php';

//A Proxy Server for PHP CURL to handle Go Daddy server access.  You may not need this or 
//need to use a different address depending on your ISP
$PROXY_SVR = "";//"http://proxy.shr.secureserver.net:3128";

?>
