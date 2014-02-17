$(function() {

	// Registration & Login Form Flip
		
	var formFlips = $('.form-body');
	
	$('.flipLink').click(function(){
		
		formFlips.toggleClass('flipped');

	});

	$('.notification-close').click(function(){
		$('.success').fadeOut('1000');
		$('.errors').fadeOut('1000');
	});

	// Forgot Password

	$('.flipFor').click(function(){
			
		formFlips.toggleClass('flippedfor');

	});
	
	// Display / Hide Password Function - Login Form

	$('#checkboxShow').change(function() {

		var isChecked = $('#checkboxShow').prop('checked');

		if (isChecked)
			$('#textPassword').prop('type', 'text');

		else
			$('#textPassword').prop('type', 'password');

	});


	// Display / Hide Password Function - Registration Form

	$('#checkboxShow1').change(function() {

		var isChecked = $('#checkboxShow1').prop('checked');

		if (isChecked)
			$('#textPassword1').prop('type', 'text');

		else
			$('#textPassword1').prop('type', 'password');

	});

	// Mobile Slide Menu Function

	$('#push').click(function () {
		
		var $slideMenu = $( 'body, #slide-menu' ), 
				value = $slideMenu.css('left') === '270px' ? '0px' : '270px';
			
		$slideMenu.animate( {
			left: value
		}, 200)
	});

	// $('#sign-up').click(function () {
		
	// 	$('#reg-form').fadeOut('slow');

	// 	$('#login-form').fadeIn('slow');
	// });

	// Preloader for web pages

	$(window).load(function() {
		$(".loader").fadeOut("1000");
	});

});