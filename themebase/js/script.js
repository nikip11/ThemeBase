var $ =  jQuery;

var app = {
    options: {
    },
    init: function(){
    },
    navbarClick: function(){
        $('.mainmenu a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                    return false;
                }
            }
        });
    },
    prettyPhoto: function(){
        $("a[href$='.jpg'], a[href$='.jpeg'], a[href$='.gif'], a[href$='.png']").prettyPhoto({
            animationSpeed: 'normal',
            padding: 40,
            opacity: 0.35,
            showTitle: true,
            social_tools: ''
        });
    }
}
/************************************************************************************
Cookie
options: id container
close: 
*/
var cookie = {
    options: {
        'name': 'cookies',
        'id': '#cookie',
        'close': '.cookie-close'
    },
    init: function(){
        if( cookie.readCookie(cookie.options.name) ) {
            $(cookie.options.id).hide();
        }
        cookie.closeCookie();
    },
    createCookie: function(name){
        localStorage.setItem(name, 'true');
    },
    readCookie: function(name){
        return localStorage.getItem(name);
    },
    closeCookie: function(){
        $(cookie.options.close).click(function(e) {
            e.preventDefault();
            $(cookie.options.id).slideUp();
            cookie.createCookie(cookie.options.name);
        });
    }
}
/************************************************************************************
Cookie
options: id container
close: 
*/
var legalAge = {
    options: {
        'name': 'legal',
        'id': '#legal'
    },
    init: function(){
        if( legalAge.readCookie(legalAge.options.name) ) {
            $(legalAge.options.id).hide();
        }
        legalAge.closeCookie();

    },
    createCookie: function(name){
        localStorage.setItem(name, 'true');
    },
    readCookie: function(name){
        return localStorage.getItem(name);
    },
    closeCookie: function(){
        $('.legal-btn').click(function(e) {
            // e.preventDefault();
            if ($(this).attr('id') == 'yes') {
                $(legalAge.options.id).slideUp();
                legalAge.createCookie(legalAge.options.name);
            } else {
                $('.legal-form').remove();
                $('.legal-content').append('<p>Lo siento pero no puedes entrar</p>');
            }
        });
    }
}
/*************************************************************************************
totop
id: id del div contenedor
speed: velocidad de la animación
offset: posicion de aparición
*/
var totop = {
    options: {
        'id': '#totop',
        'speed': 500,
        'offset': 100
    },
    init: function(){
        $(totop.options.id).click(function() {
            $('html, body').animate({scrollTop : 0},totop.options.speed);
            return false;
        });
        $(window).scroll(function () {
            if ($(this).scrollTop() > totop.options.offset) {
                $(totop.options.id).fadeIn('slow')
            } else {
                $(totop.options.id).fadeOut('fast')
            }
        });
    }
}
/*************************************************************************************
easterEgg
secret: texto en numeros
gif: url del gif
*/
var easterEgg = {
    options: {
        'secret': '78804949',
        'input': '',
        'timer': 0,
        'gif': 'https://i.giphy.com/L9j3uTtWcV32.gif'
    },
    init: function(options){
        easterEgg.setOptions(options);
        $(document).keyup(function(e) {
            console.log(e.which);
            easterEgg.options.input += e.which;    

            clearTimeout(easterEgg.options.timer);
            easterEgg.options.timer = setTimeout(function() { easterEgg.options.input = ""; }, 2000);
            console.log(easterEgg.options.input);
            easterEgg.checkCode();
        });
    },
    setOptions: function(options){
        $.each(options, function(key, value){
            easterEgg.options[key] = value;         
        });
    },
    checkCode: function(){
        if (easterEgg.options.input == easterEgg.options.secret) {
            $('body').append('<div id="eegg" style="background: #000;position: fixed;top:0;left:0;z-index:999999999999; width: 100%; height: 100vh; color:#FFF; display: flex;justify-content: center;align-content: center;flex-direction: column; text-align:center;"><div style="position:absolute; bottom:50px;left:0px; width: 100%; height: 100%;"><img src="'+easterEgg.options.gif+'" class="img-responsive" style="width: 100%; "></div></div>');
            easterEgg.options.timer = setTimeout(function() {
                $('#eegg').remove();
            }, 2000);
        }
    }
}