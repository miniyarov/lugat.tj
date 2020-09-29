/** Coder: ULUGBEK MINIYAROV **/

window.onload = CheckCookie;
/** INVITATION JAVASCRIPT **/
function selectEmail(id,eid,c) {
	if (id) {
		if (id.checked == true) {
			id.checked = false;
			eid.style.backgroundColor = "white";
			c.style.color = "#369";
		} else {
			id.checked = true;
			eid.style.backgroundColor = "#29447e";
			c.style.color = "white";
		}
	}
	return false;
}
function checkmail(id,eid,c) {
	if (id) {
		if (id.checked == false) {
			eid.style.backgroundColor = "white";
			c.style.color = "#369";
		} else {
			eid.style.backgroundColor = "#29447e";
			c.style.color = "white";
		}
	}
	return false;
}
var allselected = false;
function selectAllMailList() {
	if (document.getElementById('mailAmount')) {
		mailAmount = document.getElementById('mailAmount').value;	
	}
	for(var t=0; t<mailAmount;t++) {
		if (document.getElementById('email'+t)) {
			if (allselected) {
				document.getElementById('email'+t).checked = false;
				document.getElementById('eS'+t).style.backgroundColor = "white";
				document.getElementById('e'+t).style.color = "#369";
			} else {
				document.getElementById('email'+t).checked = true;
				document.getElementById('eS'+t).style.backgroundColor = "#29447e";
				document.getElementById('e'+t).style.color = "white";
			}
		}
	}
	if (allselected) {
		allselected = false;
		document.getElementById('selectalllink').innerHTML = "Select All";
	} else {
		allselected = true;
		document.getElementById('selectalllink').innerHTML = "Deselect All";
	}
	return false;
}
/** END OF INVITATION SCRIPT **/

