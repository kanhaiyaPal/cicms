<div class="page-content container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-wrapper">
				<div class="box">
					<div class="content-wrap">
						<h6>Sign In</h6>
						<?php if(validation_errors()): ?>
						<div class="alert alert-danger" role="alert">
						  <?php echo validation_errors();  ?>
						</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('incorrect_data')): ?>
						<div class="alert alert-danger" role="alert">
						  <?php echo $this->session->flashdata('incorrect_data');  ?>
						</div>
						<?php endif; ?>
						<?php if($this->session->flashdata('logout_success')): ?>
						<div class="alert alert-success" role="alert">
						  <?php echo $this->session->flashdata('logout_success');  ?>
						</div>
						<?php endif; ?>
						<?php echo form_open(''); ?>
						<input class="form-control" type="text" name="username" value="<?php echo set_value('username'); ?>" placeholder="E-mail address">
						<input class="form-control" type="password" name="pass" value="" placeholder="Password">
						<div class="action">
							<input type="submit" class="btn btn-primary signup" value="Login" />
						</div>  
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>