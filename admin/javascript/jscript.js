window.onload = CheckCookie;
function addslashes (str) {
    // Escapes single quote, double quotes and backslash characters in a string with backslashes  
    // 
    // version: 909.322
    // discuss at: http://phpjs.org/functions/addslashes
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Ates Goral (http://magnetiq.com)
    // +   improved by: marrtins
    // +   improved by: Nate
    // +   improved by: Onno Marsman
    // +   input by: Denny Wardhana
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // *     example 1: addslashes("kevin's birthday");
    // *     returns 1: 'kevin\'s birthday'
 
    return (str+'').replace(/([\\"'])/g, "\\$1").replace(/\u0000/g, "\\0");
}
function get_html_translation_table (table, quote_style) {
    // Returns the internal translation table used by htmlspecialchars and htmlentities  
    // 
    // version: 909.322
    // discuss at: http://phpjs.org/functions/get_html_translation_table
    // +   original by: Philip Peterson
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: noname
    // +   bugfixed by: Alex
    // +   bugfixed by: Marco
    // +   bugfixed by: madipta
    // +   improved by: KELAN
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Frank Forte
    // +   bugfixed by: T.Wild
    // +      input by: Ratheous
    // %          note: It has been decided that we're not going to add global
    // %          note: dependencies to php.js, meaning the constants are not
    // %          note: real constants, but strings instead. Integers are also supported if someone
    // %          note: chooses to create the constants themselves.
    // *     example 1: get_html_translation_table('HTML_SPECIALCHARS');
    // *     returns 1: {'"': '&quot;', '&': '&amp;', '<': '&lt;', '>': '&gt;'}
    
    var entities = {}, hash_map = {}, decimal = 0, symbol = '';
    var constMappingTable = {}, constMappingQuoteStyle = {};
    var useTable = {}, useQuoteStyle = {};
    
    // Translate arguments
    constMappingTable[0]      = 'HTML_SPECIALCHARS';
    constMappingTable[1]      = 'HTML_ENTITIES';
    constMappingQuoteStyle[0] = 'ENT_NOQUOTES';
    constMappingQuoteStyle[2] = 'ENT_COMPAT';
    constMappingQuoteStyle[3] = 'ENT_QUOTES';
 
    useTable       = !isNaN(table) ? constMappingTable[table] : table ? table.toUpperCase() : 'HTML_SPECIALCHARS';
    useQuoteStyle = !isNaN(quote_style) ? constMappingQuoteStyle[quote_style] : quote_style ? quote_style.toUpperCase() : 'ENT_COMPAT';
 
    if (useTable !== 'HTML_SPECIALCHARS' && useTable !== 'HTML_ENTITIES') {
        throw new Error("Table: "+useTable+' not supported');
        // return false;
    }
 
    entities['38'] = '&amp;';
    if (useTable === 'HTML_ENTITIES') {
        entities['160'] = '&nbsp;';
        entities['161'] = '&iexcl;';
        entities['162'] = '&cent;';
        entities['163'] = '&pound;';
        entities['164'] = '&curren;';
        entities['165'] = '&yen;';
        entities['166'] = '&brvbar;';
        entities['167'] = '&sect;';
        entities['168'] = '&uml;';
        entities['169'] = '&copy;';
        entities['170'] = '&ordf;';
        entities['171'] = '&laquo;';
        entities['172'] = '&not;';
        entities['173'] = '&shy;';
        entities['174'] = '&reg;';
        entities['175'] = '&macr;';
        entities['176'] = '&deg;';
        entities['177'] = '&plusmn;';
        entities['178'] = '&sup2;';
        entities['179'] = '&sup3;';
        entities['180'] = '&acute;';
        entities['181'] = '&micro;';
        entities['182'] = '&para;';
        entities['183'] = '&middot;';
        entities['184'] = '&cedil;';
        entities['185'] = '&sup1;';
        entities['186'] = '&ordm;';
        entities['187'] = '&raquo;';
        entities['188'] = '&frac14;';
        entities['189'] = '&frac12;';
        entities['190'] = '&frac34;';
        entities['191'] = '&iquest;';
        entities['192'] = '&Agrave;';
        entities['193'] = '&Aacute;';
        entities['194'] = '&Acirc;';
        entities['195'] = '&Atilde;';
        entities['196'] = '&Auml;';
        entities['197'] = '&Aring;';
        entities['198'] = '&AElig;';
        entities['199'] = '&Ccedil;';
        entities['200'] = '&Egrave;';
        entities['201'] = '&Eacute;';
        entities['202'] = '&Ecirc;';
        entities['203'] = '&Euml;';
        entities['204'] = '&Igrave;';
        entities['205'] = '&Iacute;';
        entities['206'] = '&Icirc;';
        entities['207'] = '&Iuml;';
        entities['208'] = '&ETH;';
        entities['209'] = '&Ntilde;';
        entities['210'] = '&Ograve;';
        entities['211'] = '&Oacute;';
        entities['212'] = '&Ocirc;';
        entities['213'] = '&Otilde;';
        entities['214'] = '&Ouml;';
        entities['215'] = '&times;';
        entities['216'] = '&Oslash;';
        entities['217'] = '&Ugrave;';
        entities['218'] = '&Uacute;';
        entities['219'] = '&Ucirc;';
        entities['220'] = '&Uuml;';
        entities['221'] = '&Yacute;';
        entities['222'] = '&THORN;';
        entities['223'] = '&szlig;';
        entities['224'] = '&agrave;';
        entities['225'] = '&aacute;';
        entities['226'] = '&acirc;';
        entities['227'] = '&atilde;';
        entities['228'] = '&auml;';
        entities['229'] = '&aring;';
        entities['230'] = '&aelig;';
        entities['231'] = '&ccedil;';
        entities['232'] = '&egrave;';
        entities['233'] = '&eacute;';
        entities['234'] = '&ecirc;';
        entities['235'] = '&euml;';
        entities['236'] = '&igrave;';
        entities['237'] = '&iacute;';
        entities['238'] = '&icirc;';
        entities['239'] = '&iuml;';
        entities['240'] = '&eth;';
        entities['241'] = '&ntilde;';
        entities['242'] = '&ograve;';
        entities['243'] = '&oacute;';
        entities['244'] = '&ocirc;';
        entities['245'] = '&otilde;';
        entities['246'] = '&ouml;';
        entities['247'] = '&divide;';
        entities['248'] = '&oslash;';
        entities['249'] = '&ugrave;';
        entities['250'] = '&uacute;';
        entities['251'] = '&ucirc;';
        entities['252'] = '&uuml;';
        entities['253'] = '&yacute;';
        entities['254'] = '&thorn;';
        entities['255'] = '&yuml;';
    }
 
    if (useQuoteStyle !== 'ENT_NOQUOTES') {
        entities['34'] = '&quot;';
    }
    if (useQuoteStyle === 'ENT_QUOTES') {
        entities['39'] = '&#39;';
    }
    entities['60'] = '&lt;';
    entities['62'] = '&gt;';
 
 
    // ascii decimals to real symbols
    for (decimal in entities) {
        symbol = String.fromCharCode(decimal);
        hash_map[symbol] = entities[decimal];
    }
    
    return hash_map;
}
function htmlentities (string, quote_style) {
    // Convert all applicable characters to HTML entities  
    // 
    // version: 909.322
    // discuss at: http://phpjs.org/functions/htmlentities
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: nobbler
    // +    tweaked by: Jack
    // +   bugfixed by: Onno Marsman
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +    bugfixed by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Ratheous
    // -    depends on: get_html_translation_table
    // *     example 1: htmlentities('Kevin & van Zonneveld');
    // *     returns 1: 'Kevin &amp; van Zonneveld'
    // *     example 2: htmlentities("foo'bar","ENT_QUOTES");
    // *     returns 2: 'foo&#039;bar'
    var hash_map = {}, symbol = '', tmp_str = '', entity = '';
    tmp_str = string.toString();
    
    if (false === (hash_map = this.get_html_translation_table('HTML_ENTITIES', quote_style))) {
        return false;
    }
    hash_map["'"] = '&#039;';
    for (symbol in hash_map) {
        entity = hash_map[symbol];
        tmp_str = tmp_str.split(symbol).join(entity);
    }
    
    return tmp_str;
}
function htmlspecialchars (string, quote_style, charset, double_encode) {
    // Convert special characters to HTML entities  
    // 
    // version: 912.1315
    // discuss at: http://phpjs.org/functions/htmlspecialchars    // +   original by: Mirek Slugen
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   bugfixed by: Nathan
    // +   bugfixed by: Arno
    // +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)    // +    bugfixed by: Brett Zamir (http://brett-zamir.me)
    // +      input by: Ratheous
    // +      input by: Mailfaker (http://www.weedem.fr/)
    // +      reimplemented by: Brett Zamir (http://brett-zamir.me)
    // +      input by: felix    // +    bugfixed by: Brett Zamir (http://brett-zamir.me)
    // %        note 1: charset argument not supported
    // *     example 1: htmlspecialchars("<a href='test'>Test</a>", 'ENT_QUOTES');
    // *     returns 1: '&lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;'
    // *     example 2: htmlspecialchars("ab\"c'd", ['ENT_NOQUOTES', 'ENT_QUOTES']);    // *     returns 2: 'ab"c&#039;d'
    // *     example 3: htmlspecialchars("my "&entity;" is still here", null, null, false);
    // *     returns 3: 'my &quot;&entity;&quot; is still here'
    var optTemp = 0, i = 0, noquotes= false;
    if (typeof quote_style === 'undefined' || quote_style === null) {        quote_style = 2;
    }
    string = string.toString();
    if (double_encode !== false) { // Put this first to avoid double-encoding
        string = string.replace(/&/g, '&amp;');    }
    string = string.replace(/</g, '&lt;').replace(/>/g, '&gt;');
 
    var OPTS = {
        'ENT_NOQUOTES': 0,        'ENT_HTML_QUOTE_SINGLE' : 1,
        'ENT_HTML_QUOTE_DOUBLE' : 2,
        'ENT_COMPAT': 2,
        'ENT_QUOTES': 3,
        'ENT_IGNORE' : 4    };
    if (quote_style === 0) {
        noquotes = true;
    }
    if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags        quote_style = [].concat(quote_style);
        for (i=0; i < quote_style.length; i++) {
            // Resolve string input to bitwise e.g. 'PATHINFO_EXTENSION' becomes 4
            if (OPTS[quote_style[i]] === 0) {
                noquotes = true;            }
            else if (OPTS[quote_style[i]]) {
                optTemp = optTemp | OPTS[quote_style[i]];
            }
        }        quote_style = optTemp;
    }
    if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
        string = string.replace(/'/g, '&#039;');
    }    if (!noquotes) {
        string = string.replace(/"/g, '&quot;');
    }
 
    return string;}
function load_feedback() {
	var load_feedback_ajax = getXMLHttpRequestObject();
	if (load_feedback_ajax) {
		load_feedback_ajax.open('get','ajax/feedback_msg.php',true);
		load_feedback_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		load_feedback_ajax.onreadystatechange = function () {
			handleResponseFeedbackMSG(load_feedback_ajax);
		}
		load_feedback_ajax.send(null);
	}
	return false;
}
function handleResponseFeedbackMSG(load_feedback_ajax) {
	if (load_feedback_ajax.readyState == 4) {
	if ((load_feedback_ajax.status == 200) || (load_feedback_ajax.status == 304) )
		{ 
		var results = document.getElementById('feedback_msg_results');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = load_feedback_ajax.responseXML;
		var error = data.getElementsByTagName('error');
			if (error.length > 0) {
				for(var i=0;i<error.length;i++) {	
						var node = document.createElement('div');
						node.innerHTML = error[i].firstChild.nodeValue;
						results.appendChild(node);
					}
			} else {
				var id = data.getElementsByTagName('id');
				var name = data.getElementsByTagName('name');
				var email = data.getElementsByTagName('email');
				var message = data.getElementsByTagName('message');
				var ip = data.getElementsByTagName('ip');
				var time = data.getElementsByTagName('time');
				if (id.length > 0) {
					for (var i=0;i<id.length;i++) {
							var node = document.createElement('div');
							node.innerHTML = "<div style=\"padding:1px;width:20%;float:left;overflow:auto;\">"+name[i].firstChild.nodeValue+"</div> <div style=\"padding:1px;overflow:auto;width:20%;float:left;\">"+email[i].firstChild.nodeValue+"</div> <div style=\"padding:1px;overflow:auto;width:30%;float:left;\">"+message[i].firstChild.nodeValue+"</div> <div style=\"padding:1px;overflow:auto;width:15%;float:left;\">"+ip[i].firstChild.nodeValue+"</div> <div style=\"padding:1px;overflow:auto;width:12%;float:left;\">"+time[i].firstChild.nodeValue+"</div><div id='clearer'></div><a href=\"ajax/feedbackdelete.php?id="+id[i].firstChild.nodeValue+"\" onclick=\"if(!confirm('You must be Admin to delete feedback message, Are You Sure?')) return false;\">Delete</a>";
							results.appendChild(node);
						}
					} else {
						var node = document.createElement('div');
							node.innerHTML = "There is no feedback available";
							results.appendChild(node);
					}
			}
		}
	}
}
function load_tmp_words(i,dir) {
	var tmp_words_ajax = getXMLHttpRequestObject();
	if (tmp_words_ajax) {
		tmp_words_ajax.open('get','ajax/tmp_words.php?dir='+encodeURIComponent(i),true);
		tmp_words_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		tmp_words_ajax.onreadystatechange = function () {
			handleResponseTmpWords(tmp_words_ajax,dir,i);
		}
		tmp_words_ajax.send(null);
	}
	return false;
}
function handleResponseTmpWords(tmp_words_ajax,dir,d) {
	if (tmp_words_ajax.readyState == 4) {
	if ((tmp_words_ajax.status == 200) || (tmp_words_ajax.status == 304) )
		{ 
		var results = document.getElementById('tmp_'+dir);
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = tmp_words_ajax.responseXML;
		var error = data.getElementsByTagName('error');
			if (error.length > 0) {
				for(var i=0;i<error.length;i++) {	
						var node = document.createElement('div');
						node.innerHTML = error[i].firstChild.nodeValue;
						results.appendChild(node);
					}
			} else {
				var id = data.getElementsByTagName('id');
				var w = data.getElementsByTagName('w');
				var t = data.getElementsByTagName('t');
				var ip = data.getElementsByTagName('ip');
				var time = data.getElementsByTagName('time');
				if (w.length > 0) {
					for (var i=0;i<w.length;i++) {
							var node = document.createElement('div');
							node.innerHTML = "<strong>"+w[i].firstChild.nodeValue+"</strong> - <strong>"+t[i].firstChild.nodeValue+"</strong> from <strong>"+ip[i].firstChild.nodeValue+"</strong> on "+time[i].firstChild.nodeValue+" <a href='ajax/confirm.php?w="+w[i].firstChild.nodeValue+"&t="+t[i].firstChild.nodeValue+"&i="+d+"&id="+id[i].firstChild.nodeValue+"' onclick='if(!confirm(\"Are you sure?\")) return false;'>confirm</a> - <a href='ajax/cancel.php?id="+id[i].firstChild.nodeValue+"&i="+d+"' onclick='if(!confirm(\"Are you sure?\")) return false;'>delete</a><br>";
							results.appendChild(node);
						}
					}
			}
		}
	}
}
function registered_users() {
	var reg_ajax = getXMLHttpRequestObject();
	if (reg_ajax) {
		reg_ajax.open('get','ajax/registered_users.php',true);
		reg_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		reg_ajax.onreadystatechange = function () {
			handleResponseREG(reg_ajax);
		}
		reg_ajax.send(null);
	}
	return false;
}
function handleResponseREG(reg_ajax) {
	if (reg_ajax.readyState == 4) {
	if ((reg_ajax.status == 200) || (reg_ajax.status == 304) )
		{ 
		var results = document.getElementById('registered_users_list');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = reg_ajax.responseXML;
		var error = data.getElementsByTagName('error');
			if (error.length > 0) {
				for(var i=0;i<error.length;i++) {	
						var node = document.createElement('div');
						node.innerHTML = error[i].firstChild.nodeValue;
						results.appendChild(node);
					}
			} else {
				var message = data.getElementsByTagName('message');
				if (message.length > 0) {
					
					for (var i=0;i<message.length;i++) {
							var node = document.createElement('div');
							node.innerHTML = "<strong>"+message[i].firstChild.nodeValue+"</strong><br>";
							results.appendChild(node);
						}
					
					}
				else {
				var message1 = data.getElementsByTagName('message1');
				if (message1.length > 0) {
					
					for (var i=0;i<message1.length;i++) {
							var node = document.createElement('div');
							if (message1[i].firstChild.nodeValue=='admin' || document.getElementById('logged_user').innerHTML == message1[i].firstChild.nodeValue) {
							node.innerHTML = "<strong>"+message1[i].firstChild.nodeValue+"</strong><br>";
							results.appendChild(node);
							} 
							else {
							node.innerHTML = "<strong>"+message1[i].firstChild.nodeValue+"</strong> - <a href='ajax/userdelete.php?user="+message1[i].firstChild.nodeValue+"' onclick='if(!confirm(\"Are you sure?\")) return false;'>delete</a><br>";
							results.appendChild(node);
							}
						}
					
					}
				}
			}
		}
	}
}


function reload_stats() {
	var re_ajax = getXMLHttpRequestObject();
	if (re_ajax) {
		re_ajax.open('get','ajax/stats.php',true);
		re_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		re_ajax.onreadystatechange = function () {
			handleResponseRE(re_ajax);
		}
		re_ajax.send(null);
	}
	return false;
}
function handleResponseRE(re_ajax) {
	if (re_ajax.readyState == 4) {
	if ((re_ajax.status == 200) || (re_ajax.status == 304) )
		{ 
		var results = document.getElementById('stats_results');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = re_ajax.responseXML;
		var error = data.getElementsByTagName('error');
			if (error.length > 0) {
				for(var i=0;i<error.length;i++) {	
						var node = document.createElement('div');
						node.innerHTML = error[i].firstChild.nodeValue;
						results.appendChild(node);
					}
			} else {
				var message = data.getElementsByTagName('message');
				if (message.length > 0) {
					for (var i=0;i<message.length;i++) {
							var node = document.createElement('div');
							node.innerHTML = message[i].firstChild.nodeValue+"<br>";
							results.appendChild(node);
						}
					}
			}
		}
	}
}
function add_user() {
	var add_user_ajax = getXMLHttpRequestObject();
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	if (add_user_ajax) {
		add_user_ajax.open('get','ajax/add_user.php?username='+encodeURIComponent(username)+'&password='+encodeURIComponent(password),true);
		add_user_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		add_user_ajax.onreadystatechange = function () {
			handleResponseUserAdd(add_user_ajax);
		}
		add_user_ajax.send(null);
	}
	return false;
}
function handleResponseUserAdd(add_user_ajax) {
	if (add_user_ajax.readyState == 4) {
	if ((add_user_ajax.status == 200) || (add_user_ajax.status == 304) )
		{ 
		var results = document.getElementById('add_user_result');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = add_user_ajax.responseXML;
		var error = data.getElementsByTagName('error');
			if (error.length > 0) {
				var node = document.createElement('div');
				node.setAttribute('id','error');
				node.innerHTML = "<img src='../images/error.png'>"+error[0].firstChild.nodeValue;
				results.appendChild(node);
			} else {
				var success = data.getElementsByTagName('success');
				if (success.length > 0) {
					var node = document.createElement('div');
					node.setAttribute('id','success');
					node.innerHTML = "<img src='../images/success.png'>"+success[0].firstChild.nodeValue;
					results.appendChild(node);
					document.getElementById('add_user_form').reset();
					}
			}
		}
	}
}

function add_word() {
	var do_ajax = getXMLHttpRequestObject();
	var word = document.getElementById('submit_word').value;
	var trans = document.getElementById('searchField').value;
	var lang1 = document.getElementById('id_lang1').value;
	var lang2 = document.getElementById('id_lang2').value;
	if (do_ajax) {
		do_ajax.open('get','ajax/add_word.php?w='+encodeURIComponent(word)+'&t='+encodeURIComponent(trans)+'&l1='+encodeURIComponent(lang1)+'&l2='+encodeURIComponent(lang2),true);
		do_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		do_ajax.onreadystatechange = function () {
			handleResponseDA(do_ajax);
		}
		do_ajax.send(null);
	}
	return false;
}




function handleResponseDA(do_ajax) {
	if (do_ajax.readyState == 4) {
	if ((do_ajax.status == 200) || (do_ajax.status == 304) )
		{ 
		var results = document.getElementById('add_word_result');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = do_ajax.responseXML;
		var error = data.getElementsByTagName('error');
			if (error.length > 0) {
				var node = document.createElement('div');
				node.setAttribute('id','error');
				node.innerHTML = "<img src='../images/error.png'>"+error[0].firstChild.nodeValue;
				results.appendChild(node);
			} else {
				var success = data.getElementsByTagName('success');
				if (success.length > 0) {
					var node = document.createElement('div');
					node.setAttribute('id','success');
					node.innerHTML = "<img src='../images/success.png'>"+success[0].firstChild.nodeValue;
					results.appendChild(node);
					document.getElementById('add_word_form').reset();
					}
			}
		}
	}
}
function cancel_add_news_form() {
	document.getElementById('add_news_form').innerHTML = '';
}
function add_news() {
	var add_news_ajax = getXMLHttpRequestObject();
	var ru_title = document.getElementById('add_news_form_title_ru').value;
	var en_title = document.getElementById('add_news_form_title_en').value;
	var tj_title = document.getElementById('add_news_form_title_tj').value;
	var ru_text = document.getElementById('add_news_form_text_ru').value;
	var en_text = document.getElementById('add_news_form_text_en').value;
	var tj_text = document.getElementById('add_news_form_text_tj').value;
	if (add_news_ajax) {
		add_news_ajax.open('get','ajax/add_news.php?ru_title='+encodeURIComponent(ru_title)+'&ru_text='+encodeURIComponent(ru_text)+'&en_title='+encodeURIComponent(en_title)+'&en_text='+encodeURIComponent(en_text)+'&tj_title='+encodeURIComponent(tj_title)+'&tj_text='+encodeURIComponent(tj_text),true);
		add_news_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		add_news_ajax.onreadystatechange = function () {
			handleResponseAN(add_news_ajax);
		}
		add_news_ajax.send(null);
	}
	return false;
}
function handleResponseAN(add_news_ajax) {
	if (add_news_ajax.readyState == 4) {
	if ((add_news_ajax.status == 200) || (add_news_ajax.status == 304) )
		{ 
		var results = document.getElementById('add_news_form_result');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = add_news_ajax.responseXML;
		var error = data.getElementsByTagName('error');
			if (error.length > 0) {
				var node = document.createElement('div');
				node.setAttribute('id','error');
				node.innerHTML = "<img src='../images/error.png'>"+error[0].firstChild.nodeValue;
				results.appendChild(node);
			} else {
				var success = data.getElementsByTagName('success');
				if (success.length > 0) {
					var node = document.createElement('div');
					node.setAttribute('id','success');
					node.innerHTML = "<img src='../images/success.png'>"+success[0].firstChild.nodeValue;
					results.appendChild(node);
					document.getElementById('add_news_form').reset();
					}
			}
		}
	}
}
function edit_news_form() {
	var edit_news_ajax = getXMLHttpRequestObject();
	if (edit_news_ajax) {
		edit_news_ajax.open('get','ajax/news_list.php',true);
		edit_news_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		edit_news_ajax.onreadystatechange = function () {
			handleResponseEditNews(edit_news_ajax);
		}
		edit_news_ajax.send(null);
	}
	return false;
}
function handleResponseEditNews(edit_news_ajax) {
	if (edit_news_ajax.readyState == 4) {
	if ((edit_news_ajax.status == 200) || (edit_news_ajax.status == 304) )
		{ 
		var results = document.getElementById('add_news_form');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = edit_news_ajax.responseXML;
		var error = data.getElementsByTagName('error');
			if (error.length > 0) {
				for(var i=0;i<error.length;i++) {	
						var node = document.createElement('div');
						node.innerHTML = error[i].firstChild.nodeValue;
						results.appendChild(node);
					}
			} else {
				var id = data.getElementsByTagName('id');
				var l = new Array("Russian:","Tajik:","English:")
				var ln = new Array("ru","tj","en");
				var title = new Array(data.getElementsByTagName('ru_title'),data.getElementsByTagName('tj_title'),data.getElementsByTagName('en_title'));
				var text = new Array(data.getElementsByTagName('ru_text'),data.getElementsByTagName('tj_text'),data.getElementsByTagName('en_text'));
				var time = data.getElementsByTagName('last');
				if (id.length > 0) {
					for (var j=0;j<3;j++) {
						var node = document.createElement('span');
						node.innerHTML = "<br><strong>"+l[j]+"</strong><br>";
						results.appendChild(node);
					for (var i=0;i<id.length;i++) {
							var node = document.createElement('div');
							node.innerHTML = 'ID: '+id[i].firstChild.nodeValue+' - '+title[j][i].firstChild.nodeValue+' -> <a href="#" onclick="load_to_edit(\''+ln[j]+'\',\''+id[i].firstChild.nodeValue+'\',\''+title[j][i].firstChild.nodeValue+'\',\''+htmlspecialchars(text[j][i].firstChild.nodeValue)+'\');return false;">edit</a> | <a href="ajax/news_delete.php?id='+id[i].firstChild.nodeValue+'" onclick="if(!confirm(\'Are you sure, this will delete same news of other languages too?\')) return false;">delete</a><br>';
							results.appendChild(node);
						}
					}
					}
			}
		}
	}
}


function add_news_form() {
	document.getElementById('add_news_form').innerHTML = '<div id="add_news_form_result"></div><form id="add_news_form"><b>Russian version</b><br>Title:<input type="text" maxlength="64" size="32" value="" id="add_news_form_title_ru"><br>Text:<br><textarea cols="40" rows="10" id="add_news_form_text_ru"></textarea><br><b>Tajik version</b><br>Title:<input type="text" maxlength="64" size="32" value="" id="add_news_form_title_tj"><br>Text:<br><textarea cols="40" rows="10" id="add_news_form_text_tj"></textarea><br><b>English version</b><br>Title:<input type="text" maxlength="64" size="32" value="" id="add_news_form_title_en"><br>Text:<br><textarea cols="40" rows="10" id="add_news_form_text_en"></textarea><br><input type="submit" value="Add" onclick="add_news();return false;"><input type="button" value="Cancel" onclick="cancel_add_news_form();"></form>';
	if (document.getElementById('edit_form')) {document.getElementById('edit_form').innerHTML = '';}
}
function cancel_update_form() {
	document.getElementById('edit_form').innerHTML = '';
}

function load_to_edit(ln,id,title,text) {
	document.getElementById('edit_form').innerHTML = '<div id="update_news_form_result"></div><form id="update_news_form"><input type="hidden" value="" id="update_news_form_lang">ID:<input type="text" maxlength="10" size="4" disabled="disabled" value="" id="update_news_form_id">TITLE:<input type="text" maxlength="64" size="32" value="" id="update_news_form_title"><br>TEXT:<br><textarea cols="40" rows="10" id="update_news_form_text"></textarea><br><input type="submit" value="Update" onclick="update_news(document.getElementById(\'update_news_form_lang\').value,document.getElementById(\'update_news_form_id\').value,document.getElementById(\'update_news_form_title\').value,document.getElementById(\'update_news_form_text\').value);return false;"><input type="button" value="Cancel" onclick="cancel_update_form();"></form>';
	document.getElementById('update_news_form').reset();
	document.getElementById('update_news_form_lang').value = ln;
	document.getElementById('update_news_form_id').value = id;
	document.getElementById('update_news_form_title').value = title;
	document.getElementById('update_news_form_text').value = text;
	return false;
}
function update_news(ln,id,title,text) {
	var update_news_form_ajax = getXMLHttpRequestObject();
	//var id = document.getElementById('update_news_form_id').value;
	//var title = document.getElementById('update_news_form_title').value;
	//var text = document.getElementById('update_news_form_text').value;
	//var ln = document.getElementById('update_news_form_lang').value;
	var len = 'id='+encodeURIComponent(id)+'&title='+encodeURIComponent(title)+'&text='+encodeURIComponent(text)+'&ln='+encodeURIComponent(ln);
	if (update_news_form_ajax) {
		update_news_form_ajax.open('post','ajax/update_news.php',true);
		update_news_form_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		update_news_form_ajax.onreadystatechange = function () {
			handleResponseUN(update_news_form_ajax);
		}
		update_news_form_ajax.send(len);
	}
	return false;
}
function handleResponseUN(update_news_form_ajax) {
	if (update_news_form_ajax.readyState == 4) {
	if ((update_news_form_ajax.status == 200) || (update_news_form_ajax.status == 304) )
		{ 
		var results = document.getElementById('update_news_form_result');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = update_news_form_ajax.responseXML;
		if (data.getElementsByTagName('error')) 
		 {
			var error = data.getElementsByTagName('error');	
		}
		
			if (error.length > 0) {
				var node = document.createElement('div');
				node.setAttribute('id','error');
				node.innerHTML = "<img src='../images/error.png'>"+error[0].firstChild.nodeValue;
				results.appendChild(node);
			} else {
				var success = data.getElementsByTagName('success');
				if (success.length > 0) {
					var node = document.createElement('div');
					node.setAttribute('id','success');
					node.innerHTML = "<img src='../images/success.png'>"+success[0].firstChild.nodeValue;
					results.appendChild(node);
					document.getElementById('update_news_form').reset();
					}
			}
		}
	}
}
function show_comments() {
	var comments_ajax = getXMLHttpRequestObject();
	if (comments_ajax) {
		comments_ajax.open('get','ajax/show_comments.php',true);
		comments_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		comments_ajax.onreadystatechange = function () {
			handleResponseSC(comments_ajax);
		}
		comments_ajax.send(null);
	}
	return false;
}
function handleResponseSC(comments_ajax) {
	if (comments_ajax.readyState == 4) {
	if ((comments_ajax.status == 200) || (comments_ajax.status == 304) )
		{ 
		var results = document.getElementById('comments_div');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = comments_ajax.responseXML;
		var id = data.getElementsByTagName('id');
		var news_id = data.getElementsByTagName('news_id');
		var poster = data.getElementsByTagName('poster');
		var email = data.getElementsByTagName('email');
		var comment = data.getElementsByTagName('comment');
		var confirmed = data.getElementsByTagName('confirmed');
		var ip = data.getElementsByTagName('ip');
		var time = data.getElementsByTagName('time');
		for (var i=0;i<news_id.length;i++) {
			var div = document.createElement('div');
			div.innerHTML = "<b>News_ID:</b>"+news_id[i].firstChild.nodeValue+"<br><b>Name</b>:"+htmlspecialchars(poster[i].firstChild.nodeValue)+"<br><b>Email</b>:"+htmlspecialchars(email[i].firstChild.nodeValue)+"<br><b>Comment</b>:"+htmlspecialchars(comment[i].firstChild.nodeValue)+"<br><b>State</b>:"+confirmed[i].firstChild.nodeValue+"<br><b>IP</b>:"+ip[i].firstChild.nodeValue+"<br><b>Time</b>:"+time[i].firstChild.nodeValue+"<br><a href='ajax/comment_do.php?action=confirm&id="+id[i].firstChild.nodeValue+"' onclick='if(!confirm(\"Are you sure?\")) return false;'>Confirm</a> | <a href='ajax/comment_do.php?action=delete&id="+id[i].firstChild.nodeValue+"' onclick='if(!confirm(\"Are you sure?\")) return false;'>Delete</a><br><br>";
			results.appendChild(div);
		}
		}
	}
}


function getXMLHttpRequestObject() {
		var ajax = false;
		if (window.XMLHttpRequest) {
			ajax = new XMLHttpRequest();
			} else 
		if (window.ActiveXObject) {
			try {
				ajax = new ActiveXObject("Msxml2.XMLHTTP");
				} 
			catch (e) {
				try {
					ajax = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) { }
			}
		}
		return ajax;
}



function CheckCookie() {
		if (document.getElementById('tj_keyboard')) {
			var keyboardToggle = cookieVal("keyboardToggle");
			if (keyboardToggle == 'on') { tj_keyboard_on(); }
	 		else { tj_keyboard_off(); }
	 		}
}


function cookieVal(cookieName) {
	var thisCookie = document.cookie.split("; ");
	for (var i=0; i<thisCookie.length; i++) {
		if (cookieName == thisCookie[i].split("=")[0]) {
			return thisCookie[i].split("=")[1];
		}
	}
	return 0;
}
