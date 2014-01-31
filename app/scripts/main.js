$(document).ready(function(){

	//'use strict';

	// Toggle function container & scroll viewfinder to element
	$('.btn-init').on('click',function(){
		$('#main-container').slideToggle(function(){
			$('html, body').animate({
		        scrollTop: $('#main-container').offset().top
		    }, 500);
		});
	});

	// Submit AJAX
    $(function () {
        $('#main-submission-form').on('submit', function(e) {
            $.ajax({
                type: 'post',
                url: 'submit.php',
                data: $(this).serialize(),
                success: function () {
                    $('#main-submission-form').fadeOut();
                    $('.success').show().animate({'opacity':'1'}, 2000);
                }
            });
            e.preventDefault();
        });
    });

    // Search AJAX
    $(function () {
        $('#main-search-form').on('submit', function(e) {
            $.ajax({
                type: 'get',
                url: 'search.php',
                data: $(this).serialize(),
                success: function (resp) {
                    $('.search-result').html(resp).show().animate({'opacity':'1'}, 2000);
                }
            });
            e.preventDefault();
        });
    });


});