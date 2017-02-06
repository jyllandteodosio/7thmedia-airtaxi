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
    
    var border2px = "2px solid";
    var border4px = "4px solid";
    var emerald = "#056029";
    var sapphire = "#205f95";
    var diamond = "#989798";
    
    $('.m-panel-table').ready(function() {
        // Membership perks table
        if($('.m-panel-table div').hasClass('mperks-emerald')){
            $('div.mperks-emerald-header').parent().css("border",border2px + " " + emerald);
            $('div.mperks-emerald').parent().css("border-left",border2px + " " + emerald);
            $('div.mperks-emerald').parent().css("border-right",border2px + " " + emerald);
            $('#mperks-end.mperks-emerald').parent().css("border-bottom",border2px + " " + emerald);
        }
        if($('.m-panel-table div').hasClass('mperks-sapphire')){
            $('div.mperks-sapphire-header').parent().css("border",border2px + " " + sapphire);
            $('div.mperks-sapphire').parent().css("border-left",border2px + " " + sapphire);
            $('div.mperks-sapphire').parent().css("border-right",border2px + " " + sapphire);
            $('#mperks-end.mperks-sapphire').parent().css("border-bottom",border2px + " " + sapphire);
        }
        if($('.m-panel-table div').hasClass('mperks-diamond')){
            $('div.mperks-diamond-header').parent().css("border",border2px + " " + diamond);
            $('div.mperks-diamond').parent().css("border-left",border2px + " " + diamond);
            $('div.mperks-diamond').parent().css("border-right",border2px + " " + diamond);
            $('#mperks-end.mperks-diamond').parent().css("border-bottom",border2px + " " + diamond);
        }
        // Membership rates table
        if($('.m-panel-table div').hasClass('mrates-emerald')){
            $('div.mrates-emerald-header').parent().css("border",border4px + " " + emerald);
            $('div.mrates-emerald-header').parent().css("background",emerald);
            $('div.mrates-emerald').parent().css("border-left",border4px + " " + emerald);
            $('div.mrates-emerald').parent().css("border-right",border4px + " " + emerald);
            $('#mrates-end.mrates-emerald').parent().css("border-bottom",border4px + " " + emerald);
        }
        if($('.m-panel-table div').hasClass('mrates-sapphire')){
            $('div.mrates-sapphire-header').parent().css("border",border4px + " " + sapphire);
            $('div.mrates-sapphire-header').parent().css("background",sapphire);
            $('div.mrates-sapphire').parent().css("border-left",border4px + " " + sapphire);
            $('div.mrates-sapphire').parent().css("border-right",border4px + " " + sapphire);
            $('#mrates-end.mrates-sapphire').parent().css("border-bottom",border4px + " " + sapphire);
        }
        if($('.m-panel-table div').hasClass('mrates-diamond')){
            $('div.mrates-diamond-header').parent().css("border",border4px + " " + diamond);
            $('div.mrates-diamond-header').parent().css("background",diamond);
            $('div.mrates-diamond').parent().css("border-left",border4px + " " + diamond);
            $('div.mrates-diamond').parent().css("border-right",border4px + " " + diamond);
            $('#mrates-end.mrates-diamond').parent().css("border-bottom",border4px + " " + diamond);
        }
    });
    
});