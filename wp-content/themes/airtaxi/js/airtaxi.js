jQuery(function( $ ){
    
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
    });
    
});