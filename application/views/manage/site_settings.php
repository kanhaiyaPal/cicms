<div class="page-content">
	<div class="row">
		<?php if(isset($sidebar)): ?>
		  <div class="col-md-2">
			<?php echo $sidebar; ?>
		  </div>
		  <?php endif; ?>
		  <div class="col-md-10">
		  	<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Manage Site Settings</div>
					<div class="panel-options">
						<button class="btn btn-primary" onclick="document.getElementById('sitesett').submit ()"><span class="glyphicon glyphicon-floppy-disk"></span> Save Settings </button>
					</div>
				</div>
				<div class="panel-body">
				<?php if(!empty($this->session->flashdata('site_setting_updated'))): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('site_setting_updated');  ?>
				</div>
				<?php endif; ?>
				<?php if(!empty(validation_errors())): ?>
					<div class="alert alert-danger" role="alert">
					  <?php echo validation_errors();  ?>
					</div>
				<?php endif; ?>
				<?php echo form_open('',array("class" =>"form-horizontal","id"=>"sitesett")); ?>
							<div class="form-group">
								<label class="col-sm-2 control-label">Upload Site Logo</label>
								<div class="col-sm-10">
								<input type="file" name="site_logo" class="file-loading" id="input-id">
									<p class="help-block">
										Optimal Resolutoion  for logo 300*50(jpg,png and gif only)
									</p>
								</div>
							</div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Site Admin e-mail</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="site_email" placeholder="Email Id of Admin"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Site Admin Phone</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="site_phone" placeholder="Phone of Admin"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Site Address</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="site_address" placeholder="Address of Business"  />
							</div>
						  </div>
						  <hr/>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Facebook Url</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="site_footer_facebook" placeholder="Facebook Url"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Twitter Url</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="site_footer_facebook" placeholder="Twitter Url"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Linked In Url</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="site_footer_facebook" placeholder="Linked In Url"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Pinterest Url</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="site_footer_facebook" placeholder="Pinterest Url"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Instagram Url</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="site_footer_facebook" placeholder="Instagram Url"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Google Plus Url</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="site_footer_facebook" placeholder="Google Plus Url"  />
							</div>
						  </div>
						  <hr/>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Footer Disclaimer Text</label>
							<div class="col-sm-10">
							  <textarea class="form-control" name="site_footer_disclaimer" placeholder="Footer Disclaimer Text" id="ckeditor_standard" rows="3"></textarea>
							</div>
						  </div>
					</form>
  				</div>
  			</div> 
		</div>
	</div>
</div>