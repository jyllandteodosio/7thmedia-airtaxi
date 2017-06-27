jQuery(function( $ ){
    if($('.home-about').length) {
        
        $('.home-about').ready(function() {
            
            var newMarkers = [];
            
            $('.marker').each(function() {
                var marker = {
                    coords: [$(this).attr('data-lat'),$(this).attr('data-long')],
                    name: $(this).attr('data-name'),
                    style: {
                        fill: '#55dfe8',
                        stroke: '#45b9c1',
                        "stroke-width": 2,
                        r: 7
                    },
                    imgsrc: $(this).attr('data-image')
                };

                newMarkers.push(marker);
            });
            
            $('.about-map').vectorMap({
                map: 'ph_mill_en',
                backgroundColor: 'transparent',
                hoverOpacity: 1,
                hoverColor: false,
                zoomOnScroll: false,
                regionStyle: {
                    initial: {
                        fill: '#fff',
                        "fill-opacity": 1,
                        stroke: '#fff',
                        "stroke-width": 1.5,
                        "stroke-opacity": 1
                    },
                    hover: {
                        "fill-opacity": 1,
                        cursor: 'pointer'
                    }
                },
                onRegionTipShow: function (e, e1, text) {
                    e.preventDefault();
                    e1.html('');
                },
                onRegionOver: function (e, code) {
                    e.preventDefault();
                },
                markerStyle: {
                    hover: {
                        stroke: '#fff',
                        "stroke-width": 2,
                        cursor: 'pointer'
                    }
                },
                markers: newMarkers,
                onMarkerTipShow: function(e, label, code) {
                    
                    var markers = $('.about-map').vectorMap('get', 'mapObject').markers;
                    
                    label.html('<div class="map-hover" style="background-image: url('+ markers[code].config.imgsrc +');"><\div>');
                }
            });
            $('.about-map .jvectormap-zoomin').hide();
            $('.about-map .jvectormap-zoomout').hide();
        });
    }
});