jQuery(function( $ ){
    
    var screenWidth = $(window).width();
    var baseURL = window.location.protocol + "//" + window.location.host;
    
    if(baseURL == "http://localhost") {
        baseURL = baseURL + "/Projects/airtaxi"
    }
    
    //* Scrollify JS
//    var offset = -80;
//    if(screenWidth <= 425) {
//        offset = -60;
//    }
    
//    $.scrollify({
//        section : ".section",
//        sectionName : "id",
//        offset : offset,
//        setHeights : false,
////        touchScroll: true,
//    });
    
    //* Change hash on scrolll
    $(document).on('scroll',function(e){
        $('.sections section').each(function(){
            if ($(this).offset().top < window.pageYOffset + 10
            && $(this).offset().top + $(this).height() > window.pageYOffset + 10
            ) {
//                window.location.hash = $(this).attr('id');
                var el = document.getElementById($(this).attr('id'));
                var id = el.id;
                var temp = $(this).attr('id');
                el.removeAttribute('id');
                location.hash = temp;
                el.setAttribute('id',id);
            }
        });
    });
    
    //* Smooth Scroll
    $('.genesis-nav-menu a, a[href*=#]:not(.flex-link)').click(function() {
        var hash = $.attr(this, 'href');
        var href = $(this).attr('href').split('#')[1];
        console.log(href);
        
        if(href) {
            $('html, body').animate({
                scrollTop: $('#'+href).offset().top-80
            }, 1000, function () {
                window.location.hash = href;
            });
            return false;
        }
    });
    
    //* Banner Button Animations
    if($('.buttons-container .button').length) {
        var order = 0;
        
        $('.buttons-container .button').each(function(order) {
            var button = this;
            setTimeout(function() {
                $(button).css({ 'opacity': 1, 'transition': 'opacity 4s' });
            }, (3000+(order * 1000)));
            order++;
        });
    }
    
    //* Aircraft Box Link
    $('.aircraft-box').click(function() {
        var link = $(this).find('.aircraft-name').attr('href');
        window.location.href = link;
    });
     
    //* Contact Locations Map
    var firstLoad = true;
    $(window).scroll(function () {
        if(window.location.hash == '#memberships' && firstLoad) {
            $('.locations-tab').ready(function() {
                var count = 0;
                var mapCount = $('.location-map').length;

                $('.location-map-container').each(function() {
                    count++;
                    var id = $(this).attr('data-id');
                    var lat = parseFloat($(this).find('.loc-lat-'+id).val());
                    var lng = parseFloat($(this).find('.loc-long-'+id).val());
                    var coords = {lat: lat, lng: lng};

                    if( screenWidth <= 375 ) {
                        $(this).find('.location-map-'+id).css('width','288px');
                    } else if( screenWidth > 375 && screenWidth <= 768 ) {
                        $(this).find('.location-map-'+id).css('width','648px');
                    } 

                    var map = new google.maps.Map(document.getElementById('location-map-'+id), {
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
                    google.maps.event.addListener(map, 'tilesloaded', function() {
                       if(count == mapCount) {
                           hideTabs();
                       }
                    });
                    firstLoad = false;
                });
            });
        }
    });
    
    function hideTabs() {
        $('.locations-tab .tab').each(function(){
            if(!$(this).hasClass('active')) {
                $(this).hide();
            }
        });
    }
    
    //* Contact Locations Tab
    $('.locations-tab .tab-links a').on('click', function(e)  {
        e.preventDefault();
        var currentAttrValue = $(this).attr('href');
        
        // Show/Hide Tabs
        $('.locations-tab ' + currentAttrValue).addClass('active').css({
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
    
    //* Contact Section - Driving Directions Popup
    $('.map-view').click(function() {
        var id = $(this).attr('id');
        var mapName = $('.map-name-'+id).text();
        var mapAddress = $('.map-add-'+id).text();
        var image = $('.map-image-'+id).attr('data-url');
        var imageAlt = $('.map-image-'+id).attr('data-alt');
        
        $('.pop-dir').html('<div id="pop-dir-close" class="pop-dir-close"></div><h4>'+mapName+'</h4><p>'+mapAddress+'</p><img src="'+image+'" alt="'+imageAlt+'"/>');
        $('.pop-dir').removeClass('hidden');
        $('.overlay').removeClass('hidden');
    
        $('#pop-dir-close').on('click', function(){
            $('.overlay').toggleClass('hidden');
            $('.pop-dir').toggleClass('hidden');
        });
    });
    
    //* Contact Section - Driving Directions Email Form Popup
    $('.map-email').on('click', function() {
        var id = $(this).attr('id');
        var mapName = $('.map-name-p'+id).text();
        var mapAddress = $('.map-add-p'+id).text();
        var image = $('.map-image-p'+id).attr('data-url');
        
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
    });
    
    //* Contact Section - Join Our Team Popup
    $('.map-inquire').on('click', function() {
        $('.pop-join').removeClass('hidden').hide().fadeIn(400);
        $('.overlay').removeClass('hidden');
        
        $('#pop-join-close').on('click', function(){
            close_inquiry_form();
        });
    });
    
    function close_inquiry_form () {
        $('.overlay').addClass('hidden');
        $('.pop-join').addClass('hidden').hide();
    };
});