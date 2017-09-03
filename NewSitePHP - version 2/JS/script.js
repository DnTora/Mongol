///////////////////////////////////////////////////////////// Methods /////////////////////////////////////////////////////////////
function fitSiteBodyToScreen() {
	if (isMobileBrowserDetected()) {
		var container = document.getElementById("div_container");
		var containerPaddingValue = window.getComputedStyle(container, null).getPropertyValue("padding-right");
		var bodyElementWidthValue = document.getElementById("div_header").offsetWidth + "px";
		document.getElementById("div_container").style.padding = "0px " + containerPaddingValue + " 0px " + containerPaddingValue;
		document.getElementById("div_header").style.width = bodyElementWidthValue;
		document.getElementById("div_navigationBar").style.width = bodyElementWidthValue;
		document.getElementById("div_main").style.width = bodyElementWidthValue;
		document.getElementById("div_footer").style.width = bodyElementWidthValue;
		
	} else {
		var CONTAINER_PERCENTAGE = 0.8;
		var containerSize = window.outerWidth * CONTAINER_PERCENTAGE;
		var paddingDistance = (window.outerWidth - window.outerWidth * CONTAINER_PERCENTAGE) / 2;
		document.getElementById("div_container").style.padding = "0px " + paddingDistance + "px " + "0px " + paddingDistance + "px";
		document.getElementById("div_header").style.width = containerSize + "px";
		document.getElementById("div_navigationBar").style.width = containerSize + "px";
		document.getElementById("div_main").style.width = containerSize + "px";
		document.getElementById("div_footer").style.width = containerSize + "px";
	}
	
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

function centerizeAllPopUpWindows(windowDivName) {
	try {
		centerizePopUpWindow("div_registerationWindow");
	} catch(error) {
	}
	try {
		centerizePopUpWindow("div_newThreadWindow");
	} catch(error) {
	}
	try {
		centerizePopUpWindow("div_threadDeleteWindow");
	} catch(error) {
	}
	try {
		centerizePopUpWindow("div_newThreadMessageWindow");
	} catch(error) {
	}
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////// Auxiliary Methods ////////////////////////////////////////////////////////
function togglePopUpWindowAreaVisibility(windowAreaDivName) {
	var popUpWindow = document.getElementById(windowAreaDivName);
	if (popUpWindow.style.display == "") {
		popUpWindow.style.display = "block";
		centerizeAllPopUpWindows();
	} else
		popUpWindow.style.display = "";
}

function centerizePopUpWindow(windowDivName) {
	var popUpWindow = document.getElementById(windowDivName);
	var leftDistance = (window.innerWidth - popUpWindow.offsetWidth) / 2;
	var topDistance = (window.innerHeight - popUpWindow.offsetHeight) / 2;
	popUpWindow.style.left = leftDistance + "px";
	popUpWindow.style.top = topDistance + "px";
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

function isMobileBrowserDetected() {
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	   || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4)))
		return true;
	return false;
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////// Events //////////////////////////////////////////////////////////////
window.onload = function(event) {
	fitSiteBodyToScreen();
	
	var login_textBoxData = getCookieValue("login_textBoxData");
	if (login_textBoxData != null) {
		var login_textBoxDataArray = login_textBoxData.split("|");
		document.getElementById("form_login").elements["userName"].value = login_textBoxDataArray[0];
		document.getElementById("form_login").elements["password"].value = login_textBoxDataArray[1];
		deleteCookie("login_textBoxData");
		deleteCookie("login_errorData");
	}
	
	if (getCookieValue("registeration_errorData") != null) {
		togglePopUpWindowAreaVisibility("div_registerationPopUp");
		var registeration_textBoxData = getCookieValue("registeration_textBoxData");
		if (registeration_textBoxData != null) {
			var registeration_textBoxDataArray = registeration_textBoxData.split("|");
			document.getElementById("form_registeration").elements["userName"].value = registeration_textBoxDataArray[0];
			document.getElementById("form_registeration").elements["password"].value = registeration_textBoxDataArray[1];
			document.getElementById("form_registeration").elements["passwordRepeat"].value = registeration_textBoxDataArray[2];
			document.getElementById("form_registeration").elements["privateName"].value = registeration_textBoxDataArray[3];
			document.getElementById("form_registeration").elements["familyName"].value = registeration_textBoxDataArray[4];
			document.getElementById("form_registeration").elements["emailAddress"].value = registeration_textBoxDataArray[5];
			deleteCookie("registeration_textBoxData");
			deleteCookie("registeration_errorData");
		}
	}
	
	var order_textBoxData = getCookieValue("order_textBoxData");
	if (order_textBoxData != null) {
		var order_textBoxDataArray = order_textBoxData.split("|");
		document.getElementById("form_order").elements["fullName"].value = order_textBoxDataArray[0];
		document.getElementById("form_order").elements["age"].value = order_textBoxDataArray[1];
		document.getElementById("form_order").elements["emailAddress"].value = order_textBoxDataArray[2];
		document.getElementById("form_order").elements["phoneNumber"].value = order_textBoxDataArray[3];
		document.getElementById("form_order").elements["order"].checked = order_textBoxDataArray[4];
		document.getElementById("form_order").elements["notes"].value = order_textBoxDataArray[5];
		deleteCookie("order_textBoxData");
		deleteCookie("order_errorData");
	}
	deleteCookie("order_successData"); // (?) פתרון זמני
}
window.onresize = function(event) {
	fitSiteBodyToScreen();
	centerizeAllPopUpWindows();
};
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
