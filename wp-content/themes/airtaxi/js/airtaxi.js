jQuery(function( $ ){
    
    var screenWidth = $(window).width();
    
    //-- Homepage - Detect Scroll - Hide Menu --//
    
//    var lastScrollTop = 0;
//    $(window).scroll(function(event){
//        var st = $(this).scrollTop();
//        if (st > lastScrollTop){
//            console.log(st);
//            $('.site-header').fadeOut(400);
//            if(st >= 70) {
//                if(screenWidth <= 375) {
//                    $('#home-section-0').css('margin-top','0px');
//                }
//                $('#home-section-0').css('margin-top','-70px');
//            }
//        } else {
//            if ( screenWidth > 375 ) {
//                $('#home-section-0').css('margin-top','30px');
//            } else {
//                $('#home-section-0').css('margin-top','0px');
//            }
//            $('.site-header').fadeIn(400);
//        }
//        lastScrollTop = st;
//    });
    
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
    
    if( screenWidth <= 375 ) {
        $('.sections').fullpage({
            verticalCentered: false,
            scrollBar: true,
            fitToSection: false,
            autoScrolling: false,
        });
        
        $('#gallery-2').removeClass('gallery-columns-2');
        $('#gallery-2').removeClass('gallery-columns-4').addClass('gallery-columns-1');
        
    } else if( screenWidth > 375 && screenWidth <= 768 ) {
        $('.sections').fullpage({
            verticalCentered: false,
            scrollBar: true,
            fitToSection: false,
            autoScrolling: false,
        });
        
        $('#gallery-2').removeClass('gallery-columns-4');
        $('#gallery-2').removeClass('gallery-columns-1').addClass('gallery-columns-2');
        
    } else {
        $('.sections').fullpage({
            verticalCentered: false,
            scrollBar: true,
            fitToSection: false,
            normalScrollElements: '#home-section-6.wrap',
        });
        
        $('#gallery-2').removeClass('gallery-columns-2');
        $('#gallery-2').removeClass('gallery-columns-1').addClass('gallery-columns-4');
    }
    
    
    //-- Homepage - Base Locations - Responsive Map --//
    
    var markerManila = "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Manila.png";
    var markerClark = "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Clark.png";
    var markerCebu = "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Cebu.png";
    var markerBoracay = "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Boracay.png";
    var markerDavao = "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Davao.png";
    
    if( screenWidth <= 375 ) {
        $('#base-locations').css('height', '420px');
        $('#base-locations').css('width', '420px');
        
        markerManila = "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Manila_2.png";
        markerClark = "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Clark_2.png";
        markerCebu = "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Cebu_2.png";
        markerBoracay = "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Boracay_2.png";
        markerDavao = "http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Davao_2.png";
        
    }
    
    
    /*
    
    http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Boracay_2.png
    http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Cebu_2.png
    http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Clark_2.png
    http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Davao_2.png
    http://localhost/Projects/airtaxi/wp-content/uploads/2016/09/Manila_2.png
    
    */
    //-- Homepage - Base Locations - Image Map Hover --//
    
    $('#home-section-2').ready(function() {
        var margin = 0;
        
        margin = (screenWidth <= 375 ? 5 : 0);
        
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
                    coords: [262+margin,185],
                    name: "Clark",
                    style: {
                        image: markerClark
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
                    coords: [278+margin,202],
                    name: "Metro Manila",
                    style: {
                        image: markerManila
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
                    coords: [315+margin,270],
                    name: "Boracay Island",
                    style: {
                        image: markerBoracay
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
                    coords: [388+margin,305],
                    name: "Cebu",
                    style: {
                        image: markerCebu
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
                    coords: [444+margin,397],
                    name: "Davao",
                    style: {
                        image: markerDavao
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
                
                if( screenWidth <= 375 ) {
				    $('#'+id+' .map-container').css('width','288px');
                } else if( screenWidth > 375 && screenWidth <= 768 ) {
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
        $('.pop-dir').removeClass('hidden');
        $('.overlay').removeClass('hidden');
    
        $('#pop-dir-close').on('click', function(){
            $('.overlay').toggleClass('hidden');
            $('.pop-dir').toggleClass('hidden');
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
                breakpoint: 768,
                settings: "unslick"
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
                breakpoint: 768,
                settings: "unslick"
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
//                breakpoint: 768,
//                settings: "unslick"
//            }
//            
//            // You can unslick at a given breakpoint now by adding:
//            // settings: "unslick"
//            // instead of a settings object
//        ]
//    });
    
    //-- Rates Page Tabs --//
    
    $('.tabs .tab-links a').on('click', function(e)  {
        var classname = $(this).attr('class');
        var currentAttrValue = $(this).attr('href');
        
        var tablink = $('.'+classname+'-tab');
        console.log(tablink);

        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).fadeIn(400).siblings().hide();

        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
        
        if(classname == 'drop-off' || classname == 'aerial-tours') {
            tablink.slick('slickGoTo', 0, true);
        }
    });
    
    
    //-- Homepage Links for Rates Page Tabs --//

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };
    
        
    var ratesTab = getUrlParameter('selectedTab');
    
    
    if(ratesTab == 'drop-off') {
        $('.tabs .tab-links a.drop-off').click();
    } else if(ratesTab == 'aerial-tours') {
        $('.tabs .tab-links a.aerial-tours').click();
    } else if(ratesTab == 'destination-tours') {
        $('.tabs .tab-links a.destinations').click();
    }
    
    
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
            $('div.mrates-emerald-header').parent().css("background","#056029");
            $('div.mrates-emerald').parent().css("border-left","4px solid #056029");
            $('div.mrates-emerald').parent().css("border-right","4px solid #056029");
            $('#mrates-end.mrates-emerald').parent().css("border-bottom","4px solid #056029");
        }
        if($('.m-panel-table div').hasClass('mrates-sapphire')){
            $('div.mrates-sapphire-header').parent().css("border","4px solid #205f95");
            $('div.mrates-sapphire-header').parent().css("background","#205f95");
            $('div.mrates-sapphire').parent().css("border-left","4px solid #205f95");
            $('div.mrates-sapphire').parent().css("border-right","4px solid #205f95");
            $('#mrates-end.mrates-sapphire').parent().css("border-bottom","4px solid #205f95");
        }
        if($('.m-panel-table div').hasClass('mrates-diamond')){
            $('div.mrates-diamond-header').parent().css("border","4px solid #989798");
            $('div.mrates-diamond-header').parent().css("background","#989798");
            $('div.mrates-diamond').parent().css("border-left","4px solid #989798");
            $('div.mrates-diamond').parent().css("border-right","4px solid #989798");
            $('#mrates-end.mrates-diamond').parent().css("border-bottom","4px solid #989798");
        }
    });
    
});