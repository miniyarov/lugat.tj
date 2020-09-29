/*
	Coder: ULUGBEK MINIYAROV
	Ajax PHP Mysql Autosearch Script
*/
function toggle_words(list) {
	
	a = document.getElementById('wordlist'+list);
	if (a.style.visibility == 'hidden') {
		a.style.position = 'static';
		a.style.visibility = 'visible';	
		document.getElementById('rollimage'+list).src = "images/down.png";
	
	} else {
		a.style.position = 'absolute';
		a.style.visibility = 'hidden';
		document.getElementById('rollimage'+list).src = "images/up.png";
			
	}
}

function ajaxsearch() {
	var ajax = getXMLHttpRequestObject();
	if (ajax) {
		var word = document.getElementById('searchField').value;
		var ln = document.getElementById('ln').value;
		ajax.open('get','ajax/ajaxsearch.php?word=' + encodeURIComponent(word)+'&ln='+encodeURIComponent(ln), true);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.onreadystatechange = function () {
					handleResponse(ajax,word,ln);
					}
		ajax.send(null);
	} 
	return false;
}

function handleResponse(ajax,word,ln) {
	if (ajax.readyState == 4) {
	if ((ajax.status == 200) || (ajax.status == 304) )
		{
		var results = document.getElementById('trans_div');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = ajax.responseXML;
		var tw = document.getElementById('toggle_words').value;
		var direction = data.getElementsByTagName('direction');
		var dirsdef = new Array("entj","tjen","rutj","tjru");
		var dirimage = new Array("<span id='dirimages' title='"+direction[0].firstChild.nodeValue+"'><img src='images/flags/usa.png' height='35' width='40'>  <img src='images/flags/tjk.png' height='35' width='40'></span>","<span id='dirimages' title='"+direction[1].firstChild.nodeValue+"'><img src='images/flags/tjk.png' height='35' width='40'>  <img src='images/flags/usa.png' height='35' width='40'></span>","<span id='dirimages' title='"+direction[2].firstChild.nodeValue+"'><img src='images/flags/rus.png' height='35' width='40'>  <img src='images/flags/tjk.png' height='35' width='40'></span>","<span id='dirimages' title='"+direction[3].firstChild.nodeValue+"'><img src='images/flags/tjk.png' height='35' width='40'>  <img src='images/flags/rus.png' height='35' width='40'></span>");
		var dirs = new Array(data.getElementsByTagName('entj1'),data.getElementsByTagName('tjen2'),data.getElementsByTagName('rutj1'),data.getElementsByTagName('tjru2'));
		var dirs2 = new Array(data.getElementsByTagName('tjen1'),data.getElementsByTagName('entj2'),data.getElementsByTagName('tjru1'),data.getElementsByTagName('rutj2'));
		var google_text = data.getElementsByTagName('google_text');
		var found = Array(false,false,false,false);
		for (var i=0;i<=3;i++) {
			if (dirs[i].length > 0) {
				var node1, node2, br, div,strong,a,div1;
				var div = document.createElement('div');
				div.setAttribute('id','direction');
				div.innerHTML = "<a title='"+tw+"' href='javascript:toggle_words(\""+dirsdef[i]+"\")'><span id='toggleImages'><img src='images/down.png' id='rollimage"+dirsdef[i]+"'></span>"+dirimage[i]+"<div id='directionText'>"+direction[i].firstChild.nodeValue+"</div></a>";
				results.appendChild(div);
				div1 = document.createElement('div');
				var first = true;
				for (var j=0; j<dirs[i].length; j++) {
					div = document.createElement('div');
					if (first) { div.setAttribute('id', 'wordlist');first = false; }
						else {
							div.setAttribute('id', 'wordlist1');first = true;
						}									
					//node1 = document.createTextNode(dirs[i][j].firstChild.nodeValue+":");
					//node1 = document.createTextNode(dirs[i][j].firstChild.nodeValue);
					node1 = document.createElement('span');
					node1.style.width = '100%';
					node1.style.display = 'inline-block';
					node1.innerHTML = "<a onmouseout='this.style.textDecoration = \"none\";' onmouseover='this.style.textDecoration = \"underline\";' style='width:100%;diplay:inline-block;' title='"+dirs[i][j].firstChild.nodeValue+"' href='index.php?word="+dirs[i][j].firstChild.nodeValue+"'>"+dirs[i][j].firstChild.nodeValue+"</a>"
					strong = document.createElement('strong');
					strong.appendChild(node1);
					div.appendChild(strong);
					//br = document.createElement('br');
					//div.appendChild(br);
					//node2 = document.createTextNode("\t"+dirs2[i][j].firstChild.nodeValue);
					//div.appendChild(node2);
					br = document.createElement('br');
					div.appendChild(br);
					div1.setAttribute('id','wordlist'+dirsdef[i]);
					div1.appendChild(div);
					}
				results.appendChild(div1);
				found[i] = true;
			}
		}
		if (found[0] || found[1] || found[2] || found[3]) {
				div1 = document.createElement('div');
				div1.setAttribute('id', 'wordlist');
				br = document.createElement('br');
				div1.appendChild(br);
				a = document.createElement('a');
				a.setAttribute('href','http://www.google.com/search?q='+word);
				span = document.createTextNode(google_text[0].firstChild.nodeValue);
				a.appendChild(span);
				div1.appendChild(a);
				results.appendChild(div1);
			 } else {
				if (word) {
					var div2,node2,strong,node3,span;
					div2 = document.createElement('div');
					div2.setAttribute('id', 'wordlist');
					br = document.createElement('br');
					div2.appendChild(br);
					switch (ln) {
						case 'ru':node2 = document.createTextNode('Слово ');break;
						case 'tj':node2 = document.createTextNode('Калимаи ');break;
						case 'en':node2 = document.createTextNode('The word ');break;
						default:node2 = document.createTextNode('Слово ');
					}
					div2.appendChild(node2);
					strong = document.createElement('strong');
					span = document.createTextNode(word);
					strong.appendChild(span);
					div2.appendChild(strong);
					switch (ln) {
						case 'ru':node3 = document.createTextNode(" не найдено");break;
						case 'tj':node3 = document.createTextNode(" ёфт нашуд");break;
						case 'en':node3 = document.createTextNode(" not found");break;
						default:node3 = document.createTextNode(" не найдено");
					}
					div2.appendChild(node3);
					results.appendChild(div2);
					div1 = document.createElement('div');
					div1.setAttribute('id', 'wordlist');
					br = document.createElement('br');
					div1.appendChild(br);
					a = document.createElement('a');
					a.setAttribute('href','http://www.google.com/search?q='+word);
					span = document.createTextNode(google_text[0].firstChild.nodeValue);
					a.appendChild(span);
					div1.appendChild(a);
					results.appendChild(div1);
					}
			} 
		} 
	}
} /*  End OF Ajax PHP Mysql Autosearch Script by Ulugbek MINIYAROV   */

