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
    
    $(document).ready(function() {
        var redirects = [
            ['#home-section-0', '#home'],
            ['#home-section-1', '#about-us'],
//            ['#home-section-2', '#locations'],
//            ['#home-section-3', '#aircraft-fleet'],
//            ['#home-section-4', '#membership'],
//            ['#home-section-5', '#helicopter-rates'],
//            ['#home-section-6', '#airplane-rates'],
            ['#home-section-7', '#contact-us'],
        ]

        for (var i=0; i<redirects.length; i++) {
            if (window.location.hash == redirects[i][0]) {
                $new = window.location.href.replace(window.location.hash, redirects[i][1]);
                window.location.replace($new);
            }
        }
    });
    
    function close_inquiry_form () {
        $('.overlay').addClass('hidden');
        $('.pop-join').addClass('hidden').hide();
    };
    
});