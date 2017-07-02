var CONTAINER_PERCENTAGE = 0.8;
var containerSize = window.outerWidth * CONTAINER_PERCENTAGE;
var paddingDistance = (window.outerWidth - window.outerWidth * CONTAINER_PERCENTAGE) / 2;
document.getElementById("div_container").style.padding = "0px " + paddingDistance + "px " + "0px " + paddingDistance + "px";
document.getElementById("div_header").style.width = containerSize + "px";
document.getElementById("div_navigationBar").style.width = containerSize + "px";
document.getElementById("div_main").style.width = containerSize + "px";
document.getElementById("div_footer").style.width = containerSize + "px";