function send_word() {
	var word_ajax = getXMLHttpRequestObject();
	if (word_ajax) {
		var ln = document.getElementById('ln').value;
		var submit_word = document.getElementById('submit_word').value;
		var submit_translation = document.getElementById('submit_translation').value;
		var lang1 = document.getElementById('lang1').value;
		var lang2 = document.getElementById('lang2').value;
		word_ajax.open('get','ajax/submit_word.php?sub_word='+encodeURIComponent(submit_word)+'&trans='+encodeURIComponent(submit_translation)+'&lang1='+encodeURIComponent(lang1)+'&lang2='+encodeURIComponent(lang2)+'&ln='+encodeURIComponent(ln),true);
		word_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		word_ajax.onreadystatechange = function () {
			handleResponseWS(word_ajax);
		}
		word_ajax.send(null);
	}
	return false;
}
function handleResponseWS(word_ajax) {
	if (word_ajax.readyState == 4) {
	if ((word_ajax.status == 200) || (word_ajax.status == 304) )
		{ 
		var results = document.getElementById('submit_text');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = word_ajax.responseXML;
		var error = data.getElementsByTagName('error');
		if (error.length > 0) {
				var node = document.createElement('div');
				node.setAttribute('id','error');
				node.innerHTML = "<img src='images/error.png'>"+error[0].firstChild.nodeValue;
				results.appendChild(node);
			} else {
				var success = data.getElementsByTagName('success');
				if (success.length > 0) {
					var node = document.createElement('div');
					node.setAttribute('id','success');
					node.innerHTML = "<img src='images/success.png'>"+success[0].firstChild.nodeValue;
					results.appendChild(node);
					document.getElementById('submit_word_form').reset();
					}
			}
		}
	}
}



