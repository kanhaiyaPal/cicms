<!DOCTYPE html>
<html>
<head>
	<title>Captcha implement in CodeIgniter by CodexWorld</title>
	<style type="text/css">
		#captImg{float:left;}
		.refreshCaptcha {position:relative;top:27px;}
		form{float:left;width:100%;}
	</style>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.refreshCaptcha').on('click', function(){
				$.get('<?php echo base_url().'captcha/refresh'; ?>', function(data){
					$('#captImg').html(data);
				});
			});
		});
	</script>
</head>
<body>
	<p>Submit the word you see below:</p>
	<p id="captImg"><?php echo $captchaImg; ?></p>
	<a href="javascript:void(0);" class="refreshCaptcha" ><img src="<?php echo base_url().'assets/images/refresh.png'; ?>"/></a>
	<form method="post">
		<input type="text" name="captcha" value=""/>
		<input type="submit" name="submit" value="SUBMIT"/>
	</form>
</body>
</html>