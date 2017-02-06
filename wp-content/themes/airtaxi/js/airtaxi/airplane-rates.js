jQuery(function( $ ){
    
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
    
    
    $('.ap-image img').centerImage();
    
});