function send_feedback() {
	var feedback_ajax = getXMLHttpRequestObject();
	if (feedback_ajax) {
		var ln = document.getElementById('ln').value;
		var name = document.getElementById('feedback_name').value;
		var email = document.getElementById('feedback_email').value;
		var message = document.getElementById('feedback_message').value;
		feedback_ajax.open('get','ajax/feedback.php?name=' + encodeURIComponent(name)+'&email='+encodeURIComponent(email)+'&message='+encodeURIComponent(message)+'&ln='+encodeURIComponent(ln), true);
		feedback_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		feedback_ajax.onreadystatechange = function () {
					handleResponsefb(feedback_ajax);
					}
		feedback_ajax.send(null);
	} 
	return false;
}

function handleResponsefb(feedback_ajax) {
	if (feedback_ajax.readyState == 4) {
	if ((feedback_ajax.status == 200) || (feedback_ajax.status == 304) )
		{ 
		var results = document.getElementById('feedback_text');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = feedback_ajax.responseXML;
		var error = data.getElementsByTagName('error');
		if (error.length > 0) {
				var node = document.createElement('div');
				node.setAttribute('id','error');
				node.innerHTML = "<img src='images/error.png'>"+error[0].firstChild.nodeValue;
				results.appendChild(node);
			} else {
				var success = data.getElementsByTagName('success');
				if (success.length > 0) {
					var node = document.createElement('div');
					node.setAttribute('id','success');
					node.innerHTML = "<img src='images/success.png'>"+success[0].firstChild.nodeValue;
					results.appendChild(node);
					document.getElementById('feedback').reset();
					}
			}
		}
	}
}




function send_comment() {
	var comment_ajax = getXMLHttpRequestObject();
	if (comment_ajax) {
		var ln = document.getElementById('ln').value;
		var news_id = document.getElementById('news_id').value;
		var name = document.getElementById('comment_name').value;
		var email = document.getElementById('comment_email').value;
		var message = document.getElementById('comment').value;
		comment_ajax.open('get','ajax/comment.php?name=' + encodeURIComponent(name)+'&email='+encodeURIComponent(email)+'&message='+encodeURIComponent(message)+'&ln='+encodeURIComponent(ln)+'&news_id='+encodeURIComponent(news_id), true);
		comment_ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		comment_ajax.onreadystatechange = function () {
					handleResponseComment(comment_ajax);
					}
		comment_ajax.send(null);
	} 
	return false;
}

function handleResponseComment(comment_ajax) {
	if (comment_ajax.readyState == 4) {
	if ((comment_ajax.status == 200) || (comment_ajax.status == 304) )
		{ 
		var results = document.getElementById('comment_result');
		while (results.hasChildNodes()) {
			results.removeChild(results.lastChild);
			}
		var data = comment_ajax.responseXML;
		var error = data.getElementsByTagName('error');
		if (error.length > 0) {
				var node = document.createElement('div');
				node.setAttribute('id','error');
				node.innerHTML = "<img src='images/error.png'>"+error[0].firstChild.nodeValue;
				results.appendChild(node);
			} else {
				var success = data.getElementsByTagName('success');
				if (success.length > 0) {
					var node = document.createElement('div');
					node.setAttribute('id','success');
					node.innerHTML = "<img src='images/success.png'>"+success[0].firstChild.nodeValue;
					results.appendChild(node);
					document.getElementById('commentForm').reset();
					}
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