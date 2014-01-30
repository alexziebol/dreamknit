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

});