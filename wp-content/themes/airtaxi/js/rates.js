jQuery(function( $ ){
    
    var screenWidth = $(window).width();
    
    if(screenWidth <= 1024) {
        $('.tabs-wrap').css({ 'background-image': 'none' });
        
    }
    
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
    
    var destination = getUrlParameter('destination-input');
    var destinationID = getUrlParameter('destination-id');
    var slide = getUrlParameter('slide') ? getUrlParameter('slide') : 1;
    var tab = getUrlParameter('tab');
    
    $(document).ready(function() {
        
        var columnDefs = [
            {
                targets : [ 1 ],
                className : 'dt-center',
                searchable : false,
                ordering : false,
            },
            {
                responsivePriority : 1,
                targets : [ 2 ],
                searchable : false,
                className : 'dt-center',
                ordering : false,
            }
        ];
        
        var aircraftLength = $('.aircraft-column').length;
        
        if(aircraftLength) {
            for(var a = 0; a < aircraftLength; a++) {
                var targetValue = 3 + a;
        
                var thProperty = {
                    targets : [targetValue],
                    searchable : false,
                    className : 'dt-center',
                };
                columnDefs.push(thProperty);
            }
            
            var table = $('#airport-transfer').DataTable({
                ordering :  true,
                order: [[ 1, 'asc' ]],
                bInfo : false,
                iDisplayLength : -1,
                lengthMenu : [[10, 25, 50, -1], [10, 25, 50, "All"]],
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.childRowImmediate,
                        type: ''
                    }
                },
                columnDefs : columnDefs
            });
        }
        
        if(destination) {
            var search = destination.replace(/\+/g,' ');
            console.log('search:'+search);
            table.search(search);
            table.draw();
        }
    });
    
    $('.tabs-wrap .tab-links a').on('click', function(e)  {
        var classname = $(this).attr('class');
        var currentAttrValue = $(this).attr('href');
        var tabselect = $('.'+classname+'-link');
        
        // Show/Hide Tabs
        $('.tabs-wrap ' + currentAttrValue).fadeIn(400).siblings().hide();

        // Change/remove current tab to active
        tabselect.addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });
    
    function tabClick(callback) {
        var interval = setInterval(function() {
            $('.tab'+tab).click();
            clearInterval(interval);
            callback();
            return;
        },100);
        return true;
    }
    
    function scrollRates() {
        if(screenWidth <= 1024) {
            if(destinationID) {

                var offset = 120;
                if(screenWidth <= 425) {
                    offset = 100;
                }
                
                console.log('offset: '+offset);

                $('html, body').animate({
                    scrollTop: $('#'+destinationID).offset().top-offset
                }, 1000);
            }
        }
    }
    
    if(tab) {
        tabClick(scrollRates);
    }
    
    if($('.aerial-tours .rates-box').length) {
        $('.aerial-tours').slick({
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
                    breakpoint: 1340,
                    settings: {
                        slidesPerRow: 3,
                    }
                },
                {
                    breakpoint: 1025,
                    settings: "unslick"
                }
            ]
        });
    }
    
    if($('.day-tours .destinations-box').length) {
        $('.day-tours').slick({
            dots: false,
            arrows: true,
            initialSlide: slide-1,
            rows: 2,
            slidesPerRow: 1,
            responsive: [
                {
                    breakpoint: 1025,
                    settings: "unslick"
                }
            ]
        });
    }
});