$(document).ready(function(){
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#totop').fadeIn('slow')
		} else {
			$('#totop').fadeOut('fast')
		}
	});
	$('#totop').click(function() {
		$('html, body').animate({scrollTop : 0},500);
		return false;
	});
	// Cookies *********************
	function cookie_close(){
        $('.cookie-wrapper').slideUp();
    }
    // $('.cookieWrapper').hide();
    $(function(){
        if( readCookie('cookiePolicity') ) {
            $('.cookie-wrapper').hide();
        }
    });
    $('.cookie-close').click(function(e) {
        e.preventDefault();
        $('.cookie-wrapper').slideUp();
        createCookie('cookiePolicity', 1 , 30);
    });
	// Cookies *********************
});

//************************************************************************************************
//Function that create a cookie
function createCookie(name, value, days) {
    var date, expires;
    if (days) {
        date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        expires = "; expires="+date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = name+"="+value+expires+"; path=/";
}


//Function that reads a cookie
function readCookie(name) {
    var list = document.cookie.split(";");
    myCookie = '';
    for (i in list) {
        var search = list[i].search(name);
        if (search > -1) {myCookie=list[i]}
    }
var igual = myCookie.indexOf("=");
var value = myCookie.substring(igual+1);
return value;
}
//************************************************************************************************