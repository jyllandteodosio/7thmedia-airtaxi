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
    
    console.log(getUrlParameter('destination-input'));
    var destination = getUrlParameter('destination-input');
    
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
        
        table.search(destination);
        table.draw();
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
    
    $('.day-tours').slick({
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
        ]
    });
});