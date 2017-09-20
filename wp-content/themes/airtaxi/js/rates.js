jQuery(function( $ ){
    
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
    var slide = getUrlParameter('slide') ? getUrlParameter('slide') : 1;
    var tab = getUrlParameter('tab');
    
    $(document).ready(function() {
    
        var table = $('#airport-transfer').DataTable({
            ordering :  false,
            bInfo : false,
            iDisplayLength : -1,
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: ''
                }
            },
            columnDefs : [
                {
                    targets : [ 1 ],
                    className : 'dt-center',
                    searchable : false
                },
                {
                    responsivePriority : 1,
                    targets : [ 2 ],
                    searchable : false,
                    className : 'dt-center'
                },
                {
                    targets : [ 3 ],
                    searchable : false,
                    className : 'dt-center'
                },
                {
                    targets : [ 4 ],
                    searchable : false,
                    className : 'dt-center'
                }
            ]
        });
        
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
    
    if(tab) {
        $('.tab'+tab).click();
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