function CheckCookie() {
		var ie7toggle = cookieVal("ie7toggle");
		if (ie7toggle == 0) { ie7toggle = 'on'; }
		if (ie7toggle == "off") { ie7_remove();	}
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

function ie7_remove() {	
	var ie = document.getElementById('ie7div');
			while (ie.hasChildNodes()) {
				ie.removeChild(ie.lastChild);
			}
			ie.style.border = 'none';
	var expireDate = new Date();
	expireDate.setDate(expireDate.getDate()+1);
	document.cookie = "ie7toggle=off;path=/;expires="+expireDate.toGMTString();
}

var selectionStart = -1;
var selectionEnd = -1;
var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;

function Addkey(key)
{
      putkey(document.getElementById('searchField'), key);
      document.getElementById('searchField').focus();
      ajaxsearch();
}

/* Tajik Virtual Keyboard Script By Ulugbek MINIYAROV */

function putkey(element,pkey) {
     if (element.setSelectionRange){
        var start = element.selectionStart;
        var end = element.selectionEnd;
        if (is_chrome) {
            start = selectionStart;
            end = selectionEnd;
        }
        element.value = element.value.substring(0,start) + pkey + element.value.substring(end,element.value.length);

        start++;
        if (is_chrome) {
          selectionStart = start;
          selectionEnd = start;
        }

	element.selectionStart = start;
        element.selectionEnd = start;

    }
    else if (document.selection && document.selection.createRange) {
        element.focus();
        var range = document.selection.createRange();
        range.text = pkey;
	range.collapse(false);
        range.select();
    }
} 

/* Tajik Translitting Script by Ulugbek MINIYAROV */

function setfocus()
{
	document.getElementById('searchField').focus();
    updateStartEnd();	
}
function selectall() { 
	document.getElementById('searchField').focus();
	document.getElementById('searchField').select();
	return false;
}
function setfoc() {
	document.getElementById('searchField').focus();
	return false;
}
function clearall() {
	document.getElementById('searchField').value = "";
	return false;
}
function counter()
{	
	document.getElementById('counter').value = document.getElementById('searchField').value.replace(/\r/g,'').length;
	return false;
}
function updateStartEnd() 
{
  if (document.getElementById('searchField').setSelectionRange) 
  {
    selectionStart = document.getElementById('searchField').selectionStart;
    selectionEnd = document.getElementById('searchField').selectionEnd;
  }
}


	
var inputupper = new Array(
126,	//~
33,	//!
64,	//@
35,	//#
36,	//$
37,	//%
94,	//^
38,	//&
42,	//*
40,	//(
41,	//)
95,	//_
43,	//+
81,	//Q
87,	//W
69,	//E
82,	//R
84,	//T
89,	//Y
85,	//U
73,	//I
79,	//O
80,	//P
123,	//{
125,	//}
65,	//A
83,	//S
68,	//D
70,	//F
71,	//G
72,	//H
74,	//J
75,	//K
76,	//L
58,	//:
34,	//"
90,	//Z
88,	//X
67,	//C
86,	//V
66,	//B
78,	//N
77,	//M
60,	//<
62,	//>
63	//?
);

var inputlower = new Array(
96,	//`
49,	//1
50,	//2
51,	//3
52,	//4
53,	//5
54,	//6
55,	//7
56,	//8
57,	//9
48,	//0
45,	//-
61,	//=
113,	//q
119,	//w
101,	//e
114,	//r
116,	//t
121,	//y
117,	//u
105,	//i
111,	//o
112,	//p
91,	//[
93,	//]
97,	//a
115,	//s
100,	//d
102,	//f
103,	//g
104,	//h
106,	//j
107,	//k
108,	//l
59,	//;
39,	//'
122,	//z
120,	//x
99,	//c
118,	//v
98,	//b
110,	//n
109,	//m
44,	//,
46,	//.
47
);


var outputlowercase = new Array(
"ё",	//~
"1",	//1
"2",	//2
"3",	//3
"4",	//4
"5",	//5
"6",	//6
"7",	//7
"8",	//8
"9",	//9
"0",	//0
"ғ",	//-
"ы",	//=
"қ",	//q
"ш",	//w
"е",	//e
"р",	//r
"т",	//t
"й",	//y
"у",	//u
"и",	//i
"о",	//o
"п",	//p
"ӯ",	//[
"ъ",	//]
"а",	//a
"с",	//s
"д",	//d
"ф",	//f
"г",	//g
"ҳ",	//h
"ҷ",	//j
"к",	//k
"л",	//l
"ж",	//;
"э",	//'
"з",	//z
"х",	//x
"ч",	//c
"в",	//v
"б",	//b
"н",	//n
"м",	//m
"ӣ",	//,
"ю",	//.
"я"
);

var outputuppercase = new Array(
"Ё",	//~
"!",	//1
"\"",	//2
"№",	//3
";",	//4
"%",	//5
":",	//6
"?",	//7
"*",	//8
"(",	//9
")",	//0
"Ғ",	//-
"Ҳ",	//=
"Қ",	//q
"Ш",	//w
"Е",	//e
"Р",	//r
"Т",	//t
"Й",	//y
"У",	//u
"И",	//i
"О",	//o
"П",	//p
"Ӯ",	//[
"Ъ",	//]
"А",	//a
"С",	//s
"Д",	//d
"Ф",	//f
"Г",	//g
"Ҳ",	//h
"Ҷ",	//j
"К",	//k
"Л",	//l
"Ж",	//;
"Э",	//'
"З",	//z
"Х",	//x
"Ч",	//c
"В",	//v
"Б",	//b
"Н",	//n
"М",	//m
"Ӣ",	//,
"Ю",	//.
"Я"
);
var translit =true;
var translate = true;

function getKeyCode(e) {
  var myKeyCode=0;
  
  // Internet Explorer 4+
  if ( document.all ) {
    myKeyCode=e.keyCode;

  // Netscape 4
  } else if ( document.layers ) {
    myKeyCode=e.which;

  // Netscape 6
  } else if ( document.getElementById ) {
    myKeyCode=e.which;
  }

  return myKeyCode;
}

function resetctrls() {
  translate = true;
}

function checkControlAlt(e) {

  var myKeyCode = getKeyCode(e); 

  if (myKeyCode == 17 || myKeyCode == 18) {
    translate = false;
  }
}

function keyUp(e) {
  updateStartEnd();
  
   var myKeyCode = getKeyCode(e);
 
  if (myKeyCode == 17 || myKeyCode == 18) {
    translate = true;
  }
}

function translateKeyCode(e) {
 if (document.getElementById('tj_keyboard').hasChildNodes() && translit) {
  var myKeyCode = getKeyCode(e);
  
  if (!translate)
    return true;

  var index = -1
  var isLower = -1;

  for (var i = 0; i < inputlower.length; i++) {
    if (inputlower[i] == myKeyCode) {
      index = i;
      isLower = 0;
    }
  }

  if (isLower == -1) {
    for (var i = 0; i < inputupper.length; i++) {
      if (inputupper[i] == myKeyCode) {
        index = i;
        isLower = 1;
      }
    }
  }

  if (index >= 0) {
    putkey(document.getElementById('searchField'), (isLower == 1) ? outputuppercase[index] : outputlowercase[index]);
    updateStartEnd();
    return false;
  } else {
    updateStartEnd();
  }
  }
}
