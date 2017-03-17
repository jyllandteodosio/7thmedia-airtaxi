jQuery(function( $ ){
    
    $(document).ready(function() {
        var redirects = [
            ['', '/'],
            ['#home', '/'],
            ['#home-section-0', '/'],
            ['#home-section-1', '#about-us'],
            ['#home-section-2', '#base-locations'],
            ['#home-section-3', '#aircraft-fleet'],
            ['#home-section-4', '#membership'],
            ['#home-section-5', '#helicopter-rates-philippines'],
            ['#home-section-6', '#private-charter-plane-rates-philippines'],
            ['#home-section-7', '#contact-us'],
        ]

        for (var i=0; i<redirects.length; i++) {
            if (window.location.hash == redirects[i][0]) {
                $new = window.location.href.replace(window.location.hash, redirects[i][1]);
                window.location.replace($new);
            }
        }
    });
    
    function close_inquiry_form () {
        $('.overlay').addClass('hidden');
        $('.pop-join').addClass('hidden').hide();
    };
    
});