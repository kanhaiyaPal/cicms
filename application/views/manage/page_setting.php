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
					<div class="panel-title">Reserved Pages - Content Management</div>
					<div class="panel-options">
					<button class="btn btn-primary" onclick="document.getElementById('frmsett').submit ()"><span class="glyphicon glyphicon-floppy-disk"></span> Save Settings </button>
					</div>
				</div>
				<div class="panel-body">
				<?php if(!empty($this->session->flashdata('setting_updated'))): ?>
				<div class="alert alert-success" role="alert">
				  <?php echo $this->session->flashdata('setting_updated');  ?>
				</div>
				<?php endif; ?>
				<?php if(!empty(validation_errors())): ?>
					<div class="alert alert-danger" role="alert">
					  <?php echo validation_errors();  ?>
					</div>
				<?php endif; ?>
					<div id="rootwizard">
						<div class="navbar">
						  <div class="navbar-inner">
							<div class="container">
								<ul class="nav nav-pills">
									<li class="active"><a href="#tab1" data-toggle="pill">Home</a></li>
									<li><a href="#tab2" data-toggle="pill">Contact Us</a></li>
									<!--<li><a href="#tab3" data-toggle="tab">Third</a></li>-->
								</ul>
							</div>
						  </div>
						</div>
						<?php echo form_open('',array("class" =>"form-horizontal","id"=>"frmsett")); ?>
						 <div class="tab-content"> 
							<div class="tab-pane active" id="tab1">
								  <div class="form-group">
									<label class="col-sm-2 control-label">Top Summary</label>
									<div class="col-sm-10">
									  <textarea id="pageset_editor1" class="form-control setting_editor" name="home_top_summary" placeholder="Top Summary Content"  rows="3" ><?=$home_top_sum?></textarea>
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Features Block</label>
									<div class="col-sm-10">
									  <textarea id="pageset_editor2" class="form-control setting_editor"  name="home_feature_block" placeholder="Features Block Content"  rows="3"><?=$home_fet_blk?></textarea>
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-sm-2 control-label">Bottom Summary</label>
									<div class="col-sm-10">
									  <textarea id="pageset_editor3" class="form-control setting_editor" name="home_bottom_summary" placeholder="Bottom Summary Content"  rows="3" ><?=$home_bot_sum?></textarea>
									</div>
								  </div>
							</div>
							<div class="tab-pane" id="tab2">
								<div class="form-group">
									<label class="col-sm-2 control-label">Google Map Iframe Code</label>
									<div class="col-sm-10">
									  <textarea class="form-control setting_editor" name="contact_map_code" placeholder="Iframe code for Contact Us Page"  rows="3" ><?=$contact_g_map?></textarea>
									</div>
								</div>
							</div>
						  </div>
						</form>							
					</div>
  				</div>
  			</div> 
		</div>
	</div>
</div>