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
    
    if(screenWidth > 1024) {
        
        $('.sections').fullpage({
            anchors:['', 'about-us', 'base-locations', 'aircraft-fleet', 'membership', 'helicopter-rates-philippines', 'private-charter-plane-rates-philippines', 'contact-us', 'copyright'],
            fitToSection: false,
            scrollBar: true,
            normalScrollElements: '.base-locations-wrap, .fleet-gallery, .contact_details_banner, .contact-us-wrap',
            verticalCentered: false,
            fixedElements: '#footer',
        });
    }
    
    
    // Change site title tag from h1 to p
    $('.site-title').contents().unwrap().wrap('<p class="site-title" itemprop="headline"></p>');
    
    // Change about section title's tag from h2 to h1
    $('#about h2, #about-us h2').contents().unwrap().wrap('<h1 class="widget-title widgettitle"></h1>');
    
    
    
});