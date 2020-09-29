/* Keyboard Switching Script by Ulugbek MINIYAROV */

function tj_keyboard_on_off () {
	if (document.getElementById('tj_keyboard').hasChildNodes()) 
		{ tj_keyboard_off(); }
	else { tj_keyboard_on();}
 }
function tj_keyboard_off() {
		var k = document.getElementById('tj_keyboard');
		if (k) {
			while (k.hasChildNodes()) {
				k.removeChild(k.lastChild);
			}
		}
}
function translitToggle() {
	(translit) ? translit=false : translit = true;
}
function translit_changer(t) {
	switch(t) {
		case 'tj_q':return new Array(
			"ё","1","2","3","4","5","6","7","8","9","0","ғ","ы",
			"қ","ш","е","р","т","й","у","и","о","п","ӯ","ъ",
			"а","с","д","ф","г","ҳ","ҷ","к","л","ж","э",
			"з","х","ч","в","б","н","м","ӣ","ю","я");break;
		case 'tj_y':return new Array(
			"ё","1","2","3","4","5","6","7","8","9","0","ғ","ы",
			"й","ш","е","р","т","қ","у","и","о","п","ӯ","ъ",
			"а","с","д","ф","г","ҳ","ҷ","к","л","ж","э",
			"з","х","ч","в","б","н","м","ӣ","ю","я");break;
		case 'ru':return new Array(
			"ё","1","2","3","4","5","6","7","8","9","0","ғ","ы",
			"қ","ш","е","р","т","й","у","и","о","п","ӯ","ъ",
			"а","с","д","ф","г","j","ҷ","к","л","ж","э",
			"з","х","ч","в","б","н","м","ӣ","ю","я");break;
		default:return new Array(
			"ё","1","2","3","4","5","6","7","8","9","0","ғ","ы",
			"қ","ш","е","р","т","й","у","и","о","п","ӯ","ъ",
			"а","с","д","ф","г","ҳ","ҷ","к","л","ж","э",
			"з","х","ч","в","б","н","м","ӣ","ю","я");
	}
}

function tj_keyboard_on() {
		if (!outputlowercase1) {
			var outputlowercase1 = translit_changer('tj_q');
		}
		k = document.getElementById('tj_keyboard');
		var div,node,input,br,a;
		var x = document.getElementById('ln').value;
		var closeText,translitText;
		switch (x) {
			case 'ru':closeText = 'закрыть';translitText = 'транслитерация';break;
			case 'tj':closeText = 'махкам кардан';translitText = 'транслитератсия';break;
			case 'en':closeText = 'close';translitText = 'transliteration';break;
			default:closeText = 'закрыть';translitText = 'транслитерация';
		}
		div = document.createElement('div');
		div.setAttribute('id','translitToggle');
		div.innerHTML = '<span><input type="checkbox" name="translit" value="translit" checked onclick="javascript:translitToggle();">'+translitText+'</span>';
		k.appendChild(div);
		div = document.createElement('div');
		div.setAttribute('id','closeX');
		div.innerHTML = '<a href="javascript:tj_keyboard_on_off();">'+closeText+'</a>';
		k.appendChild(div);
		br = document.createElement('br');
		k.appendChild(br);
		for (var i=0;i<outputlowercase1.length;i++) {
			if (i==13 || i==25 || i==36) {
				br = document.createElement('br');
				k.appendChild(br);
			}
			div = document.createElement('span');
			div.innerHTML = '<input type="button" id="boardKey" name="butt'+i+'" value="'+outputlowercase1[i]+'" onclick="Addkey(this.value);">';
			k.appendChild(div);
		}
}