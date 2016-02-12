$(document).ready(function(){
	
	var WinHeight = $('.billboard').height() - 100;
	var BgColor = 'rgba(255, 255, 255, 0.0)';
	var DarkBgColor = 'rgba(255, 87, 34, 0.9)';
	
	$(window).scroll(function () {
	    if ($(window).scrollTop() < WinHeight) {
	    	$("header").css("background-color", BgColor);
	    } else {
	    	$("header").css("background-color", DarkBgColor);
	    }
	})

});
