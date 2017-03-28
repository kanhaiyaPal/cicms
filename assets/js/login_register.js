$(document).ready(function(){
	/*refresh captcha*/
	$('.refreshCaptcha').on('click', function(){
		$.get('captcha/refresh', function(data){
			$('#captImg').html(data);
		});
	});
	
});