///////////////////////////////////////////////////////////// Methods /////////////////////////////////////////////////////////////
function fitSiteBodyToScreen() {
	var CONTAINER_PERCENTAGE = 0.8;
	var containerSize = window.outerWidth * CONTAINER_PERCENTAGE;
	var paddingDistance = (window.outerWidth - window.outerWidth * CONTAINER_PERCENTAGE) / 2;
	document.getElementById("div_container").style.padding = "0px " + paddingDistance + "px " + "0px " + paddingDistance + "px";
	document.getElementById("div_header").style.width = containerSize + "px";
	document.getElementById("div_navigationBar").style.width = containerSize + "px";
	document.getElementById("div_main").style.width = containerSize + "px";
	document.getElementById("div_footer").style.width = containerSize + "px";
	
	var header = document.getElementById("div_header");
	var logo = document.getElementById("image_logo");
	logo.style.width = logo.naturalWidth + "px";
	logo.style.height = logo.naturalHeight + "px";
	if (logo.offsetWidth > header.offsetWidth) {
		var logoAspectRatio = logo.offsetHeight / logo.offsetWidth;
		var delta = logo.offsetWidth - header.offsetWidth;
		logo.style.width = (logo.offsetWidth - delta) + "px";
		logo.style.height = (logo.offsetHeight - delta * logoAspectRatio) + "px";
	}
}

function centerizeRegisterationPopUpWindow() {
	if (document.getElementById("div_registerationPopUp").style.display == "block") {
		var registerationPopUpWindow = document.getElementById("div_registerationWindow");
		var leftDistance = (window.innerWidth - registerationPopUpWindow.offsetWidth) / 2;
		var topDistance = (window.innerHeight - registerationPopUpWindow.offsetHeight) / 2;
		registerationPopUpWindow.style.left = leftDistance + "px";
		registerationPopUpWindow.style.top = topDistance + "px";
	}
}

function toggleRegisterationWindow() {
	var registerationPopUp = document.getElementById("div_registerationPopUp");
	if (registerationPopUp.style.display == "") {
		registerationPopUp.style.display = "block";
		centerizeRegisterationPopUpWindow();
	}
	else
		registerationPopUp.style.display = "";
}

function getCookieValue(cookieName) {
	var cookiesArray = (document.cookie).split("; ");
	for (i = 0; i < cookiesArray.length; i++) {
		var cookieDetailsArray = cookiesArray[i].split("=");
		if (cookieDetailsArray[0] == cookieName)
			return cookieDetailsArray[1];
	}
	return null;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////// Events //////////////////////////////////////////////////////////////
window.onload = function(event) {
	fitSiteBodyToScreen();
	if (getCookieValue("registeration_errorData") != null) {
		toggleRegisterationWindow();
		var textBoxSavedDataArray = getCookieValue("registeration_textBoxData").split("|");
		document.getElementById("form_registeration").elements["userName"].value = textBoxSavedDataArray[0];
		document.getElementById("form_registeration").elements["password"].value = textBoxSavedDataArray[1];
		document.getElementById("form_registeration").elements["passwordRepeat"].value = textBoxSavedDataArray[2];
		document.getElementById("form_registeration").elements["privateName"].value = textBoxSavedDataArray[3];
		document.getElementById("form_registeration").elements["familyName"].value = textBoxSavedDataArray[4];
		document.getElementById("form_registeration").elements["emailAddress"].value = textBoxSavedDataArray[5];
	}
}
window.onresize = function(event) {
	fitSiteBodyToScreen();
	centerizeRegisterationPopUpWindow();
};
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
