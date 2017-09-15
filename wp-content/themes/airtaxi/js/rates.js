jQuery(function( $ ){
    
    $(document).ready(function() {
    
        $('#airport-transfer').DataTable({
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
});