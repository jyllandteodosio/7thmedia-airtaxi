jQuery(function($) {
	var dataTable = $('#technical-resources-table').DataTable({
		"responsive": true,
		"dom": 'rtip',
		"pageLength": 15,
		"columnDefs": [
			{
				"targets": [0],
				"searchable": false
			},
			{
				"targets": [2],
				"visible": false
			}
		],

		initComplete: function () {
            this.api().columns().every( function () {
                var column = this;

                if( $(column.header()).html() == 'Category' ) {
                	var select = $('<select><option value="">View All</option></select>')
	                    .appendTo( $('.select-filter') )
	                    .on( 'change', function () {
	                        var val = $.fn.dataTable.util.escapeRegex(
	                            $(this).val()
	                        );
	 						console.log( $(this).val() );
	                        column
	                            .search( val ? '^'+val+'$' : '', true, false )
	                            .draw();
	                    } );
	 
	                column.data().unique().sort().each( function ( d, j ) {
	                    select.append( '<option value="'+d+'">'+d+'</option>' )
	                } );
                } // if statement

            } );
        }

	});

	$("#keyword_search").on("keyup search input paste cut", function() {
   		dataTable.search(this.value).draw();
	}); 
    
    $(document).ready(function(){
        $('.download-popup').addClass('hidden');
        $('.registration-popup').addClass('hidden');
        $('.status-popup').addClass('hidden');
        $('.overlay').addClass('hidden');
    });
    
    $('.download-popup .close-button').click(function() {
        $('.notification.top').removeClass('active');
        $('.notification.top').html('');
        $('.download-popup form').trigger('reset');
        $('.download-popup').fadeOut(500).addClass('hidden');
        $('.overlay').fadeOut(500).addClass('hidden');
    });
    
    $('.registration-popup .close-button').click(function() {
        $('.notification.top').removeClass('active');
        $('.notification.top').html('');
        $('.registration-popup form').trigger('reset');
        $('.registration-popup').fadeOut(500).addClass('hidden');
        $('.overlay').fadeOut(500).addClass('hidden');
    });
    // Set variables for GravityForms Web API
    function CalculateSig(stringToSign, privateKey){
        //calculate the signature needed for authentication
        var hash = CryptoJS.HmacSHA1(stringToSign, privateKey);
        var base64 = hash.toString(CryptoJS.enc.Base64);
        return encodeURIComponent(base64);
    }
    
    // Change URL based on host - for local testing
    var host = window.location.protocol + "//" + window.location.host + "/";
    if(window.location.host === 'localhost') {
        host += 'Projects/vecta-labs/';
    }
    
//    console.log(host + 'wp-json/downloadpdf/v1/keys');
    
    var endpoint = host + 'wp-json/downloadpdf/v1/keys/';
    var d = new Date;
    var expiration = 3600; // 1 hour,
    var unixtime = parseInt(d.getTime() / 1000);
    var future_unixtime = unixtime + expiration;
    var urlMain = host + 'gravityformsapi/'; // update on live
    var currentURL = $(location).attr('href');
    
    $('.download-file-button').click(function(e) {
        e.preventDefault();
        var downloadID = $(this).attr('data-id');
        
        // If email is still in cookie
//        if(Cookies.get('email')) {
//            //console.log('Cookie: '+Cookies.get('email'));
//            $('.download-file-'+downloadID)[0].click();
//        } else {
            $('.download-popup').fadeIn(500).removeClass('hidden');
            $('.overlay').fadeIn(500).removeClass('hidden');
            $('#download-link').attr('data-link', downloadID);
//        }
    });
    
    // Validate Download Form
    $('#gform_1').validate({
        rules: {
            input_1: {
                required: true,
                email: true
            },
            input_4: {
                required: true,
            }
        },
        messages: {
            input_1: 'Please enter a valid email address',
            input_4: 'Please answer the CAPTCHA'
        },
        wrapper: 'li',
        debug: true
    });
    
    $('#gform_1 input[type="submit"]').click(function() {
        var email = $('.download-popup .ginput_container_email input').val();
        if($('#gform_1').valid()) {
            $.ajax({
                url: endpoint,
                type: 'GET',
                beforeSend: function (xhr, opts) {
                    $('.download-popup .close-button').hide();
                    $('.notification.top').addClass('active');
                    $('.notification.top').html('Checking if email is registered..');
                }
            }).done(function(result) {
                //console.log('Keys');
                //console.log(result);

                var obj = $.parseJSON(''+result+'');
                var publicKey = obj.publicKey;
                var privateKey = obj.privateKey;
                checkEmail(email, publicKey, privateKey);
            });
        }
        return false;
    });
    
    function checkEmail(email, publicKey, privateKey) {
        // Search filters
        var search = {
            field_filters : [{
                key: '6',
                value: email,
                operator: 'is',
            }],
        };

        // Variables for Auth URL
        var method = "GET";
        var route = "entries";

        // Create Auth Signature
        stringToSign = publicKey + ":" + method + ":" + route + ":" + future_unixtime;
        sig = CalculateSig(stringToSign, privateKey);

        // Create Auth URL
        var auth = '/?api_key=' + publicKey + '&signature=' + sig + '&expires=' + future_unixtime;
        var url = urlMain  + route + auth + '&search=' + encodeURI(JSON.stringify(search));
        //console.log(url);
        
        var downloadID = $('#download-link').attr('data-link');

        // Check if email exists
        var response;
        var newsletter = '';

        if($('.download-popup .ginput_container_checkbox input').is(':checked')) {
            newsletter = 'checked';
        }

        // AJAX call
        var downloadAjax = $.ajax({
            url: url,
            type: 'GET',
        })
        .done(function (data, textStatus, xhr) {
            response = JSON.stringify(data.response, null, '\t');
            var parsedResponse = JSON.parse(response);
            //console.log(parsedResponse);

            // If a match is found
            if(parsedResponse.total_count > 0) {
                //console.log('email found');
                var entries = parsedResponse.entries;
                var entriesNewsletter = entries[0]['10.1'];
                var entryID = entries[0]['id'];

                // Check if newsletter status matches db record
                if(newsletter.length && entriesNewsletter.length) {
                    Cookies.set('email', email);
                    $('.notification.top').html('Email already registered. Downloading file..');
                    //console.log(entries[0]);
                    // Close popup
                    $('.download-popup .close-button').show();
                    $('.download-popup .close-button').click();
                    setTimeout(function() {
                        // Proceed to download
                        $('.download-file-'+downloadID)[0].click();
                    }, 500);
                } else {
                    // If not matching, update db then proceed to file download
                    if(newsletter.length) {
                        updateNewsletter(entryID, entries[0], publicKey, privateKey);
                    }
                }

            } else {
                $('.notification.top').addClass('active');
                $('.notification.top').html('Email is not yet registered. Please register below:');
                //console.log('email not found');

                // Show registration form
                $('.download-popup form').trigger('reset');
                $('.download-popup').fadeOut(500).addClass('hidden');
                $('.registration-popup').fadeIn(500).removeClass('hidden');
            }
        });
    }
    
    function updateNewsletter(entryID, entryData, publicKey, privateKey) {
        $('.notification.top').removeClass('active');
        $('.notification.top').html('');
        // Variables for Auth URL
        var method = 'PUT';
        var route = 'entries/' + entryID;
        
        // Create Auth Signature
        var stringToSign = publicKey + ":" + method + ":" + route + ":" + future_unixtime;
        var sig = CalculateSig(stringToSign, privateKey);
        
        // Create Auth URL
        var auth = '/?api_key=' + publicKey + '&signature=' + sig + '&expires=' + future_unixtime;
        var url = urlMain + route + auth;
        console.log('url: ' + url);
        
        var downloadID = $('#download-link').attr('data-link');
        
        // Update newsletter checkbox
        entryData['10.1'] = 'Yes';
        delete entryData.id;

        // Stringify entryData
        entry_json = JSON.stringify(entryData);

        // AJAX call
        var updateAjax = $.ajax({
            url: url,
            type: 'PUT',
            data: entry_json,
            contentType:'application/json',
            success: function(result) {
                //console.log('success: '); 
                //console.log(result);
                
                // Close popup
                $('.download-popup .close-button').click();
                setTimeout(function() {
                    // Proceed to download
                    $('.download-file-'+downloadID)[0].click();
                }, 500);
            },
            error: function(result, textStatus, errorThrown) {
                // Show error message
                //console.log('error: ' + errorThrown);
            }
        });

    }
    
    // Validate Registration Form
    $('#gform_2').validate({
        rules: {
            input_5: {
                required: true,
            },
            input_6: {
                required: true,
                email: true
            },
            input_7: {
                required: true,
            },
            input_8: {
                required: true,
            },
            input_12: {
                required: true,
            }
        },
        messages: {
            input_5: 'Please enter your country',
            input_6: 'Please enter a valid email address',
            input_7: 'Please enter your first name',
            input_8: 'Please enter your surname',
            input_12: 'Please select your country'
        },
        wrapper: 'li',
        debug: true
    });
    
    $('#gform_2 input[type="submit"]').click(function() {
        if($('#gform_2').valid()) {
            $.ajax({
                url: endpoint,
                type: 'GET',
                beforeSend: function (xhr, opts) {
                    $('.registration-popup .close-button').hide();
                    $('.notification.bottom').addClass('active');
                    $('.notification.bottom').html('Please wait while we register your email..');
                }
            }).done(function(result) {
                //console.log('Keys');
                //console.log(result);

                var obj = $.parseJSON(''+result+'');
                var publicKey = obj.publicKey;
                var privateKey = obj.privateKey;
                submitEmail(publicKey, privateKey);
            });
        }
        return false;
    });
    
    function submitEmail(publicKey, privateKey) {
        var email = $('.registration-popup .ginput_container_email input').val();
        // Variables for Auth URL
        
        // Create Auth Signature
        var stringToSign = publicKey + ":POST:forms/2/submissions:" + future_unixtime;
        var sig = CalculateSig(stringToSign, privateKey);
        
        // Create Auth URL
        var auth = '/?api_key=' + publicKey + '&signature=' + sig + '&expires=' + future_unixtime;
        var url = urlMain + 'forms/2/submissions' + auth;
        //console.log('url: ' + url);
        
        var downloadID = $('#download-link').attr('data-link');
        var newsletterOptin = 'Yes';
        
        if(!$('.registration-popup form input[name="input_10.1"]').is(':checked')) {
            newsletterOptin = 'No';
        } else {
            //console.log(newsletterOptin);
        }
        
        var entries = {
            'input_values' : {
                'input_3' : $('.registration-popup form input[name="input_3"]').val(),
                'input_4' : $('.registration-popup form input[name="input_4"]').val(),
                'input_5' : $('.registration-popup form input[name="input_5"]').val(),
                'input_6' : $('.registration-popup form input[name="input_6"]').val(),
                'input_7' : $('.registration-popup form input[name="input_7"]').val(),
                'input_8' : $('.registration-popup form input[name="input_8"]').val(),
                'input_9' : $('.registration-popup form input[name="input_9"]').val(),
                'input_10_1' : newsletterOptin,
                'input_12' : $('.registration-popup form select[name="input_12"]').val(),
                'g-recaptcha-response' : $('.g-recaptcha-response').val(),
            }
        };
        
        entries_json = JSON.stringify(entries);
        
        //console.log(entries_json);
        
        var registerAjax = $.ajax({
            url: url,
            type: 'POST',
            data: entries_json,
            contentType:'application/json',
            beforeSend: function (xhr, opts) {
                $('.notification.top').removeClass('active');
                $('.notification.top').html('');
                
                // Show registration status
                $('.registration-popup .close-button').show();
                $('.registration-popup .close-button').click();
                $('.overlay').fadeIn(500).removeClass('hidden');
                $('.status-popup').fadeIn(500).removeClass('hidden');
                $('.status-popup').html('<h4>Downloading File...');
                
                // Proceed to download
                $('.download-file-'+downloadID)[0].click();
            },
            success: function(result) {
                Cookies.set('email', email);
                $('.status-popup').html('<h4>Registration successful!</h4>');
                
                // Close popup
                setTimeout(function() {
                    $('.status-popup').fadeOut(100).addClass('hidden');
                    $('.status-popup').html('');
                    $('.overlay').fadeOut(500).addClass('hidden');
                }, 2000);
            },
            error: function(result, textStatus, errorThrown) {
                // Show error message
                //console.log('error: ' + errorThrown);
                
                // Show registration status
                $('.registration-popup .close-button').show();
                $('.registration-popup .close-button').click();
                $('.overlay').fadeIn(500).removeClass('hidden');
                $('.status-popup').fadeIn(500).removeClass('hidden');
                $('.status-popup').html('<h4>Registration failed! Please refresh the page and try again.</h4>');
                
                // Close popup
                setTimeout(function() {
                    $('.status-popup').fadeOut(100).addClass('hidden');
                    $('.status-popup').html('');
                    $('.overlay').fadeOut(500).addClass('hidden');
                }, 2000);
            }
        });
    }
});