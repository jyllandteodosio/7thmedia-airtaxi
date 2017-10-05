jQuery(function( $ ){
    
    var screenWidth = $(window).width();
    
    //* Remove rates tab background if tablet
    if(screenWidth <= 1024) {
        $('.tabs-wrap').css({ 'background-image': 'none' });
        
    }
    
    //* Function to get URL parameters
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
    
    //* Initialize datatable for airport transfer
    $(document).ready(function() {
        
        //* Initialize default table columns (location and location type)
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
        
        //* Initialize dynamic table columns (aircraft)
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
        
        //* If airport transfer search parameter exists
        if(destination) {
            var search = destination.replace(/\+/g,' ');
            console.log('search:'+search);
            table.search(search);
            table.draw();
        }
    });
    
    //* Rates tab show and hide function
    $('.tabs-wrap .tab-links a').on('click', function(e)  {
        var classname = $(this).attr('class');
        var currentAttrValue = $(this).attr('href');
        var tabselect = $('.'+classname+'-link');
        
        // Show/Hide Tabs
        $('.tabs-wrap ' + currentAttrValue).fadeIn(400).siblings().hide();

        // Change/remove current tab to active
        tabselect.addClass('active').siblings().removeClass('active');
        
//        if(classname === 'tab3') {
//            $('.day-tours').slick('slickGoTo', slide-1);
//        }

        e.preventDefault();
    });
    
    //* Function to set active tab
    function tabClick(callback) {
        var interval = setInterval(function() {
            $('.tab'+tab).click();
            clearInterval(interval);
            callback();
            return;
        },100);
        return true;
    }
    
    //* Callback function for offset scroll on day trip boxes (tablet)
    function scrollRates() {
//        if(screenWidth <= 1024) {
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
//        }
    }
    
    //* If tab parameter exists, call tabClick function to set active tab
    if(tab) {
        tabClick(scrollRates);
    }
    
    //* Initialize slick slider for aerial tours tab
    if($('.aerial-tours .rates-box').length) {
        if($('.aerial-tours .rates-box').length > 4) {
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
        } else {
            $('.aerial-tours').css({
                'display' : 'flex',
                'justify-content' : 'center'
            });
        }
    }
    
    //* Initialize slick slider for day tours tab
//    if($('.day-tours .destinations-box').length) {
//        $('.day-tours').slick({
//            dots: false,
//            arrows: true,
//            initialSlide: slide-1,
//            rows: 2,
//            slidesPerRow: 1,
//            responsive: [
//                {
//                    breakpoint: 1025,
//                    settings: "unslick"
//                }
//            ]
//        });
//    }
});