jQuery(function( $ ){
    
    //-- Homepage - Menu Link - Smooth Scroll --//
    $('a[href*="#"]:not([href="#"]):not(.contact-map, .tab-links a, .expanding-archives-section a)').click(function() {
        if($('.responsive-menu-icon').css('display') == 'block') {
            $('.genesis-nav-menu.responsive-menu').slideUp(200);
        }
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top-40
                }, 1200);
                return false;
            }
        }
    });
});