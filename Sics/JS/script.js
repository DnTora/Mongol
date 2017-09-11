///////////////////////////////////////////////////////////// Methods /////////////////////////////////////////////////////////////
function togglePopUpWindowAreaVisibility(windowAreaDivName) {
	var popUpWindow = document.getElementById(windowAreaDivName);
	if (popUpWindow.style.display == "")
		popUpWindow.style.display = "block";
	else
		popUpWindow.style.display = "";
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

function deleteCookie(cookieName) {
	document.cookie = cookieName + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT';
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////// Events //////////////////////////////////////////////////////////////
window.onload = function(event) {
	deleteCookie("login_status");
	if (getCookieValue("registeration_status") != null) {
		togglePopUpWindowAreaVisibility("div_registerationPopUp");
		deleteCookie("registeration_status");
	}
	if (getCookieValue("accountUpdate_status") != null) {
		togglePopUpWindowAreaVisibility("div_accountUpdatePopUp");
		deleteCookie("accountUpdate_status");
	}
	deleteCookie("order_status");
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
