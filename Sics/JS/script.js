///////////////////////////////////////////////////////////// Methods /////////////////////////////////////////////////////////////
function toggleDivVisibility(divName) {
	var div = document.getElementById(divName);
	if (div.style.display == "")
		div.style.display = "block";
	else
		div.style.display = "";
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
	if (getCookieValue("login_status") != null) {
		toggleDivVisibility("div_loginArea_MOBILE");
		deleteCookie("login_status");
	}
	if (getCookieValue("registeration_status") != null) {
		toggleDivVisibility("div_registerationPopUp");
		deleteCookie("registeration_status");
	}
	if (getCookieValue("accountUpdate_status") != null) {
		toggleDivVisibility("div_accountUpdatePopUp");
		deleteCookie("accountUpdate_status");
	}
	if (getCookieValue("accountDeleteConfirmation_status") != null) {
		toggleDivVisibility("div_accountUpdatePopUp");
		toggleDivVisibility("div_accountDeleteConfirmationPopUp");
		deleteCookie("accountDeleteConfirmation_status");
	}
	if (getCookieValue("order_status") != null) {
		deleteCookie("order_status");
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
