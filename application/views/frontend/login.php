<div class="inner-banner">
  <div class="container">
    <h2>Login | Register</h2>
  </div>
</div>
<div class="container">
  <div class="box1">
	<?php if(validation_errors()): ?>
	<?php echo validation_errors('<div class="alert alert-danger" role="alert">','</div>');  ?>
	<?php endif; ?>
	<?php if(isset($register_errors)): ?>
	<div class="alert alert-danger" role="alert">
	<?=$register_errors?>
	</div>
	<?php endif; ?>
	<?php if(isset($registration_success)): ?>
	<div class="alert alert-success" role="alert">
	<?=$registration_success?>
	</div>
	<?php endif; ?>
    <div class="row">
      <div class="col-md-5">
        <h1>Login<span></span></h1>
        <form action="" name="login_form" method="post">
          <div class="row">
            <div class="col-md-12 f-user">
              <input type="text" name="username" placeholder="User id" required>
            </div>
            <div class="col-md-12 f-pass">
              <input type="password" name="passkey" placeholder="Password" required>
            </div>
            <div class="col-md-6">
              <input type="submit" name="user_login" value="Login">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-2 text-center"> &nbsp; </div>
      <div class="col-md-5">
        <h2>Register<span></span></h2>
        <form name="register_form" action="" method="post" >
          <div class="row">
            <div class="col-sm-6 f-user">
              <input type="text" name="name" placeholder="Name *" value="<?=set_value('name')?>" required>
            </div>
            <div class="col-sm-6 f-mobile">
              <input type="tel" name="mobile" maxlength="10"  pattern="[0-9]{10}" placeholder="Mobile *" value="<?=set_value('mobile')?>" required />
            </div>
            <div class="col-sm-12 f-email">
              <input type="email" name="email" placeholder="Email *" value="<?=set_value('email')?>" required/>
            </div>
			<div class="col-sm-6">
				<span><span id="captImg" class="float-left"><?php echo $captcha_img; ?></span><a href="javascript:void(0);" class="refreshCaptcha" ><img src="<?php echo base_url().'assets/images/refresh.png'; ?>"/></a></span>
			</div>
			<div class="col-sm-6">
				<input type="text" name="captcha" placeholder="Captcha *" required/>
			</div>
            <div class="col-md-6">
			  <input name="register" type="submit" id="button" value="Register">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url('assets/js/login_register.js'); ?>" rel="text/javascript"></script>