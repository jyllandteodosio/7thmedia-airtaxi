jQuery(function( $ ){
    
    var baseURL = window.location.protocol + "//" + window.location.host;
    
    if(baseURL == "http://localhost") {
        baseURL = baseURL + "/Projects/airtaxi"
    }
    
    //-- Homepage - Menu Link - Smooth Scroll --//
    
    $('a[href*="#"]:not([href="#"]):not(.contact-map, .tab-links a, .expanding-archives-section a)').click(function() {
        if($('.responsive-menu-icon').css('display') == 'block') {
            $('.genesis-nav-menu.responsive-menu').slideUp(200);
        }
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top-40
                }, 1200);
                return false;
            }
        }
    });
    
    //News Landing Page
    //Removes images from excerpts
    $('.news-landing-container').ready(function() {
        $(this).find('.news-landing-excerpt figure').remove();
        $(this).find('.related-news-excerpt figure').remove();
    });
    
    
    //View full news content
    $('.news-landing-excerpt .read-more, .news-landing-excerpt .readmore').on('click', function(e) {
        e.preventDefault();
        
        $this = $(this);
        $postID = $(this).parents('.news-landing-item').attr('data-news-id');
        
        //local
        var base = window.location.protocol + "//" + window.location.host + window.location.pathname.replace('news/','');
        //testserver
//        var base = window.location.protocol + "//" + window.location.host;
        
        //local
        $url = '' + baseURL + '/wp-json/wp/v2/posts/' + $postID;
        //testserver
//        $url = '' + base + 'wp-json/wp/v2/posts/' + $postID;
        
        //console.log('Post ID: ' + $postID);
        
        $.ajax({
            url: $url,
            method: 'GET',
            crossDomain: true,            
            success: function(data, status) {
                //console.log('URL: ' + $url);
                //console.log(data);
                if(!data) {
                    //console.log('no data found');
                } else {
                    //console.log('data found');
                    $this.parents('article').find('.news-landing-content').hide();
                    $this.parents('article').find('.news-landing-content').html(data.content.rendered + '<div class="news-item-close"><a href="#news-' + $postID + '" class="news-close-btn, read-more">Close Full Story</a></div>');
                    $this.parents('article').find('.news-landing-content').fadeIn();
                    $this.parents('.news-landing-excerpt').fadeOut().hide();
                    
                    $('.news-item-close').click(function() {
                        var pathname = $(this).find('a')[0].href.split('/'),
                        l = pathname.length;
                        pathname = pathname[l-1] || pathname[l-2];
                        window.location.hash = "#!" + pathname;
                        
                        if (location.pathname == pathname) {
                            var target = $(this.hash);
                            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                            if (target.length) {
                                $('html, body').animate({
                                    scrollTop: target.offset().top-40
                                }, 1200);
                                return false;
                            }
                        }
                        $(this).parents('.news-landing-content').fadeOut().hide();
                        $(this).parents('article').find('.news-landing-excerpt').fadeIn();
                        $(this).parents('.news-landing-content').html('');
                        
                    });
                }
            }
        });
    });
    
    //Load more button
    $('.news-load-btn').on('click', function() {
        //get next page of posts
        var next_page = $(this).attr('data-next-page');
        var cat = $(this).attr('data-news-cat');

        load_next_news(next_page, cat);
    });
    
    //Load more news
    function load_next_news (next_page, cat) {
        //testserver
//        var base = window.location.protocol + "//" + window.location.host;
        
        //local
        $url = '' + baseURL + '/wp-json/wp/v2/posts';
        //testserver
//        $url = '' + base + 'wp-json/wp/v2/posts;
        
        $params = {
            page: next_page,
            per_page: 6,
            orderby: 'date',
            order: 'desc',
            categories: cat
        };
        
        //console.log($params);
        var addCount = 6;
        
        if(next_page <= 1) {
            addCount = 0;
        }
        
        var next_news = $.ajax({
            url: $url,
            method: 'GET',
            data: $params,
            crossDomain: true,            
            success: function(data, status) {
                //console.log('URL: ' + $url);
                //console.log(data);
                if(!data) {
                    //console.log('no data found');
                } else {
                    //console.log('data found');
                    $.each(data, function(key, post){
                        
                        var imageURL = '';
                        
                        if(post.thumbnail) {
                            var imageURL = '<figure>'
                            +'<img src="'+post.thumbnail+'" alt="'+post.title.rendered+'">'
                            +'</figure>';
                        }
                        
                        $('.news-landing-container')
                            .append('<div class="news-landing-item" data-news-id="'+key+1+addCount+'">'
                            +'<article>'
                            +'<div class="news-title-container">'
                            +'<h2 class="news-landing-title">'+post.title.rendered+'</h2>'
                            +'</div>'
                            +'<a href="'+post.link+'" class="news-item-image">'
                            +imageURL
                            +'</a>'
                            +'<div class="news-landing-excerpt">'+post.excerpt.rendered
                            +'<a href="'+post.link+'" class="read-more">Read More</a>'
                            +'</div>'
                            +'<div class="news-landing-content"></div>'
                            +'</article>'
                            +'</div>');
                    });
                }
            }
        });
        
        next_news.done(function(data, textStatus, jqXHR) {
            var currentPage = parseInt(next_page,10);
            var shownEntries = $('.news-landing-item').length;
                
            totalEntries  = parseInt( jqXHR.getResponseHeader('X-WP-Total'), 10 );
            totalPages  = parseInt( jqXHR.getResponseHeader('X-WP-TotalPages'), 10 );
            //console.log('total pages: ' + totalPages);
            //console.log('total entries: ' + totalEntries);
            
            if ( currentPage === totalPages ) {
                //console.log('current == total');
                if($('.news-load-btn')) {
                    //console.log('.news-load-btn found');
                    $('.news-load-btn').remove();
                    $('.news-load-more').remove();
                } else {
                    //console.log('.news-load-btn not found');
                }
            } else if ( currentPage < totalPages ) {
                //console.log('current < total');
                $('.news-load-btn').remove();
                $('.news-load-more').remove();
                $('.news-landing-container').append('<div class="news-load-more"><button type="button" class="news-load-btn" data-next-page="'+(currentPage+1)+'" data-next-cat="'+cat+'">View More Posts</button></div>');
            }

            $('.news-load-btn').click(function() {
                //get next page of posts
                var next_page = $(this).attr('data-next-page');
                var cat = $(this).attr('data-news-cat');

                load_next_news(next_page, cat);
            });
            
        });//end of next_news.done
    }
    
});