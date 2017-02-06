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
//                    $('#home').css('margin-top','0px');
//                }
//                $('#home').css('margin-top','-70px');
//            }
//        } else {
//            if ( screenWidth > 375 ) {
//                $('#home').css('margin-top','30px');
//            } else {
//                $('#home').css('margin-top','0px');
//            }
//            $('.site-header').fadeIn(400);
//        }
//        lastScrollTop = st;
//    });
    
    
	//-- Loader --//

//	$(document).ready(function() {
//        $('html, body').css({
//            'overflow': 'hidden',
//            'height': '100%'
//        });
//        $('.site-container').before('<div class="loader-container"><div class="loader"></div></div>').fadeIn();
//        $(window).load(function() {
//            $('.loader-container').fadeOut(400).remove();
//            $('html, body').css({
//                'overflow': 'auto',
//                'height': 'auto'
//            });
//        });
//    });
    
//    var baseURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
    var baseURL = window.location.protocol + "//" + window.location.host;
    
    if(baseURL == "http://localhost") {
        baseURL = baseURL + "/Projects/airtaxi"
    }
    
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
    
    
    //-- Homepage - Auto Scroll --//
    
    if( screenWidth <= 375 ) {
        
        $('#gallery-2').removeClass('gallery-columns-2');
        $('#gallery-2').removeClass('gallery-columns-4').addClass('gallery-columns-1');
        
    } else if( screenWidth > 375 && screenWidth <= 1024 ) {
        
        $('#gallery-2').removeClass('gallery-columns-4');
        $('#gallery-2').removeClass('gallery-columns-1').addClass('gallery-columns-2');
        
    } else {
        
        $('#gallery-2').removeClass('gallery-columns-2');
        $('#gallery-2').removeClass('gallery-columns-1').addClass('gallery-columns-4');
    }
    
    if(screenWidth > 1024) {
        
        $('.sections').fullpage({
            verticalCentered: false,
            scrollBar: true,
            fitToSection: false,
            normalScrollElements: '#airplane-rates.wrap',
        });
    }
    
    //-- Homepage - Base Locations - Image Map Hover --//
    
    if($('#locations').length) {
        
        $('#locations').ready(function() {

            //-- Homepage - Base Locations - Responsive Map --//

            var markerManila = baseURL + "/wp-content/uploads/2016/09/Manila.png";
            var markerClark = baseURL + "/wp-content/uploads/2016/09/Clark.png";
            var markerCebu = baseURL + "/wp-content/uploads/2016/09/Cebu.png";
            var markerBoracay = baseURL + "/wp-content/uploads/2016/09/Boracay.png";
            var markerDavao = baseURL + "/wp-content/uploads/2016/09/Davao.png";

            if( screenWidth <= 375 ) {
                $('#base-locations').css('height', '420px');
                $('#base-locations').css('width', '420px');

                markerManila = baseURL + "/wp-content/uploads/2016/09/Manila_2.png";
                markerClark = baseURL + "/wp-content/uploads/2016/09/Clark_2.png";
                markerCebu = baseURL + "/wp-content/uploads/2016/09/Cebu_2.png";
                markerBoracay = baseURL + "/wp-content/uploads/2016/09/Boracay_2.png";
                markerDavao = baseURL + "/wp-content/uploads/2016/09/Davao_2.png";

            }

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
                            case '1': label.html("<div class=\"location-hover\" style=\"background-image: url(" + baseURL + "/wp-content/uploads/2016/09/C3-Gulfstream-2-Clark-300x225.jpg);\"><\div>");
                            break;

                            case '2':
                            case '3': label.html("<div class=\"location-hover\" style=\"background-image: url(" + baseURL + "/wp-content/uploads/2016/09/AAC-M2-VIP-Manila-300x225.jpg);\"><\div>");
                            break;

                            case '4':
                            case '5': label.html("<div class=\"location-hover\" style=\"background-image: url(" + baseURL + "/wp-content/uploads/2016/09/GreenHeli-Boracay-Helipad-1-300x200.jpg);\"><\div>");
                            break;

                            case '6':
                            case '7': label.html("<div class=\"location-hover\" style=\"background-image: url(" + baseURL + "/wp-content/uploads/2016/09/AAC-L1-Cebu-lowres-300x225.jpg);\"><\div>");
                            break;

                            case '8':
                            case '9': label.html("<div class=\"location-hover\" style=\"background-image: url(" + baseURL + "/wp-content/uploads/2016/10/Temp-Photo-DAVAO.jpeg);\"><\div>");
                            break;

                        default: break;
                    };
                }
            });

            $('#base-locations .jvectormap-zoomin').hide();
            $('#base-locations .jvectormap-zoomout').hide();

        });
    }
    
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
                        url: baseURL + "/wp-content/uploads/2016/09/Airtaxi_Map_Marker.png",
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
    
    $('.map-email').on('click', function() {
        
        $('body.mobile.ios.safari').css({
            'overflow': 'hidden',
            'height': '100%',
            '-webkit-overflow-scrolling': 'auto' 
        });
        
        var id = $(this).attr('id');
        var mapName = $('input[data-ref="map-name-'+id+'"]').val();
        var mapAddress = $('input[data-ref="map-address-'+id+'"]').val();
        var image = $('input[data-ref="map-image-'+id+'"]').val();
        
        mapAddress = mapAddress.replace(/<br \/>/g,'')
        
        $('input[name="hangar-name"]').attr('value', mapName);
        $('input[name="hangar-address"]').attr('value', mapAddress);
        $('input[name="hangar-image"]').attr('value', image);
        
        $('.pop-email.pop-default').removeClass('hidden').hide().fadeIn(400);
        $('.overlay').removeClass('hidden');
        
        $('#pop-email-close').on('click', function(){
                $('.overlay').addClass('hidden');
                $('.pop-email.pop-default').addClass('hidden').hide();
        });
        
        
        //safari pop up alternative
//        if($('body').hasClass('safari')) {
//            $('.pop-email.pop-safari').removeClass('hidden').hide().fadeIn(400);
//            
//        } else {
//            $('.pop-email.pop-default').removeClass('hidden').hide().fadeIn(400);
//            $('.overlay').removeClass('hidden');
//        }
//        
//        $('#pop-safari-close').on('click', function(){
//        
//            $('body.mobile.ios.safari').css({
//                'overflow': 'auto',
//                'height': 'auto',
//                '-webkit-overflow-scrolling': 'touch' 
//            });
//            
//            if($('body').hasClass('safari')) {
//                $('.pop-email.pop-safari').addClass('hidden').hide();
//            }
//        });
    });
    
    //-- Homepage - Contact Us - Email - Join Our Team - Popup --//
    
    $('.map-inquire').on('click', function() {
        
        $('.pop-join').removeClass('hidden').hide().fadeIn(400);
        $('.overlay').removeClass('hidden');
        
        $('#pop-join-close').on('click', function(){
                $('.overlay').addClass('hidden');
                $('.pop-join').addClass('hidden').hide();
        });
        
    });
    
    //-- Airplane Rates Page - Contact Form - Popup --//
    
    $('.ap-inquire').on('click', function() {
        
        $origin = '';
        $destination = '';
        $aircraft = '';
        
        if($(this).parents('div.ap-details').find('span.ap-from')) {
            $origin = $(this).parents('div.ap-details').find('span.ap-from').text();
            $destination = $(this).parents('div.ap-details').find('span.ap-to').text();
            $aircraft = $(this).parents('div.ap-box').find('div.ap-title h3').text();
        }
        
//        $origin = $(this).parents('div.ap-details').find('span.ap-from').val();
//        console.log($origin);
        
        $('input[name="your-subject"]').attr('value', 'Aircraft Charter Inquiry: '+$origin+' to '+$destination+', '+$aircraft);
        
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
        infinite: true,
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
                breakpoint: 1025,
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
                breakpoint: 1025,
                settings: "unslick"
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
        slidesToShow: -1,
        variableWidth: true,
        responsive: [
            {
                breakpoint: 1025,
                settings: "unslick"
            }
            
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    
    //-- Rates Page Tabs --//
    
    $('.tabs .tab-links a').on('click', function(e)  {
        var classname = $(this).attr('class');
        var currentAttrValue = $(this).attr('href');
        
        var tablink = $('.'+classname+'-tab');
        //console.log(tablink);

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
    
    //News Landing Page
    //Removes images from excerpts
    $('.news-landing-container').ready(function() {
        $(this).find('.news-landing-excerpt figure').remove();
        $(this).find('.related-news-excerpt figure').remove();
    });
    
    
    //View full news content
    $('.news-landing-excerpt .read-more, .news-landing-excerpt .readmore').on('click', function(e) {
        e.preventDefault();
        
        $this = $(this);
        $postID = $(this).parents('.news-landing-item').attr('data-news-id');
        
        //local
        var base = window.location.protocol + "//" + window.location.host + window.location.pathname.replace('news/','');
        //testserver
//        var base = window.location.protocol + "//" + window.location.host;
        
        //local
        $url = '' + baseURL + '/wp-json/wp/v2/posts/' + $postID;
        //testserver
//        $url = '' + base + 'wp-json/wp/v2/posts/' + $postID;
        
        //console.log('Post ID: ' + $postID);
        
        $.ajax({
            url: $url,
            method: 'GET',
            crossDomain: true,            
            success: function(data, status) {
                //console.log('URL: ' + $url);
                //console.log(data);
                if(!data) {
                    //console.log('no data found');
                } else {
                    //console.log('data found');
                    $this.parents('article').find('.news-landing-content').hide();
                    $this.parents('article').find('.news-landing-content').html(data.content.rendered + '<div class="news-item-close"><a href="#news-' + $postID + '" class="news-close-btn, read-more">Close Full Story</a></div>');
                    $this.parents('article').find('.news-landing-content').fadeIn();
                    $this.parents('.news-landing-excerpt').fadeOut().hide();
                    
                    $('.news-item-close').click(function() {
                        var pathname = $(this).find('a')[0].href.split('/'),
                        l = pathname.length;
                        pathname = pathname[l-1] || pathname[l-2];
                        window.location.hash = "#!" + pathname;
                        
                        alert(pathname);
                        
                        if (location.pathname == pathname) {
                            alert(hello);
                            var target = $(this.hash);
                            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                            if (target.length) {
                                $('html, body').animate({
                                    scrollTop: target.offset().top-40
                                }, 1200);
                                return false;
                            }
                        }
                        $(this).parents('.news-landing-content').fadeOut().hide();
                        $(this).parents('article').find('.news-landing-excerpt').fadeIn();
                        $(this).parents('.news-landing-content').html('');
                        
                    });
                }
            }
        });
    });
    
    //Load more button
    $('.news-load-btn').on('click', function() {
        //get next page of posts
        var next_page = $(this).attr('data-next-page');
        var cat = $(this).attr('data-news-cat');

        load_next_news(next_page, cat);
    });
    
    //Load more news
    function load_next_news (next_page, cat) {
        //testserver
//        var base = window.location.protocol + "//" + window.location.host;
        
        //local
        $url = '' + baseURL + '/wp-json/wp/v2/posts';
        //testserver
//        $url = '' + base + 'wp-json/wp/v2/posts;
        
        $params = {
            page: next_page,
            per_page: 6,
            orderby: 'date',
            order: 'desc',
            categories: cat
        };
        
        //console.log($params);
        var addCount = 6;
        
        if(next_page <= 1) {
            addCount = 0;
        }
        
        var next_news = $.ajax({
            url: $url,
            method: 'GET',
            data: $params,
            crossDomain: true,            
            success: function(data, status) {
                //console.log('URL: ' + $url);
                //console.log(data);
                if(!data) {
                    //console.log('no data found');
                } else {
                    //console.log('data found');
                    $.each(data, function(key, post){
                        
                        var imageURL = '';
                        
                        if(post.thumbnail) {
                            var imageURL = '<figure>'
                            +'<img src="'+post.thumbnail+'" alt="'+post.title.rendered+'">'
                            +'</figure>';
                        }
                        
                        $('.news-landing-container')
                            .append('<div class="news-landing-item" data-news-id="'+key+1+addCount+'">'
                            +'<article>'
                            +'<div class="news-title-container">'
                            +'<h2 class="news-landing-title">'+post.title.rendered+'</h2>'
                            +'</div>'
                            +'<a href="'+post.link+'" class="news-item-image">'
                            +imageURL
                            +'</a>'
                            +'<div class="news-landing-excerpt">'+post.excerpt.rendered
                            +'<a href="'+post.link+'" class="read-more">Read More</a>'
                            +'</div>'
                            +'<div class="news-landing-content"></div>'
                            +'</article>'
                            +'</div>');
                    });
                }
            }
        });
        
        next_news.done(function(data, textStatus, jqXHR) {
            var currentPage = parseInt(next_page,10);
            var shownEntries = $('.news-landing-item').length;
                
            totalEntries  = parseInt( jqXHR.getResponseHeader('X-WP-Total'), 10 );
            totalPages  = parseInt( jqXHR.getResponseHeader('X-WP-TotalPages'), 10 );
            //console.log('total pages: ' + totalPages);
            //console.log('total entries: ' + totalEntries);
            
            if ( currentPage === totalPages ) {
                //console.log('current == total');
                if($('.news-load-btn')) {
                    //console.log('.news-load-btn found');
                    $('.news-load-btn').remove();
                    $('.news-load-more').remove();
                } else {
                    //console.log('.news-load-btn not found');
                }
            } else if ( currentPage < totalPages ) {
                //console.log('current < total');
                $('.news-load-btn').remove();
                $('.news-load-more').remove();
                $('.news-landing-container').append('<div class="news-load-more"><button type="button" class="news-load-btn" data-next-page="'+(currentPage+1)+'" data-next-cat="'+cat+'">View More Posts</button></div>');
            }

            $('.news-load-btn').click(function() {
                //get next page of posts
                var next_page = $(this).attr('data-next-page');
                var cat = $(this).attr('data-news-cat');

                load_next_news(next_page, cat);
            });
            
        });//end of next_news.done
    }
    
    $('.ap-image img').centerImage();
    
});