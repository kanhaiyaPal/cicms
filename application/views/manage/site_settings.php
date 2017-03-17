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
				<?php echo form_open_multipart('',array("class" =>"form-horizontal","id"=>"sitesett")); ?>
						<fieldset>	
							<div class="form-group">
								<label class="col-sm-2 control-label">Upload Site Logo</label>
								<div class="col-sm-10">
								<input type="file" name="site_logo" class="file-loading" id="input-id">
									<p class="help-block">
										Optimal Resolutoion  for logo 300 X 50(jpg,png and gif only)
									</p>
								</div>
							</div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Site Admin e-mail</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" name="site_email" value="<?=$site_email?>" placeholder="Email Id of Admin"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Site Admin Phone</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="site_phone" value="<?=$site_phone?>" placeholder="Phone of Admin"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Site Address</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="site_address" value="<?=$site_address?>" placeholder="Address of Business"  />
							</div>
						  </div>
						  <hr/>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Facebook Url</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="site_footer_facebook" value="<?=$site_footer_facebook?>" placeholder="Facebook Url"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Twitter Url</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="site_footer_twitter" value="<?=$site_footer_twitter?>" placeholder="Twitter Url"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Linked In Url</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="site_footer_linkedin" value="<?=$site_footer_linkedin?>" placeholder="Linked In Url"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Pinterest Url</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="site_footer_pinterest" value="<?=$site_footer_pinterest?>" placeholder="Pinterest Url"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Instagram Url</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="site_footer_instagram" value="<?=$site_footer_instagram?>" placeholder="Instagram Url"  />
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Google Plus Url</label>
							<div class="col-sm-10">
							  <input type="text" class="form-control" name="site_footer_googleplus"  value="<?=$site_footer_googleplus?>" placeholder="Google Plus Url"  />
							</div>
						  </div>
						  <hr/>
						  <div class="form-group">
							<label class="col-sm-2 control-label">Footer Disclaimer Text</label>
							<div class="col-sm-10">
							  <textarea class="form-control" name="site_footer_disclaimer" placeholder="Footer Disclaimer Text" id="ckeditor_standard" rows="3"><?=$site_footer_disclaimer?></textarea>
							</div>
						  </div>
						  <div>
							<input type="hidden" name="form_marker" value="1"/>
							<input type="submit" class="btn btn-primary" value='Save Settings' />
						  </div>
						</fieldset>
					</form>
  				</div>
  			</div> 
		</div>
	</div>
</div>