jQuery(function( $ ){
    
    //-- Homepage - Menu Link - Smooth Scroll --//
    
    $('a[href*="#"]:not([href="#"]):not(.contact-map, .tab-links a)').click(function() {
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
    
    //-- Homepage - Auto Scroll --//
    
    var screenWidth = $(window).width();
    
    if( screenWidth <= 720 ) {
        $('.sections').fullpage({
            scrollBar: true,
            fitToSection: false,
            autoScrolling: false,
        });
        
        $('#gallery-2').removeClass('gallery-columns-4').addClass('gallery-columns-2');
        
    } else {
        $('.sections').fullpage({
            scrollBar: true,
            fitToSection: false,
            normalScrollElements: '#home-section-6.wrap',
        });
        
        $('#gallery-2').removeClass('gallery-columns-2').addClass('gallery-columns-4');
    }
    
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
                    coords: [262,185],
                    name: "Clark",
                    style: {
                        image: "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Clark-1.png"
                    }
                },
                {
                    coords: [102,185],
                    name: "Clark",
                    style: {
                        fill: "#55dfe8",
                        stroke: "#45b9c1",
                        "stroke-width": 2,
                        r: 7
                    }
                },
                {
                    coords: [278,200],
                    name: "Metro Manila",
                    style: {
                        image: "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Manila.png"
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
                    coords: [315,270],
                    name: "Boracay Island",
                    style: {
                        image: "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Boracay.png"
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
                    coords: [388,305],
                    name: "Cebu",
                    style: {
                        image: "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Cebu.png"
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
                    coords: [444,397],
                    name: "Davao",
                    style: {
                        image: "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Davao.png"
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
                switch (code) {
                        case '0':
                        case '1': label.html("<div class=\"location-hover\" style=\"background-image: url(http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/C3-Gulfstream-2-Clark-300x225.jpg);\"><\div>");
                        break;
                        
                        case '2':
                        case '3': label.html("<div class=\"location-hover\" style=\"background-image: url(http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/AAC-M2-VIP-Manila-300x300.jpg);\"><\div>");
                        break;
                        
                        case '4':
                        case '5': label.html("<div class=\"location-hover\" style=\"background-image: url(http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/GreenHeli-Boracay-Helipad-1-300x200.jpg);\"><\div>");
                        break;
                        
                        case '6':
                        case '7': label.html("<div class=\"location-hover\" style=\"background-image: url(http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/AAC-L1-Cebu-lowres-300x225.jpg);\"><\div>");
                        break;
                        
                        case '8':
                        case '9': label.html("<div class=\"location-hover\" style=\"background-image: url(http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/C3-Gulfstream-2-Clark-300x225.jpg\);\"><\div>");
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
        $('.contact-tabs ' + currentAttrValue).addClass('active').css({
            'opacity': 1,
            'position': 'relative',
            'left': 0+'px',
            'transition': 'opacity .50s ease-in-out',
            '-moz-transition': 'opacity .50s ease-in-out',
            '-webkit-transition': 'opacity .50s ease-in-out'
        }).fadeIn(400).siblings().removeClass('active').css({
            'opacity': 0,
            'position': 'absolute',
            'left': -9999+'px'
        });

        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

    });
    
    //-- Homepage - Contact Us - Location Map Markers --//
    
    if($('.site-container').has('.contact-maps')) {
        $('.contact-maps').ready(function() {

            $('.contact-maps').each(function() {
                var id = $(this).attr('id');
                var lat = parseFloat($('.map-coords #marker-lat-'+id).val());
                var lng = parseFloat($('.map-coords #marker-lng-'+id).val());
                var coords = {lat: lat, lng: lng};
                
                if(screenWidth == 720) {
//                    alert($(id))
				    $('#'+id+' .map-container').css('width','648px');
                }

                var map = new google.maps.Map(document.getElementById('map-'+id), {
                    zoom: 17,
                    center: coords
                });

                var marker = new google.maps.Marker({
                    position: {lat: lat, lng: lng},
                    map: map,
                    title: 'AirTaxi.PH',
                    icon: {
                        url: "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Airtaxi_Map_Marker.png",
                        scaledSize: new google.maps.Size(128, 128)
                    }
                });

                google.maps.event.trigger(map, 'resize');

            });
            
        });
    }
    
    //-- Homepage - Contact Us - View Driving Directions Popup --//
    
    $('.map-view').click(function() {
        var id = $(this).attr('id');
        var mapName = $('#map-name-'+id).val();
        var mapAddress = $('#map-address-'+id).val();
        var image = $('#map-image-'+id).val();
        var imageAlt = $('#map-image-alt-'+id).val();
        
        $('.pop-dir').html('<div id="pop-dir-close" class="pop-dir-close"></div><h4>'+mapName+'</h4><p>'+mapAddress+'</p><img src="'+image+'" alt="'+imageAlt+'"/>');
        $('.pop-dir').removeClass('hidden').hide().fadeIn(400);
        $('.overlay').removeClass('hidden');
    
        $('#pop-dir-close').on('click', function(){
            $('.overlay').addClass('hidden');
            $('.pop-dir').addClass('hidden').hide();
        });
    
    });
    
    //-- Homepage - Contact Us - Email Driving Directions Popup --//
    
    $('.map-email').click(function() {
        var id = $(this).attr('id');
        var mapName = $('input[data-ref="map-name-'+id+'"]').val();
        var mapAddress = $('input[data-ref="map-address-'+id+'"]').val();
        var image = $('input[data-ref="map-image-'+id+'"]').val();
        
        $('input[name="hangar-name"]').attr('value', mapName);
        $('input[name="hangar-address"]').attr('value', mapAddress);
        $('input[name="hangar-image"]').attr('value', image);
        
        $('.pop-email').removeClass('hidden').hide().fadeIn(400);
        $('.overlay').removeClass('hidden');
        
        $('#pop-email-close').on('click', function(){
            $('.overlay').addClass('hidden');
            $('.pop-email').addClass('hidden').hide();
        });
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
        slidesPerRow: 4,
        speed: 300,
        slidesToShow: -1,
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
        slidesPerRow: 4,
        speed: 300,
        slidesToShow: -1,
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

//    $('.destinations-tab').slick({
//        dots: false,
//        arrows: true,
//        infinite: false,
//        rows: 2,
//        slidesPerRow: 1,
//        speed: 300,
//        slidesToShow: 1,
//        variableWidth: true,
//        responsive: [
//            {
//                breakpoint: 1024,
//                settings: {
//                    rows: 2,
//                    slidesPerRow: 2,
//                    slidesToShow: 1,
//                    slidesToScroll: 1,
//                    infinite: false,
//                    dots: true
//                }
//            },
//            {
//                breakpoint: 720,
//                settings: {
//                    rows: 2,
//                    slidesPerRow: 2,
//                    slidesToShow: 1,
//                    slidesToScroll: 1,
//                    infinite: false,
//                    dots: true
//                }
//            },
//            {
//                breakpoint: 600,
//                settings: {
//                    rows: 2,
//                    slidesPerRow: 2,
//                    slidesToShow: 1,
//                    slidesToScroll: 1,
//                    infinite: false,
//                    dots: true
//                }
//            },
//            {
//                breakpoint: 480,
//                settings: {
//                    rows: 2,
//                    slidesPerRow: 2,
//                    slidesToShow: 1,
//                    slidesToScroll: 1,
//                    infinite: false,
//                    dots: true
//                }
//            }
//            // You can unslick at a given breakpoint now by adding:
//            // settings: "unslick"
//            // instead of a settings object
//        ]
//    });
    
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