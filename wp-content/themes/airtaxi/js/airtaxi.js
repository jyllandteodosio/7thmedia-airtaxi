jQuery(function( $ ){
    
    //-- Homepage - Smooth Scroll ---------------------------------------------//
    
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top-30
                }, 1200);
                return false;
            }
        }
    });
    
    
    //-- Homepage - Base Locations - Image Map Hover ---------------------------------------------//
    
    $('#home-section-2').ready(function() {
        $('#base-locations').vectorMap({map: 'ph_mill_en'});
    });
    
    
    //-- Rates Page Tabs ---------------------------------------------//
    
    $('.tabs .tab-links a').on('click', function(e)  {
        var classname = $(this).attr('class');
        var currentAttrValue = $(this).attr('href');
        
        var tablink = $('.'+classname+'-tab');

        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();

        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
        
        tablink.slick('slickGoTo', 0, true);
    });
    
    
    //-- Slick JS ---------------------------------------------//
    
    /*---- Aircraft Detail Page - Fleet Gallery Slick -----*/
    
    $('.gallery-slider').slick({
        dots: false,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    /*---- Rates Page - Drop Off Slick -----*/
    
    $('.drop-off-tab').slick({
        dots: false,
        arrows: true,
        infinite: false,
        rows: 2,
        slidesPerRow: 1,
        speed: 300,
        slidesToShow: 4,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    rows: 2,
                    slidesPerRow: 1,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    rows: 2,
                    slidesPerRow: 1,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 2,
                    slidesPerRow: 1,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    /*---- Rates Page - Aerial Tours Slick -----*/
    
    $('.aerial-tours-tab').slick({
        dots: false,
        arrows: true,
        infinite: false,
        rows: 2,
        slidesPerRow: 1,
        speed: 300,
        slidesToShow: 4,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    rows: 2,
                    slidesPerRow: 1,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                rows: 2,
                    slidesPerRow: 1,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 2,
                    slidesPerRow: 1,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    
    /*---- Rates Page - Destination Tours Slick -----*/

    $('.destinations-tab').slick({
        dots: false,
        arrows: true,
        infinite: false,
        rows: 2,
        slidesPerRow: 1,
        speed: 300,
        slidesToShow: 1,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    rows: 2,
                    slidesPerRow: 1,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    rows: 2,
                    slidesPerRow: 1,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    rows: 2,
                    slidesPerRow: 1,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    
    $('.m-panel-table').ready(function() {
        // Membership perks table
        if($('.m-panel-table div').hasClass('mperks-emerald')){
            $('div.mperks-emerald-header').parent().css("border","2px solid #056029");
            $('div.mperks-emerald').parent().css("border-left","2px solid #056029");
            $('div.mperks-emerald').parent().css("border-right","2px solid #056029");
            $('#mperks-end.mperks-emerald').parent().css("border-bottom","2px solid #056029");
        }
        if($('.m-panel-table div').hasClass('mperks-sapphire')){
            $('div.mperks-sapphire-header').parent().css("border","2px solid #205f95");
            $('div.mperks-sapphire').parent().css("border-left","2px solid #205f95");
            $('div.mperks-sapphire').parent().css("border-right","2px solid #205f95");
            $('#mperks-end.mperks-sapphire').parent().css("border-bottom","2px solid #205f95");
        }
        if($('.m-panel-table div').hasClass('mperks-diamond')){
            $('div.mperks-diamond-header').parent().css("border","2px solid #989798");
            $('div.mperks-diamond').parent().css("border-left","2px solid #989798");
            $('div.mperks-diamond').parent().css("border-right","2px solid #989798");
            $('#mperks-end.mperks-diamond').parent().css("border-bottom","2px solid #989798");
        }
        // Membership rates table
        if($('.m-panel-table div').hasClass('mrates-emerald')){
            $('div.mrates-emerald-header').parent().css("border","4px solid #056029");
            $('div.mrates-emerald').parent().css("border-left","4px solid #056029");
            $('div.mrates-emerald').parent().css("border-right","4px solid #056029");
            $('#mrates-end.mrates-emerald').parent().css("border-bottom","4px solid #056029");
        }
        if($('.m-panel-table div').hasClass('mrates-sapphire')){
            $('div.mrates-sapphire-header').parent().css("border","4px solid #205f95");
            $('div.mrates-sapphire').parent().css("border-left","4px solid #205f95");
            $('div.mrates-sapphire').parent().css("border-right","4px solid #205f95");
            $('#mrates-end.mrates-sapphire').parent().css("border-bottom","4px solid #205f95");
        }
        if($('.m-panel-table div').hasClass('mrates-diamond')){
            $('div.mrates-diamond-header').parent().css("border","4px solid #989798");
            $('div.mrates-diamond').parent().css("border-left","4px solid #989798");
            $('div.mrates-diamond').parent().css("border-right","4px solid #989798");
            $('#mrates-end.mrates-diamond').parent().css("border-bottom","4px solid #989798");
        }
    });
    
});