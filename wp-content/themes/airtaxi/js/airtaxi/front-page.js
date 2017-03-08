jQuery(function( $ ){
    
    var screenWidth = $(window).width();
    var baseURL = window.location.protocol + "//" + window.location.host;
    
    if(baseURL == "http://localhost") {
        baseURL = baseURL + "/Projects/airtaxi"
    }
    
    //-- Homepage - Menu Link - Smooth Scroll --//
    
    var $root = $('html, body');
    
    $('.genesis-nav-menu a').click(function() {
        var hash = $.attr(this, 'href');
        var href = $(this).attr('href').split('#')[1];
        console.log(href);
        $root.animate({
            scrollTop: $('#'+href).offset().top
        }, 1000, function () {
            window.location.hash = href;
        });
        return false;
    });
    
    // change hash on scroll
    $scrolledSections = new Array();
    
    $(document).on('scroll',function(e){
        
        console.log('header top:' + $('.site-header').offset().top);

        $header = $('.site-header').offset().top + $('.site-header').outerHeight(true);

        console.log('header bottom:' + $header);
        
        $('.sections .section').each(function(){
            
            if(isScrolledIntoView($(this))) {
                console.log('section top:' + $(this).offset().top);
                //if($(this).offset().top ) {
                    if (
                    $(this).offset().top - 10 <= $header
                    //$(this).offset().top < window.pageYOffset
                    //begins before top
                    //&& $(this).offset().top + $(this).height() > window.pageYOffset
                    //but ends in visible area
                    //+ 10 allows you to change hash before it hits the top border
                    ) {
                        if( jQuery.inArray($(this).attr('id'), $scrolledSections) < 0) {
                            $scrolledSections.push($(this).attr('id'));
                        }
                        console.log('scrolling on ' + $(this).attr('id'));
    //                    window.location.hash = $(this).attr('id');
                    }
                //}
            }
        });
    });
    
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
    }
    
    
    if(screenWidth > 1024) {
        
        $('.sections').fullpage({
            verticalCentered: false,
            scrollBar: true,
            fitToSection: false,
            normalScrollElements: '#airplane-rates.wrap',
        });
    }
    
    
    // Change site title tag from h1 to p
    $('.site-title').contents().unwrap().wrap('<p class="site-title" itemprop="headline"></p>');
    
    // Change about section title's tag from h2 to h1
    $('#about h2, #about-us h2').contents().unwrap().wrap('<h1 class="widget-title widgettitle"></h1>');
    
    
    
});