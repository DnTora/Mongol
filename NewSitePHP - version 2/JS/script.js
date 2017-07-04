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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////// Events //////////////////////////////////////////////////////////////
window.onload = function(event) {
	fitSiteBodyToScreen();
	var cookiesArray = (document.cookie).split("; ");
	for (i = 0; i < cookiesArray.length; i++)
		if (cookiesArray[i].split("=")[0] == "registeration_errorData")
			toggleRegisterationWindow();
}
window.onresize = function(event) {
	fitSiteBodyToScreen();
	centerizeRegisterationPopUpWindow();
};
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
