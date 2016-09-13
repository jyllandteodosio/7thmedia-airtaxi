jQuery(function( $ ){
    
    //-- Homepage - Smooth Scroll --//
    
    $('a[href*="#"]:not([href="#"]):not(.contact-map)').click(function() {
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
    
    
    //-- Homepage - Base Locations - Image Map Hover --//
    
    $('#home-section-2').ready(function() {
        $('#base-locations').vectorMap({
            map: 'ph_mill_en',
            backgroundColor: '#ffffff',
            hoverOpacity: 1,
            hoverColor: false,
            zoomOnScroll: false,
            regionStyle: {
                initial: {
                    fill: '#d1d2d4',
                    "fill-opacity": 1,
                    stroke: '#a9abae',
                    "stroke-width": 1.5,
                    "stroke-opacity": 1
                },
                    hover: {
                        "fill-opacity": 0.8,
                        cursor: 'pointer'
                    },
                    selected: {
                        fill: 'yellow'
                    }
            },
            onRegionTipShow: function (e, e1, text) {
                e.preventDefault();
            },
            markerStyle: {
                hover: {
                    stroke: "#fff",
                    "stroke-width": 2,
                    cursor: 'pointer'
                }
            },
            markers: [
                {
                    coords: [102,185],
                    name: "Clark",
                    style: {
                        fill: "#55dfe8",
                        stroke: "#45b9c1",
                        "stroke-width": 2,
                        r: 7
                    },
                    legend: {
                        vertical: true,
                        title: 'test',
                        cssClass: 'legend'
                    }
                },
                {
                    coords: [118,200],
                    name: "Metro Manila",
                    style: {
                        fill: "#55dfe8",
                        stroke: "#45b9c1",
                        "stroke-width": 2,
                        r: 7
                    }
                },
                {
                    coords: [155,270],
                    name: "Boracay Island",
                    style: {
                        fill: "#55dfe8",
                        stroke: "#45b9c1",
                        "stroke-width": 2,
                        r: 7
                    }
                },
                {
                    coords: [228,305],
                    name: "Cebu",
                    style: {
                        fill: "#55dfe8",
                        stroke: "#45b9c1",
                        "stroke-width": 2,
                        r: 7
                    }
                },
                {
                    coords: [284,397],
                    name: "Davao",
                    style: {
                        fill: "#55dfe8",
                        stroke: "#45b9c1",
                        "stroke-width": 2,
                        r: 7
                    }
                }
            ],
            onMarkerTipShow: function(e, label, code) {
                console.log(code);
                switch (code) {
                        case '0': label.html("<div class=\"location-hover\" style=\"background-image: url(http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/C3-Gulfstream-2-Clark-300x225.jpg);\"><\div>");
                        break;
                        
                        case '1': label.html("<div class=\"location-hover\" style=\"background-image: url(http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/AAC-M2-VIP-Manila-300x300.jpg);\"><\div>");
                        break;
                        
                        case '2': label.html("<div class=\"location-hover\" style=\"background-image: url(http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/GreenHeli-Boracay-Helipad-1-300x200.jpg);\"><\div>");
                        break;
                        
                        case '3': label.html("<div class=\"location-hover\" style=\"background-image: url(http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/AAC-L1-Cebu-lowres-300x225.jpg);\"><\div>");
                        break;
                        
                        case '4': label.html("<div class=\"location-hover\" style=\"background-image: url(http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/C3-Gulfstream-2-Clark-300x225.jpg\);\"><\div>");
                        break;
                        
                    default: break;
                };
            }
        });
        
        $('#base-locations .jvectormap-zoomin').hide();
        $('#base-locations .jvectormap-zoomout').hide();

    });
    
    
    //-- Rates Page Tabs --//
    
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
    
    
    //-- Homepage - Contact Us - Location Map Tabs --//
    
    $('.contact-tabs .contact-tab-links a').on('click', function(e)  {
        e.preventDefault();
        var currentAttrValue = $(this).attr('href');
        
        // Show/Hide Tabs
        $('.contact-tabs ' + currentAttrValue).fadeIn(400).siblings().hide();

        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

    });
    
    
    //-- Slick JS --//
    
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