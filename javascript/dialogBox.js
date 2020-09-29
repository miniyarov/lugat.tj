/** Coder: Ulugbek MINIYAROV **/
	
function DialogBox(title, htmlContents) {
	if (document.getElementById('dialogBackground')) {
	document.body.removeChild(document.getElementById('dialogBackground'));
	document.body.removeChild(document.getElementById('dialogBox'));		
	}
	var dialogBackground = document.createElement('div');
	dialogBackground.className = "dialogBackground";
	dialogBackground.setAttribute("id", "dialogBackground");
	var dialogBox = document.createElement('div');
	dialogBox.className = "dialogBox";
	dialogBox.setAttribute("id", "dialogBox");
	// create contents of the dialog box
	var dialogBoxContents = "";
	dialogBoxContents += "<div id='dialogBoxTitle'>";
	dialogBoxContents += "<span id='dialogBoxTitleText'>" + title+"</span>";
	dialogBoxContents += "<a href='#' onclick='closeDialogBox();return false' id='dialogBoxTitleIcons'>x</a>";
	dialogBoxContents += "</div>";
	dialogBoxContents += "";
	dialogBoxContents += "<span id='dialogBoxhtmlContents'>" + htmlContents + "</span>";
	dialogBoxContents += "";
	dialogBox.innerHTML = dialogBoxContents;
	document.body.appendChild(dialogBox);
	document.body.appendChild(dialogBackground);

}

function closeDialogBox() {
	document.body.removeChild(document.getElementById('dialogBackground'));
	document.body.removeChild(document.getElementById('dialogBox'));
}